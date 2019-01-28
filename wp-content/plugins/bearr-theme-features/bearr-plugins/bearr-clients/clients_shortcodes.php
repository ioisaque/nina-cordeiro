<?php
/**
 * Shortcodes
 *
 *
 * @package bearr
 */

/*-----------------------------------------------------------------------------------*/
/*	Client Item
/*-----------------------------------------------------------------------------------*/
function bearr_client_item($atts, $content = null) {
	extract(shortcode_atts(array(
		"id" => ''
	), $atts));

	global $post;
	
	$args = array(
		'post_type' => 'clients',
		'posts_per_page' => 1,
		'p' => $id
	);
	$my_query = new WP_Query($args);
	if( $my_query->have_posts() ) :
	while ($my_query->have_posts()) : $my_query->the_post();
	

	$client_title = esc_html( rwmb_meta( 'bearr_client_title') );	
	$client_url = esc_url( rwmb_meta( 'bearr_client_url') );	
	$client_logos = rwmb_meta( 'bearr_client_logo', 'size=bearr_client_logo' );		
	foreach ( $client_logos as $client_logo ) {
	   $client_logo_url = esc_url( $client_logo['url'] );
	}


	$retour ='';
	
	$retour .='<div class="client-item text-center">';
	if (!empty($client_url)) {	
		$retour .='<a href="'.$client_url .'" target="_blank">' ;
	}
	$retour .='<img src="'.$client_logo_url .'">' ;
	if (!empty($client_url)) {	
		$retour .='</a>' ;
	}
	$retour .='</div>';

	endwhile; else:
	$retour ='';
	$retour .= "nothing found.";
	endif;

	//Reset Query
    wp_reset_query();
	
	return $retour;
}

add_shortcode("bearr-client", "bearr_client_item");


/*-----------------------------------------------------------------------------------*/
/*	Client Carousel
/*----------------------------------------------------------------------------------*/
function bearr_client_carousel($atts, $content = null) {
	extract(shortcode_atts(array(
		"ids" => ''
	), $atts));

	$clients_ids = explode(",", $ids);
		
	//Owl Carousel
	//Owl Carousel
	wp_enqueue_style( 'owl-carousel-css', plugin_dir_url( __FILE__ ) . 'js/vendor/owl.carousel/assets/owl.carousel.css' );
	wp_enqueue_style( 'owl-carousel-theme-css', plugin_dir_url( __FILE__ ) . 'js/vendor/owl.carousel/assets/owl.theme.default.min.css' );
	wp_enqueue_script( 'owl-carousel-js', plugin_dir_url( __FILE__ ) . 'js/vendor/owl.carousel/owl.carousel.min.js', array(), '20151215', true );
	if ( file_exists( get_template_directory() . '/framework/js/custom/custom-clients.js' ) ) {
		wp_enqueue_script( 'bearr-custom-clients-carousel-js', get_template_directory_uri() . '/framework/js/custom/custom-clients.js', array(), '20151215', true );
	}
	else {
		wp_enqueue_script( 'bearr-custom-clients-carousel-js', plugin_dir_url( __FILE__ ) . 'js/custom-clients.js', array(), '20151215', true );
	}

	//Output
	$output = '';
	$output .= '<div class="owl-carousel-wrapper clients-carousel-wrapper">';
	$output .= '<div class="owl-carousel clients-carousel common-carousel special-carousel">';

	foreach ($clients_ids as $client_id) {
		$output .= '<div class="slide">' . do_shortcode("[bearr-client id=".$client_id."]") . '</div>';
	}

	$output .= '</div>';
	$output .= '</div>';
	return $output;
}

add_shortcode("bearr-clients-carousel", "bearr_client_carousel");