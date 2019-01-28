<?php
/**
 * Shortcodes
 *
 *
 * @package bearr
 */

/*-----------------------------------------------------------------------------------*/
/*	Countdown Item
/*-----------------------------------------------------------------------------------*/
function bearr_countdown_item($atts, $content = null) {
	extract(shortcode_atts(array(
		"id" => ''
	), $atts));

	$item_id = esc_html( $id );

	$token = wp_generate_password(8, false, false);

	global $post;
	
	$args = array(
		'post_type' => 'countdown',
		'posts_per_page' => 1,
		'p' => $item_id
	);

	$my_query = new WP_Query($args);
	if( $my_query->have_posts() ) :
	while ($my_query->have_posts()) : $my_query->the_post();

	$countdown_date = rwmb_meta( 'bearr_countdown-date' );
	
	$retour ='';
	
	$retour .='<div class="bearr-countdown-wrapper bearr-countdown-wrapper-'.$token .'" id="bearr-countdown-wrapper-'.$token .'" data-token="' . $token .'"><div class="bearr-countdown-item bearr-countdown-item-'.$token .'" id="bearr-countdown-item-'.$token .'">';

	$retour .='</div></div>';

	endwhile; else:
	$retour ='';
	$retour .= "nothing found.";
	endif;

	


	wp_enqueue_script( 'countdown-js', plugin_dir_url( __FILE__ ) . 'js/vendor/jquery.countdown.min.js', array(), '20151218', true );
	wp_enqueue_script( 'bearr-countdown-custom-js', plugin_dir_url( __FILE__ ) . 'js/custom/bearr-countdown-custom-js.js', array(), '20151218', true );
	wp_localize_script( 'bearr-countdown-custom-js','bearr_countdown_config_' . $token , array( 'id' => $token, 'theCountdownDate' => $countdown_date) );	

	//Reset Query
    wp_reset_query();
	
	return $retour;
}

add_shortcode("bearr-countdown", "bearr_countdown_item");
