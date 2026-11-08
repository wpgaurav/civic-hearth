<?php
/**
 * Escaped presentation helpers.
 *
 * @package Civic_Hearth
 */

defined( 'ABSPATH' ) || exit;

/**
 * Output a decorative, original line icon.
 *
 * @param string $name A fixed icon key.
 */
function civic_hearth_icon( $name ) {
	$paths = array(
		'search'  => '<circle cx="10.5" cy="10.5" r="6.5"/><path d="m16 16 5 5"/>',
		'menu'    => '<path d="M3 6h18M3 12h18M3 18h18"/>',
		'chevron' => '<path d="m6 9 6 6 6-6"/>',
		'back'    => '<path d="m10 5-7 7 7 7M3 12h18"/>',
	);
	if ( ! isset( $paths[ $name ] ) ) {
		return;
	}
	// The SVG and paths are fixed theme literals, never user content.
	echo '<svg class="ch-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">';
	echo $paths[ $name ]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Fixed SVG literals above.
	echo '</svg>';
}

/** Show date and author when enabled. */
function civic_hearth_posted_on() {
	if ( ! get_theme_mod( 'civic_hearth_show_meta', true ) ) {
		return;
	}
	?>
	<div class="ch-meta">
		<time class="entry-date published" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
		<?php if ( get_the_author() ) : ?>
		<span class="byline">
			<?php
			printf(
				/* translators: %s: The linked post author name. */
				esc_html__( 'By %s', 'civic-hearth' ),
				'<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
			);
			?>
		</span>
		<?php endif; ?>
	</div>
	<?php
}

/** Whether optional post widgets have a place in the current layout. */
function civic_hearth_has_sidebar() {
	return 'right' === get_theme_mod( 'civic_hearth_sidebar', 'none' ) && is_active_sidebar( 'sidebar-1' ) && ! is_page();
}

/** No-JavaScript fallback navigation uses real, published pages. */
function civic_hearth_page_menu() {
	echo '<ul id="primary-menu" class="ch-menu">';
	wp_list_pages(
		array(
			'title_li' => '',
			'depth'    => 3,
		)
	);
	echo '</ul>';
}
