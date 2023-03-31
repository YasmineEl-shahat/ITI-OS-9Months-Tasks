<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kortez
 */

?>
<div class="col-md-6 col-lg-4 grid-post">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( has_post_thumbnail() ) : ?>
	        <figure class="featured-image">
	            <a href="<?php the_permalink(); ?>">
	                <?php kortez_image_size( 'kortez-420-300' ) ?>
	            </a>
	        </figure><!-- .recent-image -->
	    <?php endif; ?>
	    <div class="entry-content">
	    	<header class="entry-header">
	    		<?php
	    		kortez_entry_header();
	    		the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); 
	    		?>
	    	</header><!-- .entry-header -->
	    	<?php if ( 'post' === get_post_type() ) : ?>
	    		<div class="entry-meta">
	    			<?php kortez_entry_footer(); ?>
	    		</div><!-- .entry-meta -->
	    	<?php endif; ?>

			<div class="entry-summary">
				<?php kortez_excerpt( 15, true ); ?>
			</div><!-- .entry-summary -->
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
</div>