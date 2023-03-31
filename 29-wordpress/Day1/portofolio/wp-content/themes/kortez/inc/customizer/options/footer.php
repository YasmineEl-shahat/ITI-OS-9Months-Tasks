<?php
/**
 * Footer Customizer options
 *
 * @package Kortez
 */

/**
 * Footer
 */
Kirki::add_panel( 'footer_options', array(
    'title' => esc_html__( 'Footer', 'kortez' ),
    'priority' => '110',
) );

/**
 * Footer Widgets
 */
Kirki::add_section( 'footer_widgets_options', array(
    'title'          => esc_html__( 'Footer Widgets', 'kortez' ),
    'panel'          => 'footer_options',
    'capability'     => 'edit_theme_options',
    'priority' 		 => 10,
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Disable Footer Widget Area', 'kortez' ),
	'type'         => 'checkbox',
	'settings'     => 'disable_footer_widget',
	'section'      => 'footer_widgets_options',
	'default'      => false,
	'priority'	   =>  10,
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Disable Footer Widget Title Border', 'kortez' ),
	'type'         => 'checkbox',
	'settings'     => 'disable_footer_widget_title_border',
	'section'      => 'footer_widgets_options',
	'default'      => false,
	'priority'	   =>  20,
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Disable Footer Widget Item List Border ', 'kortez' ),
	'type'         => 'checkbox',
	'settings'     => 'disable_footer_widget_list_item_border',
	'section'      => 'footer_widgets_options',
	'default'      => false,
	'priority'	   =>  30,
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Widget Columns Layouts', 'kortez' ),
	'type'        => 'radio-image',
	'settings'    => 'footer_widget_layout',
	'section'     => 'footer_widgets_options',
	'default'     => 'footer_widget_layout_one',
	'choices'  => array(
		'footer_widget_layout_one'    => get_template_directory_uri() . '/assets/images/widget-layout-1.png',
		'footer_widget_layout_two'    => get_template_directory_uri() . '/assets/images/widget-layout-2.png',
		'footer_widget_layout_three'    => get_template_directory_uri() . '/assets/images/widget-layout-3.png',
		'footer_widget_layout_four' => get_template_directory_uri() . '/assets/images/widget-layout-4.png',
	),
	'priority'	   =>  40,
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Footer Widget Area Top Padding(in px)', 'kortez' ),
	'type'         => 'number',
	'settings'     => 'footer_widget_area_top_padding',
	'section'      => 'footer_widgets_options',
	'default'      => 0,
	'priority'	   =>  50,
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Footer Widget Area Bottom Padding(in px)', 'kortez' ),
	'type'         => 'number',
	'settings'     => 'footer_widget_area_bottom_padding',
	'section'      => 'footer_widgets_options',
	'default'      => 50,
	'priority'	   =>  60,
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Section Background Color', 'kortez' ),
	'description'  => esc_html__( 'It can be used as a transparent background color over image.', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'top_footer_background_color',
	'section'      => 'footer_widgets_options',
	'default'      => '',
	'priority'	   =>  70,
	'active_callback' => array(
		array(
			'setting'  => 'skin_select',
			'operator' => 'contains',
			'value'    => array( 'default', 'blackwhite' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Widget Title Color', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'top_footer_widget_title_color',
	'section'      => 'footer_widgets_options',
	'default'      => '#030303',
	'priority'	   =>  80,
	'active_callback' => array(
		array(
			'setting'  => 'skin_select',
			'operator' => 'contains',
			'value'    => array( 'default', 'blackwhite' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Widgets Link Color', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'top_footer_widget_link_color',
	'section'      => 'footer_widgets_options',
	'default'      => '#656565',
	'priority'	   =>  90,
	'active_callback' => array(
		array(
			'setting'  => 'skin_select',
			'operator' => 'contains',
			'value'    => array( 'default', 'blackwhite' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Widgets Content Color', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'top_footer_widget_content_color',
	'section'      => 'footer_widgets_options',
	'default'      => '#656565',
	'priority'	   =>  100,
	'active_callback' => array(
		array(
			'setting'  => 'skin_select',
			'operator' => 'contains',
			'value'    => array( 'default', 'blackwhite' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Widgets Link Hover Color', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'top_footer_widget_link_hover_color',
	'section'      => 'footer_widgets_options',
	'default'      => '#086abd',
	'priority'	   =>  110,
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Widget Title Typography', 'kortez' ),
	'type'         => 'typography',
	'settings'     => 'footer_widget_title_font_control',
	'section'      => 'footer_widgets_options',
	'default'  => array(
		'font-family'    => 'Poppins',
		'variant'        => '500',
		'font-size'      => '18px',
		'text-transform' => 'none',
		'line-height'    => '1.4',
	),
	'priority'	  =>  120,
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => '.site-footer .widget .widget-title',
		),
	),
) );

/**
 * Footer Style
 */
Kirki::add_section( 'footer_style_options', array(
    'title'          => esc_html__( 'Style', 'kortez' ),
    'panel'          => 'footer_options',
    'capability'     => 'edit_theme_options',
    'priority' 		 => 20,
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Disable Bottom Footer Area', 'kortez' ),
	'type'         => 'checkbox',
	'settings'     => 'disable_bottom_footer',
	'section'      => 'footer_style_options',
	'default'      => false,
	'priority'	   => 10,
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Footer Layouts', 'kortez' ),
	'type'        => 'radio-image',
	'settings'    => 'footer_layout',
	'section'     => 'footer_style_options',
	'default'     => 'footer_one',
	'choices'  	  => apply_filters( 'kortez_footer_layout_filter', array(
		'footer_one'   => get_template_directory_uri() . '/assets/images/footer-layout-1.png',
		'footer_two'   => get_template_directory_uri() . '/assets/images/footer-layout-2.png',
		'footer_three' => get_template_directory_uri() . '/assets/images/footer-layout-3.png',
	) ),
	'priority'	   => 20,
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Bottom Footer Area Top Padding(in px)', 'kortez' ),
	'type'         => 'number',
	'settings'     => 'bottom_footer_area_top_padding',
	'section'      => 'footer_style_options',
	'default'      => 30,
	'priority'	   => 30,
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Bottom Footer Area Bottom Padding(in px)', 'kortez' ),
	'type'         => 'number',
	'settings'     => 'bottom_footer_area_bottom_padding',
	'section'      => 'footer_style_options',
	'default'      => 30,
	'priority'	   => 40,
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Background Color', 'kortez' ),
	'description'  => esc_html__( 'It can be used as a transparent background color over image.', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'bottom_footer_background_color',
	'section'      => 'footer_style_options',
	'default'      => '',
	'priority'	   => 50,
	'active_callback' => array(
		array(
			'setting'  => 'skin_select',
			'operator' => 'contains',
			'value'    => array( 'default', 'blackwhite' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Text Color', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'bottom_footer_text_color',
	'section'      => 'footer_style_options',
	'default'      => '#656565',
	'priority'	   => 60,
	'active_callback' => array(
		array(
			'setting'  => 'skin_select',
			'operator' => 'contains',
			'value'    => array( 'default', 'blackwhite' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Text Link Color', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'bottom_footer_text_link_color',
	'section'      => 'footer_style_options',
	'default'      => '#383838',
	'priority'	   => 70,
	'active_callback' => array(
		array(
			'setting'  => 'skin_select',
			'operator' => 'contains',
			'value'    => array( 'default', 'blackwhite' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Text Link Hover Color', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'bottom_footer_text_link_hover_color',
	'section'      => 'footer_style_options',
	'default'      => '#086abd',
	'priority'	   => 80,
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Bottom Footer Typography', 'kortez' ),
	'type'         => 'typography',
	'settings'     => 'footer_style_font_control',
	'section'      => 'footer_style_options',
	'default'  => array(
		'font-family'    => 'Poppins',
		'variant'        => '400',
		'font-size'      => '14px',
		'text-transform' => 'none',
		'line-height'    => '1.6',
	),
	'priority'	   => 90,
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => array( '.site-footer .site-info', '.site-footer .footer-menu ul li a' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Select Image', 'kortez' ),
	'type'         => 'image',
	'settings'     => 'bottom_footer_image',
	'section'      => 'footer_style_options',
	'default'      => '',
	'choices'     => array(
		'save_as' => 'id',
	),
	'priority'	   => 100,
	'active_callback' => array(
		array(
			'setting'  => 'footer_layout',
			'operator' => 'contains',
			'value'    => array( 'footer_one', 'footer_two' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'    => esc_html__( 'Image Link', 'kortez' ),
	'type'     => 'link',
	'settings' => 'bottom_footer_image_link',
	'section'  => 'footer_style_options',
	'default'  => '',
	'priority'	   => 110,
	'active_callback' => array(
		array(
			'setting'  => 'footer_layout',
			'operator' => 'contains',
			'value'    => array( 'footer_one', 'footer_two' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'    => esc_html__( 'Image Target', 'kortez' ),
	'description' => esc_html__( 'If enabled, the page will be open in an another browser tab.', 'kortez' ),
	'type'     => 'checkbox',
	'settings' => 'bottom_footer_image_target',
	'section'  => 'footer_style_options',
	'default'  => true,
	'priority'	   => 120,
	'active_callback' => array(
		array(
			'setting'  => 'footer_layout',
			'operator' => 'contains',
			'value'    => array( 'footer_one', 'footer_two' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Image Width', 'kortez' ),
	'type'         => 'slider',
	'settings'     => 'bottom_footer_image_width',
	'section'      => 'footer_style_options',
	'transport'    => 'postMessage',
	'default'      => 270,
	'choices'      => array(
		'min'  => 10,
		'max'  => 1140,
		'step' => 5,
	),
	'priority'	   => 130,
	'active_callback' => array(
		array(
			'setting'  => 'footer_layout',
			'operator' => 'contains',
			'value'    => array( 'footer_one', 'footer_two' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Choose Image Size', 'kortez' ),
	'type'        => 'select',
	'settings'    => 'render_bottom_footer_image_size',
	'section'     => 'footer_style_options',
	'default'     => 'full',
	'placeholder' => esc_html__( 'Select Image Size', 'kortez' ),
	'choices'     => kortez_get_intermediate_image_sizes(),
	'priority'	   => 140,
	'active_callback' => array(
		array(
			'setting'  => 'footer_layout',
			'operator' => 'contains',
			'value'    => array( 'footer_one', 'footer_two' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Disable Footer Menu', 'kortez' ),
	'type'         => 'checkbox',
	'settings'     => 'disable_footer_menu',
	'section'      => 'footer_style_options',
	'default'      => false,
	'priority'	   => 150,
) );

/**
 * Footer Media
 */
Kirki::add_section( 'media_footer_options', array(
    'title'          => esc_html__( 'Media', 'kortez' ),
    'panel'          => 'footer_options',
    'capability'     => 'edit_theme_options',
    'priority' 		 => 30,
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Select Background Image', 'kortez' ),
	'description' => esc_html__( 'Recommended image size 1920x550 pixel.', 'kortez' ),
	'type'        => 'image',
	'settings'    => 'footer_image',
	'section'     => 'media_footer_options',
	'default'      => '',
	'choices'     => array(
		'save_as' => 'id',
	),
	'priority'	  =>  10,
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Choose Image Size', 'kortez' ),
	'type'        => 'select',
	'settings'    => 'render_footer_image_size',
	'section'     => 'media_footer_options',
	'default'     => 'full',
	'placeholder' => esc_html__( 'Select Image Size', 'kortez' ),
	'choices'     => kortez_get_intermediate_image_sizes(),
	'priority'	  =>  20,
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Background Image Size', 'kortez' ),
	'type'         => 'radio',
	'settings'     => 'footer_image_size',
	'section'      => 'media_footer_options',
	'default'      => 'cover',
	'choices'      => array(
		'cover'    => esc_html__( 'Cover', 'kortez' ),
		'pattern'  => esc_html__( 'Pattern / Repeat', 'kortez' ),
		'norepeat' => esc_html__( 'No Repeat', 'kortez' ),
	),
	'priority'	   =>  30,
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Disable Parallax Scrolling', 'kortez' ),
	'type'        => 'checkbox',
	'settings'    => 'disable_footer_parallax_scrolling',
	'section'     => 'media_footer_options',
	'default'     => true,
	'priority'	  =>  40,
) );

/**
 * Footer Elements
 */
Kirki::add_section( 'elements_footer_options', array(
    'title'          => esc_html__( 'Elements', 'kortez' ),
    'panel'          => 'footer_options',
    'capability'     => 'edit_theme_options',
    'priority' 		 => 40,
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Disable Scroll to Top', 'kortez' ),
	'type'        => 'checkbox',
	'settings'    => 'disable_scroll_top',
	'section'     => 'elements_footer_options',
	'default'     => false,
	'priority'	  =>  10,
) );

/**
 * Footer Responsive
 */
Kirki::add_section( 'footer_responsive', array(
    'title'          => esc_html__( 'Responsive', 'kortez' ),
    'description'    => esc_html__( 'These options will only apply to Tablet and Mobile devices. Please
    	click on below Tablet or Mobile Icons to see changes.', 'kortez' ),
    'capability'     => 'edit_theme_options',
    'panel'			 => 'footer_options',
    'priority' 		 => 50,		
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Disable Footer Widget Area', 'kortez' ),
	'type'        => 'checkbox',
	'settings'    => 'disable_responsive_footer_widget',
	'section'     => 'footer_responsive',
	'default'     => false,
	'priority'	  =>  10,
	'active_callback' => array(
		array(
			'setting'  => 'disable_footer_widget',
			'operator' => '=',
			'value'    => false,
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Disable Scroll Top', 'kortez' ),
	'type'        => 'checkbox',
	'settings'    => 'disable_mobile_scroll_top',
	'section'     => 'footer_responsive',
	'default'     => true,
	'priority'	  =>  20,
	'active_callback' => array(
		array(
			'setting'  => 'disable_scroll_top',
			'operator' => '=',
			'value'    => false,
		),
	),
) );