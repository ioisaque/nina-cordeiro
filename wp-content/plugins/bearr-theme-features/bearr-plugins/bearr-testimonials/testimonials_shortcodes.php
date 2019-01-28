<?php
/**
 * Shortcodes
 *
 *
 * @package bearr
 */

/*-----------------------------------------------------------------------------------*/
/*	Testimonial Item
/*-----------------------------------------------------------------------------------*/

function bearr_testimonial_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		"id" => ''
	), $atts));

	global $post;
	
	$args = array(
		'post_type' => 'testimonials',
		'posts_per_page' => 1,
		'p' => $id
	);
	$my_query = new WP_Query($args);
	if( $my_query->have_posts() ) :
	while ($my_query->have_posts()) : $my_query->the_post();
	
	$testimonial_desc = rwmb_meta( 'bearr_testimonial_desc' );	
	$testimonial_name = rwmb_meta( 'bearr_testimonial_name' );
	
	$retour ='';
	
	$retour .='<div class="testimonial-item"><blockquote>';
	$retour .='<p>'.wp_kses_post($testimonial_desc).'</p>';
	$retour .='<footer>';
	$retour .='<cite>'.esc_html($testimonial_name).'</cite>';
	$retour .='</footer>';
	$retour .='</blockquote></div>';

	endwhile; else:
	$retour ='';
	$retour .= "nothing found.";
	endif;

	//Reset Query
    wp_reset_query();
	
	return $retour;
}

add_shortcode("bearr-testimonial", "bearr_testimonial_shortcode");

/*-----------------------------------------------------------------------------------*/
/*	Testimonial Carousel
/*-----------------------------------------------------------------------------------*/
function bearr_testimonials_carousel_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		"ids" => '',
		"text_color" => ''
	), $atts));

	$testimonial_ids = explode(",", $ids);
	$testimonial_color = $text_color;	

	//JS Scripts
	wp_enqueue_style( 'owl-carousel-css', plugin_dir_url( __FILE__ ) . 'js/vendor/owl.carousel/assets/owl.carousel.css' );
	wp_enqueue_style( 'owl-carousel-theme-css', plugin_dir_url( __FILE__ ) . 'js/vendor/owl.carousel/assets/owl.theme.default.min.css' );
	wp_enqueue_script( 'owl-carousel-js', plugin_dir_url( __FILE__ ) . 'js/vendor/owl.carousel/owl.carousel.min.js', array(), '20151215', true );
	
	//CSS
	//Custom CSS
	wp_enqueue_style( 'bearr-testimonials-css', plugin_dir_url( __FILE__ ) .  '/css/bearr_testimonials_css.css' );

	if ( file_exists( get_template_directory() . '/framework/js/custom/custom-testimonials.js' ) ) {
		wp_enqueue_script( 'bearr-custom-testimonials-js', get_template_directory_uri() . '/framework/js/custom/custom-testimonials.js', array(), '20151215', true );
	}
	else {
		wp_enqueue_script( 'bearr-custom-testimonials-js', plugin_dir_url( __FILE__ ) . 'js/custom-testimonials.js', array(), '20151215', true );
	}

	//Output	
	$output = '';
	$output .= '<div class="section-testimonials ' .$testimonial_color .'"><div class="">';
		$output .= '<div class="owl-carousel testimonial-carousel common-carousel owl-theme">';

	foreach ($testimonial_ids as $tid) {
		$output .= '<div class="slide">' . do_shortcode("[bearr-testimonial id=".$tid."]") . '</div>';
	}

		$output .= '</div>';
	$output .= '</div></div>';
	return $output;
}

add_shortcode("bearr-testimonials", "bearr_testimonials_carousel_shortcode");

