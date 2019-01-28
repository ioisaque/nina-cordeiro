=== Google Tag Manager ===
Contributors: justinrains
Tags: javascript, google, tagmanager, analytics
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=QLNJ6YW93YULQ
Requires at least: 2.7
Tested up to: 4.8
Stable tag: 1.0.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Enables Google Tag Manager on all pages.

== Description ==

This plugin adds the required javascript for google tag manager.

For more information visit:

[Google Tag Manager](http://www.google.com/tagmanager)

== Installation ==

1. Upload `googletagmanager` directory to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Add the tag ID from Google Tag Manager (GTM-XXXXXX) to the settings (Admin > Settings > Google Tag Manager)

To get this to work one final step is required. Edit where your theme creates the <body> tag and right after that place this code:
<?php do_action( 'body_open' ); ?>

Mine was in header.php

== Screenshots ==

1. Modified settings panel with Google Analytics.
2. Google Analytics settings page.

== Frequently Asked Questions ==
= How do I get started using google tag manager? =
Go to [Google Tag Manager](http://www.google.com/tagmanager)
= Need a plugin developed? =
Feel free to [contact me](http://justinrains.com). I'm available for work. Thanks!
