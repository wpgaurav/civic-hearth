<?php
/**
 * Title: Information notice
 * Slug: civic-hearth/information-notice
 * Categories: civic-hearth
 * Description: An inline information panel with a clear next action.
 * Keywords: notice, information, support
 * Viewport Width: 1200
 *
 * @package Civic_Hearth
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"className":"is-style-civic-notice"} -->
<div class="wp-block-group is-style-civic-notice">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Need a little help getting started?', 'civic-hearth' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'If you cannot find what you need online, our team can help you find the right service.', 'civic-hearth' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p><a href="<?php echo esc_url( add_query_arg( 's', __( 'Find contact information', 'civic-hearth' ), home_url( '/' ) ) ); ?>"><?php esc_html_e( 'Find contact information', 'civic-hearth' ); ?></a></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
