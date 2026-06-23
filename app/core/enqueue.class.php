<?php
/**
 * Enqueue front-end styles and scripts.
 *
 * @package Qorntix
 */

namespace Qorntix\Core;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Enqueue {

	/**
	 * Register hooks.
	 *
	 * @return void
	 */
	public function register() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
	}

	/**
	 * Enqueue styles and scripts.
	 *
	 * @return void
	 */
	public function enqueue_assets() {

		// The main theme stylesheet (style.css carries only the header).
		wp_enqueue_style(
			'qorntix-style',
			EASY_ANIMATION_URI . 'assets/css/main.css',
			array(),
			EASY_ANIMATION_VERSION
		);

		// Ensure the parent style.css header is present for child themes / tools.
		wp_style_add_data( 'qorntix-style', 'rtl', 'replace' );

		// Accessible navigation script.
		wp_enqueue_script(
			'qorntix-navigation',
			EASY_ANIMATION_URI . 'assets/js/navigation.js',
			array(),
			EASY_ANIMATION_VERSION,
			true
		);

		// Comment-reply script on singular views with threaded comments.
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}
