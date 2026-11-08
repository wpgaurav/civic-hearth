# Civic Hearth

The installable WordPress.org source lives in `theme/`. Keep this source free of the FluentCart license client and Update URI. Build the store package by injecting `distribution/gt-license.php` through `distribution/build.py`.

- Prefix PHP functions with `civic_hearth_`; use the `civic-hearth` text domain.
- Preserve native block serialization. Validate patterns in an actual WordPress block editor after changes.
- Run PHP lint, WordPress coding standards, theme.json validation, and Theme Check on the clean distribution.
- Store product 1189180 and variation 164 are the Civic Hearth free lifetime offer. Verify identity and current updater state live before each release.
- Downloads use FluentCart Pro's configured R2 driver. Never expose license keys or signed package URLs.
- Demo writes are restricted to https://demo.gatilab.com/civic-hearth/. Inspect shared theme use before replacing files.
- Public release work requires explicit authorization. Keep release manifests and rollback instructions, with no credentials or customer records.
