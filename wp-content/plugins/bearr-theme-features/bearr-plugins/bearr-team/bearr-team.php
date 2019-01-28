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
require ('team_custom-post-types.php');
/*
 * Meta Fields
 */
require ('team_meta-fields-cpt.php');
/*
 * Shortcodes
 */
require ('team_shortcodes.php');
/*
 * King Composer
 */
require ('team_extend-king-composer.php');