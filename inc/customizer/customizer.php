<?php
/**
 * 99fy Theme Customizer
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function nnfy_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'nnfy_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function nnfy_customize_preview_js() {
	wp_enqueue_script( 'nnfy_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '', true );
}
add_action( 'customize_preview_init', 'nnfy_customize_preview_js' );


// 99fy
add_action( 'customize_register', 'nnfy_customizer_settings' );
function nnfy_customizer_settings( $wp_customize ){
	// panel
	$wp_customize->add_panel( 'nnfy_panel', array(
		'title'          => __('99FY Options', '99fy'),
	) );

	// //section
	$wp_customize->add_section('nnfy_general_settings',array(
		'title'     => __('General Optinos','99fy'),
		'panel'		=> 'nnfy_panel'
	));
	$wp_customize->add_section('nnfy_header_settings',array(
		'title'     => __('Header Optinos', '99fy'),
		'panel'		=> 'nnfy_panel'
	));
	$wp_customize->add_section('nnfy_pt_settings',array(
		'title'     => __('Page title Options','99fy'),
		'panel'		=> 'nnfy_panel'
	));
	$wp_customize->add_section('nnfy_blog_settings',array(
		'title'     => __('Blog Options','99fy'),
		'panel'		=> 'nnfy_panel'
	));
	$wp_customize->add_section('nnfy_footer_settings',array(
		'title'     => __('Footer Optinos','99fy'),
		'panel'		=> 'nnfy_panel'
	));


	// settings
	$wp_customize->add_setting('nnfy_topbar_status',array(
		'default'     => 'off',
		'transport'   => 'refresh',
		'sanitize_callback'	=> 'nnfy_sanitize_select'
	));
	$wp_customize->add_control( 'nnfy_topbar_status', array(
		'section'	=> 'nnfy_header_settings',
	    'label' => __('Enable / Disable topbar','99fy'),
		'type'	 => 'radio',
		'choices'	=> array(
			'on'	=> __('Enable','99fy'),
			'off'	=> __('Disable','99fy'),
		)
	) );


	$wp_customize->add_setting('nnfy_topbar_left',array(
		'sanitize_callback'	=> 'nnfy_sanitize_input',
		'default'     => __('Call Us : 012036 039 &nbsp; &nbsp;|&nbsp; &nbsp;  Email : yourmail@gmail.com','99fy'),
		'transport'   => 'postMessage',
	));
	$wp_customize->add_control( 'nnfy_topbar_left', array(
		'section'	=> 'nnfy_header_settings',
	    'label' => __('Topbar left','99fy'),
		'type'	 => 'textarea',
	) );


	$wp_customize->add_setting('nnfy_topbar_search',array(
		'default'     => 'on',
		'transport'   => 'refresh',
		'sanitize_callback'	=> 'nnfy_sanitize_checkbox'
	));
	$wp_customize->add_control( 'nnfy_topbar_search', array(
		'section'	=> 'nnfy_header_settings',
	    'label' => __('Enable / Disable Search','99fy'),
		'type'	 => 'checkbox'
	) );


	$wp_customize->add_setting('nnfy_topbar_myaccount',array(
		'default'     => 'off',
		'transport'   => 'refresh',
		'sanitize_callback'	=> 'nnfy_sanitize_checkbox'
	));
	$wp_customize->add_control( 'nnfy_topbar_myaccount', array(
		'section'	=> 'nnfy_header_settings',
	    'label' => __('Enable / Disable Myaccount', '99fy'),
		'type'	 => 'checkbox'
	) );


	$wp_customize->add_setting('nnfy_topbar_wishlist',array(
		'default'     => 'off',
		'transport'   => 'refresh',
		'sanitize_callback'	=> 'nnfy_sanitize_checkbox'
	));
	$wp_customize->add_control( 'nnfy_topbar_wishlist', array(
		'section'	=> 'nnfy_header_settings',
	    'label' => __('Enable / Disable Wishlist','99fy'),
		'type'	 => 'checkbox'
	) );


	$wp_customize->add_setting('nnfy_topbar_cart',array(
		'default'     => 'off',
		'transport'   => 'refresh',
		'sanitize_callback'	=> 'nnfy_sanitize_checkbox'
	));
	$wp_customize->add_control( 'nnfy_topbar_cart', array(
		'section'	=> 'nnfy_header_settings',
	    'label' => __('Enable / Disable Cart','99fy'),
		'type'	 => 'checkbox'
	) );

	$wp_customize->get_control( 'custom_logo' )->section  = 'nnfy_header_settings';


	$wp_customize->add_setting('nnfy_footer_top',array(
		'default'     => 'off',
		'transport'   => 'refresh',
		'sanitize_callback'	=> 'nnfy_sanitize_checkbox'
	));
	$wp_customize->add_control( 'nnfy_footer_top', array(
		'section'	=> 'nnfy_footer_settings',
	    'label' => __('Enable / Disable Footer','99fy'),
		'type'	 => 'checkbox'
	) );


	$wp_customize->add_setting('nnfy_footer_copyright',array(
		'default'     => 'on',
		'transport'   => 'refresh',
		'sanitize_callback'	=> 'nnfy_sanitize_checkbox'
	));
	$wp_customize->add_control( 'nnfy_footer_copyright', array(
		'section'	=> 'nnfy_footer_settings',
	    'label' => __('Enable / Disable Copyright','99fy'),
		'type'	 => 'checkbox'
	) );


	$wp_customize->add_setting('nnfy_footer_copyright_text',array(
		'sanitize_callback'			=> 'nnfy_sanitize_input',
		'transport'   				=> 'postMessage',
		'default'     				=> __('Copyright &copy; 2018 All Right Reserved.','99fy'),
	));
	$wp_customize->add_control( 'nnfy_footer_copyright_text', array(
		'section'	=> 'nnfy_footer_settings',
	    'label' => __('Footer copyright text','99fy'),
		'type'	 => 'textarea',
	) );


	$wp_customize->add_setting('nnfy_page_title',array(
		'default'     => 'on',
		'transport'   => 'refresh',
		'sanitize_callback'	=> 'nnfy_sanitize_checkbox'
	));
	$wp_customize->add_control( 'nnfy_page_title', array(
		'section'	=> 'nnfy_pt_settings',
	    'label' => __('Enable / Disable Page title','99fy'),
		'type'	 => 'checkbox'
	) );


	$wp_customize->add_setting('nnfy_breadcrumb',array(
		'default'     => 'on',
		'transport'   => 'refresh',
		'sanitize_callback'	=> 'nnfy_sanitize_checkbox'
	));
	$wp_customize->add_control( 'nnfy_breadcrumb', array(
		'section'	=> 'nnfy_pt_settings',
	    'label' => __('Enable / Disable Breadcrumb','99fy'),
		'type'	 => 'checkbox'
	) );

	// page title section
	$wp_customize->add_setting( 'nnfy_pt_section_bg_color', array(
		'transport' 			=> 'postMessage',
		'default'           	=> '#ddd',
		'sanitize_callback'	=> 'nnfy_sanitize_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'nnfy_pt_section_bg_color', array(
		'label'	   				=> __('Background Color','99fy'),
		'section'  				=> 'nnfy_pt_settings',
	) ) );

	$wp_customize->add_setting( 'nnfy_pt_section_bg_image', array(
		'transport' 			=> 'refresh',
		'sanitize_callback'		=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'nnfy_pt_section_bg_image', array(
		'label'	   				=> __('Background Image','99fy'),
		'section'  				=> 'nnfy_pt_settings',
	) ) );


	$wp_customize->add_setting( 'nnfy_pt_section_bg_image_size', array(
		'transport' 			=> 'refresh',
		'default' 				=> 'initial',
		'sanitize_callback'	=> 'nnfy_sanitize_select'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'nnfy_pt_section_bg_image_size', array(
		'label'	   				=> __('Size','99fy'),
		'type' 					=> 'select',
		'section'  				=> 'nnfy_pt_settings',
		'choices' 				=> array(
			'initial' 	=> __('Default','99fy'),
			'auto' 		=> __('Auto','99fy'),
			'cover' 	=> __('Cover','99fy'),
			'contain' 	=> __('Contain','99fy'),
		),
	) ) );


	$wp_customize->add_setting('nnfy_pt_section_padding',array(
		'transport'   => 'postMessage',
		'default'     => '215px',
		'sanitize_callback'	=> 'nnfy_sanitize_input'
	));
	$wp_customize->add_control( 'nnfy_pt_section_padding', array(
		'section'	=> 'nnfy_pt_settings',
	    'label' => __('Page title section Top and bottom padding','99fy'),
		'type'	 => 'textbox',
	) );


	$wp_customize->add_setting('nnfy_footer_col_size',array(
		'default'     => '2',
		'transport'   => 'refresh',
		'sanitize_callback'	=> 'nnfy_sanitize_select'
	));
	$wp_customize->add_control( 'nnfy_footer_col_size', array(
		'section'	=> 'nnfy_footer_settings',
	    'label' => __('Footer column size','99fy'),
		'type'	 => 'select',
		'choices' 				=> array(
			'1' 	=> __('1 Column','99fy'),
			'2' 	=> __('2 Column','99fy'),
			'3' 	=> __('3 Column','99fy'),
			'4' 	=> __('4 column','99fy'),
			'5' 	=> __('5 Column','99fy'),
		),
	) );


	// blog
	$wp_customize->add_setting('nnfy_blog_col_size',array(
		'default'     => '3',
		'transport'   => 'refresh',
		'sanitize_callback'	=> 'nnfy_sanitize_select'
	));
	$wp_customize->add_control( 'nnfy_blog_col_size', array(
		'section'	=> 'nnfy_blog_settings',
	    'label' => __('Blog column size','99fy'),
		'type'	 => 'select',
		'choices' 				=> array(
			'1' 	=> __('1 Column','99fy'),
			'2' 	=> __('2 Column','99fy'),
			'3' 	=> __('3 Column','99fy'),
			'4' 	=> __('4 column','99fy'),
		),
	) );


	$wp_customize->add_setting('nnfy_blog_layout',array(
		'default'     => 'none',
		'transport'   => 'refresh',
		'sanitize_callback'	=> 'nnfy_sanitize_select'
	));
	$wp_customize->add_control( 'nnfy_blog_layout', array(
		'section'	=> 'nnfy_blog_settings',
	    'label' => __('Blog Layout','99fy'),
		'type'	 => 'select',
		'choices' 				=> array(
			'none' 	=> __('No sidebar','99fy'),
			'left' 	=> __('Left Sidebar','99fy'),
			'right' => __('Right Sidebar','99fy'),
		),
	) );

	$wp_customize->add_setting('nnfy_blog_excerpt_length',array(
		'default'     => '20',
		'transport'   => 'refresh',
		'sanitize_callback'	=> 'nnfy_sanitize_absinteger'
	));
	$wp_customize->add_control( 'nnfy_blog_excerpt_length', array(
		'section'	=> 'nnfy_blog_settings',
	    'label' => __('Blog excerpt length','99fy'),
		'type'	 => 'textbox'
	) );
}