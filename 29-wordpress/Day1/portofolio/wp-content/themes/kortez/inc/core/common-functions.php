<?php
/**
 * Common Functions for Kortez Theme.
 *
 * @package     Kortez
 * @since       Kortez 1.0.0
 */

if( !function_exists( 'kortez_hex2rgba' ) ):
/**
* Convert hexdec color string to rgb(a) string
*/
function kortez_hex2rgba($color, $opacity = false) {
 
    $default = 'rgba(0,0,0, 0.1)';
 
    # Return default if no color provided
    if( empty( $color ) )
          return $default; 
 
    # Sanitize $color if "#" is provided 
    if ( $color[0] == '#' ) {
        $color = substr( $color, 1 );
    }

    # Check if color has 6 or 3 characters and get values
    if ( strlen( $color ) == 6 ) {
            $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
            $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
            return $default;
    }
 
    # Convert hexadec to rgb
    $rgb =  array_map('hexdec', $hex);

    # Check if opacity is set(rgba or rgb)
    if( $opacity ){
        if( abs( $opacity ) > 1 )
            $opacity = 1.0;
        $output = 'rgba('.implode( ",",$rgb ).','.$opacity.')';
    } else {
        $output = 'rgb('.implode( ",",$rgb ).')';
    }

    # Return rgb(a) color string
    return $output;
}
endif;

/**
 * Adds custom size in images
 */
function kortez_image_size( $image_size ){
	$image_id = get_post_thumbnail_id();
	
	the_post_thumbnail( $image_size, array(
		'alt' => esc_attr(get_post_meta( $image_id, '_wp_attachment_image_alt', true))
	) );
}

/**
 * Add breadcrumb
 */

if ( ! function_exists( 'kortez_breadcrumb' ) ) :

	function kortez_breadcrumb() {

		// Bail if Home Page.
		if ( ! is_home() && is_front_page() ) {
			return;
		} ?>
		<?php if( function_exists( 'bcn_display' ) ){ ?>
			<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/"> 
			    <?php bcn_display(); ?>
			</div>
		<?php } ?>
		<?php
	}

endif;

if ( ! function_exists( 'kortez_breadcrumb_wrap' ) ) :
	/**
	 * Add Breadcrumb Wrapper
	 *
	 * @since Kortez 1.0.0
	 *
	 */
	
	function kortez_breadcrumb_wrap( $transparent = false ) {
		if( !is_home() ) { ?>
			<div class="breadcrumb-wrap">
	        	<?php if( $transparent ){ ?>
	        		<div class="container">
	        			<?php kortez_breadcrumb(); ?>
	        		</div>
				<?php } else{ kortez_breadcrumb(); } ?>
	        </div>
		<?php
		} 
	}
endif;

if( ! function_exists( 'kortez_sort_category' ) ):
/**
 * Helper function for kortez_get_the_category()
 *
 * @since Kortez 1.0.0
 */
function kortez_sort_category( $a, $b ){
    return $a->term_id < $b->term_id;
}
endif;

if( ! function_exists( 'kortez_get_the_category' ) ):
	/**
	* Returns categories after sorting by term id descending
	* 
	* @since Kortez 1.0.0
	* @uses kortez_sort_category()
	* @return array
	*/
	function kortez_get_the_category( $id = false ){
	    $failed = true;

	    if( !$id ){
	        $id = get_the_id();
	    }
	    
	    # Check if Yoast Plugin is installed 
	    # If yes then, get Primary category, set by Plugin

	    if ( class_exists( 'WPSEO_Primary_Term' ) ){

	        # Show the post's 'Primary' category, if this Yoast feature is available, & one is set
	        $wpseo_primary_term = new WPSEO_Primary_Term( 'category', $id );
	        $wpseo_primary_term = $wpseo_primary_term->get_primary_term();

	        $kortez_cat[0] = get_term( $wpseo_primary_term );

	        if ( !is_wp_error( $kortez_cat[0] ) ) { 
	           $failed = false;
	        }
	    }

	    if( $failed ){

	      $kortez_cat = get_the_category( $id );
	      usort( $kortez_cat, 'kortez_sort_category' );  
	    }
	    
	    return $kortez_cat;
	}

endif;

/**
* Get post categoriesby by term id
* 
* @since Kortez 1.0.0
* @uses kortez_get_post_categories()
* @return array
*/
function kortez_get_post_categories(){

	$terms = get_terms( array(
	    'taxonomy' => 'category',
	    'hide_empty' => true,
	) );

	if( empty($terms) || !is_array( $terms ) ){
		return array();
	}

	$data = array();
	foreach ( $terms as $key => $value) {
		$term_id = absint( $value->term_id );
		$data[$term_id] =  esc_html( $value->name );
	}
	return $data;

}

if( !function_exists( 'kortez_get_intermediate_image_sizes' ) ){
	/**
	* Array of image sizes.
	* 
	* @since Kortez 1.0.0
	* @return array
	*/
	function kortez_get_intermediate_image_sizes(){

		$data 	= array(
			'full'			=> esc_html__( 'Full Size', 'kortez' ),
			'large'			=> esc_html__( 'Large Size', 'kortez' ),
			'medium'		=> esc_html__( 'Medium Size', 'kortez' ),
			'medium_large'	=> esc_html__( 'Medium Large Size', 'kortez' ),
			'thumbnail'		=> esc_html__( 'Thumbnail Size', 'kortez' ),
			'1536x1536'		=> esc_html__( '1536x1536 Size', 'kortez' ),
			'2048x2048'		=> esc_html__( '2048x2048 Size', 'kortez' ),
			'kortez-1920-550' => esc_html__( '1920x550 Size', 'kortez' ),
			'kortez-1370-550'	=> esc_html__( '1370x550 Size', 'kortez' ),
			'kortez-590-310'	=> esc_html__( '590x310 Size', 'kortez' ),
			'kortez-420-380'	=> esc_html__( '420x380 Size', 'kortez' ),
			'kortez-420-300'	=> esc_html__( '420x300 Size', 'kortez' ),
			'kortez-420-200'	=> esc_html__( '420x200 Size', 'kortez' ),
			'kortez-290-150'	=> esc_html__( '290x150 Size', 'kortez' ),
			'kortez-80-60'	=> esc_html__( '80x60 Size', 'kortez' ),
		);
		
		return $data;

	}
}

if( !function_exists( 'kortez_has_social' ) ){
	/**
	* Check if social media icon is empty.
	* 
	* @since Kortez 1.0.0
	* @return bool
	*/
	function kortez_has_social(){
		$social_defaults = array(
			array(
				'icon' 		=> '',
				'link' 		=> '',
				'target' 	=> true,
			)			
		);
		$social_icons = get_theme_mod( 'social_media_links', $social_defaults );
		$has_social = false;
		if ( is_array( $social_icons ) ){
			foreach( $social_icons as $value ){
				if( !empty( $value['icon'] ) ){
					$has_social = true;
					break;
				}
			}
		}
		return $has_social;
	}
}

if( !function_exists( 'kortez_social' ) ){
	/**
	* Add social icons.
	* 
	* @since Kortez 1.0.0
	*/
	function kortez_social(){
		
	    echo '<ul class="social-group">';
		    $count = 0.2;
		    $social_defaults = array(
				array(
					'icon' 		=> '',
					'link' 		=> '',
					'target' 	=> true,
				)			
			);
			$social_icons = get_theme_mod( 'social_media_links', $social_defaults );
		    foreach( $social_icons as $value ){
		        if( $value['target'] ){
		    		$link_target = '_blank';
		    	}else{
		    		$link_target = '';
		    	}
		        if( !empty( $value['icon'] ) ){
		            echo '<li><a href="' . esc_url( $value['link'] ) . '" target="' .esc_attr( $link_target ). '"><i class=" ' . esc_attr( $value['icon'] ) . '"></i></a></li>';
		            $count = $count + 0.2;
		        }
		    }
	    echo '</ul>';
	}
}

if( !function_exists( 'kortez_has_header_media' ) ){
	/**
	* Check if header media slider item is empty.
	* 
	* @since Kortez 1.0.0
	* @return bool
	*/
	function kortez_has_header_media(){
		$header_slider_defaults = array(
			array(
				'slider_item' 	=> '',
			)			
		);
		$header_image_slider = get_theme_mod( 'header_image_slider', $header_slider_defaults );
		$has_header_media = false;
		if ( is_array( $header_image_slider ) ){
			foreach( $header_image_slider as $value ){
				if( !empty( $value['slider_item'] ) ){
					$has_header_media = true;
					break;
				}
			}
		}
		return $has_header_media;
	}
}

if( !function_exists( 'kortez_header_media' ) ){
	/**
	* Add header banner/slider.
	* 
	* @since Kortez 1.0.0
	*/
	function kortez_header_media(){
		$header_slider_defaults = array(
			array(
				'slider_item' 	=> '',
			)			
		);
		$header_image_slider = get_theme_mod( 'header_image_slider', $header_slider_defaults ); ?>
		<div class="header-image-slider">
		    <?php
		    $render_header_image_size = get_theme_mod( 'render_header_image_size', 'full' ); 
		    foreach( $header_image_slider as $slider_item ) :
		    	if( wp_attachment_is_image( $slider_item['slider_item'] ) ){
	    			$get_header_image_array = wp_get_attachment_image_src( $slider_item['slider_item'], $render_header_image_size );
	    			if( is_array( $get_header_image_array ) ){
	    				$header_image_url = $get_header_image_array[0];
	    			}else{
	    				$header_image_url = '';
	    			}
		    	}else{
		    		if( empty( $slider_item['slider_item'] ) ){
	    				$header_image_url = '';
	    			}else{
	    				$header_image_url = $slider_item['slider_item'];
	    			}
		    	} ?>
		    	<div class="header-slide-item" style="background-image: url( <?php echo esc_url( $header_image_url ); ?> )">
		    		<div class="slider-inner"></div>
		      </div>
		    <?php endforeach; ?>
		</div>
		<?php if( !get_theme_mod( 'disable_header_slider_arrows', false ) ) { ?>
			<ul class="slick-control">
		        <li class="header-slider-prev">
		        	<span></span>
		        </li>
		        <li class="header-slider-next">
		        	<span></span>
		        </li>
		    </ul>
		<?php }
		if ( !get_theme_mod( 'disable_header_slider_dots', false ) ){ ?>
			<div class="header-slider-dots"></div>
		<?php }
	}
}

/**
* Add a footer image
* @since Kortez 1.0.0
*/
function kortez_footer_image(){
	$render_bottom_footer_image_size 	= get_theme_mod( 'render_bottom_footer_image_size', 'full' );
	$bottom_footer_image_id 			= get_theme_mod( 'bottom_footer_image', '' );
	$get_bottom_footer_image_array 		= wp_get_attachment_image_src( $bottom_footer_image_id, $render_bottom_footer_image_size );
	if( is_array( $get_bottom_footer_image_array ) ){
		$bottom_footer_image = $get_bottom_footer_image_array[0];
	}else{
		$bottom_footer_image = '';
	}
	$alt = get_post_meta( get_theme_mod( 'bottom_footer_image', '' ), '_wp_attachment_image_alt', true );
	if ( $bottom_footer_image ){
		$bottom_footer_image_target = get_theme_mod( 'bottom_footer_image_target', true );
		$link_target = '';
		if( $bottom_footer_image_target ){
			$link_target = '_blank';
		}
 	?>
	 	<div class="bottom-footer-image-wrap">
	 		<a href="<?php echo esc_url( get_theme_mod( 'bottom_footer_image_link', '' ) ); ?>" alt="<?php echo esc_attr($alt); ?>" target="<?php echo esc_attr( $link_target ); ?>">
	 			<img src="<?php echo esc_url( $bottom_footer_image ); ?>">
	 		</a>
	 	</div>
	<?php
	}
}

/**
 * Display blog page title
 */
function kortez_blog_page_title() {
	if( get_theme_mod( 'disable_blog_page_title', 'enable_all_pages' ) == 'disable_all_pages' ){
		// this condition will disable page title from all pages
		echo '';
	}else {
		kortez_page_title_display();
	}
}

/**
 * Returns the sidebar column classes.
 *
 * @return array
 * @since Kortez 1.0.0
 */
if( !function_exists( 'kortez_get_sidebar_class' ) ){
    function kortez_get_sidebar_class( $template ){
        $sidebarClass = 'col-lg-8';
		$sidebarColumnClass = 'col-lg-4';
		if ( get_theme_mod( 'sidebar_settings', 'right' ) == 'right' ){
			if( !is_active_sidebar( 'right-sidebar') ){
				$sidebarClass = "col-12";
			}	
		}elseif ( get_theme_mod( 'sidebar_settings', 'right' ) == 'left' ){
			if( !is_active_sidebar( 'left-sidebar') ){
				$sidebarClass = "col-12";
			}	
		}elseif ( get_theme_mod( 'sidebar_settings', 'right' ) == 'right-left' ){
			$sidebarClass = 'col-lg-6';
			$sidebarColumnClass = 'col-lg-3';
			if( !is_active_sidebar( 'left-sidebar') && !is_active_sidebar( 'right-sidebar') ){
				$sidebarClass = "col-12";
			}
		}
		if( $template == 'single' ){
			if ( get_theme_mod( 'sidebar_settings', 'right' ) == 'no-sidebar' || get_theme_mod( 'disable_sidebar_single_post', false ) ){
				$sidebarClass = 'col-12';
			}
		}elseif( $template == 'page' ){
			if ( get_theme_mod( 'sidebar_settings', 'right' ) == 'no-sidebar' || get_theme_mod( 'disable_sidebar_page', true ) ){
				$sidebarClass = 'col-12';
			}
		}
		
        $colClasses = array(
            'sidebarClass' => $sidebarClass, 
            'sidebarColumnClass' => $sidebarColumnClass, 
        );
        return $colClasses;
    }
}

/**
 * Displays left sidebar.
 *
 * @since Kortez 1.0.0
 */
if( !function_exists( 'kortez_left_sidebar' ) ){
    function kortez_left_sidebar( $leftColumnClass ){
        if ( get_theme_mod( 'sidebar_settings', 'right' ) == 'left' ){ 
			if( is_active_sidebar( 'left-sidebar' ) ){ ?>
				<div id="secondary" class="sidebar left-sidebar <?php echo esc_attr( $leftColumnClass ); ?>">
					<?php dynamic_sidebar( 'left-sidebar' ); ?>
				</div>
			<?php }
		}elseif ( get_theme_mod( 'sidebar_settings', 'right' ) == 'right-left' ){
			if( is_active_sidebar( 'left-sidebar') || is_active_sidebar( 'right-sidebar') ){ ?>
				<div id="secondary" class="sidebar left-sidebar <?php echo esc_attr( $leftColumnClass ); ?>">
					<?php dynamic_sidebar( 'left-sidebar' ); ?>
				</div>
			<?php
			}
		}
    }
}

/**
 * Displays right sidebar.
 *
 * @since Kortez 1.0.0
 */
if( !function_exists( 'kortez_right_sidebar' ) ){
    function kortez_right_sidebar( $rightColumnClass ){
        if ( get_theme_mod( 'sidebar_settings', 'right' ) == 'right' ){ 
			if( is_active_sidebar( 'right-sidebar') ){ ?>
				<div id="secondary" class="sidebar right-sidebar <?php echo esc_attr( $rightColumnClass ); ?>">
					<?php dynamic_sidebar( 'right-sidebar' ); ?>
				</div>
			<?php }
		}elseif ( get_theme_mod( 'sidebar_settings', 'right' ) == 'right-left' ){
			if( is_active_sidebar( 'left-sidebar') || is_active_sidebar( 'right-sidebar') ){ ?>
				<div id="secondary-sidebar" class="sidebar right-sidebar <?php echo esc_attr( $rightColumnClass ); ?>">
					<?php dynamic_sidebar( 'right-sidebar' ); ?>
				</div>
			<?php
			}
		}
    }
}

/**
* Get Custom Logo URL
* 
* @since Kortez 1.0.0
*/
function kortez_get_custom_logo_url(){
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    if ( is_array($image) ){
        return $image[0];
    }else{
        return '';
    }
}

/**
* Add post banner to transparent header
* @since Kortez 1.0.0
*/
function kortez_post_transparent_banner() { ?>
    <div class="overlay-post inner-banner-wrap">
        <?php
        $feature_image_id               = get_post_thumbnail_id();
        $render_single_post_image_size  = get_theme_mod( 'render_single_post_image_size', 'kortez-1370-550' );
        $feature_image_obj              = wp_get_attachment_image_src( $feature_image_id, $render_single_post_image_size );
        if( is_array( $feature_image_obj ) ){
            $transparent_header_inner_banner = $feature_image_obj[0];
        }else{
            $transparent_header_inner_banner = '';
        }
        ?>
        <div class="inner-banner-content" style="background-image: url( <?php echo esc_url( $transparent_header_inner_banner ); ?> );">
            <div class="container">
                <?php kortez_single_page_title(); ?>
            </div>
        </div>
        <?php if ( get_theme_mod( 'breadcrumbs_controls', 'show_in_all_page_post' ) == 'disable_in_all_pages' || get_theme_mod( 'breadcrumbs_controls', 'show_in_all_page_post' ) == 'show_in_all_page_post' ){
            kortez_breadcrumb_wrap( true );
        } ?>
    </div>
<?php }

/**
* Add page banner to transparent header
* @since Kortez 1.0.0
*/
function kortez_page_transparent_banner() { ?>
    <div class="overlay-page inner-banner-wrap">
        <?php
        $feature_image_id           = get_post_thumbnail_id();
        $render_pages_image_size    = get_theme_mod( 'render_pages_image_size', 'kortez-1370-550' );
        $feature_image_obj          = wp_get_attachment_image_src( $feature_image_id, $render_pages_image_size );
        if( is_array( $feature_image_obj ) ){
            $transparent_header_inner_banner = $feature_image_obj[0];
        }else{
            $transparent_header_inner_banner = '';
        }
        ?>
        <div class="inner-banner-content" style="background-image: url( <?php echo esc_url( $transparent_header_inner_banner ); ?> );">
            <div class="container">
                <?php kortez_page_title(); ?>
            </div>
        </div>
        <?php if ( get_theme_mod( 'breadcrumbs_controls', 'show_in_all_page_post' ) == 'show_in_all_page_post' ){
            kortez_breadcrumb_wrap( true ); 
        } ?>
    </div>
<?php }

/**
* Check if all getting started recommended plugins are active.
* @since Kortez 1.0.0
*/
if( !function_exists( 'kortez_are_plugin_active' ) ){
    function kortez_are_plugin_active() {
        if( is_plugin_active( 'advanced-import/advanced-import.php' ) && is_plugin_active( 'kortez-toolset/kortez-toolset.php' ) && is_plugin_active( 'kirki/kirki.php' ) && is_plugin_active( 'elementor/elementor.php' ) && is_plugin_active( 'breadcrumb-navxt/breadcrumb-navxt.php' ) && is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) && is_plugin_active( 'elementskit-lite/elementskit-lite.php' ) && is_plugin_active( 'bosa-elementor-for-woocommerce/bosa-elementor-for-woocommerce.php' ) ){
            return true;
        }else{
            return false;
        }
    }
}

/**
 * Get Related Posts
 *
 * @since Kortez 1.0.0
 * @param array $taxonomy
 * @param int $per_page Default 3
 * @return bool | object
 */

if( !function_exists( 'kortez_get_related_posts' ) ):
    function kortez_get_related_posts( $taxonomy = array(), $per_page = 4, $get_params = false ){
       
        # Show related posts only in single page.
        if ( !is_single() )
            return false;

        # Get the current post object to start of
        $current_post = get_queried_object();

        # Get the post terms, just the ids
        $terms = wp_get_post_terms( $current_post->ID, $taxonomy, array( 'fields' => 'ids' ) );

        # Lets only continue if we actually have post terms and if we don't have an WP_Error object. If not, return false
        if ( !$terms || is_wp_error( $terms ) )
            return false;
        
        # Check if the users argument is valid
        if( is_array( $taxonomy ) && count( $taxonomy ) > 0 ){

            $tax_query_arg = array();

            foreach( $taxonomy as $tax ){

                $tax = filter_var( $tax, FILTER_SANITIZE_STRING );

                if ( taxonomy_exists( $tax ) ){

                    array_push( $tax_query_arg, array(
                        'taxonomy'         => $tax,
                        'terms'            => $terms,
                        'include_children' => false
                    ) );
                    
                }
            }

            if( count( $tax_query_arg ) == 0 ){
                return false;
            }

            if( count( $tax_query_arg ) > 1 ){
                $tax_query_arg[ 'relation' ] = 'OR';
            }
            
        }else
            return false;
        
        # Set the default query arguments
        $args = array(
            'post_type'      => $current_post->post_type,
            'post__not_in'   => array( $current_post->ID ),
            'posts_per_page' => $per_page,
            'tax_query'      => $tax_query_arg,
        );

        if( $get_params ){
            return $args;
        }
        
        # Now we can query our related posts and return them
        $q = get_posts( $args );

        return $q;
    }
endif;

/**
 * Check whether the sidebar is active or not.
 *
 * @see https://codex.wordpress.org/Conditional_Tags
 * @since Kortez 1.0.0
 * @return bool whether the sidebar is active or not.
 */
function kortez_is_active_footer_sidebar(){

    for( $i = 1; $i <= 4; $i++ ){
        if ( is_active_sidebar( 'footer-sidebar-'.$i ) ) : 
            return true;
        endif;
    }
    return false;
}

/**
 * Page/Post title in frontpage and blog
 */
function kortez_page_title_display() {
    if ( is_singular() || ( !is_home() && is_front_page() ) ): ?>
        <h1 class="page-title entry-title"><?php single_post_title(); ?></h1>
    <?php elseif ( is_archive() ) : 
        the_archive_title( '<h1 class="page-title">', '</h1>' );
    elseif ( is_search() ) : ?>
        <h1 class="page-title entry-title">
        	<?php
        	/* translators: %s - Searched WordPress query variable*/
        	printf( esc_html__( 'Search Results for: %s', 'kortez' ), get_search_query() );
        	?>
        	</h1>
    <?php elseif ( is_404() ) :
        echo '<h1 class="page-title entry-title">' . esc_html__( 'Oops! That page can&#39;t be found.', 'kortez' ) . '</h1>';
    endif;
}

/**
 * Display page title
 */
function kortez_page_title() {
    if( get_theme_mod( 'disable_page_title', 'disable_front_page' ) == 'disable_all_pages' ){
        // this condition will disable page title from all pages
        echo '';
    }elseif( is_front_page() && get_theme_mod( 'disable_page_title', 'disable_front_page' ) == 'disable_front_page' ){
        // this condition will disable page title from front page only
        echo '';
    }else {
        kortez_page_title_display();
    }
}

/**
 * Display single post title
 */
function kortez_single_page_title() {
    if( get_theme_mod( 'disable_single_post_title', 'enable_all_pages' ) == 'disable_all_pages' ){
        // this condition will disable page title from all pages
        echo '';
    }else {
        kortez_page_title_display();
    }
}