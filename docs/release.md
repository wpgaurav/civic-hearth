# Release and demo

The store offer is Civic Hearth, product 1189180, variation 164. It is a free, one-time, digital lifetime download with unlimited update activations. Resolve its current metadata live before every release.

Build both packages with `python3 distribution/build.py --channel all`. The clean package is for WordPress.org submission; the licensed package belongs to the FluentCart updater. Upload the licensed package through the store's configured R2 driver and read it back by checksum before selecting its download row in `license_settings`.

The demo is https://demo.gatilab.com/civic-hearth/ on the shared demo network. It uses the actual theme, native patterns, menus, widgets, search, service information pages, news, and an examples page. Search indexing is discouraged. `scripts/demo-content.php` checks the exact target and ownership marker before creating or updating its own content. It stores object IDs for safe retries.

Release checks include clean-theme coding standards, PHP lint, native block validation, theme.json validation, Theme Check, package tree and checksum checks, a real licensed update response, a package download, and a WordPress theme-upgrade test in an isolated local installation. Keep credentials, license keys, activation hashes, and signed storage URLs out of logs and git.

For rollback, preserve the existing updater row and metadata before subsequent releases. Restore only the previous product version and selected download row if a later release fails. Do not restore the demo network database to roll back one site.
