<?php
/**
 * Title: Service search hero
 * Slug: civic-hearth/service-hero
 * Categories: civic-hearth
 * Description: A search-led civic hero with a popular services panel.
 * Keywords: hero, search, services
 * Viewport Width: 1200
 *
 * @package Civic_Hearth
 */

defined( 'ABSPATH' ) || exit;
?>
<!-- wp:group {"align":"full","className":"ch-section ch-paper ch-hero"} -->
<div class="wp-block-group alignfull ch-section ch-paper ch-hero">
<!-- wp:group {"className":"ch-section-inner"} -->
<div class="wp-block-group ch-section-inner">
<!-- wp:columns -->
<div class="wp-block-columns">
<!-- wp:column {"width":"65%"} -->
<div class="wp-block-column" style="flex-basis:65%">
<!-- wp:paragraph {"className":"ch-kicker"} -->
<p class="ch-kicker"><?php esc_html_e( 'Here for our community', 'civic-hearth' ); ?></p>
<!-- /wp:paragraph -->
<!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading"><?php esc_html_e( 'What can we help you with today?', 'civic-hearth' ); ?></h1>
<!-- /wp:heading -->
<!-- wp:paragraph {"className":"ch-lede"} -->
<p class="ch-lede"><?php esc_html_e( 'Find local services, get support, and take part in the life of your community.', 'civic-hearth' ); ?></p>
<!-- /wp:paragraph -->
<?php
// Core escapes the JSON attributes and creates a valid self-closing block comment.
echo get_comment_delimited_block_content( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Core block serialization.
	'core/search',
	array(
		'label'      => __( 'Search services and information', 'civic-hearth' ),
		'buttonText' => __( 'Search', 'civic-hearth' ),
		'className'  => 'ch-hero-search',
	),
	''
);
?>
</div>
<!-- /wp:column -->
<!-- wp:column {"width":"35%"} -->
<div class="wp-block-column" style="flex-basis:35%">
<!-- wp:group {"className":"ch-quick-panel"} -->
<div class="wp-block-group ch-quick-panel">
<!-- wp:heading -->
<h2 class="wp-block-heading"><?php esc_html_e( 'Popular services', 'civic-hearth' ); ?></h2>
<!-- /wp:heading -->
<!-- wp:list {"className":"ch-task-list"} -->
<ul class="wp-block-list ch-task-list">
<!-- wp:list-item -->
<li><a href="<?php echo esc_url( add_query_arg( 's', __( 'Bins and recycling', 'civic-hearth' ), home_url( '/' ) ) ); ?>"><?php esc_html_e( 'Bins and recycling', 'civic-hearth' ); ?></a></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><a href="<?php echo esc_url( add_query_arg( 's', __( 'Housing and support', 'civic-hearth' ), home_url( '/' ) ) ); ?>"><?php esc_html_e( 'Housing and support', 'civic-hearth' ); ?></a></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><a href="<?php echo esc_url( add_query_arg( 's', __( 'Parking and travel', 'civic-hearth' ), home_url( '/' ) ) ); ?>"><?php esc_html_e( 'Parking and travel', 'civic-hearth' ); ?></a></li>
<!-- /wp:list-item -->
<!-- wp:list-item -->
<li><a href="<?php echo esc_url( add_query_arg( 's', __( 'Libraries and learning', 'civic-hearth' ), home_url( '/' ) ) ); ?>"><?php esc_html_e( 'Libraries and learning', 'civic-hearth' ); ?></a></li>
<!-- /wp:list-item -->
</ul>
<!-- /wp:list -->
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
