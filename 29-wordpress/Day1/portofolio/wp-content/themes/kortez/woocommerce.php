<?php
/**
 * The template for displaying archived woocommerce products
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @package Kortez
 */
get_header();

$wooSidebarClass = kortez_get_woo_sidebar_class();
$wooFinalClass = 'col-12';
?>
<div id="content" class="site-content">
	<div class="container">
		<section class="wrap-detail-page ">
			<?php if( kortez_wooCom_is_product_page() || kortez_wooCom_is_shop() ){
				if( ( kortez_wooCom_is_product_page() && !get_theme_mod( 'disable_single_product_title', true ) ) || ( kortez_wooCom_is_shop() && !get_theme_mod( 'disable_shop_page_title', false ) ) ){ ?>
					<h1 class="page-title">
						<?php woocommerce_page_title(); ?>
					</h1>
				<?php } ?>
			<?php }else{ ?>
				<h1 class="page-title">
					<?php woocommerce_page_title(); ?>
				</h1>
			<?php } ?>
				<?php
				if( !kortez_wooCom_is_product_page() ){
					if( get_theme_mod( 'breadcrumbs_controls', 'show_in_all_page_post' ) == 'disable_in_all_pages' || get_theme_mod( 'breadcrumbs_controls', 'show_in_all_page_post' ) == 'show_in_all_page_post' ){
						kortez_breadcrumb_wrap();
					}
				} ?>
				<div class="row">
					<?php
					if( !kortez_wooCom_is_product_page() ){
						$wooFinalClass = $wooSidebarClass[ 'sidebarClass' ];
						if( !get_theme_mod( 'disable_sidebar_woocommerce_shop', false ) ){
							kortez_woo_product_detail_left_sidebar( $wooSidebarClass[ 'sidebarColumnClass' ] );
						}
					}	
					?>
					
					<div id="primary" class="content-area <?php echo esc_attr( $wooFinalClass ); ?>">
						<main id="main" class="site-main post-detail-content woocommerce-products" role="main">
							<?php if ( have_posts() ) :
								woocommerce_content();
							endif;
							?>
						</main><!-- #main -->
					</div><!-- #primary -->
					<?php
					if( !kortez_wooCom_is_product_page() ){
						if( !get_theme_mod( 'disable_sidebar_woocommerce_shop', false ) ){
							kortez_woo_product_detail_right_sidebar( $wooSidebarClass[ 'sidebarColumnClass' ] );
						}
					}
					?>
				</div>
		</section>
	</div><!-- #container -->
</div><!-- #content -->
<?php
get_footer();
