<?php
/**
 * Title: Service directory
 * Slug: civic-hearth/service-directory
 * Categories: civic-hearth
 * Description: Nine editable service cards with working site-search links.
 * Keywords: services, directory, cards
 * Viewport Width: 1200
 *
 * @package Civic_Hearth
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"align":"full","className":"ch-section "} -->
<div class="wp-block-group alignfull ch-section ">
<!-- wp:group {"className":"ch-section-inner"} -->
<div class="wp-block-group ch-section-inner">
<!-- wp:heading {"className":"ch-rule-heading"} -->
<h2 class="wp-block-heading ch-rule-heading"><?php esc_html_e( 'Services and support', 'civic-hearth' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Find the information and help you need, all in one place.', 'civic-hearth' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:group {"className":"ch-service-grid"} -->
<div class="wp-block-group ch-service-grid">
<!-- wp:group {"className":"ch-card"} -->
<div class="wp-block-group ch-card">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Bins and recycling', 'civic-hearth' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Collection days, recycling advice, and help with household waste.', 'civic-hearth' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:list -->
<ul class="wp-block-list">
<!-- wp:list-item -->
<li><a href="<?php echo esc_url( add_query_arg( 's', __( 'Check collection days', 'civic-hearth' ), home_url( '/' ) ) ); ?>"><?php esc_html_e( 'Check collection days', 'civic-hearth' ); ?></a></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><a href="<?php echo esc_url( add_query_arg( 's', __( 'Report a missed collection', 'civic-hearth' ), home_url( '/' ) ) ); ?>"><?php esc_html_e( 'Report a missed collection', 'civic-hearth' ); ?></a></li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"ch-card"} -->
<div class="wp-block-group ch-card">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Housing and support', 'civic-hearth' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Find housing advice, local support, and a place to turn when you need help.', 'civic-hearth' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:list -->
<ul class="wp-block-list">
<!-- wp:list-item -->
<li><a href="<?php echo esc_url( add_query_arg( 's', __( 'Get housing advice', 'civic-hearth' ), home_url( '/' ) ) ); ?>"><?php esc_html_e( 'Get housing advice', 'civic-hearth' ); ?></a></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><a href="<?php echo esc_url( add_query_arg( 's', __( 'Find local support', 'civic-hearth' ), home_url( '/' ) ) ); ?>"><?php esc_html_e( 'Find local support', 'civic-hearth' ); ?></a></li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"ch-card"} -->
<div class="wp-block-group ch-card">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Parking and travel', 'civic-hearth' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Parking information, permits, public transport, and getting around.', 'civic-hearth' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:list -->
<ul class="wp-block-list">
<!-- wp:list-item -->
<li><a href="<?php echo esc_url( add_query_arg( 's', __( 'Find parking information', 'civic-hearth' ), home_url( '/' ) ) ); ?>"><?php esc_html_e( 'Find parking information', 'civic-hearth' ); ?></a></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><a href="<?php echo esc_url( add_query_arg( 's', __( 'Plan a local journey', 'civic-hearth' ), home_url( '/' ) ) ); ?>"><?php esc_html_e( 'Plan a local journey', 'civic-hearth' ); ?></a></li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"ch-card"} -->
<div class="wp-block-group ch-card">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Families and education', 'civic-hearth' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'School information, family activities, and support for young people.', 'civic-hearth' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:list -->
<ul class="wp-block-list">
<!-- wp:list-item -->
<li><a href="<?php echo esc_url( add_query_arg( 's', __( 'Find school information', 'civic-hearth' ), home_url( '/' ) ) ); ?>"><?php esc_html_e( 'Find school information', 'civic-hearth' ); ?></a></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><a href="<?php echo esc_url( add_query_arg( 's', __( 'Explore family support', 'civic-hearth' ), home_url( '/' ) ) ); ?>"><?php esc_html_e( 'Explore family support', 'civic-hearth' ); ?></a></li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"ch-card"} -->
<div class="wp-block-group ch-card">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Health and wellbeing', 'civic-hearth' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Local care, wellbeing activities, and help to live independently.', 'civic-hearth' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:list -->
<ul class="wp-block-list">
<!-- wp:list-item -->
<li><a href="<?php echo esc_url( add_query_arg( 's', __( 'Find wellbeing support', 'civic-hearth' ), home_url( '/' ) ) ); ?>"><?php esc_html_e( 'Find wellbeing support', 'civic-hearth' ); ?></a></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><a href="<?php echo esc_url( add_query_arg( 's', __( 'Explore care services', 'civic-hearth' ), home_url( '/' ) ) ); ?>"><?php esc_html_e( 'Explore care services', 'civic-hearth' ); ?></a></li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"ch-card"} -->
<div class="wp-block-group ch-card">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Planning and places', 'civic-hearth' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Find out about planning, building, and changes in your neighborhood.', 'civic-hearth' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:list -->
<ul class="wp-block-list">
<!-- wp:list-item -->
<li><a href="<?php echo esc_url( add_query_arg( 's', __( 'View planning information', 'civic-hearth' ), home_url( '/' ) ) ); ?>"><?php esc_html_e( 'View planning information', 'civic-hearth' ); ?></a></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><a href="<?php echo esc_url( add_query_arg( 's', __( 'Have your say', 'civic-hearth' ), home_url( '/' ) ) ); ?>"><?php esc_html_e( 'Have your say', 'civic-hearth' ); ?></a></li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"ch-card"} -->
<div class="wp-block-group ch-card">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Libraries and learning', 'civic-hearth' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Books, digital resources, and opportunities to learn something new.', 'civic-hearth' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:list -->
<ul class="wp-block-list">
<!-- wp:list-item -->
<li><a href="<?php echo esc_url( add_query_arg( 's', __( 'Find your library', 'civic-hearth' ), home_url( '/' ) ) ); ?>"><?php esc_html_e( 'Find your library', 'civic-hearth' ); ?></a></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><a href="<?php echo esc_url( add_query_arg( 's', __( 'Explore learning opportunities', 'civic-hearth' ), home_url( '/' ) ) ); ?>"><?php esc_html_e( 'Explore learning opportunities', 'civic-hearth' ); ?></a></li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"ch-card"} -->
<div class="wp-block-group ch-card">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Parks and community spaces', 'civic-hearth' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Discover parks, shared spaces, and places to meet in your area.', 'civic-hearth' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:list -->
<ul class="wp-block-list">
<!-- wp:list-item -->
<li><a href="<?php echo esc_url( add_query_arg( 's', __( 'Explore local parks', 'civic-hearth' ), home_url( '/' ) ) ); ?>"><?php esc_html_e( 'Explore local parks', 'civic-hearth' ); ?></a></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><a href="<?php echo esc_url( add_query_arg( 's', __( 'Find a community space', 'civic-hearth' ), home_url( '/' ) ) ); ?>"><?php esc_html_e( 'Find a community space', 'civic-hearth' ); ?></a></li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->
<!-- wp:group {"className":"ch-card"} -->
<div class="wp-block-group ch-card">
<!-- wp:heading {"level":3} -->
<h3 class="wp-block-heading"><?php esc_html_e( 'Your community', 'civic-hearth' ); ?></h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p><?php esc_html_e( 'Local news, volunteering, community groups, and ways to get involved.', 'civic-hearth' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:list -->
<ul class="wp-block-list">
<!-- wp:list-item -->
<li><a href="<?php echo esc_url( add_query_arg( 's', __( 'Find community groups', 'civic-hearth' ), home_url( '/' ) ) ); ?>"><?php esc_html_e( 'Find community groups', 'civic-hearth' ); ?></a></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><a href="<?php echo esc_url( add_query_arg( 's', __( 'Explore volunteering', 'civic-hearth' ), home_url( '/' ) ) ); ?>"><?php esc_html_e( 'Explore volunteering', 'civic-hearth' ); ?></a></li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
</div>
<!-- /wp:group -->
