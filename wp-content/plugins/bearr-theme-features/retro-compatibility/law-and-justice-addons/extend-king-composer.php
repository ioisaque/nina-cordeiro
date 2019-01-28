<?php
/**
 * Visual Composer - Extend
 *
 *
 * @package law-and-justice
 */

if(!function_exists('is_plugin_active')){
  include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

if ( is_plugin_active( 'kingcomposer/kingcomposer.php' ) ){
  add_action('init', 'kingc_map_init', 99 );
}



function kingc_map_init(){

   global $kc;

/*-----------------------------------------------------------------------------------*/
/* Section Title
/*-----------------------------------------------------------------------------------*/
$kc->add_map( 
   array(
      'tb-section-title' => array(
         'name' => 'Section Title',
         'description' => 'Set a title with style',
         'category' => 'Built for law_and_justice',
         'icon' => 'sl-paper-plane',           
         'params' => array(
            array(
              'name' => 'title',
              'label' => 'Section Title',
              'type' => 'text',
              'value' => 'Title Section Here', // remove this if you do not need a default content
              'description' => 'Define a title for the section.',
            ),
         )
      )
   )
);

/*-----------------------------------------------------------------------------------*/
/* Featured Slider
/*-----------------------------------------------------------------------------------*/
$slider_list = get_posts(array('post_type' => 'slider', 'posts_per_page'=> -1, 'post_status' => 'publish'));

$slider_array = array();
foreach($slider_list as $slide_item) {
   $slider_array[$slide_item->ID] = $slide_item->post_title;
}

$kc->add_map( 
   array(
      'tb-slider' => array(
         'name' => 'Hero Slider',
         'description' => 'Featured slideshow',
         'category' => 'Built for law_and_justice',
         'icon' => 'sl-paper-plane',           
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
      'tb-testimonials' => array(
         'name' => 'Testimonials Carousel',
         'description' => 'Clients feedback',
         'category' => 'Built for law_and_justice',
         'icon' => 'sl-paper-plane',           
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

/*-----------------------------------------------------------------------------------*/
/* Team Carousel
/*-----------------------------------------------------------------------------------*/
$team_list = get_posts(array('post_type' => 'team', 'posts_per_page'=> -1, 'post_status' => 'publish'));

$team_array = array();
foreach($team_list as $team_item) {
   $team_array[$team_item->ID] = $team_item->post_title;
}

$kc->add_map( 
   array(
      'tb-team-carousel' => array(
         'name' => 'Team Carousel',
         'description' => 'Carousel showing team members.',
         'category' => 'Built for law_and_justice',
         'icon' => 'sl-paper-plane',           
         'params' => array(
            array(
              'name' => 'ids',
              'label' => 'Team members',
              'type' => 'checkbox',             
              'options' => $team_array,
              'description' => 'Select which team members you want to display on a carousel.',
            ),           
         )
      )
   )
);

/*-----------------------------------------------------------------------------------*/
/* Clients Carousel
/*-----------------------------------------------------------------------------------*/
$clients_list = get_posts(array('post_type' => 'clients', 'posts_per_page'=> -1, 'post_status' => 'publish'));

$clients_array = array();
foreach($clients_list as $client_item) {
   $clients_array[$client_item->ID] = $client_item->post_title;
}

$kc->add_map( 
   array(
      'tb-clients-carousel' => array(
         'name' => 'Clients Carousel',
         'description' => 'Carousel showing clients logos.',
         'category' => 'Built for law_and_justice',
         'icon' => 'sl-paper-plane',           
         'params' => array(
            array(
              'name' => 'ids',
              'label' => 'Clients Logos',
              'type' => 'checkbox',             
              'options' => $clients_array,
              'description' => 'Select which client logos you want to display on a carousel.',
            ),           
         )
      )
   )
);

/*-----------------------------------------------------------------------------------*/
/* Blog Grid
/*-----------------------------------------------------------------------------------*/
$kc->add_map( 
   array(
      'tb-blog-grid' => array(
         'name' => 'Blog Posts Grid',
         'description' => 'Display your last post on grid format.',
         'category' => 'Built for law_and_justice',
         'icon' => 'sl-paper-plane',           
         'params' => array(
            array(
              'name' => 'number',
              'label' => 'Number of Blog Posts to Display.',
              'type' => 'textfield',   
              'value' => 4, 
              'description' => 'Set how many blog items would you like to include in the grid.',
            ),           
         )
      )
   )
);

/*-----------------------------------------------------------------------------------*/
/* Counters
/*-----------------------------------------------------------------------------------*/
$kc->add_map( 
   array(
      'tb-counter' => array(
         'name' => 'Counters',
         'description' => 'Shows 3 numbers featured with animation (eg 120 jobs done).',
         'category' => 'Built for law_and_justice',
         'icon' => 'sl-paper-plane',           
         'params' => array(
            array(
              'name' => 'title_one',
              'label' => 'Feature title 1 ',
              'type' => 'textfield',  
              'description' => '(For example: Jobs done).',
            ),
            array(
              'name' => 'count_to1',
              'label' => 'Title 1 - Count To',
              'type' => 'textfield',  
              'description' => 'Set the number you want to show (eg: 120) - Please use only numbers.',
            ),  
            array(
              'name' => 'title_two',
              'label' => 'Feature title 2 ',
              'type' => 'textfield',  
              'description' => '(For example: Happy Clients).',
            ),
            array(
              'name' => 'count_to2',
              'label' => 'Title 2 - Count To',
              'type' => 'textfield',  
              'description' => 'Set the number you want to show (eg: 22) - Please use only numbers.',
            ), 
            array(
              'name' => 'title_three',
              'label' => 'Feature title 3 ',
              'type' => 'textfield',  
              'description' => '(For example: Case Studies).',
            ),  
            array(
              'name' => 'count_to3',
              'label' => 'Title 3 - Count To',
              'type' => 'textfield',  
              'description' => 'Set the number you want to show (eg: 52) - Please use only numbers.',
            ),         
         )
      )
   )
);

/*-----------------------------------------------------------------------------------*/
/* Counters
/*-----------------------------------------------------------------------------------*/
$kc->add_map( 
   array(
      'quover-features' => array(
         'name' => 'Features with hover Effect',
         'description' => 'Shows features and icons with hover effect.',
         'category' => 'Built for law_and_justice',
         'icon' => 'sl-paper-plane',           
         'params' => array(
            array(
              'name' => 'title_one',
              'label' => 'Feature title 1 ',
              'type' => 'textfield',  
              //'description' => '(For example: Jobs done).',
            ),
            array(
              'name' => 'icon1',
              'label' => 'Feature 1 Icon',
              'type' => 'attach_image',  
              //'description' => 'Set the number you want to show (eg: 120) - Please use only numbers.',
            ),  
            array(
              'name' => 'title_two',
              'label' => 'Feature title 2 ',
              'type' => 'textfield',  
              //'description' => '(For example: Happy Clients).',
            ),
            array(
              'name' => 'icon2',
              'label' => 'Feature 2 Icon',
              'type' => 'attach_image'                
            ), 
            array(
              'name' => 'title_three',
              'label' => 'Feature title 3 ',
              'type' => 'textfield',  
              //'description' => '(For example: Case Studies).',
            ),  
            array(
              'name' => 'icon3',
              'label' => 'Feature 3 Icon',
              'type' => 'attach_image'             
            ),         
         )
      )
   )
);



} //end of function



