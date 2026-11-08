<?php
/**
 * Reusable search with a unique, visible field label.
 *
 * @package Civic_Hearth
 */

defined( 'ABSPATH' ) || exit;
$civic_hearth_search_id = wp_unique_id( 'ch-search-' );
?>
<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr( $civic_hearth_search_id ); ?>"><?php esc_html_e( 'Search this website', 'civic-hearth' ); ?></label>
	<div class="ch-search-form">
		<input id="<?php echo esc_attr( $civic_hearth_search_id ); ?>" type="search" name="s" value="<?php echo esc_attr( get_search_query() ); ?>">
		<button type="submit"><?php civic_hearth_icon( 'search' ); ?><?php esc_html_e( 'Search', 'civic-hearth' ); ?></button>
	</div>
</form>
