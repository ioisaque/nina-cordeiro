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
  add_action('init', 'bearr_blogroll_kingc_map_init', 99 );
}



function bearr_blogroll_kingc_map_init(){

   global $kc;


/*-----------------------------------------------------------------------------------*/
/* BLogroll Carousel
/*-----------------------------------------------------------------------------------*/
$kc->add_map( 
   array(
      'bearr-blogroll' => array(
         'name' => 'Blogroll Carousel',
         'description' => 'Carousel showing recent posts.',
         'category' => 'Built by ThemeBear',
         'icon' => 'sl-rocket',           
         'params' => array(
            array(
              'name' => 'postsperpage',
              'label' => 'Number of posts',
              'type' => 'number_slider',             
              'options' => array(    // REQUIRED
                  'min' => 1,
                  'max' => 24,
                  'unit' => '',
                  'show_input' => true
              ),
              'value' => '9',
              'description' => 'Number of posts to be displayed.',
            ),           
         )
      )
   )
);


} //end of function



