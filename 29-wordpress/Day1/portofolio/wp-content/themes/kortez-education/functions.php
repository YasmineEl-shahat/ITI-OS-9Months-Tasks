<?php
/**
 * Theme functions and definitions
 *
 * @package Kortez Education
 */

require get_stylesheet_directory() . '/inc/customizer/customizer.php';
require get_stylesheet_directory() . '/inc/customizer/loader.php';

if ( ! function_exists( 'kortez_education_enqueue_styles' ) ) :
	/**
	 * @since Kortez Education 1.0.0
	 */
	function kortez_education_enqueue_styles() {
		wp_enqueue_style( 'kortez-education-style-parent', get_template_directory_uri() . '/style.css',
			array(
				'bootstrap',
				'slick',
				'slicknav',
				'slick-theme',
				'fontawesome',
				'kortez-blocks',
				'kortez-google-font'
				)
		);
	}

endif;
add_action( 'wp_enqueue_scripts', 'kortez_education_enqueue_styles', 10 );


if( !function_exists( 'kortez_education_footer_layout_filter' ) ){
    /**
    * Filter of footer layout choices.
    * 
    * @since Kortez Education 1.0.0
    * @return array
    */
    add_filter( 'kortez_footer_layout_filter', 'kortez_education_footer_layout_filter' );
    function kortez_education_footer_layout_filter( $footer_layout ){
        $added_footer = array(
            'footer_five'  => get_stylesheet_directory_uri() . '/assets/images/footer-layout-5.png',
        );
        return array_merge( $footer_layout, $added_footer );
    }
}

/**
* Get pages by post id.
* 
* @since Kortez Education 1.2.1
* @return array.
*/
function kortez_education_get_pages(){
    $page_array = get_pages();
    $pages_list = array();
    foreach ( $page_array as $key => $value ){
        $page_id = absint( $value->ID );
        $pages_list[ $page_id ] = $value->post_title;
    }
    return $pages_list;
}

if( !function_exists( 'kortez_education_blog_advertisement_banner' ) ){
	/**
	* Add a blog advertisement banner
	* @since Kortez Education 1.0.0
	*/
    function kortez_education_blog_advertisement_banner(){
        $blogAdvertID 					= get_theme_mod( 'blog_advertisement_banner', '' );
        $render_blog_ad_image_size 		= get_theme_mod( 'render_blog_ad_image_size', 'full' );
        $blog_advertisement_banner_obj 	= wp_get_attachment_image_src( $blogAdvertID, $render_blog_ad_image_size );
        if ( is_array(  $blog_advertisement_banner_obj ) ){
            $blog_advertisement_banner = $blog_advertisement_banner_obj[0];
            $advert_target = get_theme_mod( 'blog_advertisement_banner_target', true );
            $alt = get_post_meta( $blogAdvertID, '_wp_attachment_image_alt', true); ?>
            <div class="section-advert text-center">
                <a href="<?php echo esc_url( get_theme_mod( 'blog_advertisement_banner_link', '' ) ); ?>" alt="<?php echo esc_attr( $alt ); ?>" target="<?php echo esc_attr( $advert_target ); ?>">
                    <img src="<?php echo esc_url( $blog_advertisement_banner ); ?>">
                </a>
            </div>
        <?php }
    }
}

add_theme_support( "title-tag" );
add_theme_support( 'automatic-feed-links' );