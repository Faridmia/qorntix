<?php
/**
 * Loads utility functions and registers the theme service classes.
 *
 * @package Qorntix
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
 * Utility functions (procedural helpers and template tags).
 */
require_once EASY_ANIMATION_DIR . 'app/utility/helpers.php';
require_once EASY_ANIMATION_DIR . 'app/utility/template-tags.php';

/*
 * Core service classes.
 */
require_once EASY_ANIMATION_DIR . 'app/core/setup.class.php';
require_once EASY_ANIMATION_DIR . 'app/core/enqueue.class.php';
require_once EASY_ANIMATION_DIR . 'app/core/widgets.class.php';
require_once EASY_ANIMATION_DIR . 'app/core/customizer.class.php';

require_once EASY_ANIMATION_DIR . 'app/init.php';

if ( class_exists( 'Qorntix\\Init' ) ) {
	Qorntix\Init::register_services();
}
