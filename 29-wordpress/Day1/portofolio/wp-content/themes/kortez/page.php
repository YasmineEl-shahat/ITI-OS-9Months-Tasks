<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kortez
 */

get_header();
?>
<?php 
if( !get_theme_mod( 'disable_transparent_header_page', true ) && get_theme_mod( 'header_layout', 'header_one' ) == 'header_two' ){
	kortez_page_transparent_banner();
} ?>
<div id="content" class="site-content">
	<div class="container">
		<section class="wrap-detail-page">
			<?php if( get_theme_mod( 'disable_transparent_header_page', true ) || get_theme_mod( 'header_layout', 'header_one' ) != 'header_two' ){
				if( get_theme_mod( 'page_title_position', 'above_feature_image' ) == 'above_feature_image' ){
				kortez_page_title();
				}
				if( get_theme_mod( 'breadcrumbs_controls', 'show_in_all_page_post' ) == 'show_in_all_page_post' ){
					kortez_breadcrumb_wrap();
				}
			} ?>
			<div class="row">
				<?php
				$page_sidebar_class = kortez_get_sidebar_class( 'page' );
				if( !kortez_wooCom_is_cart() && !kortez_wooCom_is_checkout() && !kortez_wooCom_is_account_page() ){
					if( !get_theme_mod( 'disable_sidebar_page', true ) ){
						kortez_left_sidebar( $page_sidebar_class[ 'sidebarColumnClass' ] );
					}
				}else{
					$page_sidebar_class[ 'sidebarClass' ] = 'col-12';
				}
				?>
				<div id="primary" class="content-area <?php echo esc_attr( $page_sidebar_class[ 'sidebarClass' ] ); ?>">
					<main id="main" class="site-main">
						<?php if( get_theme_mod( 'disable_transparent_header_page', true ) || get_theme_mod( 'header_layout', 'header_one' ) != 'header_two' ){
							if( has_post_thumbnail() ){
								if( get_theme_mod( 'page_feature_image', 'show_in_all_pages' ) == 'show_in_all_pages' || !is_front_page() && get_theme_mod( 'page_feature_image', 'show_in_all_pages' ) == 'disable_in_frontpage' || get_theme_mod( 'page_feature_image', 'show_in_all_pages' ) == 'show_in_frontpage' && is_front_page() ){ ?>
								    <figure class="feature-image single-feature-image">
								        <?php 
								        $render_pages_image_size 	= get_theme_mod( 'render_pages_image_size', 'kortez-1370-550' );
								        kortez_image_size( $render_pages_image_size ); ?>
								    </figure>
								<?php }else{
									// will disable in all pages
									echo '';
								}
							}
							if( get_theme_mod( 'page_title_position', 'above_feature_image' ) == 'below_feature_image' ){
								kortez_page_title();
							}
						} ?>
					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
					</main><!-- #main -->
				</div><!-- #primary -->
				<?php
				if( !kortez_wooCom_is_cart() && !kortez_wooCom_is_checkout() && !kortez_wooCom_is_account_page() ){
					if( !get_theme_mod( 'disable_sidebar_page', true ) ){
						kortez_right_sidebar( $page_sidebar_class[ 'sidebarColumnClass' ] );
					}
				}
				?>
			</div>
		</section>
	</div><!-- #container -->
</div><!-- #content -->	
<?php get_footer();
