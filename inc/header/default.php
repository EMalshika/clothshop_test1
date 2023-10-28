<?php
/**
 * Default header template
 *
 * @package 99fy
 */

$logo = get_theme_mod('custom_logo') ? wp_get_attachment_image_src( get_theme_mod('custom_logo'), 'full') : '';
$logo_alt_text = '';
if(get_theme_mod('custom_logo')){
	$logo_alt_text = get_post_meta(get_theme_mod('custom_logo') , '_wp_attachment_image_alt', true );
} else {
	$logo_alt_text = get_bloginfo('name');
}

?>

<header  class="header-default main-header clearfix">
	<div class="header-area">
		<div class="ht-container">
			<div class="ht-row">
				<div class="ht-col-xs-12 ht-col-sm-12 ht-col-md-12 ht-col-lg-12">

					<div class="header-menu-wrap logo-left">
						<!-- Start Logo Wrapper  -->
						<div class="site-title">
							
							<?php if ( $logo ): ?>
								<a href="<?php echo esc_url( home_url('/')); ?>" title="<?php echo esc_attr($logo_alt_text); ?>" rel="home" >
										
										<img src="<?php echo esc_url($logo[0]); ?>" alt="<?php echo esc_attr($logo_alt_text); ?>">
								 </a>

							<?php else: ?>
								
								<h3>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
										<?php echo esc_html( get_bloginfo( 'title', 'display' ) ); ?>
									</a>
								</h3>
								<p><?php echo esc_html( get_bloginfo( 'description', 'display' ) ); ?></p>

							<?php endif ?>

						</div>
						<!-- End Logo Wrapper -->
						<!-- Start Primary Menu Wrapper -->
						<div class="primary-nav-wrap nav-horizontal default-menu default-style-one">
							<nav>
                                <?php
                                	wp_nav_menu(array(
                                		'theme_location' => 'primary',
                                		'container'      => false,
                                	));
                                ?>
							</nav>
						</div>
						<!-- End Primary Menu Wrapper -->
					</div>
				</div>
			</div>
			<!-- Mobile Menu  -->
			<div class="mobile-menu"></div>
		</div>
	</div>	
</header>
