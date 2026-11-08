<?php
/**
 * News and archive fallback, using the unmodified main query.
 *
 * @package Civic_Hearth
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>
<main id="main-content" class="ch-main" tabindex="-1">
	<header class="ch-page-header ch-container">
		<?php if ( is_home() && ! is_front_page() ) : ?>
			<h1><?php echo esc_html( get_the_title( get_option( 'page_for_posts' ) ) ); ?></h1>
		<?php elseif ( is_archive() ) : ?>
			<?php the_archive_title( '<h1>', '</h1>' ); ?>
			<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
		<?php else : ?>
			<h1><?php esc_html_e( 'News and updates', 'civic-hearth' ); ?></h1>
		<?php endif; ?>
	</header>
	<div class="ch-container<?php echo civic_hearth_has_sidebar() ? ' ch-with-sidebar' : ''; ?>">
		<div>
			<?php if ( have_posts() ) : ?>
				<div class="ch-post-grid">
					<?php
					while ( have_posts() ) :
						the_post();
						?>
						<?php get_template_part( 'template-parts/content', 'card' ); ?>
					<?php endwhile; ?>
				</div>
				<?php
				the_posts_pagination(
					array(
						'mid_size'  => 1,
						'prev_text' => __( 'Previous', 'civic-hearth' ),
						'next_text' => __( 'Next', 'civic-hearth' ),
					)
				);
				?>
			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			<?php endif; ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</main>
<?php get_footer(); ?>
