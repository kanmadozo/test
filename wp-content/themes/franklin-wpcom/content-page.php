<?php
/**
 * The template used for displaying page content in page.php
 *
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
	</div><!-- .entry-content -->
</article><!-- #post-## -->