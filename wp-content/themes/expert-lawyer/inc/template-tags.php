<?php
/**
 * Custom template tags for this theme
 * @package WordPress
 * @subpackage expert-lawyer
 * @since 1.0
 */

/**
 * Prints HTML with meta information for the current post-date/time and author.
 */

if ( ! function_exists( 'expert_lawyer_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function expert_lawyer_entry_footer() {

	$separate_meta = __( ', ', 'expert-lawyer' );
	$categories_list = get_the_category_list( $separate_meta );
	$tags_list = get_the_tag_list( '', $separate_meta );
	if ( ( ( expert_lawyer_categorized_blog() && $categories_list ) || $tags_list ) || get_edit_post_link() ) {

		echo '<footer class="entry-footer">';			

			expert_lawyer_edit_link();

		echo '</footer> <!-- .entry-footer -->';
	}
}
endif;


if ( ! function_exists( 'expert_lawyer_edit_link' ) ) :

function expert_lawyer_edit_link() {
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'expert-lawyer' ),
			get_the_title()
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

function expert_lawyer_categorized_blog() {
	$category_count = get_transient( 'expert_lawyer_categories' );

	if ( false === $category_count ) {
		// Create an array of all the categories that are attached to posts.
		$categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$category_count = count( $categories );

		set_transient( 'expert_lawyer_categories', $category_count );
	}

	// Allow viewing case of 0 or 1 categories in post preview.
	if ( is_preview() ) {
		return true;
	}

	return $category_count > 1;
}

if ( ! function_exists( 'expert_lawyer_the_custom_logo' ) ) :

function expert_lawyer_the_custom_logo() {
	the_custom_logo();
}
endif;

function expert_lawyer_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'expert_lawyer_categories' );
}
add_action( 'edit_category', 'expert_lawyer_category_transient_flusher' );
add_action( 'save_post',     'expert_lawyer_category_transient_flusher' );