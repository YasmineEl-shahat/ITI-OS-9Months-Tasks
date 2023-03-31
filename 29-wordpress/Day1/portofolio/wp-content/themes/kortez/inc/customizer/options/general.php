<?php
/**
 * General Customizer options
 *
 * @package Kortez
 */

/**
 * Site Identity
 */
Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Logo Image Width', 'kortez' ),
	'type'         => 'slider',
	'settings'     => 'logo_width',
	'section'      => 'title_tagline',
	'transport'    => 'postMessage',
	'priority'     => '8',
	'default'      => 270,
	'choices'      => array(
		'min'  => 50,
		'max'  => 270,
		'step' => 5,
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Disable Site Title', 'kortez' ),
	'type'         => 'checkbox',
	'settings'     => 'disable_site_title',
	'section'      => 'title_tagline',
	'priority'     => '10',
	'default'      => false,
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Disable Site Tagline', 'kortez' ),
	'type'         => 'checkbox',
	'settings'     => 'disable_site_tagline',
	'section'      => 'title_tagline',
	'priority'     => '20',
	'default'      => false,
) );

/**
 * Colors
 */
Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Body Text Color', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'site_body_text_color',
	'section'      => 'colors',
	'default'      => '#333333',
	'priority'     => '20',
	'active_callback' => array(
		array(
			'setting'  => 'skin_select',
			'operator' => 'contains',
			'value'    => array( 'default', 'blackwhite' ),
		),
	),

) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'General Heading Text Color (H1 - H6)', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'site_heading_text_color',
	'section'      => 'colors',
	'default'      => '#030303',
	'priority'     => '30',
	'active_callback' => array(
		array(
			'setting'  => 'skin_select',
			'operator' => 'contains',
			'value'    => array( 'default', 'blackwhite' ),
		),
	),

) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'General Link Text Color', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'site_general_link_color',
	'section'      => 'colors',
	'default'      => '#a6a6a6',
	'priority'     => '35',
	'active_callback' => array(
		array(
			'setting'  => 'skin_select',
			'operator' => 'contains',
			'value'    => array( 'default', 'blackwhite' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Page and Single Post Title', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'header_textcolor',
	'section'      => 'colors',
	'default'      => '#101010',
	'priority'     => '40',
	'active_callback' => array(
		array(
			'setting'  => 'skin_select',
			'operator' => 'contains',
			'value'    => array( 'default', 'blackwhite' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Primary Color', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'site_primary_color',
	'section'      => 'colors',
	'default'      => '#DB5362',
	'priority'     => '50',
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Hover Color', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'site_hover_color',
	'section'      => 'colors',
	'default'     => '#086abd',
	'priority'    => '60',
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Background Color', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'box_frame_background_color',
	'section'      => 'site_layout_style_options',
	'default'      => '',
	'priority'	   =>  20,
	'active_callback' => array(
		array(
			'setting'  => 'site_layout',
			'operator' => 'contains',
			'value'    => array( 'box', 'frame' ),
		),
		array(
			'setting'  => 'skin_select',
			'operator' => 'contains',
			'value'    => array( 'default', 'blackwhite' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Background Image', 'kortez' ),
	'type'         => 'image',
	'settings'     => 'box_frame_background_image',
	'section'      => 'site_layout_style_options',
	'default'      => '',
	'choices'     => array(
		'save_as' => 'id',
	),
	'priority'	  =>  30,
	'active_callback' => array(
		array(
			'setting'  => 'site_layout',
			'operator' => 'contains',
			'value'    => array( 'box', 'frame' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Background Image Size', 'kortez' ),
	'type'         => 'radio',
	'settings'     => 'box_frame_image_size',
	'section'      => 'site_layout_style_options',
	'default'      => 'cover',
	'choices'      => array(
		'cover'    => esc_html__( 'Cover', 'kortez' ),
		'pattern'  => esc_html__( 'Pattern / Repeat', 'kortez' ),
		'norepeat' => esc_html__( 'No Repeat', 'kortez' ),
	),
	'priority'	   =>  40,
	'active_callback' => array(
		array(
			'setting'  => 'site_layout',
			'operator' => 'contains',
			'value'    => array( 'box', 'frame' ),
		),
	),
) );

Kirki::add_section( 'site_layout_elements_options', array(
    'title'          => esc_html__( 'Elements', 'kortez' ),
    'panel'          => 'site_layout_options',
    'capability'     => 'edit_theme_options',
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Disable Site Layouts (Box & Frame) Shadow', 'kortez' ),
	'type'         => 'checkbox',
	'settings'     => 'disable_site_layout_shadow',
	'section'      => 'site_layout_elements_options',
	'default'      => false,
	'priority'	   =>  10,
	'active_callback' => array(
		array(
			'setting'  => 'site_layout',
			'operator' => 'contains',
			'value'    => array( 'box', 'frame' ),
		),
	),
) );

/**
 * Typography
 */
Kirki::add_section( 'typography', array(
    'title'          => esc_html__( 'Typography', 'kortez' ),
    'capability'     => 'edit_theme_options',
    'priority'       => '95',
    'reset'          => 'typography',
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Site Title', 'kortez' ),
	'type'         => 'typography',
	'settings'     => 'site_title_font_control',
	'section'      => 'typography',
	'default'  => array(
		'font-family'    => 'Poppins',
		'variant'        => '600',
		'font-size'      => '22px',
		'text-transform' => 'none',
	),
	'priority'	  =>  10,
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => '.site-header .site-branding .site-title',
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Site Description', 'kortez' ),
	'type'         => 'typography',
	'settings'     => 'site_description_font_control',
	'section'      => 'typography',
	'default'  => array(
		'font-family'    => 'Open Sans',
		'variant'        => 'regular',
		'font-size'      => '14px',
		'text-transform' => 'none',
	),
	'priority'	  =>  20,
	'transport'   => 'auto',
	'output'   => array(
		array(
			'element' => '.site-header .site-branding .site-description',
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Main Menu', 'kortez' ),
	'type'         => 'typography',
	'settings'     => 'main_menu_font_control',
	'section'      => 'typography',
	'default'  => array(
		'font-family'    => 'Open Sans',
		'font-size'      => '15px',
		'text-transform' => 'uppercase',
		'variant'        => '600',
		'line-height'    => '1.5',
	),
	'priority'	  =>  30,
	'transport'   => 'auto',
	'output'   => array(
		array(
			'element' => array( '.main-navigation ul.menu li a', '.slicknav_menu .slicknav_nav li a' )
		),
	),
) );

Kirki::add_field( 'kortez', array(
    'type'        => 'custom',
    'settings'    => 'main_menu_description_info',
    'section'     => 'typography',
    'default'     => esc_html__( 'Below Main Menu Description setting will work after enabling description section in the menu. Please check https://kortezthemes.com/docs/kortez/how-to-setup/how-to-setup-menu-description Documentation for more information.', 'kortez' ),
    'priority'	  =>  40,
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Main Menu Description', 'kortez' ),
	'type'         => 'typography',
	'settings'     => 'main_menu_description_font_control',
	'section'      => 'typography',
	'default'  => array(
		'font-family'    => 'Open Sans',
		'font-size'      => '11px',
		'text-transform' => 'none',
		'variant'        => 'regular',
		'line-height'    => '1.3',
	),
	'priority'	  =>  50,
	'transport'   => 'auto',
	'output'   => array(
		array(
			'element' => array( '.main-navigation .menu-description, .slicknav_menu .menu-description' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Body', 'kortez' ),
	'type'         => 'typography',
	'settings'     => 'body_font_control',
	'section'      => 'typography',
	'default'  => array(
		'font-family'    => 'Open Sans',
		'variant'        => 'regular',
		'font-size'      => '15px',
	),
	'priority'	  =>  60,
	'transport'   => 'auto',
	'output' => array( 
		array(
			'element' => 'body',
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'General Title (H1 - H6)', 'kortez' ),
	'type'         => 'typography',
	'settings'     => 'general_title_font_control',
	'section'      => 'typography',
	'default'  => array(
		'font-family'    => 'Poppins',
		'text-transform' => 'none',
	),
	'priority'	  =>  70,
	'transport'   => 'auto',
	'output'   => array(
		array(
			'element' => array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ),
		),
	),	
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Page & Single Post Title', 'kortez' ),
	'type'         => 'typography',
	'settings'     => 'page_title_font_control',
	'section'      => 'typography',
	'default'  => array(
		'font-family'    => 'Poppins',
		'variant'        => '600',
		'font-size'      => '48px',
		'text-transform' => 'none',
	),
	'priority'	  =>  80,
	'transport'   => 'auto',
	'output'   => array(
		array(
			'element' => array( '.page-title' ),
		),
	),
) );

/**
 * Sidebar
 */
Kirki::add_section( 'sidebar_options', array(
    'title'          => esc_html__( 'Sidebar', 'kortez' ),
    'capability'     => 'edit_theme_options',
    'priority'       => '98',
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Sidebar Layouts', 'kortez' ),
	'description' => esc_html__( 'Right / Left / Both / None', 'kortez' ),
	'type'        => 'radio-image',
	'settings'    => 'sidebar_settings',
	'section'     => 'sidebar_options',
	'default'     => 'right',
	'choices'  => array(
		'right'      => get_template_directory_uri() . '/assets/images/right-sidebar.png',
		'left'       => get_template_directory_uri() . '/assets/images/left-sidebar.png',
		'right-left' => get_template_directory_uri() . '/assets/images/right-left-sidebar.png',
		'no-sidebar' => get_template_directory_uri() . '/assets/images/no-sidebar.png',
	),
	'priority'	  =>  10,
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Widget Title Typography', 'kortez' ),
	'type'         => 'typography',
	'settings'     => 'sidebar_widget_title_font_control',
	'section'      => 'sidebar_options',
	'default'  => array(
		'font-family'    => 'Poppins',
		'variant'        => '500',
		'font-size'      => '16px',
		'text-transform' => 'uppercase',
		'line-height'    => '1.4',
	),
	'priority'	  =>  20,
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => '.sidebar .widget .widget-title',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'sidebar_settings',
			'operator' => 'contains',
			'value'    => array( 'right', 'left', 'right-left' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Disable Sidebar Widget Title Border', 'kortez' ),
	'type'         => 'checkbox',
	'settings'     => 'disable_sidebar_widget_title_border',
	'section'      => 'sidebar_options',
	'default'      => false,
	'priority'	   =>  30,
	'active_callback' => array(
		array(
			'setting'  => 'sidebar_settings',
			'operator' => 'contains',
			'value'    => array( 'right', 'left', 'right-left' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Disable Sticky Position', 'kortez' ),
	'type'         => 'checkbox',
	'settings'     => 'disable_sticky_sidebar',
	'section'      => 'sidebar_options',
	'default'      => false,
	'priority'	   =>  40,
	'active_callback' => array(
		array(
			'setting'  => 'sidebar_settings',
			'operator' => 'contains',
			'value'    => array( 'right', 'left', 'right-left' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Disable Sidebar in Blog Page', 'kortez' ),
	'type'        => 'checkbox',
	'settings'    => 'disable_sidebar_blog_page',
	'section'     => 'sidebar_options',
	'default'     => false,
	'priority'	  =>  50,
	'active_callback' => array(
		array(
			'setting'  => 'sidebar_settings',
			'operator' => 'contains',
			'value'    => array( 'right', 'left', 'right-left' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Disable Sidebar in Single Post', 'kortez' ),
	'type'        => 'checkbox',
	'settings'    => 'disable_sidebar_single_post',
	'section'     => 'sidebar_options',
	'default'     => false,
	'priority'	  =>  60,
	'active_callback' => array(
		array(
			'setting'  => 'sidebar_settings',
			'operator' => 'contains',
			'value'    => array( 'right', 'left', 'right-left' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Disable Sidebar in Page', 'kortez' ),
	'type'        => 'checkbox',
	'settings'    => 'disable_sidebar_page',
	'section'     => 'sidebar_options',
	'default'     => true,
	'priority'	  =>  70,
	'active_callback' => array(
		array(
			'setting'  => 'sidebar_settings',
			'operator' => 'contains',
			'value'    => array( 'right', 'left', 'right-left' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Disable Sidebar in WooCommerce', 'kortez' ),
	'type'        => 'checkbox',
	'settings'    => 'disable_sidebar_woocommerce_page',
	'section'     => 'sidebar_options',
	'default'     => false,
	'priority'	  =>  80,
	'active_callback' => array(
		array(
			'setting'  => 'sidebar_settings',
			'operator' => 'contains',
			'value'    => array( 'right', 'left', 'right-left' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Disable Sidebar in WooCommerce Shop', 'kortez' ),
	'type'        => 'checkbox',
	'settings'    => 'disable_sidebar_woocommerce_shop',
	'section'     => 'sidebar_options',
	'default'     => false,
	'priority'	  =>  90,
	'active_callback' => array(
		array(
			'setting'  => 'sidebar_settings',
			'operator' => 'contains',
			'value'    => array( 'right', 'left', 'right-left' ),
		),
		array(
			'setting'  => 'disable_sidebar_woocommerce_page',
			'operator' => '==',
			'value'    => false,
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Disable Sidebar in WooCommerce Single Product', 'kortez' ),
	'type'        => 'checkbox',
	'settings'    => 'disable_sidebar_woocommerce_single',
	'section'     => 'sidebar_options',
	'default'     => false,
	'priority'	  =>  100,
	'active_callback' => array(
		array(
			'setting'  => 'sidebar_settings',
			'operator' => 'contains',
			'value'    => array( 'right', 'left', 'right-left' ),
		),
		array(
			'setting'  => 'disable_sidebar_woocommerce_page',
			'operator' => '==',
			'value'    => false,
		),
	),
) );

/**
 * Preloader
 */
Kirki::add_section( 'preloader_options', array(
    'title'          => esc_html__( 'Preloader', 'kortez' ),
    'capability'     => 'edit_theme_options',
    'priority'       => '170',
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Disable Preloading', 'kortez' ),
	'type'        => 'checkbox',
	'settings'    => 'disable_preloader',
	'section'     => 'preloader_options',
	'default'     => false,
	'priority'    => 10,
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Preloading Animations', 'kortez' ),
	'type'        => 'select',
	'settings'    => 'preloader_animation',
	'section'     => 'preloader_options',
	'default'     => 'animation_one',
	'choices'  => array(
		'animation_one'       => esc_html__( 'Animation One', 'kortez' ),
		'animation_two'       => esc_html__( 'Animation Two', 'kortez' ),
		'animation_three'     => esc_html__( 'Animation Three', 'kortez' ),
		'animation_four'      => esc_html__( 'Animation Four', 'kortez' ),
		'animation_five'      => esc_html__( 'Animation Five', 'kortez' ),
	),
	'priority'    => 20,
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Image Width', 'kortez' ),
	'type'         => 'slider',
	'settings'     => 'preloader_custom_image_width',
	'section'      => 'preloader_options',
	'transport'    => 'postMessage',
	'default'      => 40,
	'choices'      => array(
		'min'  => 10,
		'max'  => 200,
		'step' => 1,
	),
	'priority'    => 30,
) );

/**
 * Breadcrumbs
 */
Kirki::add_section( 'breadcrumbs_options', array(
    'title'          => esc_html__( 'Breadcrumbs', 'kortez' ),
    'capability'     => 'edit_theme_options',
    'priority'       => '180',
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Breadcrumbs', 'kortez' ),
	'type'        => 'select',
	'settings'    => 'breadcrumbs_controls',
	'section'     => 'breadcrumbs_options',
	'default'     => 'show_in_all_page_post',
	'choices'  => array(
		'disable_in_all_pages'     => esc_html__( 'Disable in all Pages Only', 'kortez' ),
		'disable_in_all_page_post' => esc_html__( 'Disable in all Pages & Posts', 'kortez' ),
		'show_in_all_page_post'    => esc_html__( 'Show in all Pages & Posts', 'kortez' ),
	),
	'priority'    => 10,
) );