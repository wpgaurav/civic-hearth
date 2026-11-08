=== Civic Hearth ===
Contributors: gauravtiwari
Requires at least: 6.7
Tested up to: 7.1
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A welcoming home for public life. A hybrid theme for councils, libraries, charities, and community organizations.

== Description ==

Civic Hearth combines classic PHP templates and the WordPress Customizer with a shared theme.json design system and native block patterns. It includes locally hosted Atkinson Hyperlegible fonts, service layouts, news grids, optional widget areas, responsive navigation, three accent palettes, and light, dark, or device-based appearance.

All features are included. No paid upgrade, required plugin, remote font service, or page builder is needed.

== Installation ==

1. Upload civic-hearth.zip through Appearance > Themes > Add New > Upload Theme.
2. Activate Civic Hearth.
3. Set your title, tagline, and logo in Appearance > Customize > Site Identity.
4. Create a page, choose the Civic homepage template, and insert the Civic homepage pattern from the Civic Hearth category.
5. Edit the text and service links. Pattern service links initially search your site; replace them with your published service pages.
6. In Settings > Reading, choose that page as your static homepage. Select a separate page for posts if you want a news archive.
7. Assign menus in Appearance > Menus and add optional footer or sidebar blocks in Appearance > Widgets.
8. Use Appearance > Customize > Civic Hearth for colors, typography, layout, the site notice, and footer text.

The homepage pattern provides its own H1. On regular pages, the theme supplies the page title. Pattern insertion and all content changes are controlled by the site owner; activation creates no posts or pages.

== Frequently Asked Questions ==

= Is this a block theme? =

It is a hybrid theme: PHP templates retain the Customizer, menus, and widget areas. The block editor, theme.json presets, native block styles, and patterns handle page content. It does not replace Appearance > Customize with the full Site Editor.

= Does the theme process payments, send alerts, or collect form submissions? =

No. WordPress handles the included search. Service transactions, mailing lists, event management, translation, and contact forms belong in suitable plugins or external services. The site notice is a visual publishing feature, not an emergency delivery system.

= Can I use it for free on my site or sell services with it? =

Yes. The theme is licensed under the GNU General Public License v2 or later. There is no required footer credit. All theme features are available without a license key.

= How do the editor and Customizer work together? =

The selected palette, body size, and layout widths update theme.json through the WordPress theme data API. The same presets are available in the editor and on the frontend. Explicit colors selected on individual blocks remain those blocks' own choices. Device-based appearance follows the visitor's color-scheme preference.

= Can I use a child theme? =

Yes. Templates and pattern files use standard WordPress lookup functions, and the parent stylesheet loads before a child stylesheet.

== Accessibility ==

Includes a skip link, visible focus states, underlined content links, keyboard-operated navigation, semantic landmarks, reduced-motion and forced-color handling, and a readable type scale. Site owners remain responsible for content, plugin behavior, and a complete accessibility review. The accessibility-ready directory tag is intentionally not claimed.

== Resources ==

Theme PHP, JavaScript, CSS, pattern text, and original decorative SVG paths:
Copyright 2026 Gaurav Tiwari. GNU GPL v2 or later. See LICENSE.

Atkinson Hyperlegible Next, normal variable WOFF2, weights 200-800:
Copyright 2020-2024 The Atkinson Hyperlegible Next Project Authors.
SIL Open Font License 1.1. See assets/fonts/next-OFL.txt.
Project: https://github.com/googlefonts/atkinson-hyperlegible-next
Distribution source: https://civic.startersites.dev/fonts/atkinson-hyperlegible-next/AtkinsonHyperlegibleNext-Variable.woff2

Atkinson Hyperlegible Mono, normal variable WOFF2, weights 200-800:
SIL Open Font License 1.1. See assets/fonts/mono-OFL.txt for the copyright notice.
Project: https://github.com/googlefonts/atkinson-hyperlegible-next-mono
Distribution source: https://civic.startersites.dev/fonts/atkinson-hyperlegible-mono/AtkinsonHyperlegibleMono-Variable.woff2

Visual reference: Civic, https://civic.startersites.dev/.
The theme uses an original implementation of its civic visual direction. No reference-site HTML, CSS, JavaScript, photography, or council data is bundled. Redistributable font binaries are included with their licenses.

screenshot.png is an actual theme rendering using original example content. It contains no third-party photography or commercial logos.

== Changelog ==

= 1.0.0 =
* Initial hybrid theme release.
* Added civic homepage and service patterns, Customizer design settings, responsive navigation, local fonts, news templates, and optional widget areas.
