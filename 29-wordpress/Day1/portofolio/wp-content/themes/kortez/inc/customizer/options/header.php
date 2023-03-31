<?php
/**
 * Header Customizer options
 *
 * @package Kortez
 */

/**
 * Header
 */
Kirki::add_panel( 'header_options', array(
    'title' => esc_html__( 'Header', 'kortez' ),
    'priority' => '10',
) );

/**
 * Header style
 */
Kirki::add_section( 'header_style_options', array(
    'title'      => esc_html__( 'Style', 'kortez' ),
    'panel'      => 'header_options',	   
    'capability' => 'edit_theme_options',
    'priority'   => '30',
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Header Layouts', 'kortez' ),
	'description' => esc_html__( 'Select layout & scroll below to change its options', 'kortez' ),
	'type'        => 'radio-image',
	'settings'    => 'header_layout',
	'section'     => 'header_style_options',
	'default'     => 'header_one',
	'priority'	  => '40',
	'choices'     => apply_filters( 'kortez_header_layout_filter', array(
		'header_one'    => get_template_directory_uri() . '/assets/images/header-layout-1.png',
		'header_two'    => get_template_directory_uri() . '/assets/images/header-layout-2.png',
		'header_three'  => get_template_directory_uri() . '/assets/images/header-layout-3.png',
	) ),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Disable Top Header Section', 'kortez' ),
	'type'         => 'checkbox',
	'settings'     => 'disable_top_header_section',
	'section'      => 'header_style_options',
	'default'      => false,
	'priority'	   => '50',
) );

Kirki::add_field( 'kortez', array(
    'type'        => 'custom',
    'settings'    => 'header_two_home_separator',
    'section'     => 'header_style_options',
    'default'     => esc_html__( 'Transparent Header Options', 'kortez' ),
    'priority'	  => '60',
    'active_callback' => array(
		array(
			'setting'  => 'header_layout',
			'operator' => 'contains',
			'value'    => array( 'header_two' ),
		),
	),
) );

// Header two 
Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Transparent Header Site Logo', 'kortez' ),
	'description'  => esc_html__( 'Fully white or light color with image dimensions 320 by 120 pixels is recommended.', 'kortez' ),
	'type'         => 'image',
	'settings'     => 'header_separate_logo',
	'section'      => 'header_style_options',
	'default'      => '',
	'priority'	  =>  '70',
	'choices'     => array(
		'save_as' => 'id',
	),
	'active_callback' => array(
		array(
			'setting'  => 'header_layout',
			'operator' => 'contains',
			'value'    => array( 'header_two' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Transparent Header Site Title Color', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'site_title_color_transparent_header',
	'section'      => 'header_style_options',
	'default'      => '#ffffff',
	'priority'	   => '80',
	'active_callback' => array(
		array(
			'setting'  => 'header_layout',
			'operator' => 'contains',
			'value'    => array( 'header_two' ),
		),
		array(
			'setting'  => 'skin_select',
			'operator' => 'contains',
			'value'    => array( 'default', 'blackwhite' ),
		),
		array(
			'setting'  => 'disable_site_title',
			'operator' => '==',
			'value'    => false,
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Transparent Header Site Tagline Color', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'site_tagline_color_transparent_header',
	'section'      => 'header_style_options',
	'default'      => '#e6e6e6',
	'priority'	   => '90',
	'active_callback' => array(
		array(
			'setting'  => 'header_layout',
			'operator' => 'contains',
			'value'    => array( 'header_two' ),
		),
		array(
			'setting'  => 'skin_select',
			'operator' => 'contains',
			'value'    => array( 'default', 'blackwhite' ),
		),
		array(
			'setting'  => 'disable_site_tagline',
			'operator' => '==',
			'value'    => false,
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Transparent Top Header Background Color', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'transparent_header_top_background_color',
	'section'      => 'header_style_options',
	'default'      => '',
	'priority'	   => '100',
	'active_callback' => array(
		array(
			'setting'  => 'header_layout',
			'operator' => 'contains',
			'value'    => array( 'header_two' ),
		),
		array(
			'setting'  => 'skin_select',
			'operator' => 'contains',
			'value'    => array( 'default', 'blackwhite' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Transparent Top Header Text Color', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'transparent_header_top_header_color',
	'section'      => 'header_style_options',
	'default'      => '#ffffff',
	'priority'	   => '110',
	'active_callback' => array(
		array(
			'setting'  => 'header_layout',
			'operator' => 'contains',
			'value'    => array( 'header_two' ),
		),
		array(
			'setting'  => 'skin_select',
			'operator' => 'contains',
			'value'    => array( 'default', 'blackwhite' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Transparent Top Header Text Hover Color', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'top_hover_color_transparent_header',
	'section'      => 'header_style_options',
	'default'      => '#086abd',
	'priority'	   => '120',
	'active_callback' => array(
		array(
			'setting'  => 'header_layout',
			'operator' => 'contains',
			'value'    => array( 'header_two' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Transparent Bottom Header Background Color', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'transparent_header_bottom_background_color',
	'section'      => 'header_style_options',
	'default'      => '',
	'priority'	   => '130',
	'active_callback' => array(
		array(
			'setting'  => 'header_layout',
			'operator' => 'contains',
			'value'    => array( 'header_two' ),
		),
		array(
			'setting'  => 'skin_select',
			'operator' => 'contains',
			'value'    => array( 'default', 'blackwhite' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Transparent Header Menu Text Color', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'content_color_transparent_header',
	'section'      => 'header_style_options',
	'default'      => '#ffffff',
	'priority'	   => '140',
	'active_callback' => array(
		array(
			'setting'  => 'header_layout',
			'operator' => 'contains',
			'value'    => array( 'header_two' ),
		),
		array(
			'setting'  => 'skin_select',
			'operator' => 'contains',
			'value'    => array( 'default', 'blackwhite' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Transparent Bottom Header Text Hover Color', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'content_hover_color_transparent_header',
	'section'      => 'header_style_options',
	'default'      => '#086abd',
	'priority'	   => '150',
	'active_callback' => array(
		array(
			'setting'  => 'header_layout',
			'operator' => 'contains',
			'value'    => array( 'header_two' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
    'type'        => 'custom',
    'settings'    => 'header_two_general_separator',
    'section'     => 'header_style_options',
    'default'     => esc_html__( 'Non Transparent Header Options', 'kortez' ),
    'priority'	  => '160',
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Non Transparent Header Site Title Color', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'site_title_color',
	'section'      => 'header_style_options',
	'default'      => '#030303',
	'priority'	   => '170',
	'active_callback' => array(
		array(
			'setting'  => 'skin_select',
			'operator' => 'contains',
			'value'    => array( 'default', 'blackwhite' ),
		),
		array(
			'setting'  => 'disable_site_title',
			'operator' => '==',
			'value'    => false,
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Non Transparent Header Site Tagline Color', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'site_tagline_color',
	'section'      => 'header_style_options',
	'default'      => '#767676',
	'priority'	   => '180',
	'active_callback' => array(
		array(
			'setting'  => 'skin_select',
			'operator' => 'contains',
			'value'    => array( 'default', 'blackwhite' ),
		),
		array(
			'setting'  => 'disable_site_tagline',
			'operator' => '==',
			'value'    => false,
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Non Transparent Top Header Background Color', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'top_header_background_color',
	'section'      => 'header_style_options',
	'default'      => '',
	'priority'	   => '190',
	'active_callback' => array(
		array(
			'setting'  => 'skin_select',
			'operator' => 'contains',
			'value'    => array( 'default', 'blackwhite' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Non Transparent Top Header Text Color', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'top_header_text_color',
	'section'      => 'header_style_options',
	'default'      => '#333333',
	'priority'	   => '200',
	'active_callback' => array(
		array(
			'setting'  => 'skin_select',
			'operator' => 'contains',
			'value'    => array( 'default', 'blackwhite' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Non Transparent Top Header Text Link Hover Color', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'top_header_text_link_hover_color',
	'section'      => 'header_style_options',
	'default'      => '#086abd',
	'priority'	  =>  '210',
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Disable Top Header Section Border', 'kortez' ),
	'type'         => 'checkbox',
	'settings'     => 'disable_top_header_border',
	'section'      => 'header_style_options',
	'default'      => false,
	'priority'	   => '220',
	'active_callback' => array(
		array(
			'setting'  => 'skin_select',
			'operator' => 'contains',
			'value'    => array( 'default', 'blackwhite' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Non Transparent Mid Header Background Color', 'kortez' ),
	'description'  => esc_html__( 'It can be used as a transparent background color over image.', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'mid_header_background_color',
	'section'      => 'header_style_options',
	'default'      => '',
	'priority'	   => '230',
	'active_callback' => array(
		array(
			'setting'  => 'header_layout',
			'operator' => 'contains',
			'value'    => array( 'header_three' ),
		),
		array(
			'setting'  => 'skin_select',
			'operator' => 'contains',
			'value'    => array( 'default', 'blackwhite' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Non Transparent Mid Header Text Link Hover Color', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'mid_header_text_link_hover_color',
	'section'      => 'header_style_options',
	'default'      => '#086abd',
	'priority'	   => '240',
	'active_callback' => array(
		array(
			'setting'  => 'header_layout',
			'operator' => 'contains',
			'value'    => array( 'header_three' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Disable Mid Header Section Border', 'kortez' ),
	'type'         => 'checkbox',
	'settings'     => 'disable_mid_header_border',
	'section'      => 'header_style_options',
	'default'      => false,
	'priority'	   => '250',
	'active_callback' => array(
		array(
			'setting'  => 'header_layout',
			'operator' => 'contains',
			'value'    => array( 'header_three' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Non Transparent Bottom Header Background Color', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'bottom_header_background_color',
	'section'      => 'header_style_options',
	'default'      => '',
	'priority'	  =>  '260',
	'active_callback' => array(
		array(
			'setting'  => 'skin_select',
			'operator' => 'contains',
			'value'    => array( 'default', 'blackwhite' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Non Transparent Bottom Header Text Color', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'bottom_header_text_color',
	'section'      => 'header_style_options',
	'default'      => '#333333',
	'priority'	   => '270',
	'active_callback' => array(
		array(
			'setting'  => 'skin_select',
			'operator' => 'contains',
			'value'    => array( 'default', 'blackwhite' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Non Transparent Bottom Header Text Link Hover Color', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'bottom_header_text_link_hover_color',
	'section'      => 'header_style_options',
	'default'      => '#086abd',
	'priority'	   =>  '280',
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Sub Menu Link Hover Color', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'sub_menu_link_hover_color',
	'section'      => 'header_style_options',
	'default'      => '#086abd',
	'priority'	   =>  '290',
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Header Height (in px)', 'kortez' ),
	'description' => esc_html__( 'This option will only apply to Desktop. Please click on below Desktop Icon to see changes. Automatically adjust by theme default in the responsive devices.
	', 'kortez' ),
	'type'        => 'slider',
	'settings'    => 'header_image_height',
	'section'     => 'header_style_options',
	'transport'   => 'postMessage',
	'default'     => 80,
	'priority'	  => '300',
	'choices'     => array(
		'min'  => 50,
		'max'  => 1200,
		'step' => 10,
	),
) );

Kirki::add_field( 'kortez', array(
    'type'        => 'custom',
    'settings'    => 'contact_details_separator',
    'section'     => 'header_style_options',
    'default'     => esc_html__( 'Contact Details Options', 'kortez' ),
    'priority'	  => '310',
    'active_callback' => array(
		array(
			'setting'  => 'header_layout',
			'operator' => 'contains',
			'value'    => array( 'header_one', 'header_two' ),
		),
	),
) );

// Contact Detail Options
Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Disable Contact Details', 'kortez' ),
	'type'         => 'checkbox',
	'settings'     => 'disable_contact_detail',
	'section'      => 'header_style_options',
	'default'      => false,
	'priority'	   => '320',
	'active_callback' => array(
		array(
			'setting'  => 'header_layout',
			'operator' => 'contains',
			'value'    => array( 'header_one', 'header_two' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Phone Number', 'kortez' ),
	'type'         => 'text',
	'settings'     => 'contact_phone',
	'section'      => 'header_style_options',
	'default'      => '',
	'priority'	   => '330',
	'active_callback' => array(
		array(
			'setting'  => 'disable_contact_detail',
			'operator' => '==',
			'value'    => false,
		),
		array(
			'setting'  => 'header_layout',
			'operator' => 'contains',
			'value'    => array( 'header_one', 'header_two' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Email', 'kortez' ),
	'type'         => 'text',
	'settings'     => 'contact_email',
	'section'      => 'header_style_options',
	'default'      => '',
	'priority'	   => '340',
	'active_callback' => array(
		array(
			'setting'  => 'disable_contact_detail',
			'operator' => '==',
			'value'    => false,
		),
		array(
			'setting'  => 'header_layout',
			'operator' => 'contains',
			'value'    => array( 'header_one', 'header_two' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Address', 'kortez' ),
	'type'         => 'text',
	'settings'     => 'contact_address',
	'section'      => 'header_style_options',
	'default'      => '',
	'priority'	   => '350',
	'active_callback' => array(
		array(
			'setting'  => 'disable_contact_detail',
			'operator' => '==',
			'value'    => false,
		),
		array(
			'setting'  => 'header_layout',
			'operator' => 'contains',
			'value'    => array( 'header_one', 'header_two' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
    'type'        => 'custom',
    'settings'    => 'header_button_separator',
    'section'     => 'header_style_options',
    'default'     => esc_html__( 'Header Button Options', 'kortez' ),
    'priority'	  => '360',
    'active_callback' => array(
		array(
			'setting'  => 'header_layout',
			'operator' => 'contains',
			'value'    => array( 'header_one', 'header_two' ),
		),
	),
) );

// Header button
Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Disable Header Buttons', 'kortez' ),
	'type'         => 'checkbox',
	'settings'     => 'disable_header_button',
	'section'      => 'header_style_options',
	'default'      => false,
	'priority'	   => '370',
	'active_callback' => array(
		array(
			'setting'  => 'header_layout',
			'operator' => 'contains',
			'value'    => array( 'header_one', 'header_two' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Header Buttons', 'kortez' ),
	'type'         => 'repeater',
	'settings'     => 'header_button_repeater',
	'section'      => 'header_style_options',
	'priority'	   => '380',
	'row_label' => array(
		'type'  => 'text',
		'value' => esc_html__( 'Button', 'kortez' ),
	),
	'default' => array(
		array(
			'header_btn_type' 			=> 'button-outline',
			'header_btn_bg_color'		=> '#DB5362',
			'header_btn_border_color'	=> '#1a1a1a',
			'header_btn_text_color'		=> '#1a1a1a',
			'header_btn_hover_color'	=> '#086abd',
			'header_btn_text' 			=> '',
			'header_btn_link' 			=> '',
			'header_btn_target'			=> true,
			'header_btn_radius'			=> 0,
		),		
	),
	'fields' => array(
		'header_btn_type' => array(
			'label'       => esc_html__( 'Button Type', 'kortez' ),
			'type'        => 'select',
			'default'     => 'button-outline',
			'choices'  	  => array(
				'button-primary' => esc_html__( 'Background Button', 'kortez' ),
				'button-outline' => esc_html__( 'Border Button', 'kortez' ),
				'button-text'    => esc_html__( 'Text Only Button', 'kortez' ),
			),
		),
		'header_btn_bg_color' 	=> array(
			'label'       		=> esc_html__( 'Non Transparent Header Button Background Color', 'kortez' ),
			'description' 		=> esc_html__( 'For background button type only.', 'kortez' ),
			'type'        		=> 'color',
			'default'     		=> '#DB5362',
		),
		'header_btn_border_color' 	=> array(
			'label'      	 		=> esc_html__( 'Non Transparent Header Button Border Color', 'kortez' ),
			'description' 			=> esc_html__( 'For border button type only.', 'kortez' ),
			'type'       		 	=> 'color',
			'default'     			=> '#1a1a1a',
		),
		'header_btn_text_color' => array(
			'label'       		=> esc_html__( 'Non Transparent Header Button Text Color', 'kortez' ),
			'type'        		=> 'color',
			'default'     		=> '#1a1a1a',
		),
		'header_btn_hover_color' => array(
			'label'       		=> esc_html__( 'Non Transparent Header Button Hover Color', 'kortez' ),
			'type'        		=> 'color',
			'default'     		=> '#086abd',
		),
		'header_btn_text' => array(
			'label'       => esc_html__( 'Button Text', 'kortez' ),
			'type'        => 'text',
			'default' 	  => '',
		),
		'header_btn_link' => array(
			'label'       => esc_html__( 'Button Link', 'kortez' ),
			'type'        => 'text',
			'default' 	  => '',
		),
		'header_btn_target' => array(
			'label'       	=> esc_html__( 'Open Link in New Window', 'kortez' ),	
			'type'        	=> 'checkbox',
			'default'	  	=> true,
		),
		'header_btn_radius' => array(
			'label'       	=> esc_html__( 'Button Radius (px)', 'kortez' ),
			'type'        	=> 'number',
			'default'	  	=> 0,
			'choices'     	=> array(
				'min'  => 0,
				'max'  => 50,
				'step' => 1,
			),
		),	
	),
	'choices' => array(
		'limit' => 1,
	),
	'active_callback' => array(
		array(
			'setting'  => 'disable_header_button',
			'operator' => '==',
			'value'    => false,
		),
		array(
			'setting'  => 'header_layout',
			'operator' => 'contains',
			'value'    => array( 'header_one' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Transparent Header Buttons', 'kortez' ),
	'type'         => 'repeater',
	'settings'     => 'transparent_header_button_repeater',
	'section'      => 'header_style_options',
	'priority'	   => '390',
	'row_label' => array(
		'type'  => 'text',
		'value' => esc_html__( 'Button', 'kortez' ),
	),
	'default' => array(
		array(
			'transparent_header_btn_type' 				=> 'button-outline',
			'transparent_header_home_btn_bg_color'		=> '#DB5362',
			'transparent_header_home_btn_border_color'	=> '#ffffff',
			'transparent_header_home_btn_text_color'	=> '#ffffff',
			'transparent_header_btn_bg_color'			=> '#DB5362',
			'transparent_header_btn_border_color'		=> '#1a1a1a',
			'transparent_header_btn_text_color'			=> '#1a1a1a',
			'transparent_header_btn_hover_color'		=> '#086abd',
			'transparent_header_btn_text' 				=> '',
			'transparent_header_btn_link' 				=> '',
			'transparent_header_btn_target'				=> true,
			'transparent_header_btn_radius'				=> 0,
		),		
	),
	'fields' => array(
		'transparent_header_btn_type' => array(
			'label'       => esc_html__( 'Button Type', 'kortez' ),
			'type'        => 'select',
			'default'     => 'button-outline',
			'choices'  	  => array(
				'button-primary' => esc_html__( 'Background Button', 'kortez' ),
				'button-outline' => esc_html__( 'Border Button', 'kortez' ),
				'button-text'    => esc_html__( 'Text Only Button', 'kortez' ),
			),
		),
		'transparent_header_home_btn_bg_color' 	=> array(
			'label'       		=> esc_html__( 'Transparent Header Button Background Color', 'kortez' ),
			'description' 		=> esc_html__( 'For background button type only.', 'kortez' ),
			'type'        		=> 'color',
			'default'     		=> '#DB5362',
		),
		'transparent_header_home_btn_border_color' 	=> array(
			'label'      	 		=> esc_html__( 'Transparent Header Button Border Color', 'kortez' ),
			'description' 			=> esc_html__( 'For border button type only.', 'kortez' ),
			'type'       		 	=> 'color',
			'default'     			=> '#ffffff',
		),
		'transparent_header_home_btn_text_color' => array(
			'label'       		=> esc_html__( 'Transparent Header Button Text Color', 'kortez' ),
			'type'        		=> 'color',
			'default'     		=> '#ffffff',
		),
		'transparent_header_btn_bg_color' 	=> array(
			'label'       		=> esc_html__( 'Non Transparent Header Button Background Color', 'kortez' ),
			'description' 		=> esc_html__( 'For background button type only.', 'kortez' ),
			'type'        		=> 'color',
			'default'     		=> '#DB5362',
		),
		'transparent_header_btn_border_color' 	=> array(
			'label'      	 		=> esc_html__( 'Non Transparent Header Button Border Color', 'kortez' ),
			'description' 			=> esc_html__( 'For border button type only.', 'kortez' ),
			'type'       		 	=> 'color',
			'default'     			=> '#1a1a1a',
		),
		'transparent_header_btn_text_color' => array(
			'label'       		=> esc_html__( 'Non Transparent Header Button Text Color', 'kortez' ),
			'type'        		=> 'color',
			'default'     		=> '#1a1a1a',
		),
		'transparent_header_btn_hover_color' => array(
			'label'       		=> esc_html__( 'Button Hover Color', 'kortez' ),
			'type'        		=> 'color',
			'default'     		=> '#086abd',
		),
		'transparent_header_btn_text' => array(
			'label'       => esc_html__( 'Button Text', 'kortez' ),
			'type'        => 'text',
			'default' 	  => '',
		),
		'transparent_header_btn_link' => array(
			'label'       => esc_html__( 'Button Link', 'kortez' ),
			'type'        => 'text',
			'default' 	  => '',
		),
		'transparent_header_btn_target' => array(
			'label'       	=> esc_html__( 'Open Link in New Window', 'kortez' ),	
			'type'        	=> 'checkbox',
			'default'	  	=> true,
		),
		'transparent_header_btn_radius' => array(
			'label'       	=> esc_html__( 'Button Radius (px)', 'kortez' ),
			'type'        	=> 'number',
			'default'	  	=> 0,
			'choices'     	=> array(
				'min'  => 0,
				'max'  => 50,
				'step' => 1,
			),
		),	
	),
	'choices' => array(
		'limit' => 1,
	),
	'active_callback' => array(
		array(
			'setting'  => 'disable_header_button',
			'operator' => '==',
			'value'    => false,
		),
		array(
			'setting'  => 'header_layout',
			'operator' => 'contains',
			'value'    => array( 'header_two' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Header Buttons Typography', 'kortez' ),
	'type'         => 'typography',
	'settings'     => 'header_buttons_font_control',
	'section'      => 'header_style_options',
	'priority'	   => '400',
	'default'  => array(
		'font-family'    => 'Open Sans',
		'variant'        => '600',
		'font-size'      => '14px',
		'text-transform' => 'none',
		'line-height'    => '1',
	),
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => '.site-header .header-btn a',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'disable_header_button',
			'operator' => '==',
			'value'    => false,
		),
		array(
			'setting'  => 'header_layout',
			'operator' => 'contains',
			'value'    => array( 'header_one', 'header_two' ),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Disable Search', 'kortez' ),
	'type'        => 'checkbox',
	'settings'    => 'disable_search_icon',
	'section'     => 'header_style_options',
	'default'     => false,
	'priority'	  => '410',
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Disable Hamburger Widget Menu Icon', 'kortez' ),
	'type'        => 'checkbox',
	'settings'    => 'disable_hamburger_menu_icon',
	'section'     => 'header_style_options',
	'default'     => false,
	'priority'	  =>  '420',
) );

/**
 * Header media
 */
Kirki::add_section( 'header_wrap_media_options', array(
    'title'      => esc_html__( 'Media', 'kortez' ),
    'panel'      => 'header_options',	   
    'capability' => 'edit_theme_options',
    'priority'   => '30',
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Header Image Slider', 'kortez' ),
	'description' => esc_html__( 'Recommended image size 1920x550 pixel. Add only one image to make header banner.', 'kortez' ),
	'type'        => 'repeater',
	'section'     => 'header_wrap_media_options',
	'row_label' => array(
		'type'  => 'text',
	),
	'button_label' => esc_html__('Add New Image', 'kortez' ),
	'settings'     => 'header_image_slider',
	'default'      => array(
			array(
				'slider_item' 	=> '',
				)			
	),
	'fields' => array(
		'slider_item' => array(
			'label'       => esc_html__( 'Image', 'kortez' ),
			'type'        => 'image',
			'default'     => '',
			'choices'     => array(
				'save_as' => 'id',
			),
		)
	),
	'choices' => array(
		'limit' => 2,
	),
	'priority'	  =>  10,
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Choose Image Size', 'kortez' ),
	'type'        => 'select',
	'settings'    => 'render_header_image_size',
	'section'     => 'header_wrap_media_options',
	'default'     => 'full',
	'placeholder' => esc_html__( 'Select Image Size', 'kortez' ),
	'choices'     => kortez_get_intermediate_image_sizes(),
	'priority'	  =>  20,
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Background Image Size', 'kortez' ),
	'type'         => 'radio',
	'settings'     => 'header_image_size',
	'section'      => 'header_wrap_media_options',
	'default'      => 'cover',
	'choices'      => array(
		'cover'    => esc_html__( 'Cover', 'kortez' ),
		'pattern'  => esc_html__( 'Pattern / Repeat', 'kortez' ),
		'norepeat' => esc_html__( 'No Repeat', 'kortez' ),
	),
	'priority'	  =>  30,
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Slide Effect', 'kortez' ),
	'type'        => 'select',
	'settings'    => 'header_slider_effect',
	'section'     => 'header_wrap_media_options',
	'default'     => 'fade',
	'choices'  => array(
		'fade'             => esc_html__( 'Fade', 'kortez' ),
		'horizontal-slide' => esc_html__( 'Slide', 'kortez' ),
	),
	'priority'	  =>  40,
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Fade Control Time ( in sec )', 'kortez' ),
	'type'         => 'number',
	'settings'     => 'slider_header_fade_control',
	'section'      => 'header_wrap_media_options',
	'default'      => 5,
	'choices' => array(
			'min' => '3',
			'max' => '60',
			'step'=> '1',
	),
	'priority'	  =>  50,
	'active_callback' => array(
		array(
			'setting'  => 'header_slider_effect',
			'operator' => '==',
			'value'    => 'fade',
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Disable Arrows', 'kortez' ),
	'type'         => 'checkbox',
	'settings'     => 'disable_header_slider_arrows',
	'section'      => 'header_wrap_media_options',
	'default'      => false,
	'priority'	  =>  60,
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Disable Dots', 'kortez' ),
	'type'         => 'checkbox',
	'settings'     => 'disable_header_slider_dots',
	'section'      => 'header_wrap_media_options',
	'default'      => false,
	'priority'	  =>  70,
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Disable Auto Play', 'kortez' ),
	'type'         => 'checkbox',
	'settings'     => 'disable_header_slider_autoplay',
	'section'      => 'header_wrap_media_options',
	'default'      => true,
	'priority'	  =>  80,
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Auto Play Timeout ( in sec )', 'kortez' ),
	'type'         => 'number',
	'settings'     => 'slider_header_autoplay_speed',
	'section'      => 'header_wrap_media_options',
	'default'      => 4,
	'choices' => array(
			'min' => '1',
			'max' => '60',
			'step'=> '1',
	),
	'priority'	  =>  90,
	'active_callback' => array(
		array(
			'setting'  => 'disable_header_slider_autoplay',
			'operator' => '==',
			'value'    => false,
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Disable Parallax Scrolling', 'kortez' ),
	'type'        => 'checkbox',
	'settings'    => 'disable_parallax_scrolling',
	'section'     => 'header_wrap_media_options',
	'default'     => true,
	'priority'	  =>  100,
) );