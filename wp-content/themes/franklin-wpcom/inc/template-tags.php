<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Franklin
 */

if ( ! function_exists( 'franklin_comment_nav' ) ) :
/**
 * Display navigation to next/previous comments when applicable.
 */
function franklin_comment_nav() {
	// Are there any comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
	<nav class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'franklin' ); ?></h2>
		<div class="nav-links">
			<?php
				$prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'franklin' ) );
				$next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'franklin' ) );

				if ( $prev_link ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;

				if ( $next_link ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation --><?php
	endif;
}
endif;

if ( ! function_exists( 'franklin_link_pages' ) ) :
/**
 * Displays the page links of the post
 */
function franklin_link_pages() {
	if ( ! post_password_required() ) {
		wp_link_pages( array(
			'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'franklin' ),
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'after'       => '</div>',
		) );
	}
}
endif;

if ( ! function_exists( 'franklin_post_thumbnail' ) ) :
/**
 * Displays the featured image of the post
 */
function franklin_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) {
		the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) );
	} else {
		printf( '<div class="post-image-link"><a rel="bookmark" href="%s">', esc_url( get_permalink() ) );
		the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) );
		echo '</a></div><!-- .post-image-link -->';
	}
}
endif;

if ( ! function_exists( 'franklin_sticky_post_label' ) ) :
/**
 * Displays the sticky post label
 */
function franklin_sticky_post_label() {
	if ( is_sticky() && ! is_paged() && ! post_password_required() ) {
		if ( has_post_thumbnail() ) {
			printf( '<span class="sticky-post-label on-image">%s</span>', esc_html__( 'Featured Post', 'franklin' ) );
		} else {
			printf( '<span class="sticky-post-label">%s</span>', esc_html__( 'Featured Post', 'franklin' ) );
		}
	}
}
endif;

if ( ! function_exists( 'franklin_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function franklin_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	echo '<ul class="post-meta">';

	printf(
		'<li class="author vcard"><a class="url fn n" href="%s">%s</a></li>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_html( get_the_author() )
	);

	if ( is_single() ) {
		printf( '<li class="posted-on">%s</li>', $time_string );
	} else {
		printf( '<li class="posted-on"><a href="%s" rel="bookmark">%s</a></li>', esc_url( get_permalink() ), $time_string );
	}

	echo '</ul><!-- .post-metadata -->';
}
endif;

if ( ! function_exists( 'franklin_post_meta' ) ) :
/**
 * Prints the HTML for the post's tags, and format link
 */
function franklin_post_meta() { ?>
	<div class="meta-wrapper">
		<?php the_tags( '<ul class="post-tags"><li>', '</li><li>', '</li></ul><!-- .post-tags -->' ); ?>
		<?php
			if ( '' != get_post_format() ) :
				printf(
					'<span class="post-format-link genericon-aside"><a href="%s">%s</a></span>',
					esc_url( get_post_format_link( get_post_format() ) ),
					get_post_format_string( get_post_format() )
				);
			endif;
			if ( is_home() || is_archive() || is_search() ) :
				edit_post_link( esc_html__( 'Edit', 'franklin' ), '<span class="edit-link">', '</span>' );
			endif;
		?>
	</div><!-- .meta-wrapper -->
	<?php
}
endif;

if ( ! function_exists( 'franklin_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and a 'Continue reading' link.
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function franklin_excerpt_more( $more ) {
	$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf(
			wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'franklin' ), array( 'span' => array( 'class' => array() ) ) ),
			'<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>'
		)
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'franklin_excerpt_more' );
endif;

if ( ! function_exists( 'franklin_categories' ) ) :
/**
 * Displays the categories for the post.
 */
function franklin_categories() {
	echo '<ul class="post-categories"><li>';
	the_category( '</li><li>' );
	echo '</ul><!-- .post-categories -->';
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function franklin_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'franklin_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			'number'     => 2, // We only need to know if there is more than one category.
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'franklin_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so franklin_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so franklin_categorized_blog should return false.
		return false;
	}
}