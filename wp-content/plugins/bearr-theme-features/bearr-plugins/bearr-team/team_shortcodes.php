<?php
/**
 * Shortcodes
 *
 *
 * @package bearr
 */

/*-----------------------------------------------------------------------------------*/
/*	Team Membem Item
/*-----------------------------------------------------------------------------------*/
function bearr_team_member($atts, $content = null) {
	extract(shortcode_atts(array(
		"id" => ''
	), $atts));

	global $post;
	
	$args = array(
		'post_type' => 'team',
		'posts_per_page' => 1,
		'p' => $id
	);
	$my_query = new WP_Query($args);
	if( $my_query->have_posts() ) :
	while ($my_query->have_posts()) : $my_query->the_post();
	
	$team_member_name = rwmb_meta( 'bearr_team_name' );	
	$team_member_position = rwmb_meta( 'bearr_team_position' );
	$team_member_photos = rwmb_meta( 'bearr_team_photo', 'size=bearr_team_photo' );		
	foreach ( $team_member_photos as $team_member_photo ) {
	   $team_member_photo_url = $team_member_photo['url'];
	}


	$retour ='';
	
	$retour .='<figure class="team-item">';
	$retour .='<img src="'.$team_member_photo_url .'">' ;
	$retour .='<figcaption><div class="team-caption"><h4 class="team-item-heading">'.$team_member_name.'</h4>';
	$retour .='<p class="team-item-text">' .$team_member_position .'</p>';
	$retour .='</div></figcaption>';
	$retour .='</figure>';

	endwhile; else:
	$retour ='';
	$retour .= "nothing found.";
	endif;

	//Reset Query
    wp_reset_query();
	
	return $retour;
}

add_shortcode("bearr-team-member", "bearr_team_member");


/*-----------------------------------------------------------------------------------*/
/*	Team Carousel for Visual Composer
/*-----------------------------------------------------------------------------------*/
function bearr_team_carousel($atts, $content = null) {
	extract(shortcode_atts(array(
		"ids" => ''
	), $atts));

	$team_ids = explode(",", $ids);

	//Enqueue Scripts
	wp_enqueue_style( 'owl-carousel-css', plugin_dir_url( __FILE__ ) . 'js/vendor/owl.carousel/assets/owl.carousel.css' );
	wp_enqueue_style( 'owl-carousel-theme-css', plugin_dir_url( __FILE__ ) . 'js/vendor/owl.carousel/assets/owl.theme.default.min.css' );
	wp_enqueue_script( 'owl-carousel-js', plugin_dir_url( __FILE__ ) . 'js/vendor/owl.carousel/owl.carousel.min.js', array(), '20151215', true );
	if ( file_exists( get_template_directory() . '/framework/js/custom/custom-team.js' ) ) {
		wp_enqueue_script( 'bearr-custom-team-js', get_template_directory_uri() . '/framework/js/custom/custom-team.js', array(), '20151215', true );
	}
	else {
		wp_enqueue_script( 'bearr-custom-team-js', plugin_dir_url( __FILE__ ) . 'js/custom-team.js', array(), '20151215', true );
	}	

	$output = '';
	$output .= '<div class="">';
	$output .= '<div id="team-carousel" class="owl-carousel team-carousel common-carousel owl-theme">';

	foreach ($team_ids as $team_id) {
		$output .= '<div class="slide">' . do_shortcode("[bearr-team-member id=".$team_id."]") . '</div>';
	}

	$output .= '</div>';
	$output .= '</div>';
	return $output;
}

add_shortcode("bearr-team-carousel", "bearr_team_carousel");
