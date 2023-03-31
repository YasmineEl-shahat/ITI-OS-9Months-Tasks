<?php
/**
 * Enqueue scripts and styles.
 * 
 * @since Kortez 1.0.0
 */

if( !function_exists( 'kortez_scripts' ) ){
	function kortez_scripts() {

		require_once get_theme_file_path ( 'inc/wptt-webfont-loader.php');

		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css' );
		if ( is_rtl() ){
			wp_enqueue_style( 'bootstrap-rtl', get_template_directory_uri() . '/assets/bootstrap/css/rtl/bootstrap.min.css' );
		}
		wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/slick/slick.css' );
		wp_enqueue_style( 'slicknav', get_template_directory_uri() . '/assets/css/slicknav.min.css' );
		wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/assets/slick/slick-theme.css' );
		wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/font-awesome/css/all.min.css' );
		wp_enqueue_style( 'kortez-blocks', get_template_directory_uri() . '/assets/css/blocks.min.css' );
		wp_enqueue_style( 'kortez-style', get_stylesheet_uri() );
		wp_enqueue_style( 'kortez-google-font', wptt_get_webfont_url( 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700,800|Poppins:300,400,400i,500,600,700,800,900&display=swap' ), false );

		$scripts = array(
			array(
				'id'     => 'bootstrap',
				'url'    => get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js',
				'footer' => true
			),
			array(
				'id'     => 'slick',
				'url'    => get_template_directory_uri() . '/assets/slick/slick.min.js',
				'footer' => true
			),
			array(
				'id'     => 'slicknav',
				'url'    => get_template_directory_uri() . '/assets/js/jquery.slicknav.min.js',
				'footer' => true
			),
			array(
				'id'     => 'kortez-skip-link-focus-fix',
				'url'    => get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js',
				'footer' => true
			),
			array(
				'id'     => 'kortez-navigation',
				'url'    => get_template_directory_uri() . '/assets/js/navigation.js',
				'footer' => true
			),
			array(
				'id'     => 'theia-sticky-sidebar',
				'url'    => get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.min.js',
				'footer' => true
			),
			array(
				'id'     => 'html5shiv',
				'url'    => get_template_directory_uri() . '/assets/js/html5shiv.min.js',
				'footer' => true
			),
			array(
				'id'     => 'kortez-custom',
				'url'    => get_template_directory_uri() . '/assets/js/custom.min.js',
				'footer' => true
			)
		);

		kortez_add_scripts( $scripts );
		
		$locale = array(
			'is_rtl'                                 => is_rtl(),
			'is_admin_bar_showing'                   => is_admin_bar_showing() ? true : false,
			'responsive_header_menu_text'            => get_theme_mod( 'responsive_header_menu_text', '' ),
			'header_image_slider' => array(
				'fade'          => absint( get_theme_mod( 'header_slider_effect', 'fade' ) == 'fade' ) ? true : false,
				'autoplay'      => absint( !get_theme_mod( 'disable_header_slider_autoplay', true ) ),
				'autoplaySpeed' => absint( get_theme_mod( 'slider_header_autoplay_speed', 4 ) * 1000 ),
				'fadeControl'   => absint( get_theme_mod( 'slider_header_fade_control', 5 ) ) * 100,
			),
			'fixed_nav'                  => !get_theme_mod( 'disable_fixed_header', true ) ? true : false,
			'mobile_fixed_nav_off'       => get_theme_mod( 'disable_mobile_fixed_header', true ) ? true : false,
			'disable_scroll_top'         => get_theme_mod( 'disable_scroll_top', false ),
			'sticky_sidebar'             => !get_theme_mod( 'disable_sticky_sidebar', false ) ? true : false,
			'header_two_logo'            => wp_get_attachment_url( get_theme_mod( 'header_separate_logo', '' ) ),
			'is_header_two'	             => ( get_theme_mod( 'header_layout', 'header_one' ) == 'header_two' ) ? true : false,
			'is_frame_layout'	         => ( get_theme_mod( 'site_layout', 'default' ) == 'frame' ) ? true : false,
			'fixed_header_logo'          => !get_theme_mod( 'disable_fixed_header_logo', false ) ? true : false,
			'separate_logo'              => wp_get_attachment_url( get_theme_mod( 'fixed_header_separate_logo', '' ) ),
			'is_front_page'              => is_front_page(),
			'overlay_post'               => ( !get_theme_mod( 'disable_transparent_header_post', true ) && is_single() ),
			'overlay_page'               => ( !get_theme_mod( 'disable_transparent_header_page', true ) && is_page() ),
			'the_custom_logo'            => kortez_get_custom_logo_url(),
		);
		$locale = apply_filters( 'kortez_localize_var', $locale );
		wp_localize_script( 'kortez-custom', 'KORTEZ', $locale );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'kortez_scripts' );

/**
* Add script
* 
* @since Kortez 1.0.0
*/
function kortez_add_scripts( $scripts ){
	foreach ( $scripts as $key => $value ) {
		wp_enqueue_script( $value['id'] , $value['url'] , array( 'jquery', 'jquery-masonry' ), 0.8, $value['footer'] );
	}
}

/**
* Enqueue editor styles for Gutenberg
* 
* @since Kortez 1.0.0
*/
function kortez_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'kortez-block-editor-style', get_theme_file_uri( '/assets/css/editor-blocks.min.css' ) );
	// Google Font
	wp_enqueue_style( 'kortez-google-font', 'https://fonts.googleapis.com/css?family=Poppins:300,400,400i,500,600,700,700i', false );
}
add_action( 'enqueue_block_editor_assets', 'kortez_block_editor_styles' );