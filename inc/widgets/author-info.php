<?php

/**
*
* Author information widget.
*
**/

if ( !class_exists('NNfy_Author_About_Widget') ) {
	class NNfy_Author_About_Widget extends WP_Widget{

		function __construct(){

			$widget_options = array(
				'description' 					=> esc_html__('This widget show author informations', '99fy'), 
				'customize_selective_refresh' 	=> true,
			);

			parent:: __construct('NNfy_Author_About_Widget', esc_html__( 'NNfy: Author Informations', '99fy'), $widget_options );

		}
		/**
		 * Front-end display of widget.
		 *
		 * @see WP_Widget::widget()
		 *
		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function widget($args, $instance){ 

			$image = isset( $instance['image'] ) ? $instance['image'] : '';
			$title = isset( $instance['title'] ) ? $instance['title'] : '';
			$content = isset( $instance['content'] ) ? $instance['content'] : '';
			$social_title   = isset( $instance['social_title'] ) ? $instance['social_title'] : '';
			$facebook   = isset( $instance['facebook'] ) ? $instance['facebook'] : '';
			$google   = isset( $instance['google'] ) ? $instance['google'] : '';
			$twitter   = isset( $instance['twitter'] ) ? $instance['twitter'] : '';
			$youtube   = isset( $instance['youtube'] ) ? $instance['youtube'] : '';
			$linked   = isset( $instance['linked'] ) ? $instance['linked'] : '';
			$pinterest   = isset( $instance['pinterest'] ) ? $instance['pinterest'] : '';
			$instagram   = isset( $instance['instagram'] ) ? $instance['instagram'] : '';


			?>
			
	        <?php echo wp_kses_post( $args['before_widget'] ); ?>
	        	<div class="author--info--wrap">
	        		<?php if ( !empty($image) ): ?>
	        			<img src="<?php echo esc_url( $image ) ; ?>" alt="<?php esc_html_e('Author Image', '99fy'); ?>">
	        		<?php endif ?>

					<div class="sidebar-img-content">
						<?php if ( !empty($title) ): ?>
							<h3 class="sidebar-title"><?php echo esc_html( $title ); ?></h3>
						<?php endif ?>

                        <?php if ( !empty($content) ): ?>
                        	<p><?php echo wp_kses_post( $content ); ?></p>
                        <?php endif ?>

                        
                        <div class="sidebar-img-social">
                        	<?php if ( !empty( $social_title ) ): ?>
                        		<h4><?php echo esc_html( $social_title ); ?></h4>
                        	<?php endif ?>
                        	
                            <ul>
		                        <?php if( $facebook ):?>
        						<li>
        							<a class="facebook" href="<?php echo esc_url( $facebook ); ?>" title="Facebook"><i class="ion-social-facebook"></i></a>
        						</li>
        						<?php endif; if( $google ): ?>
        						<li>
        							<a class="google-plus" href="<?php echo esc_url( $google ); ?>" title="Google Plus"><i class="ion-social-googleplus"></i></a>
        						</li>
        						<?php endif; if( $twitter ): ?>
        						
        						<li>
        							<a class="twitter" href="<?php echo esc_url( $twitter ); ?>" title="Twitter"><i class="ion-social-twitter"></i></a>
        						</li>
        						<?php endif; if( $youtube ): ?>
        						<li>
        							<a class="youtube" href="<?php echo esc_url( $youtube ); ?>" title="youtube"><i class="ion-social-youtube"></i></a>
        						</li>
        						<?php endif; if( $linked ): ?>
        						<li>
        							<a class="linked" href="<?php echo esc_url( $linked ); ?>" title="Linkedin"><i class="ion-social-linkedin"></i></a>
        						</li>
        						<?php endif; if( $pinterest ): ?>
        						<li>
        							<a class="pinterest" href="<?php echo esc_url( $pinterest ); ?>" title="Pinterest"><i class="ion-social-pinterest"></i></a>
        						</li>
        						<?php endif; if( $instagram ): ?>
        						<li>
        							<a class="instagram" href="<?php echo esc_url( $instagram ); ?>" title="instagram"><i class="ion-social-instagram"></i></a>
        						</li>
        						<?php endif; ?>
                            </ul>
                        </div>
                    </div>
	            </div>
	        <?php echo wp_kses_post( $args['after_widget'] ); ?>

		<?php }


		/**
		 * Sanitize widget form values as they are saved.
		 *
		 * @see WP_Widget::update()
		 *
		 * @param array $new_instance Values just sent to be saved.
		 * @param array $old_instance Previously saved values from database.
		 *
		 * @return array Updated safe values to be saved.
		 */
		public function update($new_instance, $old_instance){
			$instace = array();
			$instance['image'] = ( !empty($new_instance['image']) ) ? strip_tags ( $new_instance['image'] ) : '';
			$instance['title'] = ( !empty($new_instance['title']) ) ? strip_tags ( $new_instance['title'] ) : '';
			$instance['content'] = ( !empty($new_instance['content']) ) ? strip_tags ( $new_instance['content'] ) : '';
			$instance['social_title']   = ( !empty($new_instance['social_title']) ) ? strip_tags ( $new_instance['social_title'] ) : '';
			$instance['facebook']   = ( !empty($new_instance['facebook']) ) ? strip_tags ( $new_instance['facebook'] ) : '';
			$instance['google']   = ( !empty($new_instance['google']) ) ? strip_tags ( $new_instance['google'] ) : '';
			$instance['twitter']   = ( !empty($new_instance['twitter']) ) ? strip_tags ( $new_instance['twitter'] ) : '';
			$instance['youtube']   = ( !empty($new_instance['youtube']) ) ? strip_tags ( $new_instance['youtube'] ) : '';
			$instance['linked']   = ( !empty($new_instance['linked']) ) ? strip_tags ( $new_instance['linked'] ) : '';
			$instance['pinterest']   = ( !empty($new_instance['pinterest']) ) ? strip_tags ( $new_instance['pinterest'] ) : '';
			$instance['instagram']   = ( !empty($new_instance['instagram']) ) ? strip_tags ( $new_instance['instagram'] ) : '';




			if ( current_user_can( 'unfiltered_html' ) ) {
			        $instance['content'] = $new_instance['content'];
			} else {
			        $instance['content'] = wp_kses_post( $new_instance['content'] );
			}

			return $instance;
		}



		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */

		public function form($instance){ 
			
			$image = !empty( $instance['image'] ) ? $instance['image'] : ''; 
			$title = !empty( $instance['title'] ) ? $instance['title'] : ''; 
			$content = !empty( $instance['content'] ) ? $instance['content'] : ''; 
			$social_title = !empty( $instance['social_title'] ) ? $instance['social_title'] : ''; 
			$facebook = !empty($instance['facebook']) ? $instance['facebook'] : '';
			$google = !empty($instance['google']) ? $instance['google'] : '';
			$twitter = !empty($instance['twitter']) ? $instance['twitter'] : '';
			$youtube = !empty($instance['youtube']) ? $instance['youtube'] : '';
			$linked = !empty($instance['linked']) ? $instance['linked'] : '';
			$pinterest = !empty($instance['pinterest']) ? $instance['pinterest'] : '';
			$instagram = !empty($instance['instagram']) ? $instance['instagram'] : '';

			?>



			<div class="image_box_wrap" style="margin:20px 0 15px 0; width: 100%;">
				<button class="button button-primary author_info_image">
					<?php esc_html_e('Upload Image', '99fy'); ?>
				</button>
				<div class="image_box widefat">
					<img src="<?php if( !empty($image)){echo esc_html($image);} ?>" style="margin:15px 0 0 0;padding:0;max-width: 100%;display:inline-block; height: auto;" alt="<?php esc_html_e('Author image', '99fy'); ?>" />
				</div>
				<input type="text" class="widefat image_link" name="<?php echo esc_attr($this->get_field_name('image')); ?>" id="<?php echo esc_attr($this->get_field_id('image')); ?>" value="<?php echo esc_attr($image); ?>" style="margin:15px 0 0 0;">
			</div>
	
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html__('Title:' ,'99fy') ?></label>
				<input id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" class="widefat" value="<?php echo esc_textarea( $title ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php echo esc_html__('Content:' ,'99fy') ?></label>
				<textarea  id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" rows="7" class="widefat" ><?php echo esc_textarea( $content ); ?></textarea>
			</p>

			<p>
				<label for="<?php echo esc_attr($this->get_field_id('social_title')); ?>"><?php echo esc_html__('Social Title:' ,'99fy') ?></label>
				<input id="<?php echo esc_attr($this->get_field_id('social_title')); ?>" name="<?php echo esc_attr($this->get_field_name('social_title')); ?>" type="text" class="widefat" value="<?php echo esc_textarea( $social_title ); ?>">
			</p>

			<p>
				<label for="<?php echo esc_attr($this->get_field_id('facebook')); ?>"><?php echo esc_html__('Facebook Link:' ,'99fy') ?></label>
				<input type="text" id="<?php echo esc_attr($this->get_field_id('facebook')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('facebook')); ?>" value="<?php echo esc_attr( $facebook ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('google')); ?>"><?php echo esc_html__('Google Plus Link:' ,'99fy') ?></label>
				<input type="text" id="<?php echo esc_attr($this->get_field_id('google')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('google')); ?>" value="<?php echo esc_attr( $google ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('twitter')); ?>"><?php echo esc_html__('Twitter Link:' ,'99fy') ?></label>
				<input type="text" id="<?php echo esc_attr($this->get_field_id('twitter')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('twitter')); ?>" value="<?php echo esc_attr( $twitter ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('youtube')); ?>"><?php echo esc_html__('Youtube Link:' ,'99fy') ?></label>
				<input type="text" id="<?php echo esc_attr($this->get_field_id('youtube')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('youtube')); ?>" value="<?php echo esc_attr( $youtube ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('linked')); ?>"><?php echo esc_html__('Linkedin Link:' ,'99fy') ?></label>
				<input type="text" id="<?php echo esc_attr($this->get_field_id('linked')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('linked')); ?>" value="<?php echo esc_attr( $linked ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('pinterest')); ?>"><?php echo esc_html__('Pinterest Link:' ,'99fy') ?></label>
				<input type="text" id="<?php echo esc_attr($this->get_field_id('pinterest')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('pinterest')); ?>" value="<?php echo esc_attr( $pinterest ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('instagram')); ?>"><?php echo esc_html__('Instagram Link:' ,'99fy') ?></label>
				<input type="text" id="<?php echo esc_attr($this->get_field_id('instagram')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('instagram')); ?>" value="<?php echo esc_attr( $instagram ); ?>" />
			</p>

		<?php }


	} // end extends class
} // end exists class


// Register Author information widget.

function NNfy_Author_About_Widget() {
    register_widget( 'NNfy_Author_About_Widget' );
}
add_action( 'widgets_init', 'NNfy_Author_About_Widget' );