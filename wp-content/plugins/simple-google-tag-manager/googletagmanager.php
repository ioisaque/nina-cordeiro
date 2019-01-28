<?php
/*
Plugin Name: Google Tag Manager
Plugin URI: http://wordpress.org/extend/plugins/googleanalytics/
Description: Enables <a href="http://www.google.com/tagmanager/" target="_blank">Google Tag Manager</a> on all pages.
Version: 1.0.4
Author: Justin Rains
Author URI: http://portalplanet.net/tagmanager/
*/

if (!defined('WP_CONTENT_URL'))
      define('WP_CONTENT_URL', get_option('siteurl').'/wp-content');
if (!defined('WP_CONTENT_DIR'))
      define('WP_CONTENT_DIR', ABSPATH.'wp-content');
if (!defined('WP_PLUGIN_URL'))
      define('WP_PLUGIN_URL', WP_CONTENT_URL.'/plugins');
if (!defined('WP_PLUGIN_DIR'))
      define('WP_PLUGIN_DIR', WP_CONTENT_DIR.'/plugins');

function activate_googletag() {
  add_option('tag_id', 'GTM-xxxxxxxxx');
}

function deactive_googletag() {
  delete_option('tag_id');
}

function admin_init_googletagmanager() {
  register_setting('googletagmanager', 'tag_id');
}

function admin_menu_googletagmanager() {
  add_options_page('Google Tag Manager', 'Google Tag Manager', 'manage_options', 'googletagmanager', 'options_page_googletagmanager');
}

function options_page_googletagmanager() {
  include(WP_PLUGIN_DIR.'/simple-google-tag-manager/options.php');  
}

function googletagmanagerhead() {
  $tag_id = get_option('tag_id');
?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','<?php echo $tag_id ?>');</script>
<!-- End Google Tag Manager -->
<?php
}

function googletagmanagerbody() {
  $tag_id = get_option('tag_id');
?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo $tag_id ?>"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


<?php
}

register_activation_hook(__FILE__, 'activate_googletagmanager');
register_deactivation_hook(__FILE__, 'deactive_googletagmanager');

if (is_admin()) {
  add_action('admin_init', 'admin_init_googletagmanager');
  add_action('admin_menu', 'admin_menu_googletagmanager');
}

add_action('body_open', 'googletagmanagerbody');
add_action('wp_head', 'googletagmanagerhead');
?>
