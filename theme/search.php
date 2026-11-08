<?php
/**
 * Native WordPress search results.
 *
 * @package Civic_Hearth
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>
<main id="main-content" class="ch-main" tabindex="-1">
	<header class="ch-page-header ch-container">
		<h1>
		<?php
		if ( get_search_query() ) {
			/* translators: %s: The visitor's search term. */
			printf( esc_html__( 'Search results for: %s', 'civic-hearth' ), esc_html( get_search_query() ) );
		} else {
			esc_html_e( 'Search this website', 'civic-hearth' );
		}
		?>
		</h1>
		<div style="max-width:760px"><?php get_search_form(); ?></div>
	</header>
	<div class="ch-container">
		<?php if ( have_posts() ) : ?>
			<div class="ch-post-grid">
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', 'card' );
endwhile;
			?>
			</div>
			<?php
			the_posts_pagination(
				array(
					'prev_text' => __( 'Previous', 'civic-hearth' ),
					'next_text' => __( 'Next', 'civic-hearth' ),
				)
			);
			?>
		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; ?>
	</div>
</main>
<?php get_footer(); ?>
