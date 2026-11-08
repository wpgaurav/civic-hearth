<?php
/**
 * Site footer. No required author credit or external requests.
 *
 * @package Civic_Hearth
 */

defined( 'ABSPATH' ) || exit;
?>
<footer class="ch-footer">
	<div class="ch-container">
		<div class="ch-footer-grid">
			<div>
				<h2 class="ch-footer-title"><?php bloginfo( 'name' ); ?></h2>
				<?php
				if ( get_bloginfo( 'description' ) ) :
					?>
					<p><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p><?php endif; ?>
			</div>
			<?php for ( $civic_hearth_column = 1; $civic_hearth_column <= 3; $civic_hearth_column++ ) : ?>
				<?php
				if ( is_active_sidebar( 'footer-' . $civic_hearth_column ) ) :
					?>
					<div><?php dynamic_sidebar( 'footer-' . $civic_hearth_column ); ?></div><?php endif; ?>
			<?php endfor; ?>
		</div>
		<div class="ch-footer-bottom">
			<p>
			<?php
				$civic_hearth_footer = get_theme_mod( 'civic_hearth_footer_text', '' );
			if ( $civic_hearth_footer ) {
				echo esc_html( $civic_hearth_footer );
			} else {
				printf(
					/* translators: 1: Current year, 2: Site name. */
					esc_html__( 'Copyright %1$s %2$s.', 'civic-hearth' ),
					esc_html( wp_date( 'Y' ) ),
					esc_html( get_bloginfo( 'name' ) )
				);
			}
			?>
			</p>
			<?php
			if ( has_nav_menu( 'footer' ) ) :
				?>
				<nav aria-label="<?php esc_attr_e( 'Footer navigation', 'civic-hearth' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'container'      => false,
						'menu_class'     => 'ch-footer-menu',
						'depth'          => 1,
						'fallback_cb'    => false,
					)
				);
				?>
				</nav><?php endif; ?>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
