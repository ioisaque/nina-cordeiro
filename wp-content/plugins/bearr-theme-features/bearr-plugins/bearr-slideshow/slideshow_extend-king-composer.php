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
  add_action('init', 'bearr_slideshow_kingc_map_init', 99 );
}



function bearr_slideshow_kingc_map_init(){

   global $kc;


/*-----------------------------------------------------------------------------------*/
/* Slideshow
/*-----------------------------------------------------------------------------------*/
$slider_list = get_posts(array('post_type' => 'slider', 'posts_per_page'=> -1, 'post_status' => 'publish'));

$slider_array = array();
foreach($slider_list as $slide_item) {
   $slider_array[$slide_item->ID] = $slide_item->post_title;
}

$kc->add_map( 
   array(
      'bearr-slider' => array(
         'name' => 'Hero Slider',
         'description' => 'Featured slideshow',
         'category' => 'Built by ThemeBear',
         'icon' => 'sl-rocket',           
         'params' => array(
            array(
              'name' => 'ids',
              'label' => 'Slide Itens',
              'type' => 'checkbox',
              //'value' => 'Title Section Here', // remove this if you do not need a default content
              'options' => $slider_array,
              'description' => 'Slides that will be shown on the element.',
            ),
         )
      )
   )
);

} //end of function



