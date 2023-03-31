<?php
/**
 * Admin functions - Functions that add some functionality to WordPress admin panel
 *
 * @package Kortez
 * @since 1.0.0
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 * @since Kortez 1.0.0
 */
function kortez_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'kortez' ),
		'id'            => 'right-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'kortez' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title-wrap"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Offcanvas Menu Sidebar', 'kortez' ),
		'id'            => 'menu-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'kortez' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'kortez' ),
		'id'            => 'left-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'kortez' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title-wrap"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'WooCommerce Right Sidebar', 'kortez' ),
		'id'            => 'woocommerce-right-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'kortez' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title-wrap"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'WooCommerce Left Sidebar', 'kortez' ),
		'id'            => 'woocommerce-left-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'kortez' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title-wrap"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );

	for( $i = 1; $i <= 4; $i++ ){
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Sidebar', 'kortez' ) . ' ' . $i,
			'id'            => 'footer-sidebar-' . $i,
			'description'   => esc_html__( 'Add widgets here.', 'kortez' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="footer-item">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
	}
}
add_action( 'widgets_init', 'kortez_widgets_init' );

/**
 * Disable Getting Start After activating Elementor.
 */
add_action( 'admin_init', function() {
	if ( did_action( 'elementor/loaded' ) ) {
		remove_action( 'admin_init', [ \Elementor\Plugin::$instance->admin, 'maybe_redirect_to_getting_started' ] );
	}
}, 1 );