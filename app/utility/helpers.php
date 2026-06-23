<?php
/**
 * General helper functions.
 *
 * @package Qorntix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'qorntix_get_sidebar_position' ) ) :
	/**
	 * Resolve the effective sidebar position for the current view.
	 *
	 * Falls back to "no-sidebar" when the primary sidebar has no widgets.
	 *
	 * @return string One of: left-sidebar, right-sidebar, no-sidebar.
	 */
	function qorntix_get_sidebar_position() {
		$position = get_theme_mod( 'qorntix_sidebar_position', 'right-sidebar' );

		if ( ! is_active_sidebar( 'sidebar-1' ) ) {
			return 'no-sidebar';
		}

		$valid = array( 'left-sidebar', 'right-sidebar', 'no-sidebar' );

		return in_array( $position, $valid, true ) ? $position : 'right-sidebar';
	}
endif;

if ( ! function_exists( 'qorntix_body_classes' ) ) :
	/**
	 * Add helpful classes to the body element.
	 *
	 * @param array $classes Existing body classes.
	 * @return array
	 */
	function qorntix_body_classes( $classes ) {

		// Layout class for the active sidebar position.
		$classes[] = 'layout-' . qorntix_get_sidebar_position();

		// Add a class when there is no hardcoded title.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		return $classes;
	}
endif;
add_filter( 'body_class', 'qorntix_body_classes' );

if ( ! function_exists( 'qorntix_pingback_header' ) ) :
	/**
	 * Add a pingback url auto-discovery header for single posts/pages.
	 *
	 * @return void
	 */
	function qorntix_pingback_header() {
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
		}
	}
endif;
add_action( 'wp_head', 'qorntix_pingback_header' );

if ( ! function_exists( 'qorntix_footer_text' ) ) :
	/**
	 * Output the footer credit / copyright line.
	 *
	 * @return void
	 */
	function qorntix_footer_text() {
		$custom = get_theme_mod( 'qorntix_footer_text', '' );

		if ( '' !== trim( wp_strip_all_tags( $custom ) ) ) {
			echo wp_kses_post( $custom );
			return;
		}

		printf(
			/* translators: 1: current year, 2: site name. */
			esc_html__( '&copy; %1$s %2$s. All rights reserved.', 'qorntix' ),
			esc_html( gmdate( 'Y' ) ),
			esc_html( get_bloginfo( 'name' ) )
		);
	}
endif;
