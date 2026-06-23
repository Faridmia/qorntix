<?php
/**
 * Theme setup: supported features, menus and translations.
 *
 * @package Qorntix
 */

namespace Qorntix\Core;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Theme_Setup {

	/**
	 * Register hooks.
	 *
	 * @return void
	 */
	public function register() {
		add_action( 'after_setup_theme', array( $this, 'setup' ) );
		add_action( 'after_setup_theme', array( $this, 'content_width' ), 0 );
	}

	/**
	 * Declare theme support and register nav menus.
	 *
	 * @return void
	 */
	public function setup() {

		// Make the theme available for translation.
		load_theme_textdomain( 'qorntix', get_template_directory() . '/languages' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 780, true );

		// Add RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Switch default core markup to valid HTML5.
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		// Custom logo support.
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 80,
				'width'       => 200,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Block editor / front-end alignment and style support.
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'editor-styles' );
		add_editor_style( 'assets/css/editor-style.css' );

		// Selective refresh for widgets in the Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Register navigation menus.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary Menu', 'qorntix' ),
				'footer'  => esc_html__( 'Footer Menu', 'qorntix' ),
			)
		);
	}

	/**
	 * Set the $content_width global for this theme.
	 *
	 * @global int $content_width
	 * @return void
	 */
	public function content_width() {
		/** This filter is documented to allow child themes to adjust the value. */
		$GLOBALS['content_width'] = apply_filters( 'qorntix_content_width', 800 );
	}
}
