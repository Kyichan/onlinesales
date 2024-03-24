<?php

if ( class_exists("Kirki")){

	// LOGO

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'ecommerce_mega_store_logo_resizer',
		'label'       => esc_html__( 'Adjust Your Logo Size ', 'ecommerce-mega-store' ),
		'section'     => 'title_tagline',
		'default'     => 70,
		'choices'     => [
			'min'  => 10,
			'max'  => 300,
			'step' => 10,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecommerce_mega_store_enable_logo_text',
		'section'     => 'title_tagline',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Site Title and Tagline', 'ecommerce-mega-store' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'ecommerce_mega_store_display_header_title',
		'label'       => esc_html__( 'Site Title Enable / Disable Button', 'ecommerce-mega-store' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'ecommerce-mega-store' ),
			'off' => esc_html__( 'Disable', 'ecommerce-mega-store' ),
		],
		'partial_refresh'    => [
		'ecommerce_mega_store_display_header_title' => [
			'selector'        => '.logo a',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'ecommerce_mega_store_display_header_text',
		'label'       => esc_html__( 'Tagline Enable / Disable Button', 'ecommerce-mega-store' ),
		'section'     => 'title_tagline',
		'default'     => false,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'ecommerce-mega-store' ),
			'off' => esc_html__( 'Disable', 'ecommerce-mega-store' ),
		],
		'partial_refresh'    => [
		'ecommerce_mega_store_display_header_text' => [
			'selector'        => '.logo-content span',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

	//FONT STYLE TYPOGRAPHY

	Kirki::add_panel( 'ecommerce_mega_store_panel_id', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Typography', 'ecommerce-mega-store' ),
	) );

	Kirki::add_section( 'ecommerce_mega_store_font_style_section', array(
		'title'      => esc_attr__( 'Typography Option',  'ecommerce-mega-store' ),
		'priority'   => 2,
		'capability' => 'edit_theme_options',
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecommerce_mega_store_all_headings_typography',
		'section'     => 'ecommerce_mega_store_font_style_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading Of All Sections',  'ecommerce-mega-store' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'global', array(
		'type'        => 'typography',
		'settings'    => 'ecommerce_mega_store_all_headings_typography',
		'label'       => esc_attr__( 'Heading Typography',  'ecommerce-mega-store' ),
		'description' => esc_attr__( 'Select the typography options for your heading.',  'ecommerce-mega-store' ),
		'help'        => esc_attr__( 'The typography options you set here will override the Body Typography options for all headers on your site (post titles, widget titles etc).',  'ecommerce-mega-store' ),
		'section'     => 'ecommerce_mega_store_font_style_section',
		'priority'    => 10,
		'default'     => array(
			'font-family'    => '',
			'variant'        => '',
		),
		'output' => array(
			array(
				'element' => array( 'h1','h2','h3','h4','h5','h6', ),
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecommerce_mega_store_body_content_typography',
		'section'     => 'ecommerce_mega_store_font_style_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Body Content',  'ecommerce-mega-store' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'global', array(
		'type'        => 'typography',
		'settings'    => 'ecommerce_mega_store_body_content_typography',
		'label'       => esc_attr__( 'Content Typography',  'ecommerce-mega-store' ),
		'description' => esc_attr__( 'Select the typography options for your content.',  'ecommerce-mega-store' ),
		'help'        => esc_attr__( 'The typography options you set here will override the Body Typography options for all headers on your site (post titles, widget titles etc).',  'ecommerce-mega-store' ),
		'section'     => 'ecommerce_mega_store_font_style_section',
		'priority'    => 10,
		'default'     => array(
			'font-family'    => '',
			'variant'        => '',
		),
		'output' => array(
			array(
				'element' => array( 'body', ),
			),
		),
	) );

	// COLOR SECTION

	Kirki::add_section( 'ecommerce_mega_store_section_color', array(
	    'title'          => esc_html__( 'Global Color', 'ecommerce-mega-store' ),
	    'description'    => esc_html__( 'Theme Color Settings', 'ecommerce-mega-store' ),
	    'panel'          => 'ecommerce_mega_store_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecommerce_mega_store_global_colors',
		'section'     => 'ecommerce_mega_store_section_color',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Here you can change your theme color on one click.', 'ecommerce-mega-store' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'ecommerce_mega_store_global_color',
		'label'       => __( 'choose your Appropriate Color', 'ecommerce-mega-store' ),
		'section'     => 'ecommerce_mega_store_section_color',
		'default'     => '#22233f',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'ecommerce_mega_store_global_color_2',
		'label'       => __( 'choose your Appropriate Color', 'ecommerce-mega-store' ),
		'section'     => 'ecommerce_mega_store_section_color',
		'default'     => '#f15f3d',
	] );

	// PANEL

	Kirki::add_panel( 'ecommerce_mega_store_panel_id', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Theme Options', 'ecommerce-mega-store' ),
	) );

	// Additional Settings

	Kirki::add_section( 'ecommerce_mega_store_additional_settings', array(
	    'title'          => esc_html__( 'Additional Settings', 'ecommerce-mega-store' ),
	    'description'    => esc_html__( 'Scroll To Top', 'ecommerce-mega-store' ),
	    'panel'          => 'ecommerce_mega_store_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'ecommerce_mega_store_scroll_enable_setting',
		'label'       => esc_html__( 'Here you can enable or disable your scroller.', 'ecommerce-mega-store' ),
		'section'     => 'ecommerce_mega_store_additional_settings',
		'default'     => '1',
		'priority'    => 10,
		'partial_refresh'    => [
		'ecommerce_mega_store_scroll_enable_setting' => [
			'selector'        => '.scroll-up a',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

	new \Kirki\Field\Radio_Buttonset( [
		'settings'    => 'ecommerce_mega_store_scroll_top_position',
		'label'       => esc_html__( 'Alignment for Scroll To Top', 'ecommerce-mega-store' ),
		'section'     => 'ecommerce_mega_store_additional_settings',
		'default'     => 'Right',
		'priority'    => 10,
		'choices'     => [
			'Left'   => esc_html__( 'Left', 'ecommerce-mega-store' ),
			'Center' => esc_html__( 'Center', 'ecommerce-mega-store' ),
			'Right'  => esc_html__( 'Right', 'ecommerce-mega-store' ),
		],
	]
	);

	new \Kirki\Field\Select(
	[
		'settings'    => 'menu_text_transform_ecommerce_mega_store',
		'label'       => esc_html__( 'Menus Text Transform', 'ecommerce-mega-store' ),
		'section'     => 'ecommerce_mega_store_additional_settings',
		'default'     => 'UPPERCASE',
		'placeholder' => esc_html__( 'Choose an option', 'ecommerce-mega-store' ),
		'choices'     => [
			'CAPITALISE' => esc_html__( 'CAPITALISE', 'ecommerce-mega-store' ),
			'UPPERCASE' => esc_html__( 'UPPERCASE', 'ecommerce-mega-store' ),
			'LOWERCASE' => esc_html__( 'LOWERCASE', 'ecommerce-mega-store' ),

		],
	]	);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'ecommerce_mega_store_container_width',
		'label'       => esc_html__( 'Theme Container Width', 'ecommerce-mega-store' ),
		'section'     => 'ecommerce_mega_store_additional_settings',
		'default'     => 100,
		'choices'     => [
			'min'  => 50,
			'max'  => 100,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'ecommerce_mega_store_sticky_header',
		'label'       => esc_html__( 'Here you can enable or disable your Sticky Header.', 'ecommerce-mega-store' ),
		'section'     => 'ecommerce_mega_store_additional_settings',
		'default'     => false,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'ecommerce_mega_store_site_loader',
		'label'       => esc_html__( 'Here you can enable or disable your Site Loader.', 'ecommerce-mega-store' ),
		'section'     => 'ecommerce_mega_store_additional_settings',
		'default'     => false,
		'priority'    => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'ecommerce_mega_store_page_layout',
		'label'       => esc_html__( 'Page Layout Setting', 'ecommerce-mega-store' ),
		'section'     => 'ecommerce_mega_store_additional_settings',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'ecommerce-mega-store' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','ecommerce-mega-store'),
            'Right Sidebar' => __('Right Sidebar','ecommerce-mega-store'),
            'One Column' => __('One Column','ecommerce-mega-store')
		],
	] );

	// Woocommerce Settings

	Kirki::add_section( 'ecommerce_ecommerce_mega_store_settings', array(
			'title'          => esc_html__( 'Woocommerce Settings', 'ecommerce-mega-store' ),
			'description'    => esc_html__( 'Shop Page', 'ecommerce-mega-store' ),
			'panel'          => 'ecommerce_mega_store_panel_id',
			'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'ecommerce_mega_store_shop_sidebar',
		'label'       => esc_html__( 'Here you can enable or disable shop page sidebar.', 'ecommerce-mega-store' ),
		'section'     => 'ecommerce_ecommerce_mega_store_settings',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'ecommerce_mega_store_product_sidebar',
		'label'       => esc_html__( 'Here you can enable or disable product page sidebar.', 'ecommerce-mega-store' ),
		'section'     => 'ecommerce_ecommerce_mega_store_settings',
		'default'     => '1',
		'priority'    => 10,
	] );


	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'ecommerce_mega_store_related_product_setting',
		'label'       => esc_html__( 'Here you can enable or disable your related products.', 'ecommerce-mega-store' ),
		'section'     => 'ecommerce_ecommerce_mega_store_settings',
		'default'     => true,
		'priority'    => 10,
	] );

	new \Kirki\Field\Number(
		[
			'settings' => 'ecommerce_mega_store_per_columns',
			'label'    => esc_html__( 'Product Per Row', 'ecommerce-mega-store' ),
			'section'  => 'ecommerce_ecommerce_mega_store_settings',
			'default'  => 3,
			'choices'  => [
				'min'  => 1,
				'max'  => 4,
				'step' => 1,
			],
		]
	);

	new \Kirki\Field\Number(
		[
			'settings' => 'ecommerce_mega_store_product_per_page',
			'label'    => esc_html__( 'Product Per Page', 'ecommerce-mega-store' ),
			'section'  => 'ecommerce_ecommerce_mega_store_settings',
			'default'  => 9,
			'choices'  => [
				'min'  => 1,
				'max'  => 15,
				'step' => 1,
			],
		]
	);

	new \Kirki\Field\Select(
	[
		'settings'    => 'ecommerce_mega_store_shop_page_layout',
		'label'       => esc_html__( 'Shop Page Layout Setting', 'ecommerce-mega-store' ),
		'section'     => 'ecommerce_ecommerce_mega_store_settings',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'ecommerce-mega-store' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','ecommerce-mega-store'),
            'Right Sidebar' => __('Right Sidebar','ecommerce-mega-store')
		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'ecommerce_mega_store_product_page_layout',
		'label'       => esc_html__( 'Product Page Layout Setting', 'ecommerce-mega-store' ),
		'section'     => 'ecommerce_ecommerce_mega_store_settings',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'ecommerce-mega-store' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','ecommerce-mega-store'),
            'Right Sidebar' => __('Right Sidebar','ecommerce-mega-store')
		],
	] );

	// POST SECTION

	Kirki::add_section( 'ecommerce_mega_store_section_post', array(
	    'title'          => esc_html__( 'Post Settings', 'ecommerce-mega-store' ),
	    'description'    => esc_html__( 'Here you can get different post settings', 'ecommerce-mega-store' ),
	    'panel'          => 'ecommerce_mega_store_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecommerce_mega_store_enable_post_heading',
		'section'     => 'ecommerce_mega_store_section_post',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Post Settings.', 'ecommerce-mega-store' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'ecommerce_mega_store_blog_admin_enable',
		'label'       => esc_html__( 'Post Author Enable / Disable Button', 'ecommerce-mega-store' ),
		'section'     => 'ecommerce_mega_store_section_post',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'ecommerce-mega-store' ),
			'off' => esc_html__( 'Disable', 'ecommerce-mega-store' ),
		],
		'partial_refresh'    => [
		'ecommerce_mega_store_blog_admin_enable' => [
			'selector'        => 'h3.post-title',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'ecommerce_mega_store_blog_comment_enable',
		'label'       => esc_html__( 'Post Comment Enable / Disable Button', 'ecommerce-mega-store' ),
		'section'     => 'ecommerce_mega_store_section_post',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'ecommerce-mega-store' ),
			'off' => esc_html__( 'Disable', 'ecommerce-mega-store' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'ecommerce_mega_store_post_excerpt_number',
		'label'       => esc_html__( 'Number of text to show', 'ecommerce-mega-store' ),
		'section'     => 'ecommerce_mega_store_section_post',
		'default'     => 15,
		'choices'     => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'ecommerce_mega_store_pagination_setting',
		'label'       => esc_html__( 'Here you can enable or disable your Pagination.', 'ecommerce-mega-store' ),
		'section'     => 'ecommerce_mega_store_section_post',
		'default'     => true,
		'priority'    => 10,
	] );

		new \Kirki\Field\Select(
	[
		'settings'    => 'ecommerce_mega_store_archive_sidebar_layout',
		'label'       => esc_html__( 'Archive Post Sidebar Layout Setting', 'ecommerce-mega-store' ),
		'section'     => 'ecommerce_mega_store_section_post',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'ecommerce-mega-store' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','ecommerce-mega-store'),
            'Right Sidebar' => __('Right Sidebar','ecommerce-mega-store')
		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'ecommerce_mega_store_single_post_sidebar_layout',
		'label'       => esc_html__( 'Single Post Sidebar Layout Setting', 'ecommerce-mega-store' ),
		'section'     => 'ecommerce_mega_store_section_post',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'ecommerce-mega-store' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','ecommerce-mega-store'),
            'Right Sidebar' => __('Right Sidebar','ecommerce-mega-store')
		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'ecommerce_mega_store_search_sidebar_layout',
		'label'       => esc_html__( 'Search Page Sidebar Layout Setting', 'ecommerce-mega-store' ),
		'section'     => 'ecommerce_mega_store_section_post',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'ecommerce-mega-store' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','ecommerce-mega-store'),
            'Right Sidebar' => __('Right Sidebar','ecommerce-mega-store')
		],
	] );

	// HEADER SECTION

	Kirki::add_section( 'ecommerce_mega_store_section_header', array(
	    'title'          => esc_html__( 'Header Settings', 'ecommerce-mega-store' ),
	    'description'    => esc_html__( 'Here you can add header information.', 'ecommerce-mega-store' ),
	    'panel'          => 'ecommerce_mega_store_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecommerce_mega_store_links_heading',
		'section'     => 'ecommerce_mega_store_section_header',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Top Header Text and URL', 'ecommerce-mega-store' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'       => esc_html__( 'Text 1', 'ecommerce-mega-store' ),
		'settings' => 'ecommerce_mega_store_free_delivery_text',
		'section'  => 'ecommerce_mega_store_section_header',
		'default'  => '',
		'priority' => 10,
		'partial_refresh'    => [
		'ecommerce_mega_store_free_delivery_text' => [
			'selector'        => '.topheader a',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'url',
		'label'       => esc_html__( 'URL 1', 'ecommerce-mega-store' ),
		'settings' => 'ecommerce_mega_store_free_delivery_link',
		'section'  => 'ecommerce_mega_store_section_header',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'       => esc_html__( 'Text 2', 'ecommerce-mega-store' ),
		'settings' => 'ecommerce_mega_store_return_policy_text',
		'section'  => 'ecommerce_mega_store_section_header',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'url',
		'label'       => esc_html__( 'URL 2', 'ecommerce-mega-store' ),
		'settings' => 'ecommerce_mega_store_return_policy_link',
		'section'  => 'ecommerce_mega_store_section_header',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecommerce_mega_store_phone_number_heading',
		'section'     => 'ecommerce_mega_store_section_header',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Phone Number', 'ecommerce-mega-store' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'ecommerce_mega_store_phone_number',
		'section'  => 'ecommerce_mega_store_section_header',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecommerce_mega_store_myaccount_link_heading',
		'section'     => 'ecommerce_mega_store_section_header',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'My Account URL', 'ecommerce-mega-store' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'url',
		'settings' => 'ecommerce_mega_store_myaccount_link',
		'section'  => 'ecommerce_mega_store_section_header',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecommerce_mega_store_enable_google_translation',
		'section'     => 'ecommerce_mega_store_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Google Translation Box', 'ecommerce-mega-store' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'ecommerce_mega_store_header_google_translation',
		'section'     => 'ecommerce_mega_store_section_header',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'ecommerce-mega-store' ),
			'off' => esc_html__( 'Disable', 'ecommerce-mega-store' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecommerce_mega_store_enable_search',
		'section'     => 'ecommerce_mega_store_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Search Box', 'ecommerce-mega-store' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'ecommerce_mega_store_search_box_enable',
		'section'     => 'ecommerce_mega_store_section_header',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'ecommerce-mega-store' ),
			'off' => esc_html__( 'Disable', 'ecommerce-mega-store' ),
		],
		'partial_refresh'    => [
		'ecommerce_mega_store_search_box_enable' => [
			'selector'        => '.header-search',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecommerce_mega_store_enable_socail_link',
		'section'     => 'ecommerce_mega_store_section_header',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Social Media Link', 'ecommerce-mega-store' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'repeater',
		'section'     => 'ecommerce_mega_store_section_header',
		'priority'    => 10,
		'row_label' => [
			'type'  => 'field',
			'value' => esc_html__( 'Social Icon', 'ecommerce-mega-store' ),
			'field' => 'link_text',
		],
		'button_label' => esc_html__('Add New Social Icon', 'ecommerce-mega-store' ),
		'settings'     => 'ecommerce_mega_store_social_links_settings',
		'default'      => '',
		'fields' 	   => [
			'link_text' => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon', 'ecommerce-mega-store' ),
				'description' => esc_html__( 'Add the fontawesome class ex: "fab fa-facebook-f".', 'ecommerce-mega-store' ),
				'default'     => '',
			],
			'link_url' => [
				'type'        => 'url',
				'label'       => esc_html__( 'Social Link', 'ecommerce-mega-store' ),
				'description' => esc_html__( 'Add the social icon url here.', 'ecommerce-mega-store' ),
				'default'     => '',
			],
		],
		'choices' => [
			'limit' => 5
		],
	] );

	// SLIDER SECTION

	Kirki::add_section( 'ecommerce_mega_store_blog_slide_section', array(
        'title'          => esc_html__( ' Slider Settings', 'ecommerce-mega-store' ),
        'description'    => esc_html__( 'You have to select post category to show slider.', 'ecommerce-mega-store' ),
        'panel'          => 'ecommerce_mega_store_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecommerce_mega_store_enable_heading',
		'section'     => 'ecommerce_mega_store_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Slider', 'ecommerce-mega-store' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'ecommerce_mega_store_blog_box_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'ecommerce-mega-store' ),
		'section'     => 'ecommerce_mega_store_blog_slide_section',
		'default'     => false,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'ecommerce-mega-store' ),
			'off' => esc_html__( 'Disable', 'ecommerce-mega-store' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'ecommerce_mega_store_title_unable_disable',
		'label'       => esc_html__( 'Slide Title Enable / Disable', 'ecommerce-mega-store' ),
		'section'     => 'ecommerce_mega_store_blog_slide_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'ecommerce-mega-store' ),
			'off' => esc_html__( 'Disable', 'ecommerce-mega-store' ),
		],
		'partial_refresh'    => [
		'ecommerce_mega_store_title_unable_disable' => [
			'selector'        => '.blog_box h3',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'ecommerce_mega_store_text_unable_disable',
		'label'       => esc_html__( 'Slide Text Enable / Disable', 'ecommerce-mega-store' ),
		'section'     => 'ecommerce_mega_store_blog_slide_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'ecommerce-mega-store' ),
			'off' => esc_html__( 'Disable', 'ecommerce-mega-store' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'ecommerce_mega_store_button_unable_disable',
		'label'       => esc_html__( 'Slide Button Enable / Disable', 'ecommerce-mega-store' ),
		'section'     => 'ecommerce_mega_store_blog_slide_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'ecommerce-mega-store' ),
			'off' => esc_html__( 'Disable', 'ecommerce-mega-store' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecommerce_mega_store_slider_heading',
		'section'     => 'ecommerce_mega_store_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Slider', 'ecommerce-mega-store' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'ecommerce_mega_store_blog_slide_number',
		'label'       => esc_html__( 'Number of slides to show', 'ecommerce-mega-store' ),
		'section'     => 'ecommerce_mega_store_blog_slide_section',
		'default'     => 0,
		'choices'     => [
			'min'  => 1,
			'max'  => 5,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'settings'    => 'ecommerce_mega_store_blog_slide_category',
		'label'       => esc_html__( 'Select the category to show slider ( Image Dimension 1600 x 600 )', 'ecommerce-mega-store' ),
		'section'     => 'ecommerce_mega_store_blog_slide_section',
		'default'     => '',
		'placeholder' => esc_html__( 'Select an category...', 'ecommerce-mega-store' ),
		'priority'    => 10,
		'choices'     => ecommerce_mega_store_get_categories_select(),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'ecommerce_mega_store_slide_excerpt_number',
		'label'       => esc_html__( 'Number of text to show', 'ecommerce-mega-store' ),
		'section'     => 'ecommerce_mega_store_blog_slide_section',
		'default'     => 15,
		'choices'     => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'ecommerce_mega_store_slider_content_alignment',
		'label'       => esc_html__( 'Slider Content Alignment', 'ecommerce-mega-store' ),
		'section'     => 'ecommerce_mega_store_blog_slide_section',
		'default'     => 'CENTER-ALIGN',
		'placeholder' => esc_html__( 'Choose an option', 'ecommerce-mega-store' ),
		'choices'     => [
			'LEFT-ALIGN' => esc_html__( 'LEFT-ALIGN', 'ecommerce-mega-store' ),
			'CENTER-ALIGN' => esc_html__( 'CENTER-ALIGN', 'ecommerce-mega-store' ),
			'RIGHT-ALIGN' => esc_html__( 'RIGHT-ALIGN', 'ecommerce-mega-store' ),

		],
	] );

		new \Kirki\Field\Select(
	[
		'settings'    => 'ecommerce_mega_store_slider_opacity_color',
		'label'       => esc_html__( 'Slider Opacity Option', 'ecommerce-mega-store' ),
		'section'     => 'ecommerce_mega_store_blog_slide_section',
		'default'     => '0.6',
		'placeholder' => esc_html__( 'Choose an option', 'ecommerce-mega-store' ),
		'choices'     => [
			'0' => esc_html__( '0', 'ecommerce-mega-store' ),
			'0.1' => esc_html__( '0.1', 'ecommerce-mega-store' ),
			'0.2' => esc_html__( '0.2', 'ecommerce-mega-store' ),
			'0.3' => esc_html__( '0.3', 'ecommerce-mega-store' ),
			'0.4' => esc_html__( '0.4', 'ecommerce-mega-store' ),
			'0.5' => esc_html__( '0.5', 'ecommerce-mega-store' ),
			'0.6' => esc_html__( '0.6', 'ecommerce-mega-store' ),
			'0.7' => esc_html__( '0.7', 'ecommerce-mega-store' ),
			'0.8' => esc_html__( '0.8', 'ecommerce-mega-store' ),
			'0.9' => esc_html__( '0.9', 'ecommerce-mega-store' ),
			'1.0' => esc_html__( '1.0', 'ecommerce-mega-store' ),
			

		],
	] );

	 Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'ecommerce_mega_store_overlay_option',
		'label'       => esc_html__( 'Enable / Disable Slider Overlay', 'ecommerce-mega-store' ),
		'section'     => 'ecommerce_mega_store_blog_slide_section',
		'default'     => false,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'ecommerce-mega-store' ),
			'off' => esc_html__( 'Disable', 'ecommerce-mega-store' ),
		],
	] );

	 Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'ecommerce_mega_store_slider_image_overlay_color',
		'label'       => __( 'choose your Appropriate Overlay Color', 'ecommerce-mega-store' ),
		'section'     => 'ecommerce_mega_store_blog_slide_section',
		'default'     => '',
	] );

	//OUR COLECTION SECTION

	Kirki::add_section( 'ecommerce_mega_store_our_collection_section', array(
	    'title'          => esc_html__( 'Our Collection Settings', 'ecommerce-mega-store' ),
	    'description'    => esc_html__( 'Here you can add different type of social icons.', 'ecommerce-mega-store' ),
	    'panel'          => 'ecommerce_mega_store_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecommerce_mega_store_enable_heading',
		'section'     => 'ecommerce_mega_store_our_collection_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Our Collection',  'ecommerce-mega-store' ) . '</h3>',
		'priority'    => 1,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'ecommerce_mega_store_our_collection_section_enable',
		'label'       => esc_html__( 'Section Enable / Disable',  'ecommerce-mega-store' ),
		'section'     => 'ecommerce_mega_store_our_collection_section',
		'default'     => false,
		'priority'    => 2,
		'choices'     => [
			'on'  => esc_html__( 'Enable',  'ecommerce-mega-store' ),
			'off' => esc_html__( 'Disable',  'ecommerce-mega-store' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecommerce_mega_store_our_collection_heading_1',
		'section'     => 'ecommerce_mega_store_our_collection_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Our Collection Section ',  'ecommerce-mega-store' ) . '</h3>',
		'priority'    => 3,
		'partial_refresh'    => [
		'ecommerce_mega_store_our_collection_heading_1' => [
			'selector'        => '#our-collection h2',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

	Kirki::add_field( 'theme_config_id', [
        'type'     => 'text',
        'settings' => 'ecommerce_mega_store_our_collection_sub_heading' ,
        'label'    => esc_html__( 'Sub Heading',  'ecommerce-mega-store' ),
        'section'  => 'ecommerce_mega_store_our_collection_section',

    ] );

	Kirki::add_field( 'theme_config_id', [
        'type'     => 'text',
        'settings' => 'ecommerce_mega_store_our_collection_heading' ,
        'label'    => esc_html__( 'Heading',  'ecommerce-mega-store' ),
        'section'  => 'ecommerce_mega_store_our_collection_section',
    ] );

    kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'ecommerce_mega_store_our_collection_tab_number',
		'label'       => esc_html__( 'Number of post to show ',  'ecommerce-mega-store' ),
		'section'     => 'ecommerce_mega_store_our_collection_section',
		'default'     => 4,
		'choices'     => [
			'min'  => 0,
			'max'  => 80,
			'step' => 1,
		],
	] );

	// FOOTER SECTION

	Kirki::add_section( 'ecommerce_mega_store_footer_section', array(
        'title'          => esc_html__( 'Footer Settings', 'ecommerce-mega-store' ),
        'description'    => esc_html__( 'Here you can change copyright text', 'ecommerce-mega-store' ),
        'panel'          => 'ecommerce_mega_store_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecommerce_mega_store_footer_enable_heading',
		'section'     => 'ecommerce_mega_store_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Footer Link', 'ecommerce-mega-store' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'ecommerce_mega_store_copyright_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'ecommerce-mega-store' ),
		'section'     => 'ecommerce_mega_store_footer_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'ecommerce-mega-store' ),
			'off' => esc_html__( 'Disable', 'ecommerce-mega-store' ),
		],
		'partial_refresh'    => [
		'ecommerce_mega_store_copyright_enable' => [
			'selector'        => '.copy-text p',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecommerce_mega_store_footer_text_heading',
		'section'     => 'ecommerce_mega_store_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Text', 'ecommerce-mega-store' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'ecommerce_mega_store_footer_text',
		'section'  => 'ecommerce_mega_store_footer_section',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'ecommerce_mega_store_footer_text_heading_2',
		'section'     => 'ecommerce_mega_store_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Alignment', 'ecommerce-mega-store' ) . '</h3>',
		'priority'    => 10,
		] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'ecommerce_mega_store_copyright_text_alignment',
		'label'       => esc_html__( 'Copyright text Alignment', 'ecommerce-mega-store' ),
		'section'     => 'ecommerce_mega_store_footer_section',
		'default'     => 'LEFT-ALIGN',
		'placeholder' => esc_html__( 'Choose an option', 'ecommerce-mega-store' ),
		'choices'     => [
			'LEFT-ALIGN' => esc_html__( 'LEFT-ALIGN', 'ecommerce-mega-store' ),
			'CENTER-ALIGN' => esc_html__( 'CENTER-ALIGN', 'ecommerce-mega-store' ),
			'RIGHT-ALIGN' => esc_html__( 'RIGHT-ALIGN', 'ecommerce-mega-store' ),

		],
	] );

	Kirki::add_field( 'theme_config_id', [
	'type'        => 'custom',
	'settings'    => 'ecommerce_mega_store_footer_text_heading_1',
	'section'     => 'ecommerce_mega_store_footer_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Background Color', 'ecommerce-mega-store' ) . '</h3>',
	'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'ecommerce_mega_store_copyright_bg',
		'label'       => __( 'Choose Your Copyright Background Color', 'ecommerce-mega-store' ),
		'section'     => 'ecommerce_mega_store_footer_section',
		'default'     => '',
	] );
}

add_action( 'customize_register', 'ecommerce_mega_store_customizer_settings' );
function ecommerce_mega_store_customizer_settings( $wp_customize ) {
	$wp_customize->add_setting('ecommerce_mega_store_our_collection_tab_number',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('ecommerce_mega_store_our_collection_tab_number',array(
		'type' => 'number',
		'label' => __('Show number of product tab','ecommerce-mega-store'),
		'section' => 'ecommerce_mega_store_our_collection_section',
	));

	$ecommerce_mega_store_collection_post = get_theme_mod('ecommerce_mega_store_our_collection_tab_number','');
    for ( $ecommerce_mega_store_j = 1; $ecommerce_mega_store_j <= $ecommerce_mega_store_collection_post; $ecommerce_mega_store_j++ ) {

		$wp_customize->add_setting('ecommerce_mega_store_our_collection_tabs_text'.$ecommerce_mega_store_j,array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control('ecommerce_mega_store_our_collection_tabs_text'.$ecommerce_mega_store_j,array(
			'type' => 'text',
			'label' => __('Tab Text ','ecommerce-mega-store').$ecommerce_mega_store_j,
			'section' => 'ecommerce_mega_store_our_collection_section',
		));

		$ecommerce_mega_store_args = array(
	       'type'                     => 'product',
	        'child_of'                 => 0,
	        'parent'                   => '',
	        'orderby'                  => 'term_group',
	        'order'                    => 'ASC',
	        'hide_empty'               => false,
	        'hierarchical'             => 1,
	        'number'                   => '',
	        'taxonomy'                 => 'product_cat',
	        'pad_counts'               => false
	    );
		$categories = get_categories($ecommerce_mega_store_args);
		$ecommerce_mega_store_cat_posts = array();
		$ecommerce_mega_store_m = 0;
		$ecommerce_mega_store_cat_posts[]='Select';
		foreach($categories as $category){
			if($ecommerce_mega_store_m==0){
				$default = $category->slug;
				$ecommerce_mega_store_m++;
			}
			$ecommerce_mega_store_cat_posts[$category->slug] = $category->name;
		}

		$wp_customize->add_setting('ecommerce_mega_store_our_collection_category'.$ecommerce_mega_store_j,array(
			'default'	=> 'select',
			'sanitize_callback' => 'ecommerce_mega_store_sanitize_select',
		));

		$wp_customize->add_control('ecommerce_mega_store_our_collection_category'.$ecommerce_mega_store_j,array(
			'type'    => 'select',
			'choices' => $ecommerce_mega_store_cat_posts,
			'label' => __('Select category to display products ','ecommerce-mega-store').$ecommerce_mega_store_j,
			'section' => 'ecommerce_mega_store_our_collection_section',
		));
	}
}
