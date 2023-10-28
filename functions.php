<?php
/**
 * nnfy functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package 99fy
 */

if ( ! function_exists( 'nnfy_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function nnfy_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on nnfy, use a find and replace
	 * to change '99fy' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( '99fy', get_template_directory() . '/languages' );
	
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style('css/editor-style.css');
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	* Custom logo support
	*/
	add_theme_support( 'custom-logo' );

	add_image_size( 'nnfy_blog_grid_thumb', 370, 244, true );
	

	/**
	* This theme uses wp_nav_menu() in one location.
	*/
	register_nav_menus( array(
		'primary'        => esc_html__( 'Primary', '99fy' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );


	/*
	 * Enable support for Post Formats.
	 */
	add_theme_support( 'post-formats', array(
		'link',
		'quote',
		'gallery',
		'audio',
		'video',
	) );


	/**
	* Set up the WordPress core custom background feature.
	*/
	add_theme_support( 'custom-background', apply_filters( 'nnfy_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/**
	* Add theme support for selective refresh for widgets.
	*/
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'nnfy_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */

 if ( !function_exists( 'nnfy_content_width')){
	 	function nnfy_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'nnfy_content_width', 640 );
	}
} 
add_action( 'after_setup_theme', 'nnfy_content_width', 0 );

/**
 * Register custom fonts.
 */
 if ( !function_exists( 'nnfy_fonts_url' ) ) :
function nnfy_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', '99fy' ) ) {
		$fonts[] = 'Open Sans:300,400,600,700';
	}

	/* translators: If there are characters in your language that are not supported by Poppins, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Poppins font: on or off', '99fy' ) ) {
		$fonts[] = 'Poppins:300,400,500,500i,600,700,800';
	}
	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;


/**
 * Enqueue scripts and styles.
 */
function nnfy_scripts() {

	wp_enqueue_style('99fy-font',nnfy_fonts_url());
	wp_enqueue_style('font-awesome',get_template_directory_uri() . '/css/font-awesome.min.css');
	wp_enqueue_style( 'htflexboxgrid', get_template_directory_uri() . '/css/htflexboxgrid.css');
	wp_enqueue_style('magnific-popup',get_template_directory_uri() . '/css/magnific-popup.css');
	wp_enqueue_style('animate',get_template_directory_uri() . '/css/animate.css');
	wp_enqueue_style('owl-carousels',get_template_directory_uri() . '/css/owl.carousel.min.css');
	wp_enqueue_style('ionicons',get_template_directory_uri() . '/css/ionicons.min.css');
	wp_enqueue_style('easyzoom',get_template_directory_uri() . '/css/easyzoom.css');
	wp_enqueue_style('mean-menu',get_template_directory_uri() . '/css/meanmenu.min.css');
	wp_enqueue_style('99fy-default-style',get_template_directory_uri() . '/css/theme-default.css');
	wp_enqueue_style('99fy-blog-style',get_template_directory_uri() . '/css/blog-post.css');
	wp_enqueue_style('99fy-main-style',get_template_directory_uri() . '/css/theme-style.css');
	wp_enqueue_style( '99fy-style', get_stylesheet_uri() );
	wp_enqueue_style('99fy-responsive',get_template_directory_uri() . '/css/responsive.css');


	wp_enqueue_script( 'wc-add-to-cart-variation' );
	wp_enqueue_script( 'jquery-magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery'), '1.1.0', true );
	wp_enqueue_script( 'jquery-owl-carousels', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '2.2.1', false );
	wp_enqueue_script( 'jquery-ui-core' );
	wp_enqueue_script( 'jquery-ui-slider' );
	wp_enqueue_script( 'jquery-easyzoom', get_template_directory_uri() . '/js/easyzoom.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'jquery-waypoints', get_template_directory_uri() . '/js/waypoints.js', array('jquery'), '4.0.1', true );
	wp_enqueue_script( 'imagesloaded' );
	wp_enqueue_script( 'jquery-wow', get_template_directory_uri() . '/js/wow-min.js', array('jquery'), '1.1.2', true );
	wp_enqueue_script( '99fy-jquery-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '', true );
	wp_enqueue_script( '99fy-jquery-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '', true );
	wp_enqueue_script( 'jquery-mean-menu', get_template_directory_uri() . '/js/jquery.meanmenu.min.js', array(), '', true );
	wp_enqueue_script( '99fy-jquery-main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}


	// localization
	$nnfy_localize_vars = array();
	$nnfy_localize_vars['ajaxurl'] = esc_url( admin_url( 'admin-ajax.php') );

	wp_localize_script( "99fy-jquery-main", "nnfy_localize_vars", $nnfy_localize_vars );
}
add_action( 'wp_enqueue_scripts', 'nnfy_scripts' );


/**
 * Enqueue styles for the block-based editor.
 */
function nnfy_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( '99fy-block-editor-style', get_template_directory_uri() . '/css/editor-blocks.css', array(), '1.0.0' );

	// Add custom fonts.
	wp_enqueue_style( 'nnfy-fonts', nnfy_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'nnfy_block_editor_styles' );


// nnfy Company Info widget js
if( !function_exists('nnfy_admin_scripts') ) {
  function nnfy_admin_scripts($hook) {
  	if( $hook != 'widgets.php' ) 
  			return;

    wp_enqueue_media();
    wp_enqueue_script( 'jquery-ui-tabs' );

    wp_enqueue_script( 'nnfy-logo-uploader', get_template_directory_uri() .'/js/site-logo-uploader.js', false, '', true );

  }
}
add_action('admin_enqueue_scripts', 'nnfy_admin_scripts');



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/customizer/sanitization-callbacks.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/*
	Load breadcrumb
*/
require get_template_directory().'/inc/breadcrumb/breadcrumb.php';

/*
	Load widget
*/
require get_template_directory().'/inc/widgets/widget-register.php';
/*
	Load tgm plugin
*/
require get_template_directory().'/inc/tgm-plugin/plugins.php';

/*
	Load global function
*/
require get_template_directory().'/inc/global-functions.php';
/*
	Comment form
*/
require get_template_directory().'/inc/comment-form.php';

/*
 Woocommerce config
*/
require get_template_directory().'/inc/woo-config.php';