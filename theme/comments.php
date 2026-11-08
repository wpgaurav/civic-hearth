<?php
/**
 * Native threaded comments and moderation states.
 *
 * @package Civic_Hearth
 */

defined( 'ABSPATH' ) || exit;
if ( post_password_required() ) {
	return;
}
?>
<section id="comments" class="comments-area" aria-label="<?php esc_attr_e( 'Comments', 'civic-hearth' ); ?>">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
		<?php
			$civic_hearth_comment_count = get_comments_number();
			printf(
				/* translators: %s: The number of comments. */
				esc_html( _n( '%s comment', '%s comments', $civic_hearth_comment_count, 'civic-hearth' ) ),
				esc_html( number_format_i18n( $civic_hearth_comment_count ) )
			);
		?>
		</h2>
		<ol class="comment-list">
		<?php
		wp_list_comments(
			array(
				'style'       => 'ol',
				'short_ping'  => true,
				'avatar_size' => 48,
			)
		);
		?>
									</ol>
		<?php the_comments_navigation(); ?>
		<?php
		if ( ! comments_open() ) :
			?>
			<p><?php esc_html_e( 'Comments are closed.', 'civic-hearth' ); ?></p><?php endif; ?>
	<?php endif; ?>
	<?php comment_form(); ?>
</section>
