(function($){
    "use strict"; 

        function media_upload(button_class) {
            var _custom_media = true,
            _orig_send_attachment = wp.media.editor.send.attachment;

            $('body').on('click', button_class, function(e) {
                var button_id ='#'+$(this).attr('id');
                var self = $(button_id);
                var send_attachment_bkp = wp.media.editor.send.attachment;
                var button = $(button_id);
                var id = button.attr('id').replace('_button', '');
                _custom_media = true;
                wp.media.editor.send.attachment = function(props, attachment){
                    if ( _custom_media  ) {
                        $('.custom_media_id').val(attachment.id);
                        $('.custom_media_url').val(attachment.url);
                        $('.custom_media_image').attr('src',attachment.url).css('display','block');
                    } else {
                        return _orig_send_attachment.apply( button_id, [props, attachment] );
                    }
                }
                wp.media.editor.open(button);
                    return false;
            });
        }       
        media_upload('.custom_media_button.button');  





        // Start Author image admin script 
        $('button.author_info_image').live('click', function( e ){

            e.preventDefault();

            var imageUploader = wp.media({
                'title'    : 'Upload Author Image',
                'button'   : {
                    'text' : 'Set the image'
                },
                'multiple' : false
            });

            imageUploader.open();

            var button = $(this);

            imageUploader.on("select", function(){

                var image = imageUploader.state().get("selection").first().toJSON();
                var link  = image.url;

                button.parent('div.image_box_wrap').find('input.image_link').val( link );
                button.parent('div.image_box_wrap').find('img').attr('src', link);

            });

        });
        // End Author image admin script 


        // Start popup video bd admin script 
        $('button.popup_video_bg_image').live('click', function( e ){

            e.preventDefault();

            var imageUploader = wp.media({
                'title'    : 'Upload Background Image',
                'button'   : {
                    'text' : 'Set the image'
                },
                'multiple' : false
            });

            imageUploader.open();

            var button = $(this);

            imageUploader.on("select", function(){

                var image = imageUploader.state().get("selection").first().toJSON();
                var link  = image.url;

                button.parent('div.image_box_wrap').find('input.bg_image_link').val( link );
                button.parent('div.image_box_wrap').find('img').attr('src', link);

            });

        });
        // End popup video bg admin script 


        // Start popup video bd admin script 
        $('button.gl_image_btn').live('click', function( e ){

            e.preventDefault();

            var imageUploader = wp.media({
                'title'    : 'Upload Background Image',
                'button'   : {
                    'text' : 'Set the image'
                },
                'multiple' : false
            });

            imageUploader.open();

            var button = $(this);

            imageUploader.on("select", function(){

                var image = imageUploader.state().get("selection").first().toJSON();
                var link  = image.url;

                button.parent('div.image_box_wrap').find('input.gl_image_link').val( link );
                button.parent('div.image_box_wrap').find('img').attr('src', link);

            });

        });
        // End popup video bg admin script 


        /**
        * Redux Switch option
        */
        var $switchOption = $('.wp-admin .redux-container .redux-container-switch .switch-options');
        var $switchOptionEnable = $('.wp-admin .redux-container .redux-container-switch .cb-enable');
        var $switchOptionEnableSelected = $('.wp-admin .redux-container .redux-container-switch .cb-enable.selected');
        var $switchOptionDisable = $('.wp-admin .redux-container .redux-container-switch .cb-disable');
        var $switchOptionDisableSelected = $('.wp-admin .redux-container .redux-container-switch .cb-disable.selected');

        if($switchOptionEnable.hasClass('selected')){
            $switchOptionEnableSelected.parent('.switch-options').removeClass('disable').addClass('enable');
        }
        if($switchOptionDisable.hasClass('selected')){
            $switchOptionDisableSelected.parent('.switch-options').removeClass('enable').addClass('disable');
        }
        $switchOptionEnable.on('click', function(){
            $(this).parent('.switch-options').removeClass('disable').addClass('enable');
        });
        $switchOptionDisable.on('click', function(){
            $(this).parent('.switch-options').removeClass('enable').addClass('disable');
        });



        /**
        *
        */

        //$("#redux-sticky").appendTo("#redux-header");




})( jQuery );