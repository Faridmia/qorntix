<?php
/**
 * Qorntix functions and definitions.
 *
 * @package Qorntix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Theme version. Used for cache busting on enqueued assets.
 */
if ( ! defined( 'EASY_ANIMATION_VERSION' ) ) {
	$qorntix_theme = wp_get_theme();
	define( 'EASY_ANIMATION_VERSION', $qorntix_theme->get( 'Version' ) );
}

/**
 * Convenience path / URI constants.
 */
define( 'EASY_ANIMATION_DIR', trailingslashit( get_template_directory() ) );
define( 'EASY_ANIMATION_URI', trailingslashit( get_template_directory_uri() ) );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * @global int $content_width
 */
if ( ! isset( $content_width ) ) {
	$content_width = 800;
}

/**
 * Bootstrap the theme classes.
 */
require_once EASY_ANIMATION_DIR . 'app/loader.php';
