<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package 99fy
 */

get_header(); 

	
?>
<div class="page-wrapper clear">
	<div class="ht-container">
		<div class="ht-row">
			<div class="ht-col-md-12 ht-col-lg-4 ht-col-xs-12">
				<?php get_sidebar(); ?>
			</div>

			<div class="ht-col-md-12 ht-col-lg-8 ht-col-xs-12">
				<?php
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content', 'single' );
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					endwhile; // End of the loop.
			     ?>
		     </div>
		</div><!-- row -->
	</div><!-- container -->
</div><!--page-wrapper -->
<?php
get_footer();