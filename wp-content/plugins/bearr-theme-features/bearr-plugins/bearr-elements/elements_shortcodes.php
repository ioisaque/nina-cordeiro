<?php
/**
 * Shortcodes
 *
 *
 * @package bearr
 */

/*-----------------------------------------------------------------------------------*/
/*	Title of Section 1
/*-----------------------------------------------------------------------------------*/
function bearr_shortcode_title_of_section($atts, $content = null) {
	extract(shortcode_atts(array(
		"title" => '',
		"subtitle" => '',
		"colortitle" => '',
	), $atts));
	
	$output ='';
	$output .='<div class="title-section-wrapper '. $colortitle.'">';	
	$output .='<h2 class="title-section">'. $title.'</h2>';
	if (!empty($subtitle)) {	
		$output .='<p class="text-section">'. $subtitle.'</h2></p>';
	}
	$output .='</div>';
	
	return $output;
}

add_shortcode("bearr-section-title", "bearr_shortcode_title_of_section");

/*-----------------------------------------------------------------------------------*/
/*	Title of Section 2
/*-----------------------------------------------------------------------------------*/
$bearr_setup_elements_title2 = get_option( 'bearr_setup_elements_title2' );
if ( $bearr_setup_elements_title2 == 'true') {
	function bearr_shortcode_title_of_section2($atts, $content = null) {
		extract(shortcode_atts(array(
			"title" => '',
			"subtitle" => '',
			"colortitle" => '',
		), $atts));
		
		$output ='';
		$output .='<div class="title-section-wrapper title-section-wrapper2 '. $colortitle.'">';
		$output .='<h2 class="title-section title-section2">'. $title.'</h2>';
		if (!empty($subtitle)) {	
			$output .='<p class="text-section">'. $subtitle.'</h2></p>';
		}
		$output .='</div>';
		
		return $output;
	}

	add_shortcode("bearr-section-title-2", "bearr_shortcode_title_of_section2");
}

/*-----------------------------------------------------------------------------------*/
/*	Title 1
/*-----------------------------------------------------------------------------------*/

function bearr_shortcode_title($atts, $content = null) {
	extract(shortcode_atts(array(
		"title" => '',
	), $atts));
	
	$output ='';
	
	$output .='<h2 class="title1">'. $title.'</h2>';
	
	return $output;
}

add_shortcode("bearr-title", "bearr_shortcode_title");

/*-----------------------------------------------------------------------------------*/
/*	Line Block
/*-----------------------------------------------------------------------------------*/
function bearr_shortcode_line_block($atts, $content = null) {
	extract(shortcode_atts(array(
	), $atts));
	
	$output ='';
	
	$output .='<hr class="line-block"/>';
	
	return $output;
}

add_shortcode("bearr-line-block", "bearr_shortcode_line_block");

/*-----------------------------------------------------------------------------------*/
/*	Button
/*-----------------------------------------------------------------------------------*/
function bearr_shortcode_button($atts, $content = null) {
	extract(shortcode_atts(array(
		"title" => '',
		"url" => '',
		"icon_before" => '',
		"icon_after" => '',
	), $atts));
	
	$output ='';
	
	$output .='<a href="'.$url .'" class="primary-btn">';

	if (!empty($icon_before)) {	
		$output .= '<i class="fa '. $icon_before.'"></i>&nbsp;&nbsp;';
	}

	$output .= $title;

	if (!empty($icon_after)) {	
		$output .= '&nbsp;&nbsp;<i class="fa '. $icon_after.'"></i>';
	}

	$output .= '</a>';


	return $output;
}

add_shortcode("bearr-button", "bearr_shortcode_button");

/*-----------------------------------------------------------------------------------*/
/*	Service / Feature block
/*-----------------------------------------------------------------------------------*/
function bearr_shortcode_service_block($atts, $content = null) {
	extract(shortcode_atts(array(		
		"the_title" => '',		
		"the_icon" => '',		
		"the_text" => '',		
	), $atts));	

	$output ='<div class="service-block">';
	
		//Item
		$output .='<div class="service-block-wrapper">';	
			if ( $the_icon != '' ) {
				$output .='<div class="service-block-icon"><i class="' .$the_icon .'"></i></div>';	
			}
			if ( $the_title != ''  ) {
				$output .='<h2 class="service-block-title">'.$the_title.'</h2>';	
			}
			if ( $the_text != ''  ) {
				$output .='<p class="service-block-text">'.$the_text.'</p>';	
			}

		$output .='</div>';	

	$output .='</div>';
	
	return $output;
}

add_shortcode("bearr_service_block", "bearr_shortcode_service_block");