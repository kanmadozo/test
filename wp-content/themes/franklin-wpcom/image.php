<?php
/**
 * The template for displaying all image attachments
 *
 * @package Franklin
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->

				<div class="entry-content">

					<div class="entry-attachment">
						<?php
							/**
							 * Filter the default Franklin image attachment size.
							 *
							 * @param string $image_size Image size. Default 'large'.
							 */
							$image_size = apply_filters( 'franklin_attachment_size', 'large' );

							echo wp_get_attachment_image( get_the_ID(), $image_size );
						?>

						<?php if ( has_excerpt() ) : ?>
							<div class="entry-caption">
								<?php the_excerpt(); ?>
							</div><!-- .entry-caption -->
						<?php endif; ?>

					</div><!-- .entry-attachment -->

					<?php
						the_content();
						franklin_link_pages();
						edit_post_link( esc_html__( 'Edit', 'franklin' ), '<span class="edit-link">', '</span>' );
					?>
				</div><!-- .entry-content -->

				<footer class="entry-footer">
					<?php franklin_posted_on(); ?>
					<nav id="image-navigation" class="navigation post-navigation image-navigation">
						<div class="nav-links">
							<div class="nav-previous"><?php previous_image_link( false, esc_html__( 'Previous Image', 'franklin' ) ); ?></div>
							<div class="nav-next"><?php next_image_link( false, esc_html__( 'Next Image', 'franklin' ) ); ?></div>
						</div><!-- .nav-links -->
					</nav><!-- .image-navigation -->
				</footer><!-- .entry-footer -->

			</article><!-- #post-## -->

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>