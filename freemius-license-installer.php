<?php
/**
 * Freemius License Installer.
 *
 * @package freemius-license-installer
 * @author  Andy Fragen
 * @link    https://github.com/afragen/freemius-license-installer
 * @uses    https://github.com/squarecandy/freemius-auto-activation
 *
 * Plugin Name:       Freemius License Installer
 * Plugin URI:        https://github.com/afragen/freemius-license-installer
 * Description:       Add Freemius licensing from .env file.
 * Version:           0.5.0
 * Author:            Andy Fragen
 * License:           MIT
 * Requires at least: 5.2
 * Requires PHP:      7.1
 * GitHub Plugin URI: https://github.com/afragen/freemius-license-installer
 * Primary Branch:    main
 */

namespace Fragen\Freemius_License_Installer;

/*
 * Exit if called directly.
 * PHP version check and exit.
 */
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once __DIR__ . '/vendor/autoload.php';

add_action(
	'plugins_loaded',
	function() {
		$config = [
			[
				'name'     => 'Freemius Auto Activation',
				'host'     => 'github',
				'slug'     => 'freemius-auto-activation/freemius-auto-activation.php',
				'uri'      => 'https://github.com/squarecandy/freemius-auto-activation',
				'branch'   => 'main',
				'required' => true,
			],
		];
		\WP_Dependency_Installer::instance( __DIR__ )->register( $config )->run();
	}
);

// Load licenses from .env file.
( \Dotenv\Dotenv::createImmutable( dirname( \ABSPATH ) ) )->load();

$fs_shortcodes = explode( ',', $_ENV['fs_shortcodes'] );

// Define constants for Freemius Auto Activation.
define( 'FS_SHORTCODES', $fs_shortcodes );
foreach ( $fs_shortcodes as $fs_shortcode ) {
	define( 'WP__' . strtoupper( $fs_shortcode ) . '__LICENSE_KEY', $_ENV[ $fs_shortcode ] );
}

register_deactivation_hook( __FILE__, __NAMESPACE__ . '\delete_freemius_auto_activation' );

/**
 * Upon deactivation, delete freemius-auto-activation plugin.
 *
 * @return void
 */
function delete_freemius_auto_activation() {
	global $wp_filesystem;

	if ( ! $wp_filesystem ) {
		require_once ABSPATH . '/wp-admin/includes/file.php';
		WP_Filesystem();
	}

	$wp_filesystem->delete( $wp_filesystem->wp_plugins_dir() . 'freemius-auto-activation', true );
}
