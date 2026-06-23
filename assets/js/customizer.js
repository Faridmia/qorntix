/**
 * Qorntix — Customizer live preview.
 *
 * Updates the site title, tagline and header text color in the preview
 * without a full page refresh.
 */
( function ( $ ) {
	'use strict';

	if ( ! window.wp || ! wp.customize ) {
		return;
	}

	// Site title.
	wp.customize( 'blogname', function ( value ) {
		value.bind( function ( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );

	// Site tagline.
	wp.customize( 'blogdescription', function ( value ) {
		value.bind( function ( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function ( value ) {
		value.bind( function ( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					clip: 'auto',
					position: 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					color: to
				} );
			}
		} );
	} );
}( jQuery ) );
