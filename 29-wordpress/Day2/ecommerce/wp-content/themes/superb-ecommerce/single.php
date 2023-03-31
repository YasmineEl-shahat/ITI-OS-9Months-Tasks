<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Superb eCommerce
 */

get_header(); ?>

<div id="content" class="site-content clearfix"> <?php $container_class = !is_page_template('elementor_header_footer') ? 'content-wrap' : 'content-none'; ?> 
<div class="<?php echo $container_class; ?>">

	<div id="primary" class="featured-content content-area">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'single' );

				the_post_navigation();
 				// About the author start
				if ( get_theme_mod( 'postpage_show_author' ) == '1' ) :
					echo '<div class="about-the-author">';
					echo '<div class="about-the-author-img">';
					echo get_avatar( get_the_author_meta( 'ID' ), 100 ); 
					echo '</div>';
					echo '<div class="about-the-author-description">';
					echo '<h3>';
					esc_html_e('About the author','superb-ecommerce');
					echo '</h3>';
					echo nl2br(get_the_author_meta('description'));
					echo '</div>';
					echo '</div>';
				endif; 
				// About the author end


				// Related posts start
		if ( get_theme_mod( 'postpage_show_hide_relatedposts' ) != '1' ) :
					$categories = get_the_category($post->ID); 
					if ($categories) { $category_ids = array(); 
						foreach($categories as $individual_category) 
							$category_ids[] = $individual_category->term_id; 
						$args=array( 'category__in' => $category_ids, 
							'post__not_in' => array($post->ID), 
							'ignore_sticky_posts' => 1, 
							'showposts'=> 3,
							'orderby' => 'rand' );
						$my_query = new wp_query( $args ); if( $my_query->have_posts() ) {
							echo '<div class="related-posts"><div class="related-posts-headline"><h3>'.esc_html__('Related Posts', 'superb-ecommerce').'</h3></div><div class="related-posts-posts">';
							$pexcerpt=1; $j = 0; $counter = 0; 
							while( $my_query->have_posts() ) { 
								$my_query->the_post();?>
								<article class="post excerpt  <?php echo (++$j % 3== 0) ? 'last' : ''; ?>">
									<?php if ( has_post_thumbnail() ) : ?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
											<?php the_post_thumbnail('large'); ?>
										</a>
									<?php endif; ?>
									<div class="article-contents">
										<header class="entry-header">
											<?php 
											if ( 'post' === get_post_type() ) :
												?>
												<?php
												the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
												?>
												<div class="entry-meta">
													<?php echo esc_html(get_the_date('F j, Y')); ?>
												</div>

												<a class="read-more" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
													<?php echo esc_html_e('Read More','superb-ecommerce'); ?>
												</a>
											<?php endif; ?>
										</div>
										<?php  ?>
									</article><!--.post.excerpt-->
									<?php $pexcerpt++;?>
								<?php } echo '</div></div>'; }} wp_reset_postdata();
								
							endif; 
						// Related posts end

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
						endif;

					endwhile; // End of the loop.
					?>

				</main><!-- #main -->
			</div><!-- #primary -->
			<?php get_sidebar(); ?>
		</div>
	</div><!-- #content -->

	<?php get_footer();
