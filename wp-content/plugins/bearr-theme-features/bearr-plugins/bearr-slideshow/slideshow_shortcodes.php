<?php
/**
 * Shortcodes
 *
 *
 * @package bearr
 */

/*-----------------------------------------------------------------------------------*/
/*	Slide Item
/*-----------------------------------------------------------------------------------*/
function bearr_slide($atts, $content = null) {
	extract(shortcode_atts(array(
		"id" => ''
	), $atts));

	global $post;

	$args = array(
		'post_type' => 'slider',
		'posts_per_page' => 1,
		'p' => $id
	);

	$my_query = new WP_Query($args);
	if( $my_query->have_posts() ) :
	while ($my_query->have_posts()) : $my_query->the_post();
	
	$slide_title = wp_kses_post( rwmb_meta( 'bearr_slide_title' ) );	
	$slide_text = wp_kses_post( rwmb_meta( 'bearr_slide_text' ) );
	$slide_link_text = esc_html( rwmb_meta( 'bearr_slide_link_text') );
	$slide_link = esc_url( rwmb_meta( 'bearr_slide_link') );
	$slide_pictures = rwmb_meta( 'bearr_slide_image', 'size=full_hd' );
	foreach ( $slide_pictures as $slide_picture ) {
	   $slide_picture_url = esc_url( $slide_picture['url'] );
	}
	$slide_extra = wp_kses_post( rwmb_meta( 'bearr_slide_extra') );


	$retour ='';
	
	$retour .='<div class="featured-slide slide bg-cover viewport" style="background-image: url(' .$slide_picture_url .');">';
	$retour .='<div class="slide-inner">';
	$retour .='<div class="slide-icon"></div>';
	if ( !empty($slide_title) ) {
		$retour .='<h1 class="slide-title">'.$slide_title .'</h1>' ;
	}
	if ( !empty($slide_text) ) {
		$retour .='<p class="slide-text">'.$slide_text.'</p>';
	}
	
	if (!empty($slide_link) && !empty($slide_link_text)) {
		$retour .='<a class="primary-btn light-color" href="'.$slide_link .'"><span>' .$slide_link_text .'</span></a>';
	}

	if ( !empty($slide_extra) ) {
		$retour .='<div class="slide-extra">'.do_shortcode( $slide_extra ).'</div>';
	}

	$retour .='</div>';
	$retour .='</div>';

	endwhile; else:
	$retour ='';
	$retour .= "nothing found.";
	endif;

	//Reset Query
    wp_reset_query();
	
	return $retour;
}

add_shortcode("bearr-slide", "bearr_slide");

/*-----------------------------------------------------------------------------------*/
/*	Bearr Slider
/*-----------------------------------------------------------------------------------*/
function bearr_slider($atts, $content = null) {
	extract(shortcode_atts(array(
		"ids" => ''
	), $atts));

	$slider_ids = explode(",", $ids);
	
	//Owl Carousel
	wp_enqueue_style( 'owl-carousel-css', plugin_dir_url( __FILE__ ) . 'js/vendor/owl.carousel/assets/owl.carousel.css' );
	wp_enqueue_style( 'owl-carousel-theme-css', plugin_dir_url( __FILE__ ) . 'js/vendor/owl.carousel/assets/owl.theme.default.min.css' );
	wp_enqueue_script( 'owl-carousel-js', plugin_dir_url( __FILE__ ) . 'js/vendor/owl.carousel/owl.carousel.min.js', array(), '20151215', true );
	if ( file_exists( get_template_directory() . '/framework/js/custom/custom-slider.js' ) ) {
		wp_enqueue_script( 'bearr-custom-slider-js', get_template_directory_uri() . '/framework/js/custom/custom-slider.js', array(), '20151215', true );
	}
	else {
		wp_enqueue_script( 'bearr-custom-slider-js', plugin_dir_url( __FILE__ ) . 'js/custom-slider.js', array(), '20151215', true );
	}

	//Output
	$output = '';
	$output .= '<div class="main-carousel-wrapper"><div class="owl-carousel main-carousel owl-theme">';
	foreach ($slider_ids as $slide_id) {
		$output .= do_shortcode("[bearr-slide id=".$slide_id."]");
	}
	$output .= '</div></div>';

	return $output;
}

add_shortcode("bearr-slider", "bearr_slider");