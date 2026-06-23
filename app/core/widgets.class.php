<?php
/**
 * Register widget areas (sidebars).
 *
 * @package Qorntix
 */

namespace Qorntix\Core;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Widgets {

	/**
	 * Register hooks.
	 *
	 * @return void
	 */
	public function register() {
		add_action( 'widgets_init', array( $this, 'register_sidebars' ) );
	}

	/**
	 * Register the theme sidebars.
	 *
	 * @return void
	 */
	public function register_sidebars() {

		register_sidebar(
			array(
				'name'          => esc_html__( 'Primary Sidebar', 'qorntix' ),
				'id'            => 'sidebar-1',
				'description'   => esc_html__( 'Widgets shown in the blog / archive sidebar.', 'qorntix' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer', 'qorntix' ),
				'id'            => 'footer-1',
				'description'   => esc_html__( 'Widgets shown in the footer area.', 'qorntix' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}
}
