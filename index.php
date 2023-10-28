<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package 99fy
 */

$layout = get_theme_mod('nnfy_blog_layout', 'none');

$content_class = ($layout == 'left' || $layout == 'right') ? 'ht-col-md-12 ht-col-lg-8 ht-col-xs-12' : 'ht-col-lg-12 ht-col-xs-12';

get_header(); 
?>
	<div class="page-wrapper clear">
		<div class="ht-container">
			<div class="ht-row">
				<?php
					if($layout == 'left'){
						echo '<div class="ht-col-md-12 ht-col-lg-4 ht-col-xs-12">';

						get_sidebar( 'left' );

						echo '</div>';
					}
				?>

				<div class="<?php echo esc_attr( $content_class ); ?>">
					<div class="ht-row">

						<?php
							if ( have_posts() ) :

							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', get_post_format() );

							endwhile;/* End Loop */
						?>
							<div class="ht-col-lg-12 ht-col-xs-12 ht-text-center">
								<?php nnfy_blog_pagination(); ?>
							</div>
						<?php

							else: 

								get_template_part( 'template-parts/content', 'none' );

							endif; 
					     ?>
			     	</div>
			     </div>


			     <?php
			     	if($layout == 'right'){
			     		echo '<div class="ht-col-md-12 ht-col-xs-12 ht-col-lg-4 ht-col-md-12">';

			     		get_sidebar( 'left' );

			     		echo '</div>';
			     	}
			     ?>
			     
			</div><!-- row -->
		</div><!-- container -->
	</div><!--page-wrapper -->
<?php
get_footer();