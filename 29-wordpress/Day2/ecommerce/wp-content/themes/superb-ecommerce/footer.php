<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Superb eCommerce
 */

?>


<footer id="colophon" class="site-footer clearfix">

	<div class="content-wrap">
		<?php if ( is_active_sidebar( 'footerwidget-1' ) ) : ?>
			<div class="footer-column-wrapper">
				<div class="footer-column-three footer-column-left">
					<?php dynamic_sidebar( 'footerwidget-1' ); ?>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footerwidget-2' ) ) : ?>
				<div class="footer-column-three footer-column-middle">
					<?php dynamic_sidebar( 'footerwidget-2' ); ?>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footerwidget-3' ) ) : ?>
				<div class="footer-column-three footer-column-right">
					<?php dynamic_sidebar( 'footerwidget-3' ); ?>				
				</div>
			<?php endif; ?>

		</div>

		<div class="site-info">
			&copy;<?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>
			<!-- Delete below lines to remove copyright from footer -->
			<span class="footer-info-right">
				<?php echo __(' | WordPress Theme by', 'superb-ecommerce') ?> <a href="<?php echo esc_url('https://superbthemes.com/', 'superb-ecommerce'); ?>"><?php echo __(' Superb WordPress Themes', 'superb-ecommerce') ?></a>
			</span>
			<!-- Delete above lines to remove copyright from footer -->

		</div><!-- .site-info -->
	</div>

	<?php if ( get_theme_mod( 'footer_go_to_top_hide' ) == '1' ) : ?>
	<?php else : ?>
		<a id="goTop" class="to-top" href="#" title="<?php esc_attr_e('To Top', 'superb-ecommerce'); ?>">
			<i class="fa fa-angle-double-up"></i>
		</a>
	<?php endif; ?>


</footer><!-- #colophon -->


<div id="smobile-menu" class="mobile-only"></div>
<div id="mobile-menu-overlay"></div>

<?php wp_footer(); ?>
</body>
</html>
