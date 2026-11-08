#!/usr/bin/env python3
"""Build clean directory and FluentCart updater distributions."""
import argparse
import hashlib
import json
from pathlib import Path
import re
import shutil
import tempfile
import zipfile

root = Path(__file__).resolve().parents[1]
parser = argparse.ArgumentParser(description=__doc__)
parser.add_argument('--channel',choices=['wordpress-org','direct','all'],default='wordpress-org')
args = parser.parse_args()
style = (root/'theme/style.css').read_text()
version = re.search(r'^Version:\s*(\S+)',style,re.M)[1]
assert 'Update URI:' not in style and not (root/'theme/inc/class-civic-hearth-license.php').exists()
manifest = {}
for channel in (['wordpress-org','direct'] if args.channel=='all' else [args.channel]):
    with tempfile.TemporaryDirectory(prefix='civic-hearth-build-') as temp:
        theme = Path(temp)/'civic-hearth'
        shutil.copytree(root/'theme',theme,ignore=shutil.ignore_patterns('.DS_Store','.git','node_modules','__pycache__'))
        if channel=='direct':
            shutil.copyfile(root/'distribution/class-civic-hearth-license.php',theme/'inc/class-civic-hearth-license.php')
            (theme/'style.css').write_text(style.replace('Version: '+version,'Version: '+version+'\nUpdate URI: https://gauravtiwari.org/product/civic-hearth/#license'))
            with (theme/'functions.php').open('a') as f:
                f.write("\n// Free-license updater for the store distribution.\nrequire_once __DIR__ . '/inc/class-civic-hearth-license.php';\nCivic_Hearth_License::boot();\n")
            with (theme/'readme.txt').open('a') as f:
                f.write('\n== Updates in this download ==\n\nActivate your free lifetime key under Appearance > Civic Hearth License to receive theme updates on unlimited websites. Get the key with the free checkout at https://gauravtiwari.org/product/civic-hearth/. All theme features work without a key.\n\nActivation sends the key, theme version, and site URL securely to gauravtiwari.org. Subsequent license checks and update requests use the saved activation. Automatic installation follows your WordPress auto-update preference. The separate WordPress.org build omits this client and uses directory updates once listed.\n')
        name = f'civic-hearth-{version}'+('-licensed' if channel=='direct' else '')+'.zip'
        target = root/'build'/name;target.parent.mkdir(exist_ok=True)
        with zipfile.ZipFile(target,'w',zipfile.ZIP_DEFLATED,compresslevel=9) as archive:
            for file in sorted(theme.rglob('*')):
                if file.is_file():
                    info=zipfile.ZipInfo('civic-hearth/'+file.relative_to(theme).as_posix(),(2026,1,1,0,0,0))
                    info.compress_type=zipfile.ZIP_DEFLATED;info.external_attr=0o100644<<16
                    archive.writestr(info,file.read_bytes())
        with zipfile.ZipFile(target) as archive:
            assert archive.testzip() is None
            assert ('civic-hearth/inc/class-civic-hearth-license.php' in archive.namelist()) == (channel=='direct')
            assert (b'Update URI:' in archive.read('civic-hearth/style.css')) == (channel=='direct')
        manifest[channel]={'path':str(target),'filename':name,'version':version,'bytes':target.stat().st_size,'sha256':hashlib.sha256(target.read_bytes()).hexdigest()}
(root/'build/manifest.json').write_text(json.dumps(manifest,indent=2)+'\n')
print(json.dumps(manifest,indent=2))
