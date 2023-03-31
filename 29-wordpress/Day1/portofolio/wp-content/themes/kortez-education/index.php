<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kortez Education
 */

get_header();
?>
	<div id="content" class="site-content">
		<div class="container">
			<?php
			//Feature Page Section
			if( get_theme_mod( 'featured_pages_section_layouts', 'featured_pages_layout_one' ) == '' || get_theme_mod( 'featured_pages_section_layouts', 'featured_pages_layout_one' ) == 'featured_pages_layout_one' ){
				get_template_part( 'template-parts/feature-pages/feature-pages', 'one' );
			}
			?>
			
			<!-- Advertisement Banner -->
			<?php kortez_education_blog_advertisement_banner(); ?>

			<!-- Featured Posts Two -->
			<?php get_template_part( 'template-parts/feature-posts-two/feature-posts', 'two' ); ?>

			<!-- Latest Posts Section -->
			<?php get_template_part( 'template-parts/latest-posts/latest-posts' ); ?>
		</div><!-- #container -->
	</div><!-- #content -->
<?php
get_footer();