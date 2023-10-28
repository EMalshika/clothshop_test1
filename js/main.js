(function($){
	"use strict"; 

	/**
	* Header Area start
	*/
	$("body.header-sticky header").addClass("animated");
	$(window).on('scroll',function() {    
		var scroll = $(window).scrollTop();
		if (scroll < 245) {
			$("body.header-sticky header").removeClass("is-sticky");
		}else{
			$("body.header-sticky header").addClass("is-sticky");
		}
	}); 

	$("header.header-sticky").addClass("animated");
	$(window).on('scroll',function() {    
		var scroll = $(window).scrollTop();
		if (scroll < 245) {
			$("header.header-sticky").removeClass("is-sticky");
		}else{
			$("header.header-sticky").addClass("is-sticky");
		}
	}); 


	if ( $('body').hasClass('logged-in') ) {
		var top_offset = $('.header-area').height() + 32;
	} else {
		var top_offset = $('.header-area').height() - 0;
	}

	$(".primary-nav-one-page nav ul li:first-child").addClass("active"); 

	$('.primary-nav-wrap > nav > ul > li').slice(-2).addClass('last-elements');
	
    /*-- Mobile Menu --*/
    $('.primary-nav-wrap nav').meanmenu({
        meanScreenWidth: "991",
        meanMenuContainer: ".mobile-menu",
    });
    
	/*
    * Header Transparent 
    */
    function headerTransparentTopbar(){
    	var headerTopbarHeight = $('.header-top-area').innerHeight(),
    		trigger = $('.main-header.header-transparent'),
    		bodyTrigger = $('body.logged-in .main-header.header-transparent');
    	if( trigger.parents().find('.header-top-area') ){
    		trigger.css('top', headerTopbarHeight + 'px');
    	}
    	if( bodyTrigger.parents().find('.header-top-area') ){
    		bodyTrigger.css('top', (headerTopbarHeight + 32) + 'px' );
    	}
    }
    headerTransparentTopbar();

    /**
    * ScrollUp
    */
	function backToTop(){

		var didScroll = false,
			scrollTrigger = $('#back-to-top');
		
		scrollTrigger.on('click',function(e) {
			$('body,html').animate({ scrollTop: "0" });
			e.preventDefault();
		});
		
		$(window).scroll(function() {
			didScroll = true;
		});

		setInterval(function() {
			if( didScroll ) {
				didScroll = false;
		
				if( $(window).scrollTop() > 250 ) {
					scrollTrigger.css('right',20);
				} else {
					scrollTrigger.css('right','-50px');
				}
			}
		}, 250);
	}
	backToTop();



	/**
	* Magnific Popup video popup 
	*/
	$('a.video-popup').magnificPopup({
		type: 'iframe',
		closeOnContentClick: false,
		closeBtnInside: false,
		mainClass: 'mfp-with-zoom mfp-img-mobile',
		image: {
			verticalFit: true,
			titleSrc: function(item) {
				return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
			}
		},
		gallery: {
			enabled: false
		},
		zoom: {
			enabled: true,
			duration: 300, // don't foget to change the duration also in CSS
			opener: function(element) {
				return element.find('img');
			}
		}
		
	});

	/**
	* Blog Gallery Post
	*/
	$('.blog-gallery').owlCarousel({
	    loop:true,
	    nav:true,
	    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
	    responsive:{
	        0:{
	            items:1
	        },
	        768:{
	            items:1
	        },
	        1000:{
	            items:1
	        }
	    }
	})

	/**
	* Enable Footer Fixed effect
	*/
	function fixedFooter(){
		var fooCheck = $('footer').hasClass('fixed-footer-enable');
		if(fooCheck){
			$('.site-wrapper').addClass('fixed-footer-active'); 
		}
		var FooterHeight = $('footer.fixed-footer-enable').height(),
			winWidth = $(window).width();
		if( winWidth > 991 ){
			$('.fixed-footer-active').css({'margin-bottom': FooterHeight});
			$('.fixed-footer-active .site-content').css({'background': '#ffffff'});
		} else{
			$('footer').removeClass('fixed-footer-enable');
		}
	}
	fixedFooter();

	/**
	* Page Preloading Effects
	*/
	$(window).on('load', function(){
		$(".loading-init").fadeOut(500);
	});


    $(".toggle-active").on("click", function() {
        $(this).parent().find('.toogle-content, .login-content, .cart-content').slideToggle('medium');
    })
    
    /* brand logo active */
    $('.brand-logo-active').owlCarousel({
        loop: true,
        nav: false,
        margin: 40,
        item: 5,
        responsive: {
            0: {
                items: 1
            },
            500: {
                items: 2
            },
            768: {
                items: 3
            },
            1000: {
                items: 4
            },
            1200: {
                items: 5
            }
        }
    })
    
    
    /*---------------------
    price slider
    --------------------- */
    var sliderrange = $('#slider-range');
    var amountprice = $('#amount');
    $(function() {
        sliderrange.slider({
            range: true,
            min: 20,
            max: 100,
            values: [0, 100],
            slide: function(event, ui) {
                amountprice.val("$" + ui.values[0] + " - $" + ui.values[1]);
            }
        });
        amountprice.val("$" + sliderrange.slider("values", 0) +
            " - $" + sliderrange.slider("values", 1));
    });
    
    
    // Instantiate EasyZoom instances
    var $easyzoom = $('.easyzoom').easyZoom();


    /* related product active */
    $('.related-product-slider .row').owlCarousel({
        loop: true,
        nav: false,
        item: 3,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            },
            1200: {
                items: 4
            }
        }
    })


   /*---------------
   cart plus minus
   ----------------*/
    $( 'body' ).on( 'click', '.quantity .plus', function( e ) {
      var $input = $( this ).parent().parent().find( 'input' );
      $input.val( parseInt( $input.val() ) + 1 );
      $input.trigger( 'change' );
    });
    $( 'body' ).on( 'click', '.quantity .minus', function( e ) {
      var $input = $( this ).parent().parent().find( 'input' );
      var value = parseInt( $input.val() ) - 1;
      if ( value < 0 ) value = 0;
      $input.val( value );
      $input.trigger( 'change' );
    });

    /*-- DeopDown Menu --*/
    $('.header-area .sub-menu').hide();
    $('.header-area li').hover(
        function() {
            if ($(this).children('ul').size() > 0 && $(this).children().hasClass('sub-menu')) {
                $(this).children().stop().slideDown(400);
            }
        },
        function() {
            $(this).children('.sub-menu').stop().slideUp(300);
        }
    );
    if ($(window).width() < 767) {
        $('.sub-menu').removeClass('sub-menu');
    }


	$('.shop-filter-tab .shop-tab a').on('click', function(){
	    var $proStyle = $(this).data('toggle');
	    
	    $('.shop-filter-tab .shop-tab a').removeClass('active');
	    $(this).addClass('active');
	    
	    $('.shop-product-content').removeClass('grid_view list_view').addClass($proStyle);
	    
	});


	/* related product active */
	$('.qwick-view-left .product-details-small').owlCarousel({
	    loop: true,
	    nav: true,
	    item: 3,
	    responsive: {
	        0: {
	            items: 3
	        },
	    }
	});

    // Custom Tab
    function nnfy_tabs( $tabmenus, $tabpane ){
        $tabmenus.on('click', 'a', function(e){
            e.preventDefault();
            var $this = $(this),
                $target = $this.attr('href');
            $this.addClass('nnfyactive').parent().siblings().children('a').removeClass('nnfyactive');
            $( $tabpane + $target ).addClass('nnfyactive').siblings().removeClass('nnfyactive');
        });
    }
    if( $(".product-details-small").length > 0 ){
        nnfy_tabs( $(".product-details-small"), '.nnfy-tab-pane' );
    }
    if( $(".description-review-title").length > 0 ){
        nnfy_tabs( $(".description-review-title"), '.nnfy-tab-pane' );
    }


	//Quickview

	//Add quick view box
	$('body').append('<div class="woocommerce" id="nnfyquick-viewmodal"><button type="button" class="closeqv"><span class="ion-android-close"></span></button><div class="nnfymodal-dialog product"><div class="nnfymodal-content"><div class="nnfymodal-body ht-row"></div></div></div></div>');


	//show quick view
	$('.quickview').each(function(){
	    var quickviewLink = $(this);
	    var productID = quickviewLink.attr('data-quick-id');
    	quickviewLink.on('click', function(event){
    	 	event.preventDefault();

    	 	$('.nnfymodal-body').html(''); /*clear content*/
    	 	$('body').addClass('quickview');
            $('#nnfyquick-viewmodal').addClass('open loading');
            $('.nnfymodal-body').html('<div class="nnfy-loading"><div class="lds-css ng-scope"><div style="width:100%;height:100%" class="lds-ripple"><div></div><div></div></div>');

    	 	window.setTimeout(function(){
    	 		$.post(
    	 		    nnfy_localize_vars.ajaxurl, 
        	 		{
        	 		  'action': 'nnfy_product_quickview',
        	 		  'data':   productID
        	 		},
        	 		function(response){
                        $('#nnfyquick-viewmodal').removeClass('loading');
                        $('.nnfymodal-dialog').css("background-color","#ffffff");
        	 		 	$('.nnfymodal-body').html(response);
                        nnfy_tabs( $(".product-details-small"), '.nnfy-tab-pane' );
        	 		}

                );
    	 	}, 300);

    	});
	});

	$('.closeqv').on('click', function(event){
	    $('#nnfyquick-viewmodal').removeClass('open');
        $('.nnfymodal-dialog').css("background-color","transparent");
    	window.setTimeout(function(){
    	   $('body').removeClass('quickview');
    	}, 500 );
	});

	
})(jQuery);