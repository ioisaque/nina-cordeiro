<?php
/**
 * King Composer - Extend
 *
 *
 * @package bearr
 */

if(!function_exists('is_plugin_active')){
  include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

if ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ){
  add_action('init', 'bearr_restaurant_elements_kingc_map_init', 99 );
}




function bearr_restaurant_elements_kingc_map_init(){

   global $kc;

/*-----------------------------------------------------------------------------------*/
/* Restaurant Menu
/*-----------------------------------------------------------------------------------*/
$kc->add_map( 
   array(
      'bearr_restaurant_menu' => array(
         'name' => 'Restaurant Menu',
         'description' => 'A restaurant menu. Use this with the "Restaurant Menu Item" elements inside',
         'category' => 'Built by ThemeBear',
         'is_container' => true,
         'accept_child'    => 'bearr_restaurant_menu_item',
         'nested' => true,
         'icon' => 'sl-rocket',           
         'params' => array(   
            array(
              'name' => 'menu_heading',
              'label' => 'Menu Title',           
              'type' => 'text',           
              'description' => 'Example: Appertizers',
            )                 
         )
      )
   )
);

/*-----------------------------------------------------------------------------------*/
/* Restaurant Menu Item
/*-----------------------------------------------------------------------------------*/
$kc->add_map( 
   array(
      'bearr_restaurant_menu_item' => array(
         'name' => 'Restaurant Menu item',
         'description' => 'A restaurant menu item. Use it inside the "Restaurant Menu" element',
         'category' => 'Built by ThemeBear',
         'icon' => 'sl-rocket',           
         'params' => array(   
            array(
              'name' => 'menu_item_title',
              'label' => 'Item Title',           
              'type' => 'text',           
              'description' => 'Example: Spaghetti',
            ),  
            array(
              'name' => 'menu_item_price',
              'label' => 'Item Price',           
              'type' => 'text',           
              'description' => 'Example: $22',
            ), 
            array(
              'name' => 'menu_item_description',
              'label' => 'Item Description',           
              'type' => 'text',           
              'description' => 'A very short text describing your item.',
            ),        
         )
      )
   )
);


} //end of function



