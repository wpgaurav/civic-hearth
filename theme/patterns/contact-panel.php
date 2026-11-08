<?php
/**
 * Title: Contact and access support
 * Slug: civic-hearth/contact-panel
 * Categories: civic-hearth
 * Description: A contact section without fabricated phone numbers or nonfunctional forms.
 * Keywords: contact, accessibility, help
 * Viewport Width: 1200
 *
 * @package Civic_Hearth
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"align":"full","className":"ch-section ch-paper"} -->
<div class="wp-block-group alignfull ch-section ch-paper">
<!-- wp:group {"className":"ch-section-inner"} -->
<div class="wp-block-group ch-section-inner">
<!-- wp:columns {"className":"ch-contact-grid"} -->
<div class="wp-block-columns ch-contact-grid">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e( 'We are here to help.', 'civic-hearth' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"ch-lede"} -->
<p class="ch-lede"><?php esc_html_e( 'Not sure where to start? Find the right person to speak to, or see how to visit us.', 'civic-hearth' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p><a href="<?php echo esc_url( add_query_arg( 's', __( 'Find contact information', 'civic-hearth' ), home_url( '/' ) ) ); ?>"><?php esc_html_e( 'Find contact information', 'civic-hearth' ); ?></a></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:group {"className":"is-style-civic-notice"} -->
<div class="wp-block-group is-style-civic-notice">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Help in a way that works for you', 'civic-hearth' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Ask about information in another format, language support, or help accessing a service.', 'civic-hearth' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p><a href="<?php echo esc_url( add_query_arg( 's', __( 'Find accessibility information', 'civic-hearth' ), home_url( '/' ) ) ); ?>"><?php esc_html_e( 'Find accessibility information', 'civic-hearth' ); ?></a></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->
</div>
<!-- /wp:columns -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
