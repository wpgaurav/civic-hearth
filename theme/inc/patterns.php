<?php
/**
 * Native patterns and block styles; no page builder required.
 *
 * @package Civic_Hearth
 */

defined( 'ABSPATH' ) || exit;

/** Register the theme category and optional styles. */
function civic_hearth_register_patterns() {
	register_block_pattern_category( 'civic-hearth', array( 'label' => __( 'Civic Hearth', 'civic-hearth' ) ) );
	register_block_style(
		'core/group',
		array(
			'name'  => 'civic-card',
			'label' => __( 'Civic card', 'civic-hearth' ),
		)
	);
	register_block_style(
		'core/group',
		array(
			'name'  => 'civic-notice',
			'label' => __( 'Information notice', 'civic-hearth' ),
		)
	);
}
add_action( 'init', 'civic_hearth_register_patterns' );
