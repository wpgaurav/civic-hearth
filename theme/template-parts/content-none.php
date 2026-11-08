<?php
/**
 * Empty states with a useful next action.
 *
 * @package Civic_Hearth
 */

defined( 'ABSPATH' ) || exit;
?>
<section>
	<h2><?php esc_html_e( 'Nothing found yet', 'civic-hearth' ); ?></h2>
	<?php if ( is_search() ) : ?>
		<p><?php esc_html_e( 'Try fewer words, a service name, or a different spelling.', 'civic-hearth' ); ?></p>
	<?php else : ?>
		<p><?php esc_html_e( 'There are no published posts to display here yet.', 'civic-hearth' ); ?></p>
		<?php get_search_form(); ?>
	<?php endif; ?>
</section>
