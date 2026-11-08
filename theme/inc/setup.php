<?php
/**
 * Theme features, assets, and widget areas.
 *
 * @package Civic_Hearth
 */

defined( 'ABSPATH' ) || exit;

/** Register classic and block editor features. */
function civic_hearth_setup() {
	load_theme_textdomain( 'civic-hearth', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 72,
			'width'       => 220,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);
	add_theme_support( 'custom-background', array( 'default-color' => 'ffffff' ) );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script', 'navigation-widgets' ) );
	add_editor_style( array( 'style.css', 'assets/css/editor.css' ) );
	register_nav_menus(
		array(
			'primary' => __( 'Primary navigation', 'civic-hearth' ),
			'utility' => __( 'Header utility links', 'civic-hearth' ),
			'footer'  => __( 'Footer links', 'civic-hearth' ),
		)
	);
}
add_action( 'after_setup_theme', 'civic_hearth_setup' );

/** Set the legacy content width for embeds. */
function civic_hearth_content_width() {
	$GLOBALS['content_width'] = civic_hearth_sanitize_content_width( get_theme_mod( 'civic_hearth_content_width', 760 ) );
}
add_action( 'after_setup_theme', 'civic_hearth_content_width', 0 );

/** Enqueue local frontend resources. */
function civic_hearth_assets() {
	wp_enqueue_style( 'civic-hearth', get_template_directory_uri() . '/style.css', array(), CIVIC_HEARTH_VERSION );
	if ( is_child_theme() ) {
		wp_enqueue_style( 'civic-hearth-child', get_stylesheet_uri(), array( 'civic-hearth' ), wp_get_theme()->get( 'Version' ) );
	}
	wp_enqueue_script(
		'civic-hearth-navigation',
		get_template_directory_uri() . '/assets/js/navigation.js',
		array(),
		CIVIC_HEARTH_VERSION,
		array(
			'strategy'  => 'defer',
			'in_footer' => true,
		)
	);
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'civic_hearth_assets' );

/** Share the automatic dark palette with the frontend and editor canvas. */
function civic_hearth_block_assets() {
	wp_register_style( 'civic-hearth-design', false, array(), CIVIC_HEARTH_VERSION );
	wp_enqueue_style( 'civic-hearth-design' );
	wp_add_inline_style( 'civic-hearth-design', civic_hearth_design_css() );
}
add_action( 'enqueue_block_assets', 'civic_hearth_block_assets' );

/** Register optional areas; empty areas do not leave gaps in the layout. */
function civic_hearth_widgets_init() {
	$areas = array(
		'sidebar-1' => __( 'Post and archive sidebar', 'civic-hearth' ),
		'footer-1'  => __( 'Footer column one', 'civic-hearth' ),
		'footer-2'  => __( 'Footer column two', 'civic-hearth' ),
		'footer-3'  => __( 'Footer column three', 'civic-hearth' ),
	);
	foreach ( $areas as $id => $name ) {
		register_sidebar(
			array(
				'name'          => $name,
				'id'            => $id,
				'description'   => __( 'Add blocks or widgets to this area.', 'civic-hearth' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}
}
add_action( 'widgets_init', 'civic_hearth_widgets_init' );

/**
 * Body classes describe layout, without changing the main WordPress query.
 *
 * @param string[] $classes Existing body classes.
 * @return string[]
 */
function civic_hearth_body_classes( $classes ) {
	$classes[] = 'ch-columns-' . civic_hearth_sanitize_columns( get_theme_mod( 'civic_hearth_columns', '3' ) );
	return $classes;
}
add_filter( 'body_class', 'civic_hearth_body_classes' );
