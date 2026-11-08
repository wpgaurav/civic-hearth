<?php
/**
 * Shared Customizer and theme.json design values.
 *
 * @package Civic_Hearth
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return a fixed, validated palette.
 *
 * @param bool $dark Whether to use the dark palette.
 * @return array
 */
function civic_hearth_palette( $dark = false ) {
	$palette                = $dark
		? array(
			'base'    => '#0a1726',
			'paper'   => '#12263c',
			'well'    => '#173049',
			'ink'     => '#f5f7fa',
			'body'    => '#e4e9ef',
			'muted'   => '#c3cdd8',
			'line'    => '#34506e',
			'control' => '#a9b8c9',
			'mast'    => '#050e19',
			'on-mast' => '#f5f7fa',
			'notice'  => '#fff5d6',
		)
		: array(
			'base'    => '#ffffff',
			'paper'   => '#f7f5f0',
			'well'    => '#f0ede6',
			'ink'     => '#0c2340',
			'body'    => '#1b2b3f',
			'muted'   => '#3b4a5e',
			'line'    => '#c9d0d9',
			'control' => '#2e4057',
			'mast'    => '#0c2340',
			'on-mast' => '#ffffff',
			'notice'  => '#fff5d6',
		);
	$accents                = array(
		'blue'  => $dark ? array( '#a8cbff', '#1a3556', '#0a1726' ) : array( '#174a87', '#e7eef7', '#ffffff' ),
		'teal'  => $dark ? array( '#7fd3c7', '#123a36', '#0a1726' ) : array( '#0a524c', '#e3f1ef', '#ffffff' ),
		'brick' => $dark ? array( '#f7bba7', '#3a1d14', '#0a1726' ) : array( '#7a3220', '#f7e8e3', '#ffffff' ),
	);
	$accent                 = civic_hearth_sanitize_accent( get_theme_mod( 'civic_hearth_accent', 'blue' ) );
	$palette['accent']      = $accents[ $accent ][0];
	$palette['accent-soft'] = $accents[ $accent ][1];
	$palette['on-accent']   = $accents[ $accent ][2];
	return $palette;
}

/**
 * Update editor presets and frontend global styles together.
 *
 * @param WP_Theme_JSON_Data $theme_json Theme settings and styles.
 * @return WP_Theme_JSON_Data
 */
function civic_hearth_theme_json( $theme_json ) {
	$names  = array(
		'base'        => __( 'Canvas', 'civic-hearth' ),
		'paper'       => __( 'Warm paper', 'civic-hearth' ),
		'well'        => __( 'Quiet fill', 'civic-hearth' ),
		'ink'         => __( 'Heading ink', 'civic-hearth' ),
		'body'        => __( 'Body text', 'civic-hearth' ),
		'muted'       => __( 'Secondary text', 'civic-hearth' ),
		'line'        => __( 'Border', 'civic-hearth' ),
		'control'     => __( 'Control border', 'civic-hearth' ),
		'mast'        => __( 'Masthead', 'civic-hearth' ),
		'on-mast'     => __( 'On masthead', 'civic-hearth' ),
		'notice'      => __( 'Notice', 'civic-hearth' ),
		'accent'      => __( 'Accent', 'civic-hearth' ),
		'accent-soft' => __( 'Soft accent', 'civic-hearth' ),
		'on-accent'   => __( 'On accent', 'civic-hearth' ),
	);
	$colors = array();
	foreach ( civic_hearth_palette( 'dark' === get_theme_mod( 'civic_hearth_scheme', 'light' ) ) as $slug => $color ) {
		$colors[] = array(
			'slug'  => $slug,
			'name'  => $names[ $slug ],
			'color' => $color,
		);
	}
	return $theme_json->update_with(
		array(
			'version'  => 3,
			'settings' => array(
				'color'      => array( 'palette' => $colors ),
				'layout'     => array(
					'contentSize' => civic_hearth_sanitize_content_width( get_theme_mod( 'civic_hearth_content_width', 760 ) ) . 'px',
					'wideSize'    => civic_hearth_sanitize_wide_width( get_theme_mod( 'civic_hearth_wide_width', 1152 ) ) . 'px',
				),
				'typography' => array(
					'fontSizes' => array(
						array(
							'slug'  => 'small',
							'name'  => __( 'Small', 'civic-hearth' ),
							'size'  => '1rem',
							'fluid' => false,
						),
						array(
							'slug'  => 'medium',
							'name'  => __( 'Body', 'civic-hearth' ),
							'size'  => ( civic_hearth_sanitize_font_size( get_theme_mod( 'civic_hearth_font_size', 18 ) ) / 16 ) . 'rem',
							'fluid' => false,
						),
						array(
							'slug'  => 'large',
							'name'  => __( 'Lead', 'civic-hearth' ),
							'size'  => '1.3125rem',
							'fluid' => false,
						),
						array(
							'slug'  => 'x-large',
							'name'  => __( 'Section title', 'civic-hearth' ),
							'size'  => '2.25rem',
							'fluid' => array(
								'min' => '1.75rem',
								'max' => '2.25rem',
							),
						),
						array(
							'slug'  => 'xx-large',
							'name'  => __( 'Page title', 'civic-hearth' ),
							'size'  => '3rem',
							'fluid' => array(
								'min' => '2.125rem',
								'max' => '3rem',
							),
						),
						array(
							'slug'  => 'display',
							'name'  => __( 'Display', 'civic-hearth' ),
							'size'  => '3.5rem',
							'fluid' => array(
								'min' => '2.375rem',
								'max' => '3.5rem',
							),
						),
					),
				),
			),
		)
	);
}
add_filter( 'wp_theme_json_data_theme', 'civic_hearth_theme_json' );

/** Generate only fixed palette declarations, never arbitrary CSS input. */
function civic_hearth_design_css() {
	$scheme = civic_hearth_sanitize_scheme( get_theme_mod( 'civic_hearth_scheme', 'light' ) );
	$css    = ':root,.editor-styles-wrapper{color-scheme:' . ( 'dark' === $scheme ? 'dark' : 'light' ) . ';}';
	if ( 'auto' === $scheme ) {
		// Outrank the later :root presets emitted by core on classic-theme pages.
		$css .= '@media(prefers-color-scheme:dark){html:root,html .editor-styles-wrapper{color-scheme:dark;';
		foreach ( civic_hearth_palette( true ) as $slug => $color ) {
			$css .= '--wp--preset--color--' . $slug . ':' . $color . ';';
		}
		$css .= '}}';
	}
	return $css;
}
