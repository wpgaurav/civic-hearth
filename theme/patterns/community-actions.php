<?php
/**
 * Title: Community action cards
 * Slug: civic-hearth/community-actions
 * Categories: civic-hearth
 * Description: Three simple paths to participation, volunteering, and community groups.
 * Keywords: community, volunteering, actions
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
<!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e( 'A stronger community starts with you.', 'civic-hearth' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"ch-lede"} -->
<p class="ch-lede"><?php esc_html_e( 'There are many ways to make a difference, meet your neighbors, and help shape what happens next.', 'civic-hearth' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:columns -->
<div class="wp-block-columns">
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:group {"className":"ch-card"} -->
<div class="wp-block-group ch-card">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Have your say', 'civic-hearth' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Share your views on local plans and the decisions that affect your area.', 'civic-hearth' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p><a href="<?php echo esc_url( add_query_arg( 's', __( 'View consultations', 'civic-hearth' ), home_url( '/' ) ) ); ?>"><?php esc_html_e( 'View consultations', 'civic-hearth' ); ?></a></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:group {"className":"ch-card"} -->
<div class="wp-block-group ch-card">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Lend a hand', 'civic-hearth' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Find volunteering opportunities and put your skills to work close to home.', 'civic-hearth' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p><a href="<?php echo esc_url( add_query_arg( 's', __( 'Find a volunteering opportunity', 'civic-hearth' ), home_url( '/' ) ) ); ?>"><?php esc_html_e( 'Find a volunteering opportunity', 'civic-hearth' ); ?></a></p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:column -->
<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:group {"className":"ch-card"} -->
<div class="wp-block-group ch-card">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Find your people', 'civic-hearth' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Discover groups, shared spaces, and activities in your neighborhood.', 'civic-hearth' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:paragraph -->
<p><a href="<?php echo esc_url( add_query_arg( 's', __( 'Explore community groups', 'civic-hearth' ), home_url( '/' ) ) ); ?>"><?php esc_html_e( 'Explore community groups', 'civic-hearth' ); ?></a></p>
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
