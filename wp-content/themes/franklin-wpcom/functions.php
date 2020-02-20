<?php
/**
 * franklin functions and definitions
 *
 * @package Franklin
 */

if ( ! function_exists( 'franklin_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function franklin_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on franklin, use a find and replace
	 * to change 'franklin' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'franklin', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * Defining full width size as default, to simplify things for end users.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1108, 737, true );

	// This theme uses wp_nav_menu() in three locations.
	register_nav_menus( array(
		'primary'   => esc_html__( 'Primary Menu',   'franklin' ),
		'secondary' => esc_html__( 'Secondary Menu', 'franklin' ),
		'footer'    => esc_html__( 'Footer Menu',    'franklin' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'franklin_custom_background_args', array(
		'default-color' => 'f9f9f9',
		'default-image' => '',
	) ) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'editor-style.css', 'genericons/genericons.css', franklin_fonts_url() ) );
}
endif; // franklin_setup
add_action( 'after_setup_theme', 'franklin_setup' );

/**
 * Register widget areas.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function franklin_widgets_init() {
	register_sidebar(array(
		'name'          => esc_html__( 'Primary Sidebar', 'franklin' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Widgets in this area will appear in the right sidebar on all pages and posts.', 'franklin' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar(array(
		'name'          => esc_html__( 'Footer Left', 'franklin' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Widgets in this area will appear in the left column of the footer.', 'franklin' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar(array(
		'name'          => esc_html__( 'Footer Middle', 'franklin' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Widgets in this area will appear in the middle column of the footer.', 'franklin' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar(array(
		'name'          => esc_html__( 'Footer Right', 'franklin' ),
		'id'            => 'sidebar-4',
		'description'   => esc_html__( 'Widgets in this area will appear in the right column of the footer.', 'franklin' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'franklin_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function franklin_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'franklin-fonts', franklin_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.3' );

	wp_enqueue_style( 'franklin-style', get_stylesheet_uri() );

	wp_enqueue_script( 'franklin-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150503', true );

	wp_enqueue_script( 'franklin-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'franklin-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'franklin-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20150302' );
	}

}
add_action( 'wp_enqueue_scripts', 'franklin_scripts' );

if ( ! function_exists( 'franklin_fonts_url' ) ) :
/**
 * Register Google Fonts
 */
function franklin_fonts_url() {
	$fonts_url = '';

	/*
	* Translators: If there are characters in your language that are not
	* supported by Open Sans, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$open_sans = esc_html_x( 'on', 'Open Sans font: on or off', 'franklin' );

	/*
	* Translators: If there are characters in your language that are not
	* supported by Source Sans Pro, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$source_sans = esc_html_x( 'on', 'Source Sans Pro font: on or off', 'franklin' );

	if ( 'off' !== $open_sans || 'off' !== $source_sans ) {
		$font_families = array();

		if ( 'off' !== $open_sans ) {
			$font_families[] = 'Open Sans:400,600';
		}

		if ( 'off' !== $source_sans ) {
			$font_families[] = 'Source Sans Pro:400,700,900';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' )
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function franklin_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'franklin_content_width', 1108 );
}
add_action( 'after_setup_theme', 'franklin_content_width', 0 );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

// updater for WordPress.com themes
if ( is_admin() )
	include dirname( __FILE__ ) . '/inc/updater.php';
