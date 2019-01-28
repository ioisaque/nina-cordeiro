<?php
/*
Plugin Name: BeaRR: Clients
Plugin URI: http://themebear.co
Description: Adds Clients Functionality for ThemeBar WordPress Themes.
Author: ThemeBear
Version: 1.0
Author URI: http://themebear.co
*/
/**
 * Advanced Custom Fields Configuration
 *
 *
 * @package bearr
 * 
 */

/*
 * Custom Post Types
 */
require ('countdown_custom-post-types.php');
/*
 * Meta Fields
 */
require ('countdown_meta-fields-cpt.php');
/*
 * Shortcodes
 */
require ('countdown_shortcodes.php');
/*
 * King Composer
 */
//require ('countdown_extend-king-composer.php');