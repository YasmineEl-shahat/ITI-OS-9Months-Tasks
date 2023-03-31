<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Superb eCommerce
 */

get_header(); ?>

<div id="content" class="site-content clearfix">
	<?php
	$container_class = !is_page_template('elementor_header_footer') ? 'content-wrap' : 'content-none';
	?>
	<div class="<?php echo $container_class; ?>">
		<div id="primary" class="featured-content content-area">
			<main id="main" class="fbox site-main">

				<section class="error-404 not-found">
					<header class="page-header">
						<img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/404.png" width="100" height="100" alt="Error 404">

						<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'superb-ecommerce' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'superb-ecommerce' ); ?></p>

						<?php
						get_search_form();
						?>
						<div class="fourofour-home">
							<a href="<?php echo  esc_url(home_url()); ?>">Go to homepage</a>


						</div>
					</div><!-- .page-content -->
				</section><!-- .error-404 -->

			</main><!-- #main -->
		</div><!-- #primary -->
		<?php get_sidebar(); ?>
	</div>
</div><!-- #content -->

<?php
get_footer();
