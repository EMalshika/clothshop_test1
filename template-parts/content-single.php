<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package 99fy
 */
?>

<div class="blog-details-style">
    <div class="blog-part">
        <?php the_post_thumbnail( 'nnfy_blog_img' ); ?>
        <div class="blog-info-details mt-20 entry-content">
            <?php
                the_content( );
                
                wp_link_pages( array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', '99fy' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', '99fy' ) . ' </span>%',
                    'separator'   => '<span class="screen-reader-text">, </span>',
                ) );
            ?>
        </div>
        <div class="single_post_meta">
            <span class="user-name">
                <strong><?php echo esc_html__('By :', '99fy' ); ?></strong>
                <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
            </span>
            <span>
                <?php comments_popup_link( esc_html__('No Comments','99fy'), esc_html__('1 Comment','99fy'), esc_html__('% Comments','99fy'), 'post-comment', esc_html__('Comments off','99fy') ); ?>
            </span>

            <?php if(has_category()): ?>
            <span class="categories">
                <strong><?php echo esc_html__('Categories :', '99fy' ); ?></strong>
                <?php the_category( ',' ) ?>
            </span>
            <?php endif; ?>

            <?php if(has_tag()): ?>
            <span class="tags">
                <strong><?php echo esc_html__('Tags :', '99fy' ); ?></strong>
                <?php the_tags('') ?>
            </span>
            <?php endif; ?>
        </div>
    </div>
</div>