<?php
/**
 * Lightweight service container.
 *
 * Each service class is instantiated and, if it exposes a register() method,
 * that method is called so it can hook into WordPress.
 *
 * @package Qorntix
 */

namespace Qorntix;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

final class Init {

	/**
	 * Full list of service classes.
	 *
	 * @return array
	 */
	public static function get_services() {
		return array(
			Core\Theme_Setup::class,
			Core\Enqueue::class,
			Core\Widgets::class,
			Core\Customizer::class,
		);
	}

	/**
	 * Instantiate every service and call its register() method when present.
	 *
	 * @return void
	 */
	public static function register_services() {
		foreach ( self::get_services() as $class ) {
			$service = new $class();
			if ( method_exists( $service, 'register' ) ) {
				$service->register();
			}
		}
	}
}
