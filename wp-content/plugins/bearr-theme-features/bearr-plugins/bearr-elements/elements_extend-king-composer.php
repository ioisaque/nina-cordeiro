<?php
/**
 * Visual Composer - Extend
 *
 *
 * @package amore
 */

if(!function_exists('is_plugin_active')){
  include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

if ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ){
  add_action('init', 'bearr_elements_kingc_map_init', 99 );
}



function bearr_elements_kingc_map_init(){

   global $kc;

/*-----------------------------------------------------------------------------------*/
/* Section Title
/*-----------------------------------------------------------------------------------*/
$kc->add_map( 
   array(
      'bearr-section-title' => array(
         'name' => 'Section Title',
         'description' => 'Set a section title | Style 1',
         'category' => 'Built by ThemeBear',
         'icon' => 'sl-rocket',           
         'params' => array(
            array(
              'name' => 'title',
              'label' => 'Section Title',
              'type' => 'text',
              'value' => 'Title of Section Here', // remove this if you do not need a default content
              'description' => 'Define a title for the section.',
            ),
            array(
              'name' => 'subtitle',
              'label' => 'Section Subtitle',
              'type' => 'text',
              'value' => 'Subtitle of Section Here', // remove this if you do not need a default content
              'description' => 'Define a subtitle for the section.',
            ),
            array(
              'name' => 'colortitle',
              'label' => 'Color',
              'type' => 'dropdown',             
              'options' => array(            
                  "title-section-color1" => "Main Color",  
                  "title-section-white" => "White Color", 
                  "title-section-no-color" => "Defined via Page Builder",          
               ),
              'description' => 'Select the text color.',
            ),
         )
      ),
      'bearr_service_block' => array(
         'name' => 'Service or Feature',
         'description' => 'Shows features or services.',
         'category' => 'Built by ThemeBear',
         'icon' => 'sl-paper-plane',           
         'params' => array(
            array(
              'name' => 'the_icon',
              'label' => 'Icon',
              'type' => 'icon_picker',  
              //'description' => 'Set the number you want to show (eg: 120) - Please use only numbers.',
            ),
            array(
              'name' => 'the_title',
              'label' => 'Title',
              'type' => 'textfield',  
              //'description' => '(For example: Jobs done).',
            ),     
            array(
              'name' => 'the_text',
              'label' => 'Text',
              'type' => 'textfield',  
              //'description' => '(For example: Jobs done).',
            ),             
         )
    )
   )
);

/*-----------------------------------------------------------------------------------*/
/* Section Title 2
/*-----------------------------------------------------------------------------------*/
$bearr_setup_elements_title2 = get_option( 'bearr_setup_elements_title2' );
if ( $bearr_setup_elements_title2 == 'true') {
  $kc->add_map( 
    array(        
      'bearr-section-title-2' => array(
         'name' => 'Section Title 2',
         'description' => 'Set a section title | Style 2',
         'category' => 'Built by ThemeBear',
         'icon' => 'sl-rocket',           
         'params' => array(
            array(
              'name' => 'title',
              'label' => 'Section Title',
              'type' => 'text',
              'value' => 'Title of Section Here', // remove this if you do not need a default content
              'description' => 'Define a title for the section.',
            ),
            array(
              'name' => 'subtitle',
              'label' => 'Section Subtitle',
              'type' => 'text',
              'value' => 'Subtitle of Section Here', // remove this if you do not need a default content
              'description' => 'Define a subtitle for the section.',
            ),
          )
      )
    )
  );
}

} //end of function



