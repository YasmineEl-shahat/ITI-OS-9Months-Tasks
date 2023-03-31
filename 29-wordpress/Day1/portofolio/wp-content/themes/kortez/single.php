<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Kortez
 */

get_header();
?>
<?php 
if( !get_theme_mod( 'disable_transparent_header_post', true ) && get_theme_mod( 'header_layout', 'header_one' ) == 'header_two' ){
	kortez_post_transparent_banner();
} ?>
<div id="content" class="site-content">
	<div class="container">
		<section class="wrap-detail-page">
			<?php if( get_theme_mod( 'disable_transparent_header_post', true ) || get_theme_mod( 'header_layout', 'header_one' ) != 'header_two' ){
				if( get_theme_mod( 'post_title_position', 'above_feature_image' ) == 'above_feature_image' ){
				kortez_single_page_title();
				}		
				if( get_theme_mod( 'breadcrumbs_controls', 'show_in_all_page_post' ) == 'disable_in_all_pages' || get_theme_mod( 'breadcrumbs_controls', 'show_in_all_page_post' ) == 'show_in_all_page_post' ){
					kortez_breadcrumb_wrap();
				}
			} ?>
			<div class="row">
				<?php
				$single_sidebar_class = kortez_get_sidebar_class( 'single' );
				if( !get_theme_mod( 'disable_sidebar_single_post', false ) ){
					kortez_left_sidebar( $single_sidebar_class[ 'sidebarColumnClass' ] );
				} ?>
				<div id="primary" class="content-area <?php echo esc_attr( $single_sidebar_class[ 'sidebarClass' ] ); ?>">
					<main id="main" class="site-main">
						<?php if( get_theme_mod( 'disable_transparent_header_post', true ) || get_theme_mod( 'header_layout', 'header_one' ) != 'header_two' ){
							if( has_post_thumbnail() ){
								if( get_theme_mod( 'single_feature_image', 'show_in_all_pages' ) == 'show_in_all_pages' ){ ?>
								    <figure class="feature-image single-feature-image">
		    						    <?php 
		    						    $render_single_post_image_size 	= get_theme_mod( 'render_single_post_image_size', 'kortez-1370-550' );
		    						    kortez_image_size( $render_single_post_image_size ); ?>
		    						</figure>
								<?php }else{
									// will disable in all pages
									echo '';
								}
							}
						 	if( get_theme_mod( 'post_title_position', 'above_feature_image' ) == 'below_feature_image' ){
							kortez_single_page_title();
							} 
						} ?>
						<?php
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/content', 'single' );
								
								if ( is_single() && !get_theme_mod( 'hide_single_post_author', false ) ){
									?>
										<div class="author-info">
											<div class="section-title-wrap">
												<h3 class="section-title">
													<?php echo esc_html( get_theme_mod( 'single_post_author_title', '' ) ); ?>
												</h3>
											</div>
											<?php
												# Print author.
											    get_template_part( 'template-parts/content', 'author' );
											?>
										</div>
									<?php
								}

								the_post_navigation();

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

							endwhile; // End of the loop.
						?>
					</main><!-- #main -->
				</div><!-- #primary -->
				<?php
				if( !get_theme_mod( 'disable_sidebar_single_post', false ) ){
					kortez_right_sidebar( $single_sidebar_class[ 'sidebarColumnClass' ] );
				}
				?>
			</div>
		</section>

		<!-- Related Posts -->
		<?php if ( !get_theme_mod( 'hide_related_posts', false ) ){ ?>
			<section class="section-ralated-post">
				<div class="section-title-wrap">
					<h2 class="section-title">
						<?php echo esc_html( get_theme_mod( 'related_posts_title', '' ) ); ?>
					</h2>
				</div>
				<div class="wrap-ralated-posts">
					<div class="row">
						<?php
							# Print related posts randomly.
						    get_template_part( 'template-parts/content', 'related-posts' );
						?>
					</div>
				</div>
			</section>
		<?php } ?>
	</div><!-- #container -->
</div><!-- #content -->
<?php
get_footer();
