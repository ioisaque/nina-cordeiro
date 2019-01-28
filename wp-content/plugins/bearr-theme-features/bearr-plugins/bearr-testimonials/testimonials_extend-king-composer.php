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
  add_action('init', 'bearr_testimonials_kingc_map_init', 99 );
}



function bearr_testimonials_kingc_map_init(){

   global $kc;

/*-----------------------------------------------------------------------------------*/
/* Testimonials Carousel
/*-----------------------------------------------------------------------------------*/
$testimonials_list = get_posts(array('post_type' => 'testimonials', 'posts_per_page'=> -1, 'post_status' => 'publish'));

$testimonials_array = array();
foreach($testimonials_list as $testimonial_item) {
   $testimonials_array[$testimonial_item->ID] = $testimonial_item->post_title;
}

$kc->add_map( 
   array(
      'bearr-testimonials' => array(
         'name' => 'Testimonials Carousel',
         'description' => 'Displays testimonials',
         'category' => 'Built by ThemeBear',
         'icon' => 'sl-rocket',             
         'params' => array(
            array(
              'name' => 'ids',
              'label' => 'Testimonials from',
              'type' => 'checkbox',             
              'options' => $testimonials_array,
              'description' => 'Select which testimonials you want to display on a carousel.',
            ),
            array(
              'name' => 'text_color',
              'label' => 'Text Color',
              'type' => 'dropdown',             
              'options' => array(            
                  "text-dark" => "Black Text",  
                  "text-light" => "White Text",          
               ),
              'description' => 'Select the color of the testimonial text.',
            ),
         )
      )
   )
);

} //end of function