<?php
/**
 * Template Name: Civic homepage
 * Template Post Type: page
 *
 * Full-width canvas. Insert the Civic homepage pattern to begin.
 * Content remains in the page and is never replaced by hardcoded demo data.
 *
 * @package Civic_Hearth
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>
<main id="main-content" class="ch-main ch-homepage" tabindex="-1">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php
			if ( post_password_required() ) :
				?>
				<header class="ch-page-header ch-content"><?php the_title( '<h1>', '</h1>' ); ?></header><?php endif; ?>
			<div class="entry-content"><?php the_content(); ?><?php wp_link_pages(); ?></div>
		</article>
	<?php endwhile; ?>
</main>
<?php get_footer(); ?>
