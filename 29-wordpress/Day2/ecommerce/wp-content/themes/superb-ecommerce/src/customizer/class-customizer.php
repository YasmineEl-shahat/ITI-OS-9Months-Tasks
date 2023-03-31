<?php

namespace superb_ecommerce_SuperbThemesCustomizer;

use superb_ecommerce_SuperbThemesCustomizer\CustomizerPanels;
use superb_ecommerce_SuperbThemesCustomizer\CustomizerSections;
use superb_ecommerce_SuperbThemesCustomizer\CustomizerControls;

use superb_ecommerce_SuperbThemesCustomizer\Utils\RefocusButtonControl;
use superb_ecommerce_SuperbThemesCustomizer\Utils\CustomizerRefocusButton;

class CustomizerController
{
    private static $CustomizerObject = false;
    private static $RefocusButtons = array();

    public function __construct()
    {
        add_action('customize_register', array($this, 'superbthemes_customizer_customize_register_init' ));
        add_action('customize_controls_enqueue_scripts', array( $this, 'superbthemes_customizer_customizer_scripts' ));
        add_action('customize_controls_print_footer_scripts', array($this, 'superbthemes_customizer_customizer_footer_scripts'));
        add_action('customize_preview_init', array($this, 'superbthemes_customizer_preview_scripts' ));
        add_action('wp_head', array($this, 'superbthemes_customizer_css_final_output'));
    }

    public function superbthemes_customizer_customize_register_init($wp_customize)
    {
        self::$CustomizerObject = $wp_customize;
        new CustomizerPanels();
        new CustomizerSections();
        new CustomizerControls();

        /* Overwrite values */
        $this->OverwriteValues();
        /* */

        self::$CustomizerObject = false;
    }


    private function OverwriteValues()
    {
        $wp_customize = self::$CustomizerObject;
        if (isset($wp_customize->selective_refresh)) {
            $wp_customize->selective_refresh->add_partial('blogname', array(
                'selector'        => '.logofont',
                'render_callback' => array($this, 'superbthemes_customizer_customize_partial_blogname'),
            ));
            $wp_customize->selective_refresh->add_partial('blogdescription', array(
                'selector'        => '.logodescription',
                'render_callback' => array($this, 'superbthemes_customizer_customize_partial_blogdescription'),
            ));
        }

        $wp_customize->get_section('background_image')->title = __('Site Background', 'superb-ecommerce');
        $wp_customize->get_control('background_color')->section = 'background_image';

        $wp_customize->get_control('header_textcolor')->section = CustomizerPanels::COLORS.CustomizerSections::NAVIGATION;
        $wp_customize->get_control('header_textcolor')->label = __('Logo Color', 'superb-ecommerce');
        $wp_customize->get_control('header_textcolor')->description =__('Sets the text colors for the logo.', 'superb-ecommerce');

        $wp_customize->get_control('header_image')->section = CustomizerPanels::HEADER.CustomizerSections::HEADER_DEFAULT;
        $wp_customize->get_section(CustomizerPanels::HEADER.CustomizerSections::HEADER_DEFAULT)->title = __('Default Header', 'superb-ecommerce');
    }

    public function superbthemes_customizer_preview_scripts()
    {
        wp_enqueue_script('superb-ecommerce-customizer-preview', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), wp_get_theme()->Version, true);
    }

    public function superbthemes_customizer_customizer_scripts()
    {
        wp_enqueue_style('superb-ecommerce-customizer-css', get_template_directory_uri() . '/css/customizer.css', array(), wp_get_theme()->Version);
    }

    public function superbthemes_customizer_customizer_footer_scripts()
    {
        echo '<script id="superbthemes-customizer-refocus-buttons">';
        foreach (self::$RefocusButtons as $RefocusButton) {
            echo "
			wp.customize.control( '".esc_attr($RefocusButton->GetWrapperId())."', function( control ) {
				control.container.find( '.superbthemes-customizer-refocus-button' ).on( 'click', function() {
					wp.customize.".esc_html($RefocusButton->GetType())."( '".esc_attr($RefocusButton->GetRefocusId())."' ).focus();
					} );
					} );
					";
        }
        echo '</script>';
    }

    public static function AddRefocusButtonToScripts($button)
    {
        if ($button instanceof CustomizerRefocusButton) {
            self::$RefocusButtons[] = $button;
        }
    }

    public static function GetCustomizerObject()
    {
        return self::$CustomizerObject;
    }

    /**
     * Render the site title for the selective refresh partial.
     *
     * @return void
    */
    public function superbthemes_customizer_customize_partial_blogname()
    {
        bloginfo('name');
    }

    /**
     * Render the site tagline for the selective refresh partial.
     *
     * @return void
    */
    public function superbthemes_customizer_customize_partial_blogdescription()
    {
        bloginfo('description');
    }

    public function superbthemes_customizer_css_final_output()
    {
        ?>

    	<style type="text/css">

    		<?php if (get_theme_mod(CustomizerControls::BLOGFEED_TWO_COLUMNS) == '') : ?>
    			.all-blog-articles {
    				display: block;
    			}
    			.add-blog-to-sidebar .all-blog-articles .blogposts-list {
    				width: 100%;
    				max-width: 100%;
    				flex: 100%;
    			}
    		<?php else : ?>
    		<?php endif; ?>
    		<?php if (get_theme_mod(CustomizerControls::BLOGFEED_HIDE_BYLINE_AUTHOR) == '1') : ?>
    			.post-author-wrapper {
    				display:none;
    			}
    		<?php endif; ?>
    		<?php if (get_theme_mod(CustomizerControls::SIDEBAR_WOOCOMMERCE_HIDE) == '1') : ?>
    			.woocommerce-page .wc-sidebar-wrapper {
    				display: none;
    			}
    			.woocommerce-page .featured-content {
    				width: 100%;
    				margin-right: 0px;
    			}
    		<?php endif; ?>


    		<?php if (get_theme_mod(CustomizerControls::SINGLE_HIDE_NEXT_PREV) == '1') : ?>
    			.nav-links,
    			.single .navigation.post-navigation {
    				display:none;
    			}
    		<?php endif; ?>
    		#secondary { background-color: <?php echo esc_attr(get_theme_mod('sidebar_bgc')); ?>;}
    		.woocommerce-page, .woocommerce-page.archive, .woocommerce-page.single-product, .woocommerce-shop { background-color: <?php echo esc_attr(get_theme_mod('woocommerce_bg_color')); ?>;}
    		a.cart-customlocation svg, a.cart-customlocation svg * { color: <?php echo esc_attr(get_theme_mod(CustomizerControls::NAVIGATION_COLOR_SHOPPING_CART)); ?>; }
    		a.cart-customlocation span.cart-icon-number{ background: <?php echo esc_attr(get_theme_mod(CustomizerControls::NAVIGATION_COLOR_SHOPPING_CART)); ?>; }
    		a.read-story{ color: <?php echo esc_attr(get_theme_mod(CustomizerControls::BLOGFEED_COLOR_BUTTON_TEXT)); ?>; }
    		a.read-story{ background: <?php echo esc_attr(get_theme_mod(CustomizerControls::BLOGFEED_COLOR_BUTTON_BACKGROUND)); ?>; }
    		#secondary *{ border-color: <?php echo esc_attr(get_theme_mod(CustomizerControls::SIDEBAR_COLOR_BORDER)); ?>; }
    		body, .site, .swidgets-wrap h3, .post-data-text { background: <?php echo esc_attr(get_theme_mod('website_background_color')); ?>; }
    		.site-title a, .logofont, .site-description { color: <?php echo esc_attr(get_theme_mod('header_logo_color')); ?>; }
    		.sheader { background-color: <?php echo esc_attr(get_theme_mod('header_background_color')); ?> !important; }
    		.main-navigation ul li a, .main-navigation ul li .sub-arrow, .super-menu .toggle-mobile-menu,.toggle-mobile-menu:before, .mobile-menu-active .smenu-hide { color: <?php echo esc_attr(get_theme_mod(CustomizerControls::NAVIGATION_COLOR_TEXT)); ?>; }
    		#smobile-menu.show .main-navigation ul ul.children.active, #smobile-menu.show .main-navigation ul ul.sub-menu.active, #smobile-menu.show .main-navigation ul li, .smenu-hide.toggle-mobile-menu.menu-toggle, #smobile-menu.show .main-navigation ul li, .primary-menu ul li ul.children li, .primary-menu ul li ul.sub-menu li, .primary-menu .pmenu, .super-menu { border-color: <?php echo esc_attr(get_theme_mod(CustomizerControls::NAVIGATION_COLOR_BORDERS)); ?>; border-bottom-color: <?php echo esc_attr(get_theme_mod(CustomizerControls::NAVIGATION_COLOR_BORDERS)); ?>; }
    		#secondary .widget h3, #secondary .widget h3 a, #secondary .widget h4, #secondary .widget h1, #secondary .widget h2, #secondary .widget h5, #secondary .widget h6, #secondary .widget h4 a { color: <?php echo esc_attr(get_theme_mod(CustomizerControls::SIDEBAR_COLOR_HEADLINE)); ?>; }
    		#secondary .widget-title:after{ background: <?php echo esc_attr(get_theme_mod(CustomizerControls::SIDEBAR_COLOR_HEADLINE)); ?>; }
    		#secondary .widget a, #secondary a, #secondary .widget li a , #secondary span.sub-arrow{ color: <?php echo esc_attr(get_theme_mod(CustomizerControls::SIDEBAR_COLOR_LINK)); ?>; }
    		#secondary, #secondary .widget, #secondary .widget p, #secondary .widget li, .widget time.rpwe-time.published { color: <?php echo esc_attr(get_theme_mod(CustomizerControls::SIDEBAR_COLOR_TEXT)); ?>; }
    		#secondary .swidgets-wrap, #secondary .widget ul li, .featured-sidebar .search-field { border-color: <?php echo esc_attr(get_theme_mod(CustomizerControls::SIDEBAR_COLOR_BORDER)); ?>; }
    		.site-info, .footer-column-three input.search-submit, .footer-column-three p, .footer-column-three li, .footer-column-three td, .footer-column-three th, .footer-column-three caption { color: <?php echo esc_attr(get_theme_mod(CustomizerControls::FOOTER_COLOR_TEXT)); ?>; }
    		.footer-column-three h3, .footer-column-three h4, .footer-column-three h5, .footer-column-three h6, .footer-column-three h1, .footer-column-three h2, .footer-column-three h4, .footer-column-three h3 a { color: <?php echo esc_attr(get_theme_mod(CustomizerControls::FOOTER_COLOR_HEADLINE)); ?>; }
    		.site-footer a, .footer-column-three a, .footer-column-three li a, .footer-column-three .widget a, .footer-column-three .sub-arrow { color: <?php echo esc_attr(get_theme_mod(CustomizerControls::FOOTER_COLOR_LINK)); ?>; }
    		.footer-column-three h3:after { background: <?php echo esc_attr(get_theme_mod(CustomizerControls::FOOTER_COLOR_BORDER)); ?>; }
    		.site-info, .widget ul li, .footer-column-three input.search-field, .footer-column-three input.search-submit { border-color: <?php echo esc_attr(get_theme_mod(CustomizerControls::FOOTER_COLOR_BORDER)); ?>; }
    		.site-footer { background-color: <?php echo esc_attr(get_theme_mod(CustomizerControls::FOOTER_COLOR_BACKGROUND)); ?>; }
    		#goTop { background-color: <?php echo esc_attr(get_theme_mod(CustomizerControls::FOOTER_COLOR_GOTOTOP)); ?>; }
    		#goTop:hover { background-color: <?php echo esc_attr(get_theme_mod(CustomizerControls::FOOTER_COLOR_GOTOTOP_HOVER)); ?>; }
    		.content-wrapper h2.entry-title a, .content-wrapper h2.entry-title a:hover, .content-wrapper h2.entry-title a:active, .content-wrapper h2.entry-title a:focus, .archive .page-header h1, .blogposts-list h2 a, .blogposts-list h2 a:hover, .blogposts-list h2 a:active, .search-results h1.page-title { color: <?php echo esc_attr(get_theme_mod(CustomizerControls::BLOGFEED_COLOR_HEADLINE)); ?>; }
    		.all-blog-articles .entry-meta, .all-blog-articles .entry-meta a, .all-blog-articles .blog-data-wrapper, .all-blog-articles .blog-data-wrapper a{ color: <?php echo esc_attr(get_theme_mod(CustomizerControls::BLOGFEED_COLOR_BYLINE)); ?>; }
    		.blogposts-list p, .blogposts-list .entry-content { color: <?php echo esc_attr(get_theme_mod(CustomizerControls::BLOGFEED_COLOR_TEXT)); ?>; }
    		.page-numbers li a, .blogposts-list .blogpost-button { background: <?php echo esc_attr(get_theme_mod(CustomizerControls::BLOGFEED_COLOR_BUTTON_BACKGROUND)); ?>; }
    		.page-numbers li a, .blogposts-list .blogpost-button, span.page-numbers.dots, .page-numbers.current, .page-numbers li a:hover { color: <?php echo esc_attr(get_theme_mod(CustomizerControls::BLOGFEED_COLOR_BUTTON_TEXT)); ?>; }
    		.archive .page-header h1, .search-results h1.page-title, .blogposts-list.fbox, span.page-numbers.dots, .page-numbers li a, .page-numbers.current { border-color: <?php echo esc_attr(get_theme_mod('blogfeed_border_color')); ?>; }
    		.blogposts-list .post-data-divider { background: <?php echo esc_attr(get_theme_mod('blogfeed_border_color')); ?>; }
    		.related-posts h4.entry-title a, .page .comments-area .comment-author, .page .comments-area .comment-author a, .page .comments-area .comments-title, .page .content-area h1, .page .content-area h2, .page .content-area h3, .page .content-area h4, .page .content-area h5, .page .content-area h6, .page .content-area th, .single  .comments-area .comment-author, .single .comments-area .comment-author a, .single .comments-area .comments-title, .single .content-area h1, .single .content-area h2, .single .content-area h3, .single .content-area h4, .single .content-area h5, .single .content-area h6, .single .content-area th, .search-no-results h1, .error404 h1 { color: <?php echo esc_attr(get_theme_mod(CustomizerControls::SINGLE_COLOR_HEADLINE)); ?>; }
    		.single .entry-meta, .single .entry-meta a, .single .blog-data-wrapper, .single .blog-data-wrapper a, .page .entry-meta, .page .entry-meta a, .page .blog-data-wrapper, .page .blog-data-wrapper a { color: <?php echo esc_attr(get_theme_mod(CustomizerControls::SINGLE_COLOR_HEADLINE)); ?>; }
    		.about-the-author-description, .page .content-area p, .page article, .page .content-area table, .page .content-area dd, .page .content-area dt, .page .content-area address, .page .content-area .entry-content, .page .content-area li, .page .content-area ol, .single .content-area p, .single article, .single .content-area table, .single .content-area dd, .single .content-area dt, .single .content-area address, .single .entry-content, .single .content-area li, .single .content-area ol, .search-no-results .page-content p { color: <?php echo esc_attr(get_theme_mod(CustomizerControls::SINGLE_COLOR_TEXT)); ?>; }
    		.single .entry-content a, .page .entry-content a, .comment-content a, .comments-area .reply a, .logged-in-as a, .comments-area .comment-respond a { color: <?php echo esc_attr(get_theme_mod(CustomizerControls::SINGLE_COLOR_LINK)); ?>; }
    		#main .post-navigation .nav-links .nav-previous, #main .post-navigation .nav-links .nav-next, .related-posts a.read-more, .nav-next a, .nav-previous a, .comments-area p.form-submit input { background: <?php echo esc_attr(get_theme_mod(CustomizerControls::SINGLE_COLOR_BUTTON_BACKGROUND)); ?>; }
    		.error404 .page-content p, .error404 input.search-submit, .search-no-results input.search-submit { color: <?php echo esc_attr(get_theme_mod(CustomizerControls::SINGLE_COLOR_TEXT)); ?>; }
    		.related-posts-headline h3, .category-and-tags, .page .comments-area, .page article.fbox, .page article tr, .page .comments-area ol.comment-list ol.children li, .page .comments-area ol.comment-list .comment, .single .comments-area, .single article.fbox, .single article tr, .comments-area ol.comment-list ol.children li, .comments-area ol.comment-list .comment, .error404 main#main, .error404 .search-form label, .search-no-results .search-form label, .error404 input.search-submit, .search-no-results input.search-submit, .error404 main#main, .search-no-results section.fbox.no-results.not-found, .related-posts-headline h3{ border-color: <?php echo esc_attr(get_theme_mod('postpage_border_color')); ?>; }
    		.single .post-data-divider, .page .post-data-divider { background: <?php echo esc_attr(get_theme_mod(CustomizerControls::SINGLE_COLOR_BORDER)); ?>; }
    		.related-posts a.read-more, .nav-next a, .nav-previous a, .single .comments-area p.form-submit input, .page .comments-area p.form-submit input { color: <?php echo esc_attr(get_theme_mod(CustomizerControls::SINGLE_COLOR_BUTTON_TEXT)); ?>; }
    		.bottom-header-wrapper { padding-top: <?php echo esc_attr(get_theme_mod('banner_img_top_padding')); ?>px; }
    		.bottom-header-wrapper { padding-bottom: <?php echo esc_attr(get_theme_mod('banner_img_padding_bottom')); ?>px; }
    		.bottom-header-wrapper { background: <?php echo esc_attr(get_theme_mod('imagebanner_background_color')); ?>; }
    		.bottom-header-wrapper *{ color: <?php echo esc_attr(get_theme_mod('imagebanner_text_color')); ?>; }
    		.header-widget a, .header-widget li a, .header-widget i.fa { color: <?php echo esc_attr(get_theme_mod(CustomizerControls::UPPERWIDGETS_LINK_COLOR)); ?>; }
    		.header-widget, .header-widget p, .header-widget li, .header-widget .textwidget { color: <?php echo esc_attr(get_theme_mod(CustomizerControls::UPPERWIDGETS_TEXT_COLOR)); ?>; }
    		.header-widget .widget-title, .header-widget h1, .header-widget h3, .header-widget h2, .header-widget h4, .header-widget h5, .header-widget h6{ color: <?php echo esc_attr(get_theme_mod(CustomizerControls::UPPERWIDGETS_TITLE_COLOR)); ?>; }
    		.header-widgets-three *, .header-widgets-three input { border-color: <?php echo esc_attr(get_theme_mod(CustomizerControls::UPPERWIDGETS_BORDER_COLOR)); ?>; }
    		.bottom-header-title, .bottom-header-paragraph{ color: <?php echo esc_attr(get_theme_mod(CustomizerControls::HEADER_COLOR_TEXT)); ?>; }
    		#secondary .widget-title-lines:after, #secondary .widget-title-lines:before { background: <?php echo esc_attr(get_theme_mod(CustomizerControls::SIDEBAR_COLOR_HEADLINE)); ?>; }
    		.header-button-wrap a{ background: <?php echo esc_attr(get_theme_mod(CustomizerControls::HEADER_COLOR_BUTTON_BG)); ?>; }
    		.header-button-wrap a{ color: <?php echo esc_attr(get_theme_mod(CustomizerControls::HEADER_COLOR_BUTTON_TEXT)); ?>; }
    		.header-widgets-three{ background: <?php echo esc_attr(get_theme_mod(CustomizerControls::UPPERWIDGETS_BG_COLOR)); ?>; }
    		.top-nav-wrapper, .primary-menu .pmenu, .super-menu, #smobile-menu, .primary-menu ul li ul.children, .primary-menu ul li ul.sub-menu { background-color: <?php echo esc_attr(get_theme_mod(CustomizerControls::NAVIGATION_COLOR_BACKGROUND)); ?>; }
    		#secondary .swidget { border-color: <?php echo esc_attr(get_theme_mod(CustomizerControls::SIDEBAR_COLOR_BORDER)); ?>; }
    		.archive article.fbox, .search-results article.fbox, .blog article.fbox { background: <?php echo esc_attr(get_theme_mod(CustomizerControls::BLOGFEED_COLOR_BACKGROUND)); ?>; }
    		.related-posts, .about-the-author, .comments-area, .single article.fbox, .page article.fbox { background: <?php echo esc_attr(get_theme_mod(CustomizerControls::SINGLE_COLOR_BACKGROUND)); ?>; }

    		.page-numbers.next:hover, .page-numbers.prev:hover, ul.page-numbers li span.current, .page-numbers li .page-numbers, .page-numbers li .page-numbers{ color: <?php echo esc_attr(get_theme_mod(CustomizerControls::BLOGFEED_COLOR_PAGINATION_TEXT)); ?>; }
    		.page-numbers.next:hover, .page-numbers.prev:hover, ul.page-numbers li span.current, .page-numbers li .page-numbers, .page-numbers li a{ background: <?php echo esc_attr(get_theme_mod(CustomizerControls::BLOGFEED_COLOR_PAGINATION_BACKGROUND)); ?>; }
    		.page-numbers li .page-numbers{ border-color: <?php echo esc_attr(get_theme_mod('pagination_border_color')); ?>; }

    		<?php if (get_theme_mod(CustomizerControls::HEADER_BUTTON_HIDE_MOBILE) == '1') : ?>
    			@media (max-width:992px) {				
    				.header-button-wrap a {
    					display:none;
    				}
    			}
    		<?php endif; ?>
    		<?php if (get_theme_mod(CustomizerControls::HEADER_TAGLINE_HIDE_MOBILE) == '1') : ?>
    			@media (max-width:992px) {				
    				.bottom-header-paragraph {
    					display:none;
    				}
    			}
    		<?php endif; ?>

    	</style>
    	<?php
    }
}
