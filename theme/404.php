<?php
/**
 * A useful missing-page response.
 *
 * @package Civic_Hearth
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>
<main id="main-content" class="ch-main" tabindex="-1">
	<div class="ch-content">
		<header class="ch-page-header"><p class="ch-kicker"><?php esc_html_e( 'Page not found', 'civic-hearth' ); ?></p><h1><?php esc_html_e( 'Let us help you find your way.', 'civic-hearth' ); ?></h1></header>
		<p><?php esc_html_e( 'This page may have moved, or the address may have been typed incorrectly. Search the website or return to the homepage.', 'civic-hearth' ); ?></p>
		<?php get_search_form(); ?>
		<p style="margin-block-start:24px"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Go to the homepage', 'civic-hearth' ); ?></a></p>
	</div>
</main>
<?php get_footer(); ?>
