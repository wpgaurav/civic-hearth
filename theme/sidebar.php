<?php
/**
 * Optional sidebar.
 *
 * @package Civic_Hearth
 */

defined( 'ABSPATH' ) || exit;
if ( ! civic_hearth_has_sidebar() ) {
	return;
}
?>
<aside class="ch-sidebar" aria-label="<?php esc_attr_e( 'Related information', 'civic-hearth' ); ?>"><?php dynamic_sidebar( 'sidebar-1' ); ?></aside>
