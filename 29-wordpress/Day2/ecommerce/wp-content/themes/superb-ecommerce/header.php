<?php
use superb_ecommerce_SuperbThemesCustomizer\CustomizerControls;

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Superb eCommerce
 */

?>
<!doctype html>
	<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>
		<a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'superb-ecommerce'); ?></a>

		<header id="masthead" class="sheader site-header clearfix">
			<nav id="primary-site-navigation" class="primary-menu main-navigation clearfix">

				<a href="#" id="pull" class="smenu-hide toggle-mobile-menu menu-toggle" aria-controls="secondary-menu" aria-expanded="false"><?php esc_html_e('Menu', 'superb-ecommerce'); ?></a>
				<div class="top-nav-wrapper">
					<div class="content-wrap">
						<div class="header-content-container">
							<div class="logo-container"> 
								<?php if (has_custom_logo()) : ?>
									<?php the_custom_logo(); ?>
								<?php endif; ?>
								<a class="logofont site-title" href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
								<?php if (get_theme_mod('navigation_hide_tagline') == '') : ?>
									<p class="logodescription site-description"><?php bloginfo('description'); ?></p>
								<?php else : ?>
								<?php endif; ?>
							</div>
							<div class="center-main-menu">
								<?php if (class_exists('WooCommerce') && get_theme_mod(CustomizerControls::NAVIGATION_HIDE_CART) == '') : ?>
								<div class="wc-nav-content">
								<?php endif; ?>
								<?php
                                wp_nav_menu(array(
                                    'theme_location'	=> 'menu-1',
                                    'menu_id'			=> 'primary-menu',
                                    'menu_class'		=> 'pmenu'
                                ));
?>
								<?php if (class_exists('WooCommerce') && get_theme_mod(CustomizerControls::NAVIGATION_HIDE_CART) == '') : ?>
								<div class="cart-header cart-header-desktop">
									<a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr('View your shopping cart'); ?>">
										<svg aria-hidden="true" role="img" focusable="false" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"> <path d="M21.9353 20.0337L20.7493 8.51772C20.7003 8.0402 20.2981 7.67725 19.8181 7.67725H4.21338C3.73464 7.67725 3.33264 8.03898 3.28239 8.51523L2.06458 20.0368C1.96408 21.0424 2.29928 22.0529 2.98399 22.8097C3.66874 23.566 4.63999 24.0001 5.64897 24.0001H18.3827C19.387 24.0001 20.3492 23.5747 21.0214 22.8322C21.7031 22.081 22.0361 21.0623 21.9353 20.0337ZM19.6348 21.5748C19.3115 21.9312 18.8668 22.1275 18.3827 22.1275H5.6493C5.16836 22.1275 4.70303 21.9181 4.37252 21.553C4.042 21.1878 3.88005 20.7031 3.92749 20.2284L5.056 9.55014H18.9732L20.0724 20.2216C20.1223 20.7281 19.9666 21.2087 19.6348 21.5748Z" fill="currentColor"></path> <path d="M12.1717 0C9.21181 0 6.80365 2.40811 6.80365 5.36803V8.6138H8.67622V5.36803C8.67622 3.44053 10.2442 1.87256 12.1717 1.87256C14.0992 1.87256 15.6674 3.44053 15.6674 5.36803V8.6138H17.5397V5.36803C17.5397 2.40811 15.1316 0 12.1717 0Z" fill="currentColor"></path> </svg>
										<span class="cart-icon-number"><?php echo WC()->cart->get_cart_contents_count(); ?></span> 

										<div class="cart-preview">
											<?php
            global $woocommerce;
								    $items = $woocommerce->cart->get_cart();

								    foreach ($items as $item => $values) {
								        $_product =  wc_get_product($values['data']->get_id());
								        echo "<div class='cart-preview-tem'>";
								        $getProductDetail = wc_get_product($values['product_id']);
								        echo "<div class='thumb-container'>";
								        echo $getProductDetail->get_image('thumb');
								        echo "</div>";
								        echo "".$values['quantity']. ' x '.$_product->get_title();
								        $price = $values['data']->get_price();
								        echo "<span>";
								        echo get_woocommerce_currency_symbol();
								        echo "".esc_html($price)."</span></div>";
								    }
								    ?>
										</div>
									</a>
								</div>
							<?php endif; ?>
							<?php if (class_exists('WooCommerce') && get_theme_mod(CustomizerControls::NAVIGATION_HIDE_CART) == '') : ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</nav>

<div class="super-menu clearfix">
	<div class="super-menu-inner">
		<div class="header-content-container">
			<div class="mob-logo-wrap">
				<?php if (has_custom_logo()) : ?>
					<?php the_custom_logo(); ?>
				<?php endif; ?>
				<a class="logofont site-title" href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
				<?php if (get_theme_mod('navigation_hide_tagline') == '') : ?>
					<p class="logodescription site-description"><?php bloginfo('description'); ?></p>
				<?php else : ?>
				<?php endif; ?>
			</div>



			<a href="#" id="pull" class="toggle-mobile-menu menu-toggle" aria-controls="secondary-menu" aria-expanded="false"></a>
		</div>
	</div>
</div>
<div id="mobile-menu-overlay"></div>
</header>

<?php
// Maybe use MetaSlider
$superb_ecommerce_overwrite_slider_shortcode = get_theme_mod('header_metaslider_overwrite');
if (!empty($superb_ecommerce_overwrite_slider_shortcode) && shortcode_exists("metaslider") && has_shortcode($superb_ecommerce_overwrite_slider_shortcode, "metaslider")) {
    if (get_theme_mod('only_show_header_frontpage_metaslider') == '') {
        if (is_front_page()) {
            superb_ecommerce_theme_metaslider_header_output();
        }
    } else {
        superb_ecommerce_theme_metaslider_header_output();
    }

// else use the default theme header
} else {
    if (get_theme_mod('only_show_header_frontpage') == '') {
        if (is_front_page()) {
            superb_ecommerce_default_theme_header_output();
        }
    } else {
        superb_ecommerce_default_theme_header_output();
    }
} ?>

<div class="content-wrap">
	<!-- Upper widgets -->
	<div class="header-widgets-wrapper">
		<?php if (is_active_sidebar('headerwidget-1')) : ?>
			<div class="header-widgets-three header-widgets-left">
				<?php dynamic_sidebar('headerwidget-1'); ?>
			</div>
		<?php endif; ?>

		<?php if (is_active_sidebar('headerwidget-2')) : ?>
			<div class="header-widgets-three header-widgets-middle">
				<?php dynamic_sidebar('headerwidget-2'); ?>
			</div>
		<?php endif; ?>

		<?php if (is_active_sidebar('headerwidget-3')) : ?>
			<div class="header-widgets-three header-widgets-right">
				<?php dynamic_sidebar('headerwidget-3'); ?>				
			</div>
		<?php endif; ?>
	</div>
	<!-- / Upper widgets -->
</div>


<?php
function superb_ecommerce_default_theme_header_output()
{
    ?>
	<!-- Header img -->
	<?php if (get_header_image()) : ?>
		<div class="bottom-header-wrapper">
			<div class="bottom-header-text">
				<?php if (get_theme_mod('header_img_text')) : ?>
					<div class="content-wrap">
						<div class="bottom-header-title"><?php echo wp_kses_post(get_theme_mod('header_img_text')) ?></div>
					</div>
				<?php endif; ?>
				<?php if (get_theme_mod('header_img_text_tagline')) : ?>
					<div class="content-wrap">
						<div class="bottom-header-paragraph"><?php echo wp_kses_post(get_theme_mod('header_img_text_tagline')) ?></div>
					</div>
				<?php endif; ?>
				<!-- Button start -->
				<div class="header-button-wrap">
					<?php if (get_theme_mod('header_img_button_text')) : ?><a href="<?php echo esc_url(get_theme_mod('header_img_button_link')) ?>"><?php echo wp_kses_post(get_theme_mod('header_img_button_text')) ?></a><?php endif; ?>
				</div>
				<!-- Button end -->

			</div>
			<img src="<?php echo esc_url((get_header_image())); ?>" alt="<?php echo esc_attr((get_bloginfo('title'))); ?>" />
		</div>
	<?php endif; ?>
	<!-- / Header img -->
	<?php
}

function superb_ecommerce_theme_metaslider_header_output()
{
    echo '<!-- MetaSlider Header -->';
    echo do_shortcode(get_theme_mod('header_metaslider_overwrite'));
    echo '<!-- / MetaSlider Header -->';
}
?>