<?php
/**
 * Luxora — FP&A + Operating Automation marketing theme.
 * Bilingual VI/EN, no WooCommerce.
 *
 * @package loxora
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'LOXORA_VER', '1.0.0' );

function loxora_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'style', 'script', 'navigation-widgets' ) );
	add_theme_support( 'automatic-feed-links' );
	register_nav_menus( array( 'primary' => 'Primary Menu' ) );
}
add_action( 'after_setup_theme', 'loxora_setup' );

function loxora_assets() {
	wp_enqueue_style(
		'loxora-main',
		get_template_directory_uri() . '/assets/css/loxora.css',
		array(),
		LOXORA_VER
	);
	wp_enqueue_script(
		'loxora-main',
		get_template_directory_uri() . '/assets/js/loxora.js',
		array(),
		LOXORA_VER,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'loxora_assets' );

/* Marketing site — no comments, no emoji cruft. */
add_action( 'init', function () {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
} );
