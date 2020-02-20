<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Franklin
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function franklin_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'footer_widgets' => array( 'sidebar-2', 'sidebar-3', 'sidebar-4' ),
		'footer'         => 'page',
		'container'      => 'main',
	) );
}
add_action( 'after_setup_theme', 'franklin_jetpack_setup' );

/**
 * Add support for the Site Logo
 * See: http://jetpack.me/support/site-logo/
 */
function franklin_site_logo_init() {
	add_image_size( 'franklin-logo', 270, 270 );
	add_theme_support( 'site-logo', array( 'size' => 'franklin-logo' ) );
}
add_action( 'after_setup_theme', 'franklin_site_logo_init' );

/**
 * Return early if Site Logo is not available.
 */
function franklin_the_site_logo() {
	if ( function_exists( 'jetpack_the_site_logo' ) ) {
		jetpack_the_site_logo();
	} else {
		return;
	}
}

/**
 * Return early if Breadcrumbs are not available.
 */
function franklin_breadcrumbs() {
	if ( function_exists( 'jetpack_breadcrumbs' ) ) {
		jetpack_breadcrumbs();
	} else {
		return;
	}
}

/**
 * Add theme support for Responsive Videos
 * @see http://jetpack.me/support/responsive-videos/
 */
function franklin_responsive_videos_init() {
	add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'franklin_responsive_videos_init' );