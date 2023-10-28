/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function($){
	"use strict";

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

	

	// 99fy
	wp.customize( 'nnfy_topbar_left', function( value ) {
	  value.bind( function( newval ) {
	    $( '.header-info li' ).html( newval );
	  } );
	} );

	wp.customize( 'nnfy_footer_copyright_text', function( value ) {
	  value.bind( function( newval ) {
	    $( '.footer-bottom-area .copyright' ).html( newval );
	  } );
	} );

	// Page title section Background
    wp.customize('nnfy_pt_section_bg_color', function( value ) {
      value.bind( function( newval ) {
        if ( newval ) {
          $( '.breadcrumb-area' ).css( 'background-color', newval );
        }
      });
    });

    wp.customize('nnfy_pt_section_bg_image_size', function( value ) {
      value.bind( function( newval ) {
        if ( newval ) {
          $('.breadcrumb-area').css( 'background-size', newval );
        }
      });
    });

    wp.customize('nnfy_pt_section_padding', function( value ) {
      value.bind( function( newval ) {
        if ( newval ) {
          $('.breadcrumb-area').css( 'padding', newval );
        }
      });
    });

	
})(jQuery);