<?php
/**
 * Git Updater Licensing.
 *
 * @package git-updater-licensing
 * @author  Andy Fragen
 * @link    https://github.com/afragen/git-updater-licensing
 *
 * Plugin Name:       Git Updater Licensing
 * Plugin URI:        https://github.com/afragen/git-updater-licensing
 * Description:       Add Git Updater Freemius licensing.
 * Version:           0.1.0
 * Author:            Andy Fragen
 * License:           MIT
 * Requires at least: 5.2
 * Requires PHP:      7.1
 * GitHub Plugin URI: https://github.com/afragen/git-updater-licensing
 * Primary Branch:    main
 */

namespace Fragen\Git_Updater_Licensing;

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

define( 'FS_SHORTCODES', [ 'gup_fs', 'gua_fs' ] );
define( 'WP__GUP_FS__LICENSE_KEY', 'sk_8f9W_vJiTyZ0.&_3@tP2-MwpQw9Zt' );
define( 'WP__GUA_FS__LICENSE_KEY', 'sk_gYgpi.JtX=o2qvFk2aj3RD+cEVU3u' );
