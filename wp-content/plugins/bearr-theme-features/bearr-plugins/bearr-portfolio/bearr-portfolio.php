<?php
/*
Plugin Name: BeaRR: portfolio
Plugin URI: http://themebear.co
Description: Adds testimonals functionality to ThemeBear Themes.
Author: Diego Pereira @ ThemeBear
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
require ('portfolio_custom-post-types.php');
/*
 * Meta Fields
 */
require ('portfolio_meta-fields-cpt.php');
/*
 * Shortcodes
 */
require ('portfolio_shortcodes.php');
/*
 * King Composer
 */
require ('portfolio_extend-king-composer.php');