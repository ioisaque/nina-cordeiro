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
  add_action('init', 'bearr_wedding_elements_kingc_map_init', 99 );
}



function bearr_wedding_elements_kingc_map_init(){

   global $kc;

/*-----------------------------------------------------------------------------------*/
/* Wedding Bio (Groom and Bride)
/*-----------------------------------------------------------------------------------*/
$kc->add_map( 
   array(
      'bearr-wedding-bio' => array(
         'name' => 'Wedding Bio',
         'description' => 'Displays the bio of the Groom and Bride.',
         'category' => 'Built by ThemeBear',
         'icon' => 'sl-rocket',           
         'params' => array(            
            array(
              'name' => 'bride_image',
              'label' => 'Bride Photo',           
              'type' => 'attach_image',          
              'description' => 'A photo of the bride.',
            ), 
            array(
              'name' => 'bride_title',
              'label' => 'Bride Name',           
              'type' => 'text',           
              'description' => 'The bride name.',
            ),  
            array(
              'name' => 'bride_content',
              'label' => 'Bio Text of the bride',
              'type' => 'editor',  // USAGE TEXTAREA_HTML TYPE
              //'value' => base64_encode( 'DEFAULT-CONTENT' ), // remove this if you do not need a default content
              'description' => 'The text for the bio of the bride.',
            ),  
            array(
              'name' => 'groom_image',
              'label' => 'Groom Photo',           
              'type' => 'attach_image',          
              'description' => 'A photo of the bride.',
            ), 
            array(
              'name' => 'groom_title',
              'label' => 'Groom Name',           
              'type' => 'text',           
              'description' => 'The bride name.',
            ),  
            array(
              'name' => 'groom_content',
              'label' => 'Bio Text of the groom',
              'type' => 'editor',  // USAGE TEXTAREA_HTML TYPE
              //'value' => base64_encode( 'DEFAULT-CONTENT' ), // remove this if you do not need a default content
              'description' => 'The text for the bio of the bride.',
            ),        
         )
      )
   )
);

/*-----------------------------------------------------------------------------------*/
/* Wedding Event Reminder
/*-----------------------------------------------------------------------------------*/
$kc->add_map( 
   array(
      'bearr-wedding-event-reminder' => array(
         'name' => 'Event Reminder',
         'description' => 'Displays a element with the date, time and place of an event.',
         'category' => 'Built by ThemeBear',
         'icon' => 'sl-rocket',           
         'params' => array(            
            array(
              'name' => 'event_name',
              'label' => 'Event name',           
              'type' => 'text',          
              'description' => 'Title of the event.',
            ), 
            array(
              'name' => 'event_time',
              'label' => 'Event time',           
              'type' => 'text',          
              'description' => 'Time of the event.',
            ),  
            array(
              'name' => 'event_date',
              'label' => 'Event date',           
              'type' => 'text',          
              'description' => 'Date of the event.',
            ),
            array(
              'name' => 'event_address',
              'label' => 'Event Address',           
              'type' => 'text',          
              'description' => 'Place of the event.',
            ),                
         )
      )
   )
);


} //end of function



