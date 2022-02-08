# Freemius License Installer

* Author:            Andy Fragen
* License:           MIT
* Requires at least: 5.2
* Requires PHP:      7.1
* Tested up to:      trunk
* Stable version:    main
* Donate link:       <https://thefragens.com/git-updater-donate>

Add Freemius licensing from `.env` file. Uses https://github.com/squarecandy/freemius-auto-activation plugin.

## Description

Activating this plugin loads your license data from a `.env` file located in the same directory as your WordPress installation. This is not at the root level of your WordPress installation, it is one level up. This is so it is outside of any potential browser path.

A PHP Fatal Exception error on activation will be thrown if the `.env` file is not found in the correct path.

```
.
├── .env
└── public
    ├── .DS_Store
    ├── .htaccess
    ├── index.php
    ├── license.txt
    ├── readme.html
    ├── wp-activate.php
    ├── wp-admin
    ├── wp-blog-header.php
    ├── wp-comments-post.php
    ├── wp-config-sample.php
    ├── wp-config.php
    ├── wp-content
    ├── wp-cron.php
    ├── wp-includes
    ├── wp-links-opml.php
    ├── wp-load.php
    ├── wp-login.php
    ├── wp-mail.php
    ├── wp-settings.php
    ├── wp-signup.php
    ├── wp-trackback.php
    └── xmlrpc.php
```

Refer to `.env.example` for the format of the `.env` file.

The shortcode is unique to each Freemius integrated plugin or theme. Ask the plugin developer for this shortcode. It is usually evident in the Freemius integration code.

It will also automatically install and activate the [Freemius Auto Activation](https://github.com/squarecandy/freemius-auto-activation) plugin.

After running, the licenses with be loaded in the WordPress database. You may still be asked to opt in to telemetry data. Please agree to this instead of skipping.

After running this plugin, it and the the Freemius Auto Activation plugin may be deactivated and/or deleted.
