/**
 * Qorntix — accessible mobile navigation toggle.
 *
 * Toggles the .toggled class on the primary navigation and keeps the
 * aria-expanded state in sync for assistive technology.
 */
( function () {
	'use strict';

	document.addEventListener( 'DOMContentLoaded', function () {
		var nav = document.getElementById( 'site-navigation' );

		if ( ! nav ) {
			return;
		}

		var button = nav.querySelector( '.menu-toggle' );
		var menu = nav.querySelector( 'ul' );

		if ( ! button || ! menu ) {
			return;
		}

		button.addEventListener( 'click', function () {
			var expanded = nav.classList.toggle( 'toggled' );
			button.setAttribute( 'aria-expanded', expanded ? 'true' : 'false' );
		} );

		// Close the menu when focus leaves the navigation.
		document.addEventListener( 'click', function ( event ) {
			if ( ! nav.contains( event.target ) && nav.classList.contains( 'toggled' ) ) {
				nav.classList.remove( 'toggled' );
				button.setAttribute( 'aria-expanded', 'false' );
			}
		} );
	} );
}() );
