<?php
/*
Plugin Name: BeaRR: Image Gallery
Plugin URI: http://themebear.co
Description: Adds Image Gallery Functionality for ThemeBear WordPress Themes.
Author: ThemeBear
Version: 1.0.0.1
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
require ('gallery_custom-post-types.php');
/*
 * Meta Fields
 */
require ('gallery_meta-fields-cpt.php');
/*
 * Shortcodes
 */
require ('gallery_shortcodes.php');
/*
 * King Composer
 */
require ('gallery_extend-king-composer.php');
/*
 * Custom Scripts
 */
add_image_size( 'bearr_gallery_image_1', 479, 423, array( 'center', 'center' ) ); 