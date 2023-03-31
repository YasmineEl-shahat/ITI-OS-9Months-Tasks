<?php
/**
 * Blog Homepage Customizer options
 *
 * @package Kortez
 */

/**
 * Blog Homepage
 */
Kirki::add_panel( 'blog_homepage_options', array(
    'title' => esc_html__( 'Blog Homepage', 'kortez' ),
    'priority' => '120',
) );


/**
 * Latest Posts
 */
Kirki::add_section( 'latest_posts_options', array(
    'title'          => esc_html__( 'Latest Posts', 'kortez' ),
    'description'    => esc_html__( 'More options are available in Blog Page Section.', 'kortez' ),
    'panel'          => 'blog_homepage_options',
    'capability'     => 'edit_theme_options',
    'priority'       => 10,
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Disable Latest Posts Section From Homepage', 'kortez' ),
	'type'        => 'checkbox',
	'settings'    => 'disable_latest_posts_section',
	'section'     => 'latest_posts_options',
	'default'     => false,
	'priority'	  =>  10,
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Disable Section Title', 'kortez' ),
	'type'         => 'checkbox',
	'settings'     => 'disable_latest_posts_section_title',
	'section'      => 'latest_posts_options',
	'default'      => true,
	'priority'	   =>  20,
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Section Title', 'kortez' ),
	'type'        => 'text',
	'settings'    => 'latest_posts_section_title',
	'section'     => 'latest_posts_options',
	'default'     => '',
	'priority'	  =>  30,
	'active_callback' => array(
		array(
			'setting'  => 'disable_latest_posts_section_title',
			'operator' => '==',
			'value'    => false,
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Section Title Typography', 'kortez' ),
	'type'         => 'typography',
	'settings'     => 'latest_posts_section_title_font_control',
	'section'      => 'latest_posts_options',
	'default'  => array(
		'font-family'    => 'Poppins',
		'variant'        => '600',
		'font-size'      => '24px',
		'text-transform' => 'none',
		'line-height'    => '1.2',
	),
	'priority'	  =>  40,
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => '.section-post-area .section-title-wrap .section-title',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'disable_latest_posts_section_title',
			'operator' => '==',
			'value'    => false,
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Disable Section Description', 'kortez' ),
	'type'         => 'checkbox',
	'settings'     => 'disable_latest_posts_section_description',
	'section'      => 'latest_posts_options',
	'default'      => true,
	'priority'	   =>  50,
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Section Description', 'kortez' ),
	'type'        => 'text',
	'settings'    => 'latest_posts_section_description',
	'section'     => 'latest_posts_options',
	'default'     => '',
	'priority'	  =>  60,
	'active_callback' => array(
		array(
			'setting'  => 'disable_latest_posts_section_description',
			'operator' => '==',
			'value'    => false,
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Section Description Typography', 'kortez' ),
	'type'         => 'typography',
	'settings'     => 'latest_posts_section_description_font_control',
	'section'      => 'latest_posts_options',
	'default'  => array(
		'font-family'    => 'Open Sans',
		'variant'        => 'regular',
		'font-size'      => '16px',
		'text-transform' => 'none',
		'line-height'    => '1.8',
	),
	'priority'	  =>  70,
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => '.section-post-area .section-title-wrap p',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'disable_latest_posts_section_description',
			'operator' => '==',
			'value'    => false,
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Section Title and Description Alignment', 'kortez' ),
	'type'        => 'select',
	'settings'    => 'latest_posts_section_title_desc_alignment',
	'section'     => 'latest_posts_options',
	'default'     => 'text-left',
	'choices'     => array(
		'text-left'	 	=> esc_html__( 'Left', 'kortez' ),
		'text-center'  	=> esc_html__( 'Center', 'kortez' ),   
		'text-right'	=> esc_html__( 'Right', 'kortez' ),
	),
	'priority'	   =>  80,
	'active_callback' => array(
		array(
			array(
				'setting'  => 'disable_latest_posts_section_title',
				'operator' => '==',
				'value'    => false,
			),
			array(
				'setting'  => 'disable_latest_posts_section_description',
				'operator' => '==',
				'value'    => false,
			),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Choose Category', 'kortez' ),
	'description' => esc_html__( 'Recent posts will show if any category is not chosen.', 'kortez' ),
	'type'        => 'select',
	'settings'    => 'latest_posts_category',
	'section'     => 'latest_posts_options',
	'default'     => '',
	'placeholder' => esc_html__( 'Select category', 'kortez' ), 
	'choices'     => kortez_get_post_categories(),
	'priority'	  =>  90,
) );

/**
 * Blog Responsive
 */
Kirki::add_section( 'blog_page_responsive', array(
    'title'          => esc_html__( 'Responsive', 'kortez' ),
    'description'    => esc_html__( 'These options will only apply to Tablet and Mobile devices. Please
    	click on below Tablet or Mobile Icons to see changes.', 'kortez' ),
    'capability'     => 'edit_theme_options',
    'priority'       => '50',
    'panel'			 => 'blog_homepage_options',		
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Disable Latest Posts', 'kortez' ),
	'type'         => 'checkbox',
	'settings'     => 'disable_mobile_latest_posts',
	'section'      => 'blog_page_responsive',
	'default'      => false,
	'priority'	   => 30,
	'active_callback' => array(
		array(
			'setting'  => 'disable_latest_posts_section',
			'operator' => '=',
			'value'    => false,
		),
	),
) );

/**
 * Blog Page
 */
Kirki::add_panel( 'blog_page_options', array(
    'title'          => esc_html__( 'Blog Page', 'kortez' ),
    'priority'       => '130',
) );

/**
 * Blog Page Style
 */
Kirki::add_section( 'blog_page_style_options', array(
    'title'      => esc_html__( 'Style', 'kortez' ),
    'panel'      => 'blog_page_options',	   
    'capability' => 'edit_theme_options',
    'priority'   => '10',
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Post Layouts', 'kortez' ),
	'description' => esc_html__( 'Grid / List / Single', 'kortez' ),
	'type'        => 'radio-image',
	'settings'    => 'archive_post_layout',
	'section'     => 'blog_page_style_options',
	'default'     => 'list',
	'choices'  	  => apply_filters( 'kortez_archive_post_layout_filter', array(
		'grid'           => get_template_directory_uri() . '/assets/images/grid-layout.png',
		'list'           => get_template_directory_uri() . '/assets/images/list-layout.png',
		'single'         => get_template_directory_uri() . '/assets/images/single-layout.png',
	) ),
	'priority'    => 10,
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Post View Number', 'kortez' ),
	'description' => esc_html__( 'Number of posts to show.', 'kortez' ),
	'type'        => 'number',
	'settings'    => 'archive_post_per_page',
	'section'     => 'blog_page_style_options',
	'default'     => 10,
	'choices'  => array(
		'min' => '0',
		'max' => '20',
		'step' => '1',
	),
	'priority'    => 20,
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Choose Image Size', 'kortez' ),
	'type'        => 'select',
	'settings'    => 'render_post_image_size',
	'section'     => 'blog_page_style_options',
	'default'     => '',
	'placeholder' => esc_html__( 'Select Image Size', 'kortez' ),
	'choices'     => kortez_get_intermediate_image_sizes(),
	'priority'    => 30,
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Posts Border Radius (px)', 'kortez' ),
	'type'        => 'slider',
	'settings'    => 'latest_posts_radius',
	'section'     => 'blog_page_style_options',
	'default'     =>  0,
	'transport'   => 'postMessage',
	'choices'     => array(
		'min'  => 0,
		'max'  => 50,
		'step' => 1,
	),
	'priority'    => 40,
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Post Title Color', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'blog_post_title_color',
	'section'      => 'blog_page_style_options',
	'default'      => '#101010',
	'priority'     => 50,
	'active_callback' => array(
		array(
			'setting'  => 'skin_select',
			'operator' => 'contains',
			'value'    => array( 'default', 'blackwhite' ),
		),
		array(
			'setting'  => 'hide_post_title',
			'operator' => '==',
			'value'    => false,
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Post Category Color', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'blog_post_category_color',
	'section'      => 'blog_page_style_options',
	'default'      => '#DB5362',
	'priority'     => 60,
	'active_callback' => array(
		array(
			'setting'  => 'hide_category',
			'operator' => '==',
			'value'    => false,
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Post Meta Color', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'blog_post_meta_color',
	'section'      => 'blog_page_style_options',
	'default'      => '#7a7a7a',
	'priority'     => 70,
	'active_callback' => array(
		array(
			'setting'  => 'skin_select',
			'operator' => 'contains',
			'value'    => array( 'default', 'blackwhite' ),
		),
		array(
			array(
				'setting'  => 'hide_date',
				'operator' => '==',
				'value'    => false,
			),
			array(
				'setting'  => 'hide_author',
				'operator' => '==',
				'value'    => false,
			),
			array(
				'setting'  => 'hide_comment',
				'operator' => '==',
				'value'    => false,
			),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Post Meta Icon Color', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'blog_post_meta_icon_color',
	'section'      => 'blog_page_style_options',
	'default'      => '#DB5362',
	'priority'     => 80,
	'active_callback' => array(
		array(
			array(
				'setting'  => 'hide_date',
				'operator' => '==',
				'value'    => false,
			),
			array(
				'setting'  => 'hide_author',
				'operator' => '==',
				'value'    => false,
			),
			array(
				'setting'  => 'hide_comment',
				'operator' => '==',
				'value'    => false,
			),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Post Text Color', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'blog_post_text_color',
	'section'      => 'blog_page_style_options',
	'default'      => '#333333',
	'priority'     => 90,
	'active_callback' => array(
		array(
			'setting'  => 'skin_select',
			'operator' => 'contains',
			'value'    => array( 'default', 'blackwhite' ),
		),
		array(
			'setting'  => 'hide_blog_page_excerpt',
			'operator' => '==',
			'value'    => false,
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Post Hover Color', 'kortez' ),
	'type'         => 'color',
	'settings'     => 'blog_post_hover_color',
	'section'      => 'blog_page_style_options',
	'default'      => '#086abd',
	'priority'     => 100,
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Disable Post Title', 'kortez' ),
	'type'        => 'checkbox',
	'settings'    => 'hide_post_title',
	'section'     => 'blog_page_style_options',
	'default'     => false,
	'priority'    => 110,
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Post Title Typography', 'kortez' ),
	'type'         => 'typography',
	'settings'     => 'blog_post_title_font_control',
	'section'      => 'blog_page_style_options',
	'default'  => array(
		'font-family'    => 'Poppins',
		'variant'        => '500',
		'font-size'      => '21px',
		'text-transform' => 'none',
		'line-height'    => '1.4',
	),
	'priority'    => 120,
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => '#primary article .entry-title',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'hide_post_title',
			'operator' => '==',
			'value'    => false,
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Disable Category', 'kortez' ),
	'type'        => 'checkbox',
	'settings'    => 'hide_category',
	'section'     => 'blog_page_style_options',
	'default'     => false,
	'priority'    => 130,
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Post Category Typography', 'kortez' ),
	'type'         => 'typography',
	'settings'     => 'blog_post_cat_font_control',
	'section'      => 'blog_page_style_options',
	'default'  => array(
		'font-family'    => 'Open Sans',
		'variant'        => '400',
		'font-size'      => '13px',
		'text-transform' => 'uppercase',
		'line-height'    => '1.6',
	),
	'priority'    => 140,
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => '#primary .post .entry-content .entry-header .cat-links a',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'hide_category',
			'operator' => '==',
			'value'    => false,
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Disable Date', 'kortez' ),
	'type'        => 'checkbox',
	'settings'    => 'hide_date',
	'section'     => 'blog_page_style_options',
	'default'     => false,
	'priority'    => 150,
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Disable Author', 'kortez' ),
	'type'        => 'checkbox',
	'settings'    => 'hide_author',
	'section'     => 'blog_page_style_options',
	'default'     => false,
	'priority'    => 160,
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Disable Comments Link', 'kortez' ),
	'type'        => 'checkbox',
	'settings'    => 'hide_comment',
	'section'     => 'blog_page_style_options',
	'default'     => false,
	'priority'    => 170,
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Post Meta Typography', 'kortez' ),
	'type'         => 'typography',
	'settings'     => 'blog_post_meta_font_control',
	'section'      => 'blog_page_style_options',
	'default'  => array(
		'font-family'    => 'Poppins',
		'variant'        => '400',
		'font-size'      => '13px',
		'text-transform' => 'capitalize',
		'line-height'    => '1.6',
	),
	'priority'    => 180,
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => '#primary .entry-meta',
		),
	),
	'active_callback' => array(
		array(
			array(
			'setting'  => 'hide_date',
			'operator' => '==',
			'value'    => false,
			),
			array(
			'setting'  => 'hide_author',
			'operator' => '==',
			'value'    => false,
			),
			array(
			'setting'  => 'hide_comment',
			'operator' => '==',
			'value'    => false,
			),
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Disable Excerpt', 'kortez' ),
	'type'        => 'checkbox',
	'settings'    => 'hide_blog_page_excerpt',
	'section'     => 'blog_page_style_options',
	'default'     => false,
	'priority'    => 190,
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Post Excerpt Typography', 'kortez' ),
	'type'         => 'typography',
	'settings'     => 'blog_post_excerpt_font_control',
	'section'      => 'blog_page_style_options',
	'default'  => array(
		'font-family'    => 'Open Sans',
		'variant'        => '400',
		'font-size'      => '15px',
		'text-transform' => 'initial',
		'line-height'    => '1.8',
	),
	'priority'    => 200,
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => '#primary .entry-text p',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'hide_blog_page_excerpt',
			'operator' => '==',
			'value'    => false,
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Excerpt Length', 'kortez' ),
	'description' => esc_html__( 'Select number of words to display in excerpt', 'kortez' ),
	'type'        => 'number',
	'settings'    => 'post_excerpt_length',
	'section'     => 'blog_page_style_options',
	'default'     => 15,
	'choices' => array(
		'min'  => '5',
		'max'  => '60',
		'step' => '5',
	),
	'priority'    => 210,
	'active_callback' => array(
		array(
			'setting'  => 'hide_blog_page_excerpt',
			'operator' => '==',
			'value'    => false,
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Disable Post Button', 'kortez' ),
	'type'        => 'checkbox',
	'settings'    => 'hide_post_button',
	'section'     => 'blog_page_style_options',
	'default'     => true,
	'priority'    => 220,
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Post Button', 'kortez' ),
	'type'         => 'repeater',
	'settings'     => 'blog_page_button_repeater',
	'section'      => 'blog_page_style_options',
	'row_label' => array(
		'type'  => 'text',
		'value' => esc_html__( 'Button', 'kortez' ),
	),
	'default' => array(
		array(
			'blog_btn_type' 		=> 'button-text',
			'blog_btn_bg_color'		=> '#DB5362',
			'blog_btn_border_color'	=> '#1a1a1a',
			'blog_btn_text_color'	=> '#1a1a1a',
			'blog_btn_hover_color'	=> '#086abd',
			'blog_btn_text' 		=> '',
			'blog_btn_radius'		=> 0,
		),		
	),
	'priority'    => 230,
	'fields' => array(
		'blog_btn_type' => array(
			'label'       => esc_html__( 'Button Type', 'kortez' ),
			'type'        => 'select',
			'default'     => 'button-text',
			'choices'  => array(
				'button-primary' => esc_html__( 'Background Button', 'kortez' ),
				'button-outline' => esc_html__( 'Border Button', 'kortez' ),
				'button-text'    => esc_html__( 'Text Only Button', 'kortez' ),
			),
		),
		'blog_btn_bg_color' => array(
			'label'       => esc_html__( 'Button Background Color', 'kortez' ),
			'description' => esc_html__( 'For background button type only.', 'kortez' ),
			'type'        => 'color',
			'default'     => '#DB5362',
		),
		'blog_btn_border_color' => array(
			'label'       => esc_html__( 'Button Border Color', 'kortez' ),
			'description' => esc_html__( 'For border button type only.', 'kortez' ),
			'type'        => 'color',
			'default'     => '#1a1a1a',
		),
		'blog_btn_text_color' => array(
			'label'       => esc_html__( 'Button Text Color', 'kortez' ),
			'type'        => 'color',
			'default'     => '#1a1a1a',
		),
		'blog_btn_hover_color' => array(
			'label'       => esc_html__( 'Button Hover Color', 'kortez' ),
			'type'        => 'color',
			'default'     => '#086abd',
		),
		'blog_btn_text' => array(
			'label'       => esc_html__( 'Button Text', 'kortez' ),
			'type'        => 'text',
			'default' 	  => '',
		),
		'blog_btn_radius' => array(
			'label'       => esc_html__( 'Button Radius (px)', 'kortez' ),
			'type'        => 'number',
			'default'	  => 0,
			'choices'     => array(
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
			'setting'  => 'hide_post_button',
			'operator' => '==',
			'value'    => false,
		),
	),
) );

Kirki::add_field( 'kortez', array(
	'label'        => esc_html__( 'Post Button Typography', 'kortez' ),
	'type'         => 'typography',
	'settings'     => 'blog_post_button_font_control',
	'section'      => 'blog_page_style_options',
	'default'  => array(
		'font-family'    => 'Open Sans',
		'variant'        => '600',
		'font-size'      => '14px',
		'text-transform' => 'capitalize',
		'line-height'    => '1.6',
	),
	'priority'    => 240,
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => '#primary .post .entry-text .button-container a',
		),
	),
	'active_callback' => array(
		array(
			'setting'  => 'hide_post_button',
			'operator' => '==',
			'value'    => false,
		),
	),
) );

/**
 * Blog Page Elements
 */
Kirki::add_section( 'blog_page_elements_options', array(
    'title'      => esc_html__( 'Elements', 'kortez' ),
    'panel'      => 'blog_page_options',	   
    'capability' => 'edit_theme_options',
    'priority'   => '20',
) );

Kirki::add_field( 'kortez',  array(
	'label'       => esc_html__( 'Blog Archive Pages Title', 'kortez' ),
	'type'        => 'select',
	'settings'    => 'disable_blog_page_title',
	'section'     => 'blog_page_elements_options',
	'default'     => 'enable_all_pages',
	'choices'     => array(
		'enable_all_pages'  => esc_html__( 'Enable in all', 'kortez' ),
		'disable_all_pages' => esc_html__( 'Disable from all', 'kortez' ),
	),
	'priority'    => 10,
) );

Kirki::add_field( 'kortez', array(
	'label'       => esc_html__( 'Disable Pagination', 'kortez' ),
	'type'        => 'checkbox',
	'settings'    => 'disable_pagination',
	'section'     => 'blog_page_elements_options',
	'default'     => false,
	'priority'    => 20,
) );