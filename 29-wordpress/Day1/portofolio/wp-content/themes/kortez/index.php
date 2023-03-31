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
 * @package Kortez
 */

get_header();
?>
	<div id="content" class="site-content">
		<div class="container">
			<!-- Latest Posts Section -->
			<?php get_template_part( 'template-parts/latest-posts/latest-posts' ); ?>
		</div><!-- #container -->
	</div><!-- #content -->
<?php
get_footer();