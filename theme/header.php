<?php
/**
 * Site masthead and navigation.
 *
 * @package Civic_Hearth
 */

defined( 'ABSPATH' ) || exit;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#main-content"><?php esc_html_e( 'Skip to main content', 'civic-hearth' ); ?></a>
<header class="ch-masthead">
	<div class="ch-container ch-brand-row">
		<div class="ch-brand">
			<?php the_custom_logo(); ?>
			<div>
				<a class="ch-site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				<?php if ( get_theme_mod( 'civic_hearth_show_tagline', true ) && get_bloginfo( 'description' ) ) : ?>
					<p class="ch-site-description"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
				<?php endif; ?>
			</div>
		</div>
		<div class="ch-header-actions">
			<?php if ( has_nav_menu( 'utility' ) ) : ?>
				<nav class="ch-utility-menu" aria-label="<?php esc_attr_e( 'Utility links', 'civic-hearth' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'utility',
						'container'      => false,
						'depth'          => 1,
						'fallback_cb'    => false,
					)
				);
				?>
															</nav>
			<?php endif; ?>
			<a href="<?php echo esc_url( home_url( '/?s=' ) ); ?>"><?php civic_hearth_icon( 'search' ); ?><?php esc_html_e( 'Search', 'civic-hearth' ); ?></a>
			<button class="ch-menu-toggle" type="button" aria-expanded="false" aria-controls="site-navigation"><?php civic_hearth_icon( 'menu' ); ?><?php esc_html_e( 'Menu', 'civic-hearth' ); ?></button>
		</div>
	</div>
	<div class="ch-nav-row">
		<nav id="site-navigation" class="ch-navigation ch-container" aria-label="<?php esc_attr_e( 'Primary navigation', 'civic-hearth' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'ch-menu',
					'menu_id'        => 'primary-menu',
					'fallback_cb'    => 'civic_hearth_page_menu',
				)
			);
			?>
		</nav>
	</div>
</header>
<?php if ( get_theme_mod( 'civic_hearth_notice_title', '' ) ) : ?>
	<aside class="ch-notice" aria-label="<?php esc_attr_e( 'Site notice', 'civic-hearth' ); ?>">
		<div class="ch-container">
			<p class="ch-notice-title"><?php echo esc_html( get_theme_mod( 'civic_hearth_notice_title' ) ); ?></p>
			<?php
			if ( get_theme_mod( 'civic_hearth_notice_text' ) ) :
				?>
				<p><?php echo esc_html( get_theme_mod( 'civic_hearth_notice_text' ) ); ?></p><?php endif; ?>
			<?php
			if ( get_theme_mod( 'civic_hearth_notice_link_url' ) && get_theme_mod( 'civic_hearth_notice_link_text' ) ) :
				?>
				<a href="<?php echo esc_url( get_theme_mod( 'civic_hearth_notice_link_url' ) ); ?>"><?php echo esc_html( get_theme_mod( 'civic_hearth_notice_link_text' ) ); ?></a><?php endif; ?>
		</div>
	</aside>
<?php endif; ?>
