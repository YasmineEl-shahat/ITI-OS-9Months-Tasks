<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Superb eCommerce
 */

?>
<?php if ( has_post_thumbnail() ) : ?>
	<div class="featured-thumbnail">
		<?php the_post_thumbnail('superb-ecommerce-slider'); ?>
	</div>
<?php endif; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('posts-entry fbox'); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<span class="post-author-wrapper">
					<?php esc_html_e( 'By', 'superb-ecommerce' ); ?> <?php the_author(); ?> <?php esc_html_e( 'on', 'superb-ecommerce' ); ?>
				</span>
				<?php superb_ecommerce_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'superb-ecommerce' ),
			'after'  => '</div>',
		) );
		?>

<?php if ( is_single()  ) : ?>
		<?php if ( get_theme_mod( 'show_posts_categories_tags' ) == '' ) : ?>
			<div class="category-and-tags">
				<div>
					Category: <?php the_category(', '); ?>
				</div>
				<?php if ( has_tag() ) : ?>
				<div class="category-and-tags-m">
					Tags: <?php the_tags(''); ?>
				</div>
					<?php endif; ?>
			</div>
		<?php else : ?>
	<?php endif; ?>
	<?php endif; ?>


</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
