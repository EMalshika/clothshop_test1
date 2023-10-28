<?php 

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
 
 require get_template_directory() . '/inc/widgets/author-info.php';
 
 if(!function_exists('nnfy_widgets_init')){
	function nnfy_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', '99fy' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', '99fy' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="sidebar-title">',
			'after_title'   => '</h3>',
		) );

		if(class_exists('WooCommerce')){
			register_sidebar( array(
				'name'          => esc_html__( 'Shop sidebar', '99fy' ),
				'id'            => 'sidebar-shop',
				'description'   => esc_html__( 'Add widgets here.', '99fy' ),
				'before_widget' => '<div id="%1$s" class="sidebar-widget shop-widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h4 class="sidebar-title">',
				'after_title'   => '</h4>',
			) );
		}


		$footer_columns = get_theme_mod('nnfy_footer_col_size', 4);

		$j = 2;
		for($i = 1; $i <= $footer_columns; $i++){
			$j++;

			register_sidebar( array(
				'name'          => esc_html__( 'Footer ', '99fy' ) . esc_html( $i ),
				'id'            => 'sidebar-'.$j,
				'description'   => esc_html__( 'Add widgets here.', '99fy' ),
				'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="footer-widget-title">',
				'after_title'   => '</h3>',
			) );
		}
	 
	}		 
}
add_action( 'widgets_init', 'nnfy_widgets_init' );