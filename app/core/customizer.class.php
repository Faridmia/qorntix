<?php
/**
 * Theme Customizer settings using the core WordPress Customizer API.
 *
 * @package Qorntix
 */

namespace Qorntix\Core;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Customizer {

	/**
	 * Register hooks.
	 *
	 * @return void
	 */
	public function register() {
		add_action( 'customize_register', array( $this, 'customize_register' ) );
		add_action( 'customize_preview_init', array( $this, 'preview_js' ) );
	}

	/**
	 * Add postMessage support and the theme options.
	 *
	 * @param \WP_Customize_Manager $wp_customize Customizer manager instance.
	 * @return void
	 */
	public function customize_register( $wp_customize ) {

		// Make core settings live-preview with selective refresh.
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial(
				'blogname',
				array(
					'selector'        => '.site-title a',
					'render_callback' => array( $this, 'partial_blogname' ),
				)
			);
			$wp_customize->selective_refresh->add_partial(
				'blogdescription',
				array(
					'selector'        => '.site-description',
					'render_callback' => array( $this, 'partial_blogdescription' ),
				)
			);
		}

		// Theme Options panel.
		$wp_customize->add_section(
			'qorntix_layout',
			array(
				'title'    => esc_html__( 'Theme Layout', 'qorntix' ),
				'priority' => 130,
			)
		);

		// Sidebar position.
		$wp_customize->add_setting(
			'qorntix_sidebar_position',
			array(
				'default'           => 'right-sidebar',
				'sanitize_callback' => array( $this, 'sanitize_sidebar_position' ),
				'transport'         => 'refresh',
			)
		);

		$wp_customize->add_control(
			'qorntix_sidebar_position',
			array(
				'label'   => esc_html__( 'Sidebar Position', 'qorntix' ),
				'section' => 'qorntix_layout',
				'type'    => 'radio',
				'choices' => array(
					'right-sidebar' => esc_html__( 'Right Sidebar', 'qorntix' ),
					'left-sidebar'  => esc_html__( 'Left Sidebar', 'qorntix' ),
					'no-sidebar'    => esc_html__( 'No Sidebar', 'qorntix' ),
				),
			)
		);

		// Footer copyright text.
		$wp_customize->add_setting(
			'qorntix_footer_text',
			array(
				'default'           => '',
				'sanitize_callback' => 'wp_kses_post',
				'transport'         => 'refresh',
			)
		);

		$wp_customize->add_control(
			'qorntix_footer_text',
			array(
				'label'       => esc_html__( 'Footer Copyright Text', 'qorntix' ),
				'description' => esc_html__( 'Leave empty to show the default credit line.', 'qorntix' ),
				'section'     => 'qorntix_layout',
				'type'        => 'textarea',
			)
		);
	}

	/**
	 * Render the site title for the selective refresh partial.
	 *
	 * @return void
	 */
	public function partial_blogname() {
		bloginfo( 'name' );
	}

	/**
	 * Render the site tagline for the selective refresh partial.
	 *
	 * @return void
	 */
	public function partial_blogdescription() {
		bloginfo( 'description' );
	}

	/**
	 * Sanitize the sidebar position choice.
	 *
	 * @param string $value Raw value.
	 * @return string
	 */
	public function sanitize_sidebar_position( $value ) {
		$valid = array( 'right-sidebar', 'left-sidebar', 'no-sidebar' );
		return in_array( $value, $valid, true ) ? $value : 'right-sidebar';
	}

	/**
	 * Enqueue the Customizer live-preview script.
	 *
	 * @return void
	 */
	public function preview_js() {
		wp_enqueue_script(
			'qorntix-customizer',
			EASY_ANIMATION_URI . 'assets/js/customizer.js',
			array( 'customize-preview' ),
			EASY_ANIMATION_VERSION,
			true
		);
	}
}
