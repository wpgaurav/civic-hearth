<?php
/**
 * Single posts, with optional widget sidebar.
 *
 * @package Civic_Hearth
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>
<main id="main-content" class="ch-main" tabindex="-1">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<div class="ch-container<?php echo civic_hearth_has_sidebar() ? ' ch-with-sidebar' : ''; ?>">
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'ch-content' ); ?>>
				<header class="ch-page-header">
					<?php
					if ( get_option( 'page_for_posts' ) ) :
						?>
						<a class="ch-back-link" href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>"><?php civic_hearth_icon( 'back' ); ?><?php esc_html_e( 'All news', 'civic-hearth' ); ?></a><?php endif; ?>
					<?php the_title( '<h1>', '</h1>' ); ?>
					<?php civic_hearth_posted_on(); ?>
				</header>
				<?php
				if ( has_post_thumbnail() ) :
					?>
					<figure class="ch-featured-image"><?php the_post_thumbnail( 'large' ); ?></figure><?php endif; ?>
				<div class="entry-content">
					<?php the_content(); ?>
					<?php
					wp_link_pages(
						array(
							'before' => '<nav class="page-links" aria-label="' . esc_attr__( 'Post sections', 'civic-hearth' ) . '">',
							'after'  => '</nav>',
						)
					);
					?>
				</div>
				<footer class="ch-entry-footer">
					<?php
					if ( has_category() ) :
						?>
						<span><?php esc_html_e( 'Categories: ', 'civic-hearth' ); ?><?php the_category( ', ' ); ?></span><?php endif; ?>
					<?php the_tags( '<span>' . esc_html__( 'Topics: ', 'civic-hearth' ), ', ', '</span>' ); ?>
					<?php edit_post_link( __( 'Edit this post', 'civic-hearth' ) ); ?>
				</footer>
				<?php
				the_post_navigation(
					array(
						'prev_text' => '<span class="ch-nav-label">' . esc_html__( 'Previous post', 'civic-hearth' ) . '</span>%title',
						'next_text' => '<span class="ch-nav-label">' . esc_html__( 'Next post', 'civic-hearth' ) . '</span>%title',
					)
				);
				?>
				<?php
				if ( comments_open() || get_comments_number() ) {
					comments_template(); }
				?>
			</article>
			<?php get_sidebar(); ?>
		</div>
	<?php endwhile; ?>
</main>
<?php get_footer(); ?>
