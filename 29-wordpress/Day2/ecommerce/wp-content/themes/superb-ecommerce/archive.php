<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Superb eCommerce
 */

get_header(); ?>
<div id="content" class="site-content clearfix"> <?php $container_class = !is_page_template('elementor_header_footer') ? 'content-wrap' : 'content-none'; ?> <div class="<?php echo $container_class; ?>">

<div id="primary" class="featured-content content-area <?php if ( get_theme_mod( 'blogfeed_show_sidebar' ) == '1' ) : ?>fullwidth-area-blog<?php endif; ?> add-blog-to-sidebar">
		<main id="main">
				<?php
				if ( have_posts() ) : ?>

					<header class="page-header search-results-header-wrapper">
						<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
						?>
					</header><!-- .page-header -->
			<div class="site-main all-blog-articles">

					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			echo '<div class="text-center pag-wrapper">';
			superb_ecommerce_numeric_posts_nav();
			echo '</div>';
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
	</div>
</main><!-- #main -->
</div><!-- #primary -->

<?php if ( get_theme_mod( 'blogfeed_show_sidebar' ) == '1' ) : ?>
<?php else : ?>
	<?php get_sidebar(); ?>
<?php endif; ?>
</div>
</div><!-- #content -->


<?php
get_footer();
