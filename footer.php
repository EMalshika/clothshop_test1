<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package 99fy
 */

$footer_top = get_theme_mod('nnfy_footer_top', 'on');
$footer_copyright = get_theme_mod('nnfy_footer_copyright','on');
$footer_copyright_text = get_theme_mod('nnfy_footer_copyright_text', __('Copyright &copy; 2018 99fy All Right Reserved.','99fy'));

?>

</div><!-- #content -->

<?php
    if(
        $footer_top && 
        is_active_sidebar( 'sidebar-2' ) ||
        is_active_sidebar( 'sidebar-3' ) ||
        is_active_sidebar( 'sidebar-4' ) ||
        is_active_sidebar( 'sidebar-5' ) ||
        is_active_sidebar( 'sidebar-6' )
    ){
        $footer_top = true;
    } else {
        $footer_top = false;
    }

    if( $footer_top ):

        $footer_col_size = get_theme_mod('nnfy_footer_col_size', 2);

?>
<div class="footer-top-area black-bg pt-120 pb-75">
    <div class="ht-container">
        <div class="ht-row">

            <?php
                for($i = 1; $i <= $footer_col_size; $i++):

                    switch ($footer_col_size) {
                        case '1':
                             $col_class = 'ht-col-lg-12 ht-col-xs-12';
                            break;

                        case '2':
                             $col_class = 'ht-col-sm-6 ht-col-lg-6 ht-col-xs-12';
                            break;

                        case '3':
                             $col_class = 'ht-col-sm-6 ht-col-lg-4 ht-col-xs-12';
                            break;

                        case '5':
                             $col_class = ($i == 1 || $i == 5) ? 'ht-col-sm-6 ht-col-lg-3 ht-col-xs-12' : 'ht-col-sm-6 ht-col-lg-2 ht-col-xs-12';
                            break;
                        
                        default:
                            $col_class = 'ht-col-sm-6 ht-col-md-6 ht-col-lg-3 ht-col-xs-12';
                            break;
                    }
            ?>

            <div class="<?php echo esc_attr($col_class); ?>">
                <div class="footer-widget mb-40">
                    <?php dynamic_sidebar( 'footer-'.$i ); ?>
                </div>
            </div>

            <?php endfor; ?>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if($footer_copyright && $footer_copyright_text): ?>

<div class="footer-bottom-area black-bg-2 ptb-15">
    <div class="ht-container">
        <div class="ht-row">
            <div class="ht-col-lg-12 ht-col-xs-12">
                <div class="copyright ht-text-center">
                    <?php echo wp_kses_post( $footer_copyright_text ); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>

<div id="back-to-top"><i class="ion-arrow-up-c"></i></div>

</div><!-- #page -->
</div>

<?php wp_footer(); ?>

</body>
</html>