<?php
/**
 * A real post or page from the current query.
 *
 * @package Civic_Hearth
 */

defined( 'ABSPATH' ) || exit;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'ch-post-card' ); ?>>
	<?php
	if ( has_post_thumbnail() && ! post_password_required() ) :
		?>
		<a class="ch-post-image" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true"><?php the_post_thumbnail( 'medium_large', array( 'alt' => '' ) ); ?></a><?php endif; ?>
	<?php
	if ( 'post' === get_post_type() ) {
		civic_hearth_posted_on(); }
	?>
	<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_title() ? get_the_title() : __( 'Untitled', 'civic-hearth' ) ); ?></a></h2>
	<?php
	if ( get_theme_mod( 'civic_hearth_show_excerpt', true ) ) :
		?>
		<div class="entry-summary"><?php the_excerpt(); ?></div><?php endif; ?>
</article>
