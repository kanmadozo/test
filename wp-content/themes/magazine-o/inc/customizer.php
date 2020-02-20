<?php
/**
 * Magazine O Theme Customizer
 *
 * @package Magazine_O
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function magazine_o_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


	// Load Upgrade to Pro control.
	require_once trailingslashit( get_template_directory() ) . '/inc/upgrade-to-pro/control.php';

	// Register custom section types.
	$wp_customize->register_section_type( 'magazine_o_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new magazine_o_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Upgrade to Pro', 'magazine-o' ),
				'pro_text' => esc_html__( 'Buy Pro', 'magazine-o' ),
				'pro_url'  => 'https://goo.gl/skze8t',
				'priority' => 1,
			)
		)
	);

	/**
	 * Load sanitize.php
	 */
	require_once trailingslashit( get_template_directory() ) . '/ocean-themes/customizer/sanitize.php';

	/**
	 * Load options.php
	 */
	require_once trailingslashit( get_template_directory() ) . '/ocean-themes/customizer/options.php';
	

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'magazine_o_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'magazine_o_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'magazine_o_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function magazine_o_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function magazine_o_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function magazine_o_customize_preview_js() {
	wp_enqueue_script( 'magazine-o-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'magazine_o_customize_preview_js' );

function magazine_o_customizer_control_scripts() {

	wp_enqueue_script( 'magazine-o-controls', get_template_directory_uri() . '/inc/upgrade-to-pro/customize-controls.js', array('customize-controls'), '20151215', true );
	wp_enqueue_style( 'magazine-o-customizer', get_template_directory_uri() . '/inc/upgrade-to-pro/customize-controls.css' );

}

add_action( 'customize_controls_enqueue_scripts', 'magazine_o_customizer_control_scripts', 0 );
