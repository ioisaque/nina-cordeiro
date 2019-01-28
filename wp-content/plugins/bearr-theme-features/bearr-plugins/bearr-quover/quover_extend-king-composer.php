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
  add_action('init', 'bearr_quoverfeatures_kingc_map_init', 99 );
}



function bearr_quoverfeatures_kingc_map_init(){

   global $kc;


/*-----------------------------------------------------------------------------------*/
/* Quover Features
/*-----------------------------------------------------------------------------------*/
$kc->add_map( 
   array(
      'bearr-quover-features' => array(
         'name' => 'Features With Hover Effect',
         'description' => 'Shows features and icons with hover effect.',
         'category' => 'Built by ThemeBear',
         'icon' => 'sl-paper-plane',           
         'params' => array(
            array(
              'name' => 'icon1',
              'label' => 'Feature 1: Icon',
              'type' => 'icon_picker',  
              //'description' => 'Set the number you want to show (eg: 120) - Please use only numbers.',
            ),
            array(
              'name' => 'title_one',
              'label' => 'Feature 1: Title  ',
              'type' => 'textfield',  
              //'description' => '(For example: Jobs done).',
            ),     
            array(
              'name' => 'text_one',
              'label' => 'Feature 1: Text  ',
              'type' => 'textfield',  
              //'description' => '(For example: Jobs done).',
            ),
            array(
              'name' => 'icon2',
              'label' => 'Feature 2: Icon',
              'type' => 'icon_picker'                
            ), 
            array(
              'name' => 'title_two',
              'label' => 'Feature 2: Title  ',
              'type' => 'textfield',  
              //'description' => '(For example: Happy Clients).',
            ),     
            array(
              'name' => 'text_two',
              'label' => 'Feature 2: Text  ',
              'type' => 'textfield',  
              //'description' => '(For example: Jobs done).',
            ),        
            array(
              'name' => 'icon3',
              'label' => 'Feature 3: Icon',
              'type' => 'icon_picker'             
            ),   
            array(
              'name' => 'title_three',
              'label' => 'Feature 3: Title  ',
              'type' => 'textfield',  
              //'description' => '(For example: Case Studies).',
            ), 
            array(
              'name' => 'text_three',
              'label' => 'Feature 3: Text  ',
              'type' => 'textfield',  
              //'description' => '(For example: Jobs done).',
            ),
            array(
              'name' => 'icon4',
              'label' => 'Feature 4: Icon',
              'type' => 'icon_picker'             
            ),
            array(
              'name' => 'title_four',
              'label' => 'Feature 4: Title ',
              'type' => 'textfield',  
              //'description' => '(For example: Case Studies).',
            ),    
            array(
              'name' => 'text_four',
              'label' => 'Feature 4: Text  ',
              'type' => 'textfield',  
              //'description' => '(For example: Jobs done).',
            ),              
         )
      )
   )
);


} //end of function



