<?php

namespace superb_ecommerce_SuperbThemesCustomizer;

use superb_ecommerce_SuperbThemesCustomizer\Utils\CustomizerItem;
use superb_ecommerce_SuperbThemesCustomizer\Utils\CustomizerType;
use superb_ecommerce_SuperbThemesCustomizer\CustomizerPanels;

include_once ABSPATH . 'wp-admin/includes/plugin.php';

class CustomizerSections
{
    const HEADER_METASLIDER = 'superbthemes_customizer_section_header_metaslider';
    const HEADER_DEFAULT = 'superbthemes_customizer_section_header_default';
    const NAVIGATION = 'superbthemes_customizer_section_navigation';
    const WIDGETS = 'superbthemes_customizer_section_widgets';
    const BLOG = 'superbthemes_customizer_section_blog';
    const SINGLE = 'superbthemes_customizer_section_single';
    const SIDEBAR = 'superbthemes_customizer_section_sidebar';
    const FOOTER = 'superbthemes_customizer_section_footer';
    const COPYRIGHT = 'superbthemes_customizer_section_copyright';
    const WOOCOMMERCE = 'superbthemes_customizer_section_woocommerce';

    public function __construct()
    {
        new CustomizerItem(self::NAVIGATION, array(
            "type" => CustomizerType::SECTION,
            "label" => __('Navigation', 'superb-ecommerce'),
            "description" =>__('Customize the navigation.', 'superb-ecommerce'),
            "parents" => array(CustomizerPanels::LAYOUT, CustomizerPanels::COLORS)
        ));
        if (is_plugin_active("ml-slider/ml-slider.php") || is_plugin_active("ml-slider-pro/ml-slider-pro.php")) {
            new CustomizerItem(self::HEADER_METASLIDER, array(
                "type" => CustomizerType::SECTION,
                "label" => __('MetaSlider Header', 'superb-ecommerce'),
                "description" =>__('MetaSlider Header requires the MetaSlider plugin. Using the MetaSlider header will replace the default theme header.', 'superb-ecommerce'),
                "parents" => array(CustomizerPanels::HEADER)
            ));
        }
        new CustomizerItem(self::HEADER_DEFAULT, array(
            "type" => CustomizerType::SECTION,
            "label" => __('Header', 'superb-ecommerce'),
            "description" =>__('Customize the default theme header. These settings do not apply if you\'re using the MetaSlider header.', 'superb-ecommerce'),
            "parents" => array(CustomizerPanels::HEADER, CustomizerPanels::COLORS)
        ));

        new CustomizerItem(self::SIDEBAR, array(
            "type" => CustomizerType::SECTION,
            "label" => __('Sidebar', 'superb-ecommerce'),
            "description" =>__('Customize the sidebar.', 'superb-ecommerce'),
            "parents" => array(CustomizerPanels::LAYOUT)
        ));

        new CustomizerItem(self::BLOG, array(
            "type" => CustomizerType::SECTION,
            "label" => __('Blog', 'superb-ecommerce'),
            "description" =>__('Customize the blog feed.', 'superb-ecommerce'),
            "parents" => array(CustomizerPanels::LAYOUT)
        ));

        new CustomizerItem(self::SINGLE, array(
            "type" => CustomizerType::SECTION,
            "label" => __('Posts / Pages', 'superb-ecommerce'),
            "description" =>__('Customize Posts and Pages.', 'superb-ecommerce'),
            "parents" => array(CustomizerPanels::LAYOUT)
        ));
    }
}
