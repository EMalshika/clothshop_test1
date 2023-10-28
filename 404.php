<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package 99fy
 */

get_header(); ?>
	
<div class="page-not-found-wrap">
	<div class="ht-container">
		<div class="ht-row">
            <div class="ht-col-md-12 ht-col-xs-12">
                <div class="pnf-inner-wrap">
	                <div class="pnf-inner ht-text-center">
						<h1><?php echo esc_html__( '404','99fy' ); ?></h1>
						<h2><?php echo esc_html__( 'PAGE NOT FOUND','99fy' ); ?></h2>
						<p><?php echo esc_html__( 'The page you are looking for does not exist or has been moved.','99fy' ); ?> </p>
						<a href="<?php echo esc_url( home_url('/') ); ?>" class="btn">
							<?php echo esc_html__( 'Go back to Home Page' , '99fy' ); ?>
						</a>
	                </div>
                </div>
            </div>
		</div>
	</div>	
</div>

<?php

get_footer();