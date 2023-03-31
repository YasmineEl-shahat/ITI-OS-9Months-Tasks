<?php
/**
 * Kortez Theme Customizer
 *
 * @package Kortez
 */

/**
* Add postMessage support for site title and description for the Theme Customizer.
* 
* @since Kortez 1.0.0
*/
function kortez_modify_default_settings( $wp_customize ){

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

}
add_action( 'customize_register', 'kortez_modify_default_settings' );

/**
 * Adds pro theme upgrade notice for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function kortez_customize_register( $wp_customize ) {

	// Load custom control functions.
	require get_template_directory() . '/inc/customizer/controls.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

	// Register custom section types.
	$wp_customize->register_section_type( 'Kortez_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new Kortez_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Kortez Pro', 'kortez' ),
				'pro_text' => esc_html__( 'Upgrade To Pro', 'kortez' ),
				'pro_url'  => 'https://kortezthemes.com/kortez-pro',
				'priority'  => 1,
			)
		)
	);
}
add_action( 'customize_register', 'kortez_customize_register' );

/**
 * Restructures WooCommerce product catalog customizer options.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function kortez_woocommerce_customizer_structure( $wp_customize ) {

	if ( class_exists( 'WooCommerce') ) {
		$wp_customize->get_control( 'woocommerce_shop_page_display' )->priority  = '600';
		$wp_customize->get_control( 'woocommerce_category_archive_display' )->priority  = '610';
		$wp_customize->get_control( 'woocommerce_default_catalog_orderby' )->priority  = '620';
	}
}
add_action( 'customize_register', 'kortez_woocommerce_customizer_structure', 15 );

/**
 * Add getting started section for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function kortez_customize_getting_started_register( $wp_customize ) {

	include_once ABSPATH . 'wp-admin/includes/plugin.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
	// Load custom control functions.
	require get_template_directory() . '/inc/customizer/getting-started-section.php'; // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

	// Register custom section types.
	if ( !kortez_are_plugin_active() ){
		$wp_customize->register_section_type( 'Kortez_Customize_Getting_Started' );
		$theme_name = esc_html( wp_get_theme()->get( 'Name' ) );
		$wp_customize->add_section(
			new Kortez_Customize_Getting_Started(
				$wp_customize,
				'theme_getting_started',
				array(
					'title'    => esc_html__( 'Getting started will install and activate the recommended plugins.', 'kortez' ),
					/* translators: %s - Theme name*/
					'gs_text' => sprintf( esc_html__( 'Get Started with %s','kortez' ), $theme_name ),
					'gs_url'  => '#',
					'priority'  => 2,
				)
			)
		);	
	}
}
add_action( 'customize_register', 'kortez_customize_getting_started_register' );

/**
 * Enqueue style for custom customize control.
 */
add_action( 'customize_controls_enqueue_scripts', 'kortez_custom_customize_enqueue' );
function kortez_custom_customize_enqueue() {
	wp_enqueue_style( 'kortez-customize-controls', get_template_directory_uri() . '/inc/customizer/customizer.css' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function kortez_customize_preview_js() {
	wp_enqueue_script( 'kortez-customizer', get_template_directory_uri() . '/inc/customizer/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'kortez_customize_preview_js' );

/**
 *  Getting started JS for Theme Customizer.
 */
function kortez_customize_getting_js() {
	wp_enqueue_script( 'kortez-customizer-getting-started', get_template_directory_uri() . '/inc/getting-started/getting-started.js', array( 'customize-controls', 'jquery' ), true );
}
add_action( 'customize_controls_enqueue_scripts', 'kortez_customize_getting_js' );

/**
 * Kirki Customizer
 *
 * @return void
 */
add_action( 'init' , 'kortez_kirki_fields' );

function kortez_kirki_fields(){

	/**
	* If kirki is not installed do not run the kirki fields
	*/

	if ( !class_exists( 'Kirki' ) ) {
		return;
	}

	Kirki::add_config( 'kortez', array(
		'capability'  => 'edit_theme_options',
		'option_type' => 'theme_mod',
	) );

	// @codingStandardsIgnoreStart WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
	require get_template_directory() . '/inc/customizer/options/blog.php';
	require get_template_directory() . '/inc/customizer/options/blog-single.php';
	require get_template_directory() . '/inc/customizer/options/general.php';
	require get_template_directory() . '/inc/customizer/options/header.php';
	require get_template_directory() . '/inc/customizer/options/footer.php';
	require get_template_directory() . '/inc/customizer/options/page.php';
	require get_template_directory() . '/inc/customizer/options/socials.php';
	require get_template_directory() . '/inc/customizer/options/woocommerce.php';
	// @codingStandardsIgnoreEnd WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
	
}