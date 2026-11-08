<?php
/**
 * Title: Service information page
 * Slug: civic-hearth/service-page
 * Categories: civic-hearth
 * Description: A plain-language service page structure for use below the theme-supplied page title.
 * Keywords: page, service, information
 * Viewport Width: 1200
 *
 * @package Civic_Hearth
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:paragraph {"className":"ch-lede"} -->
<p class="ch-lede"><?php esc_html_e( 'Use this page to explain the service clearly: who it is for, what people need, and what happens next.', 'civic-hearth' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e( 'Before you begin', 'civic-hearth' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Bring the information listed below so you can complete your request.', 'civic-hearth' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:list -->
<ul class="wp-block-list">
<!-- wp:list-item -->
<li><a href="<?php echo esc_url( add_query_arg( 's', __( 'Find the documents you need', 'civic-hearth' ), home_url( '/' ) ) ); ?>"><?php esc_html_e( 'Find the documents you need', 'civic-hearth' ); ?></a></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><a href="<?php echo esc_url( add_query_arg( 's', __( 'Check eligibility and fees', 'civic-hearth' ), home_url( '/' ) ) ); ?>"><?php esc_html_e( 'Check eligibility and fees', 'civic-hearth' ); ?></a></li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
<!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e( 'How to use this service', 'civic-hearth' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Explain the steps, expected response time, and where people can get help. Replace this text with your published service information.', 'civic-hearth' ); ?></p>
<!-- /wp:paragraph -->
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
