<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Franklin
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php franklin_post_thumbnail(); ?>
	<?php franklin_sticky_post_label(); ?>

	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php franklin_posted_on(); ?>
		<?php franklin_post_meta(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->