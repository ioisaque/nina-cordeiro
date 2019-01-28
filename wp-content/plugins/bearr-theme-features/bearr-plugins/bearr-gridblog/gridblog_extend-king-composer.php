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
  add_action('init', 'bearr_gridblog_kingc_map_init', 99 );
}



function bearr_gridblog_kingc_map_init(){

   global $kc;


/*-----------------------------------------------------------------------------------*/
/* BLogroll Carousel
/*-----------------------------------------------------------------------------------*/
$kc->add_map( 
   array(
      'bearr-blog-grid' => array(
         'name' => 'Grid Blog',
         'description' => 'Displays last posts on grid format.',
         'category' => 'Built by ThemeBear',
         'icon' => 'sl-rocket',           
         'params' => array(
            array(
              'name' => 'postsperpage',
              'label' => 'Number of posts',
              'type' => 'number_slider',             
              'options' => array(    // REQUIRED
                  'min' => 2,
                  'max' => 8,
                  'unit' => '',
                  'show_input' => true
              ),
              'value' => '4',
              'description' => 'Number of posts to be displayed.',
            ),  
         )
      )
   )
);


} //end of function



