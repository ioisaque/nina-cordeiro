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
  add_action('init', 'bearr_timeline_kingc_map_init', 99 );
}



function bearr_timeline_kingc_map_init(){

   global $kc;


/*-----------------------------------------------------------------------------------*/
/* BLogroll Carousel
/*-----------------------------------------------------------------------------------*/
$kc->add_map( 
   array(
      'bearr-timeline-item' => array(
         'name' => 'Timeline Item',
         'description' => 'Displays content in timeline style.',
         'category' => 'Built by ThemeBear',
         'icon' => 'sl-rocket',           
         'params' => array(
            array(
              'name' => 'position',
              'label' => 'Content Position',           
              'type' => 'radio',  // USAGE RADIO TYPE
              'options' => array(    // REQUIRED
                  'left' => 'Left Position',
                  'right' => 'Right Position',
              ),           
              'value' => 'left', // remove this if you do not need a default content 
              'description' => 'Position of content in relation to the timeline.',
            ),
            array(
              'name' => 'date',
              'label' => 'Date',           
              'type' => 'text',           
              'description' => 'Date displayed on this timeline item.',
            ), 
            array(
              'name' => 'image',
              'label' => 'Item Image',           
              'type' => 'attach_image',  // USAGE ATTACH_IMAGE TYPE           
              'description' => 'Image illustrating this item from the timeline.',
            ), 
            array(
              'name' => 'title',
              'label' => 'Title',           
              'type' => 'text',           
              'description' => 'This item title.',
            ),  
            array(
              'name' => 'text_content',
              'label' => 'Text Content',
              'type' => 'editor',  // USAGE TEXTAREA_HTML TYPE
              //'value' => base64_encode( 'DEFAULT-CONTENT' ), // remove this if you do not need a default content
              'description' => 'This item text.',
            ),         
         )
      )
   )
);


} //end of function



