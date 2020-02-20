<?php
/**
 * @package Franklin
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php franklin_post_thumbnail(); ?>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php franklin_link_pages(); ?>
		<?php edit_post_link( esc_html__( 'Edit', 'franklin' ), '<span class="edit-link">', '</span>' ); ?>
		<?php franklin_categories(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php franklin_posted_on(); ?>
		<?php franklin_post_meta(); ?>
		<?php the_post_navigation(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->