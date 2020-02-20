<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Franklin
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php
			// Get the active sidebars to render
			$sidebars = array_filter( array( 'sidebar-2', 'sidebar-3', 'sidebar-4' ), 'is_active_sidebar' );
			$columns = count( $sidebars );

			if ( $columns > 0 ) :
		?>
		<div id="footer-widgets">
			<div class="inner">

				<?php foreach ( $sidebars as $sidebar ) : ?>
					<div class="widget-area split-<?php echo $columns; ?>" role="complementary">

						<?php dynamic_sidebar( $sidebar ); ?>

					</div><!-- .widget-area -->
				<?php endforeach; ?>

			</div><!-- .inner -->
		</div><!-- #footer-widgets -->
		<?php endif; ?>

		<div class="site-footer-bottom">
			<div class="inner">

				<?php if ( has_nav_menu( 'footer' ) ) : ?>
					<nav id="footer-navigation" role="navigation">
						<?php
							// Footer navigation menu.
							wp_nav_menu( array(
								'theme_location' => 'footer',
								'menu_id'        => 'footer-menu',
								'container'      => false,
								'depth'          => 1,
							) );
						?>
					</nav><!-- #footer-navigation -->
				<?php endif; ?>

				<div class="site-info">
					<a href="<?php echo esc_url( esc_html__( 'http://wordpress.org/', 'franklin' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'franklin' ), 'WordPress' ); ?></a>
					<span class="sep"> &nbsp;|&nbsp; </span>
					<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'franklin' ), 'Franklin', '<a href="http://www.wpmultiverse.com/">Michael Burrows</a>' ); ?>
				</div><!-- .site-info -->

			</div><!-- .inner -->
		</div><!-- .site-footer-bottom -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>