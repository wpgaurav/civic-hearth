# Civic Hearth

A welcoming home for public life. A free hybrid WordPress theme for councils, libraries, charities, and community organizations.

PHP templates retain the Customizer, menus, and widgets. Native block patterns and theme.json provide editable page layouts, shared design tokens, and editor styling. Includes three accent palettes, light/dark/device appearance, local Atkinson Hyperlegible fonts, service layouts, news templates, keyboard navigation, and RTL styling.

## Requirements

- WordPress 6.7 or newer; verified on 6.7.4 and 7.1.4.
- PHP 7.4 or newer; runtime verified on PHP 8.3 and syntax checked on PHP 8.5.
- No required plugin or page builder.

## Install

Upload a release ZIP through Appearance > Themes. Create a page using the Civic homepage template and insert Patterns > Civic Hearth > Civic homepage. Set it as the static front page in Settings > Reading. Replace the initial search links with your published service-page URLs.

## Distribution

`theme/` is the clean WordPress.org source. The store distribution adds a free license updater from `distribution/gt-license.php`; all theme features work without activation. The free lifetime key supports unlimited websites and enables update checks through FluentCart.

Run `python3 distribution/build.py --channel all` to build both ZIPs. The direct package is named `civic-hearth-VERSION-licensed.zip`. Do not add its updater or Update URI to the canonical `theme/` directory.

Product: https://gauravtiwari.org/product/civic-hearth/

Demo: https://demo.gatilab.com/civic-hearth/

## License

GPL-2.0-or-later. Local font assets use the SIL Open Font License 1.1, with copyright notices and licenses in `theme/assets/fonts/`.
