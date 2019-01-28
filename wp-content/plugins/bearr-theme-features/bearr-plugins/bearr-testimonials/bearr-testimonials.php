<?php
/*
Plugin Name: BeaRR: Testimonials
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
require ('testimonials_custom-post-types.php');
/*
 * Meta Fields
 */
require ('testimonials_meta-fields-cpt.php');
/*
 * Shortcodes
 */
require ('testimonials_shortcodes.php');
/*
 * King Composer
 */
require ('testimonials_extend-king-composer.php');