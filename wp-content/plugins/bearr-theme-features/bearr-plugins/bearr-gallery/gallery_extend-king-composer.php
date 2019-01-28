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
  add_action('init', 'bearr_gallery_kingc_map_init', 99 );
}



function bearr_gallery_kingc_map_init(){

   global $kc;


/*-----------------------------------------------------------------------------------*/
/* Gallery
/*-----------------------------------------------------------------------------------*/
$gallery_list = get_posts(array('post_type' => 'gallery', 'posts_per_page'=> -1, 'post_status' => 'publish'));

$gallery_array = array();
foreach($gallery_list as $gallery_item) {
   $gallery_array[$gallery_item->ID] = $gallery_item->post_title;
}

$kc->add_map( 
   array(
      'bearr-gallery' => array(
         'name' => 'Image Gallery',
         'description' => 'Displays images of a gallery.',
         'category' => 'Built by ThemeBear',
         'icon' => 'sl-rocket',           
         'params' => array(
            array(
              'name' => 'ids',
              'label' => 'Galleries',
              'type' => 'radio',             
              'options' => $gallery_array,
              'description' => 'Select which image gallery you want to display.',
            ),           
         )
      )
   )
);


} //end of function



