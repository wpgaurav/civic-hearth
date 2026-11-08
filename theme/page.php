<?php
/**
 * Standard pages.
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
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="ch-page-header ch-content"><?php the_title( '<h1>', '</h1>' ); ?></header>
			<div class="entry-content ch-content">
				<?php the_content(); ?>
				<?php
				wp_link_pages(
					array(
						'before' => '<nav class="page-links" aria-label="' . esc_attr__( 'Page sections', 'civic-hearth' ) . '">',
						'after'  => '</nav>',
					)
				);
				?>
			</div>
			<?php
			if ( get_edit_post_link() ) :
				?>
				<div class="ch-content ch-entry-footer"><?php edit_post_link( __( 'Edit this page', 'civic-hearth' ) ); ?></div><?php endif; ?>
		</article>
		<?php
		if ( comments_open() || get_comments_number() ) :
			?>
			<div class="ch-content"><?php comments_template(); ?></div><?php endif; ?>
	<?php endwhile; ?>
</main>
<?php get_footer(); ?>
