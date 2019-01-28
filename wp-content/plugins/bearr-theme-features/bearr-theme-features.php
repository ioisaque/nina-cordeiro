<?php
/*
Plugin Name: BeaRR: Theme Features
Plugin URI: http://themebear.co
Description: All the functionality required for BeaRR framework themes. This plugin adds all the features needed for your theme and makes it possible to preserve your content when switching it. Developed with love by ThemeBear.co
Author: Diego Pereira @ ThemeBear
Version: 1.1.0.4 
Author URI: http://themebear.co
*/

/*
 * Meta Fields
 */
require_once ('inc/meta-box/meta-box.php');
require ('inc/meta-box/meta-box-show-hide.php');
require ('meta-fields-post-formats.php');
/*
 * WP Less
 */
require ('inc/wp-less/bootstrap-for-theme.php');
/*
 * BeaRR: Slideshow
 */
$bearr_setup_slideshow = get_option( 'bearr_setup_slideshow' );
if ( $bearr_setup_slideshow == 'true') {
	require ('bearr-plugins/bearr-slideshow/bearr-slideshow.php');
}
/*
 * BeaRR: Clients
 */
$bearr_setup_clients = get_option( 'bearr_setup_clients' );
if ( $bearr_setup_clients == 'true') {
	require ('bearr-plugins/bearr-clients/bearr-clients.php');
}
/*
 * BeaRR: Team
 */
$bearr_setup_team = get_option( 'bearr_setup_team' );
if ( $bearr_setup_team == 'true') {
	require ('bearr-plugins/bearr-team/bearr-team.php');
}
/*
 * BeaRR: Testimonials
 */
$bearr_setup_testimonials = get_option( 'bearr_setup_testimonials' );
if ( $bearr_setup_testimonials == 'true') {
	require ('bearr-plugins/bearr-testimonials/bearr-testimonials.php');
}
/*
 * BeaRR: Elements
 */
$bearr_setup_elements = get_option( 'bearr_setup_elements' );
if ( $bearr_setup_elements == 'true') {
	require ('bearr-plugins/bearr-elements/bearr-elements.php');
}
/*
 * BeaRR: bearr-gallery
 */
$bearr_setup_gallery = get_option( 'bearr_setup_gallery' );
if ( $bearr_setup_gallery == 'true') {
	require ('bearr-plugins/bearr-gallery/bearr-gallery.php');
}
/*
 * BeaRR: Timeline
 */
$bearr_setup_timeline = get_option( 'bearr_setup_timeline' );
if ( $bearr_setup_timeline == 'true') {
	require ('bearr-plugins/bearr-timeline/bearr-timeline.php');
}
/*
 * BeaRR: Blogroll
 */
$bearr_setup_blogroll = get_option( 'bearr_setup_blogroll' );
if ( $bearr_setup_blogroll == 'true') {
	require ('bearr-plugins/bearr-blogroll/bearr-blogroll.php');
}
/*
 * BeaRR: GridBlog
 */
$bearr_setup_gridblog = get_option( 'bearr_setup_gridblog' );
if ( $bearr_setup_gridblog == 'true') {
	require ('bearr-plugins/bearr-gridblog/bearr-gridblog.php');
}
/*
 * BeaRR: CountDown
 */
$bearr_setup_countdown = get_option( 'bearr_setup_countdown' );
if ( $bearr_setup_countdown == 'true') {
	require ('bearr-plugins/bearr-countdown/bearr-countdown.php');
}
/*
 * BeaRR: Wedding Elements
 */
$bearr_setup_wedding_elements = get_option( 'bearr_setup_wedding_elements' );
if ( $bearr_setup_wedding_elements == 'true') {
	require ('bearr-plugins/bearr-wedding-elements/bearr-wedding-elements.php');
}
/*
 * BeaRR: Quover
 */
$bearr_setup_quover = get_option( 'bearr_setup_quover' );
if ( $bearr_setup_quover == 'true') {
	require ('bearr-plugins/bearr-quover/bearr-quover.php');
}
/*
 * BeaRR: Portfolio
 */
$bearr_setup_portfolio = get_option( 'bearr_setup_portfolio' );
if ( $bearr_setup_portfolio == 'true') {
	require ('bearr-plugins/bearr-portfolio/bearr-portfolio.php');
}
/*
 * BeaRR: Restaurant Elements
 */
$bearr_setup_restaurant_elements = get_option( 'bearr_setup_restaurant_elements' );
if ( $bearr_setup_restaurant_elements == 'true') {
	require ('bearr-plugins/bearr-restaurant-elements/bearr-restaurant-elements.php');
}
/*
 * Retro Compatibility
 */

//Law and Justice Theme
$bearr_setup_retro_law_and_justice = get_option( 'bearr_setup_retro_law_and_justice' );
if ( $bearr_setup_retro_law_and_justice == 'true') {
	require ('retro-compatibility/law-and-justice-addons/law-and-justice-addons.php');
}

/*
 * Plugin Customizations
 */
require ('customization.php');
/*
 * Other Functions
 */
require ('functions.php');
