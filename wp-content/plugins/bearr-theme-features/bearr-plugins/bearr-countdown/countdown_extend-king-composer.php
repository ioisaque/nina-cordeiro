<?php
/**
 * Visual Composer - Extend
 *
 *
 * @package bearr
 */

if(!function_exists('is_plugin_active')){
  include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

if ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ){
  add_action('init', 'bearr_clients_kingc_map_init', 99 );
}



function bearr_clients_kingc_map_init(){

   global $kc;


/*-----------------------------------------------------------------------------------*/
/* Clients Carousel
/*-----------------------------------------------------------------------------------*/
$clients_list = get_posts(array('post_type' => 'clients', 'posts_per_page'=> -1, 'post_status' => 'publish'));

$clients_array = array();
foreach($clients_list as $client_item) {
   $clients_array[$client_item->ID] = $client_item->post_title;
}

$kc->add_map( 
   array(
      'bearr-clients-carousel' => array(
         'name' => 'Clients Carousel',
         'description' => 'Carousel showing clients logos.',
         'category' => 'Built by ThemeBear',
         'icon' => 'sl-paper-plane',           
         'params' => array(
            array(
              'name' => 'ids',
              'label' => 'Clients Logos',
              'type' => 'checkbox',             
              'options' => $clients_array,
              'description' => 'Select which client logos you want to display on a carousel.',
            ),           
         )
      )
   )
);


} //end of function



