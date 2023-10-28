<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package 99fy
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

if( post_password_required() ){
	return;
}
?>

<div id="comments" class="comments-area">
	<div class="leave-comment-form">
		<?php 
			if( have_comments() ):
			//We have comments
		?>

			<h2 class="comment-title sidebar-title">
				<?php

					$comment_count = get_comments_number();
					
					if ( 1 === $comment_count ) {
						printf(
							/* translators: 1: title. */
							esc_html_e( 'One thought on &ldquo;%1$s&rdquo;', '99fy' ),
							'<span>' . get_the_title() . '</span>'
						);
					} else {
						printf( // WPCS: XSS OK.
							/* translators: 1: comment count number, 2: title. */
							esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $comment_count, 'comments title', '99fy' ) ),
							number_format_i18n( $comment_count ),
							'<span>' . get_the_title() . '</span>'
						);
					}
						
				?>
			</h2>
			
			<?php
				if(get_comment_pages_count() > 1 && get_option( 'page_comments' )){
					get_template_part( 'inc/comment-nav' );
				}
			?>
			
			<ol class="comment-list">
				
				<?php 

					wp_list_comments( 'type=pingback&callback=nnfy_pingback' );
					
					wp_list_comments( 'type=comment&callback=nnfy_comment' );
				?>
				
			</ol>
			
			<?php
				if(get_comment_pages_count() > 1 && get_option( 'page_comments' )){
					get_template_part( 'inc/comment-nav' );
				}
			?>
			
			<?php 
				if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
			?>
				 <p class="no-comments"><?php esc_html_e( 'Comments are closed.', '99fy' ); ?></p>
				 
			<?php
				endif;
			?>
			
		<?php	
			endif;
		?>
		<?php 
			
			$fields = array(
				
				'author' =>
					'<div class="input_half left"><input id="author" name="author" type="text" placeholder=" '. esc_attr__('Your Name *', '99fy') .' " value="' . esc_attr( $commenter['comment_author'] ) . '" required="required" /></div>',
					
				'email' =>
					'<div class="input_half right"><input id="email" name="email" class="input_half" placeholder=" '. esc_attr__( 'Your Email *', '99fy' ) .' " type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" required="required" /></div>',
					
				'url' =>
					'<input id="url" name="url" placeholder=" '. esc_attr__( 'Your Website', '99fy' ) .' " type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" />'
					
			);
			
			$args = array(
				
				'class_submit' => 'submit',
				'label_submit' => esc_html__( 'Submit Comment', '99fy' ),
				'comment_field' =>
					'<textarea id="comment" name="comment" placeholder="'. esc_attr__( 'Comment *', '99fy' ) .'"  required="required"></textarea>',
				'fields' => apply_filters( 'comment_form_default_fields', $fields ),
				'title_reply' => esc_html__('Leave a comment','99fy'),
				
			);
			
			comment_form( $args ); 
			
		?>
	</div>
</div><!-- .comments-area -->