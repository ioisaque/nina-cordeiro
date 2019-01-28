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
  add_action('init', 'bearr_teams_kingc_map_init', 99 );
}



function bearr_teams_kingc_map_init(){

   global $kc;


/*-----------------------------------------------------------------------------------*/
/* Teams Carousel
/*-----------------------------------------------------------------------------------*/
$team_list = get_posts(array('post_type' => 'team', 'posts_per_page'=> -1, 'post_status' => 'publish'));

$team_array = array();
foreach($team_list as $team_item) {
   $team_array[$team_item->ID] = $team_item->post_title;
}

$kc->add_map( 
   array(
      'bearr-team-carousel' => array(
         'name' => 'Team Carousel',
         'description' => 'Carousel showing team members.',
         'category' => 'Built by ThemeBear',
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


} //end of function



