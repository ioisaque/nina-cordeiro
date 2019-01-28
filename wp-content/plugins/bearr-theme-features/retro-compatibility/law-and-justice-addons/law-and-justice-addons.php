<?php
/*
Plugin Name: Law & Justice Theme: Addons
Plugin URI: http://themebear.co
Description: Adds additional meta fields, custom post types, shortcodes and addons for law&order theme.
Author: Diego Pereira @ ThemeBear
Version: 1.1
Author URI: http://themebear.co
*/
/**
 * Advanced Custom Fields Configuration
 *
 *
 * @package law-and-justice
 * 
 */

/*
 * Custom Post Types
 */
require ('custom-post-types.php');
/*
 * Meta Fields
 */
require ('meta-fields-post-formats.php');
require ('meta-fields-cpt.php');
/*
 * Shortcodes
 */
require ('shortcodes.php');
/*
 * King Composer
 */
require ('extend-king-composer.php');