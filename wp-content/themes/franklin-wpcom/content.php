<?php
/**
 * @package Franklin
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php franklin_post_thumbnail(); ?>
	<?php franklin_sticky_post_label(); ?>

	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'franklin' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

		<?php franklin_link_pages(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php franklin_posted_on(); ?>
		<?php franklin_post_meta(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->