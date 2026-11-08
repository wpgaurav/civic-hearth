<?php
/**
 * Template Name: Full width
 * Template Post Type: page
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
			<header class="ch-page-header ch-container"><?php the_title( '<h1>', '</h1>' ); ?></header>
			<div class="entry-content ch-content ch-full-width"><?php the_content(); ?><?php wp_link_pages(); ?></div>
		</article>
		<?php
		if ( comments_open() || get_comments_number() ) :
			?>
			<div class="ch-content"><?php comments_template(); ?></div><?php endif; ?>
	<?php endwhile; ?>
</main>
<?php get_footer(); ?>
