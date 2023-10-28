<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package 99fy
 */

$blog_col_size = get_theme_mod('nnfy_blog_col_size', 3);

for($i = 1; $i <= $blog_col_size; $i++){

    switch ($blog_col_size) {
        case '1':
             $col_class = 'ht-col-xs-12 ht-col-lg-12';
            break;

        case '2':
             $col_class = 'ht-col-xs-12 ht-col-sm-6 ht-col-lg-6';
            break;

        case '4':
             $col_class = 'ht-col-xs-12 ht-col-sm-6 ht-col-lg-3';
            break;
        
        default:
            $col_class = 'ht-col-xs-12 ht-col-sm-6 ht-col-lg-4';
            break;
    }
 }
?>


<div class="<?php echo esc_attr($col_class); ?>">
	<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
	    <div class="product-wrapper mb-30">

	    	<?php if(has_post_thumbnail()): ?>
	        <div class="blog-img">
	            <a href="<?php the_permalink( ); ?>">
	                <?php the_post_thumbnail( 'nnfy_blog_grid_thumb' ); ?>
	            </a>
	        </div>
	    	<?php endif; ?>

	        <div class="blog-info">
	            <h4><a href="<?php the_permalink( ); ?>"><?php the_title( ); ?></a></h4>
	            <h6><?php echo esc_html__( 'By ', '99fy' ); ?><a href="<?php the_author_link(); ?>"><?php the_author_meta('nickname') ?></a> <?php echo esc_html__( 'on', '99fy' ); ?> <span><?php echo get_the_date(  get_option( 'date_format' ) ); ?></span></h6>

	            <p><?php nnfy_post_excerpt(); ?></p>
	            <a href="<?php the_permalink( ); ?>" class="read_more"><?php echo esc_html__( 'Read More', '99fy' ); ?></a>
	        </div>
	    </div>
	</article>
</div>
