# Freemius License Installer

* Author:            Andy Fragen
* License:           MIT
* Requires at least: 5.9
* Requires PHP:      7.2
* Tested up to:      trunk
* Stable version:    main
* Donate link:       <https://thefragens.com/git-updater-donate>

Add Freemius licensing from `.env` file. Uses https://github.com/squarecandy/freemius-auto-activation plugin.

## Description

Activating this plugin loads your license data from a `.env` file. You will need to create this `.env` file for the plugin to function. A PHP Fatal Exception error on activation will be thrown if the `.env` file is not found in the correct path.

Refer to `.env.example` for the format of the `.env` file.

The `.env` file will need to be created in the plugin root directory. This is a tradeoff as it is less secure but provides for an easier installation for you and your users.

The shortcode is unique to each Freemius integrated plugin or theme. Ask the plugin developer for this shortcode. It is usually evident in the Freemius integration code.

It will also automatically install and activate the [Freemius Auto Activation](https://github.com/squarecandy/freemius-auto-activation) plugin.

After running, the licenses with be loaded in the WordPress database. You may still be asked to opt in to telemetry data. Please agree to this instead of skipping.

After running this plugin, it may be deactivated and/or deleted. Upon deactivation, the Freemius Auto Activation plugin will be deleted.
