<?php
/**
 * Native Customizer controls and strict sanitizers.
 *
 * @package Civic_Hearth
 */

defined( 'ABSPATH' ) || exit;

/**
 * Sanitize a color scheme.
 *
 * @param mixed $value Submitted setting.
 * @return string
 */
function civic_hearth_sanitize_scheme( $value ) {
	return in_array( $value, array( 'light', 'dark', 'auto' ), true ) ? $value : 'light';
}

/**
 * Sanitize an accent preset.
 *
 * @param mixed $value Submitted setting.
 * @return string
 */
function civic_hearth_sanitize_accent( $value ) {
	return in_array( $value, array( 'blue', 'teal', 'brick' ), true ) ? $value : 'blue';
}

/**
 * Sanitize an archive column count.
 *
 * @param mixed $value Submitted setting.
 * @return string
 */
function civic_hearth_sanitize_columns( $value ) {
	return in_array( (string) $value, array( '2', '3' ), true ) ? (string) $value : '3';
}

/**
 * Sanitize the sidebar position.
 *
 * @param mixed $value Submitted setting.
 * @return string
 */
function civic_hearth_sanitize_sidebar( $value ) {
	return in_array( $value, array( 'none', 'right' ), true ) ? $value : 'none';
}

/**
 * Sanitize a checkbox.
 *
 * @param mixed $value Submitted setting.
 * @return bool
 */
function civic_hearth_sanitize_checkbox( $value ) {
	return in_array( $value, array( true, 1, '1' ), true );
}

/**
 * Clamp reading width to safe layout bounds.
 *
 * @param mixed $value Submitted setting.
 * @return int
 */
function civic_hearth_sanitize_content_width( $value ) {
	return max( 640, min( 880, absint( $value ) ) );
}

/**
 * Clamp wide width independently of reading width.
 *
 * @param mixed $value Submitted setting.
 * @return int
 */
function civic_hearth_sanitize_wide_width( $value ) {
	return max( 1040, min( 1320, absint( $value ) ) );
}

/**
 * Keep the base type readable.
 *
 * @param mixed $value Submitted setting.
 * @return int
 */
function civic_hearth_sanitize_font_size( $value ) {
	return max( 16, min( 22, absint( $value ) ) );
}

/**
 * Register theme settings using core controls only.
 *
 * @param WP_Customize_Manager $wp_customize Core Customizer instance.
 */
function civic_hearth_customize_register( $wp_customize ) {
	$wp_customize->add_panel(
		'civic_hearth',
		array(
			'title'       => __( 'Civic Hearth', 'civic-hearth' ),
			'description' => __( 'Design and layout settings for your community website.', 'civic-hearth' ),
			'priority'    => 30,
		)
	);
	$sections = array(
		'design' => __( 'Colors and typography', 'civic-hearth' ),
		'layout' => __( 'Layout and news', 'civic-hearth' ),
		'notice' => __( 'Site notice', 'civic-hearth' ),
		'footer' => __( 'Header and footer', 'civic-hearth' ),
	);
	foreach ( $sections as $id => $title ) {
		$wp_customize->add_section(
			'civic_hearth_' . $id,
			array(
				'title' => $title,
				'panel' => 'civic_hearth',
			)
		);
	}
	$settings = array(
		'scheme'           => array(
			'default'  => 'light',
			'sanitize' => 'civic_hearth_sanitize_scheme',
			'label'    => __( 'Color scheme', 'civic-hearth' ),
			'section'  => 'design',
			'type'     => 'select',
			'choices'  => array(
				'light' => __( 'Light', 'civic-hearth' ),
				'dark'  => __( 'Dark', 'civic-hearth' ),
				'auto'  => __( 'Follow visitor device', 'civic-hearth' ),
			),
		),
		'accent'           => array(
			'default'  => 'blue',
			'sanitize' => 'civic_hearth_sanitize_accent',
			'label'    => __( 'Accent palette', 'civic-hearth' ),
			'section'  => 'design',
			'type'     => 'select',
			'choices'  => array(
				'blue'  => __( 'Civic blue', 'civic-hearth' ),
				'teal'  => __( 'Community teal', 'civic-hearth' ),
				'brick' => __( 'Heritage brick', 'civic-hearth' ),
			),
		),
		'font_size'        => array(
			'default'     => 18,
			'sanitize'    => 'civic_hearth_sanitize_font_size',
			'label'       => __( 'Body text size (px)', 'civic-hearth' ),
			'section'     => 'design',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 16,
				'max'  => 22,
				'step' => 1,
			),
		),
		'content_width'    => array(
			'default'     => 760,
			'sanitize'    => 'civic_hearth_sanitize_content_width',
			'label'       => __( 'Reading width (px)', 'civic-hearth' ),
			'section'     => 'layout',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 640,
				'max'  => 880,
				'step' => 8,
			),
		),
		'wide_width'       => array(
			'default'     => 1152,
			'sanitize'    => 'civic_hearth_sanitize_wide_width',
			'label'       => __( 'Wide layout width (px)', 'civic-hearth' ),
			'section'     => 'layout',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 1040,
				'max'  => 1320,
				'step' => 8,
			),
		),
		'columns'          => array(
			'default'  => '3',
			'sanitize' => 'civic_hearth_sanitize_columns',
			'label'    => __( 'News grid columns on desktop', 'civic-hearth' ),
			'section'  => 'layout',
			'type'     => 'select',
			'choices'  => array(
				'2' => __( 'Two', 'civic-hearth' ),
				'3' => __( 'Three', 'civic-hearth' ),
			),
		),
		'sidebar'          => array(
			'default'     => 'none',
			'sanitize'    => 'civic_hearth_sanitize_sidebar',
			'label'       => __( 'Post and archive sidebar', 'civic-hearth' ),
			'description' => __( 'The sidebar appears only when it contains widgets.', 'civic-hearth' ),
			'section'     => 'layout',
			'type'        => 'select',
			'choices'     => array(
				'none'  => __( 'No sidebar', 'civic-hearth' ),
				'right' => __( 'Right sidebar', 'civic-hearth' ),
			),
		),
		'show_meta'        => array(
			'default'  => true,
			'sanitize' => 'civic_hearth_sanitize_checkbox',
			'label'    => __( 'Show post date and author', 'civic-hearth' ),
			'section'  => 'layout',
			'type'     => 'checkbox',
		),
		'show_excerpt'     => array(
			'default'  => true,
			'sanitize' => 'civic_hearth_sanitize_checkbox',
			'label'    => __( 'Show post excerpts in news grids', 'civic-hearth' ),
			'section'  => 'layout',
			'type'     => 'checkbox',
		),
		'notice_title'     => array(
			'default'     => '',
			'sanitize'    => 'sanitize_text_field',
			'label'       => __( 'Notice heading', 'civic-hearth' ),
			'description' => __( 'Leave this blank to hide the notice. Use a dedicated alert service for emergency delivery.', 'civic-hearth' ),
			'section'     => 'notice',
			'type'        => 'text',
		),
		'notice_text'      => array(
			'default'  => '',
			'sanitize' => 'sanitize_textarea_field',
			'label'    => __( 'Notice text', 'civic-hearth' ),
			'section'  => 'notice',
			'type'     => 'textarea',
		),
		'notice_link_text' => array(
			'default'  => '',
			'sanitize' => 'sanitize_text_field',
			'label'    => __( 'Notice link label', 'civic-hearth' ),
			'section'  => 'notice',
			'type'     => 'text',
		),
		'notice_link_url'  => array(
			'default'  => '',
			'sanitize' => 'esc_url_raw',
			'label'    => __( 'Notice link URL', 'civic-hearth' ),
			'section'  => 'notice',
			'type'     => 'url',
		),
		'show_tagline'     => array(
			'default'  => true,
			'sanitize' => 'civic_hearth_sanitize_checkbox',
			'label'    => __( 'Show the site tagline in the header', 'civic-hearth' ),
			'section'  => 'footer',
			'type'     => 'checkbox',
		),
		'footer_text'      => array(
			'default'     => '',
			'sanitize'    => 'sanitize_text_field',
			'label'       => __( 'Footer text', 'civic-hearth' ),
			'description' => __( 'Leave blank for the current year and site name.', 'civic-hearth' ),
			'section'     => 'footer',
			'type'        => 'text',
		),
	);
	foreach ( $settings as $key => $setting ) {
		$id = 'civic_hearth_' . $key;
		$wp_customize->add_setting(
			$id,
			array(
				'default'           => $setting['default'],
				'sanitize_callback' => $setting['sanitize'],
				'capability'        => 'edit_theme_options',
				'transport'         => 'refresh',
				'type'              => 'theme_mod',
			)
		);
		$control = array(
			'label'   => $setting['label'],
			'section' => 'civic_hearth_' . $setting['section'],
			'type'    => $setting['type'],
		);
		foreach ( array( 'choices', 'description', 'input_attrs' ) as $attribute ) {
			if ( isset( $setting[ $attribute ] ) ) {
				$control[ $attribute ] = $setting[ $attribute ];
			}
		}
		$wp_customize->add_control( $id, $control );
	}
}
add_action( 'customize_register', 'civic_hearth_customize_register' );
