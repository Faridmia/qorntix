<?php
/**
 * The footer for our theme.
 *
 * Closes the #content div and all content after.
 *
 * @package Qorntix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
	<footer id="colophon" class="site-footer">
		<div class="container">
			<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
				<div class="footer-widgets">
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div><!-- .footer-widgets -->
			<?php endif; ?>

			<?php
			if ( has_nav_menu( 'footer' ) ) :
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'menu_id'        => 'footer-menu',
						'container'      => 'nav',
						'container_class' => 'footer-navigation',
						'depth'          => 1,
						'fallback_cb'    => false,
					)
				);
			endif;
			?>

			<div class="site-info">
				<?php qorntix_footer_text(); ?>
			</div><!-- .site-info -->
		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
