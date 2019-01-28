<?php
/**
 * Shortcodes
 *
 *
 * @package bearr
 */

/*-----------------------------------------------------------------------------------*/
/*	Quover Features
/*-----------------------------------------------------------------------------------*/
function bearr_shortcode_quover($atts, $content = null) {
	extract(shortcode_atts(array(		
		"title_one" => '',
		"title_two" => '',
		"title_three" => '',
		"title_four" => '',
		"icon1" => '',
		"icon2" => '',		
		"icon3" => '',
		"icon4" => '',
		"text_one" => '',
		"text_two" => '',
		"text_three" => '',
		"text_four" => '',
		
	), $atts));	

	$output ='<div class="container-fluid quover-features"><div class="row">';
	
	//Item 1
	$output .='<div class="quover-features-item"><div class="quover-features-item-wrapper">'. '<div class="quover-features-item-icon"><i class="' .$icon1 .'"></i></div><h2 class="quover-features-item-title">'.$title_one.'</h2><p class="quover-features-item-text">'.$text_one.'</p></div></div>';

	//Item 2
	$output .='<div class="quover-features-item"><div class="quover-features-item-wrapper">'. '<div class="quover-features-item-icon"><i class="' .$icon2 .'"></i></div><h2 class="quover-features-item-title">'.$title_two.'</h2><p class="quover-features-item-text">'.$text_two.'</p></div></div>';

	//Item 3
	$output .='<div class="quover-features-item"><div class="quover-features-item-wrapper">'. '<div class="quover-features-item-icon"><i class="' .$icon3 .'"></i></div><h2 class="quover-features-item-title">'.$title_three.'</h2><p class="quover-features-item-text">'.$text_three.'</p></div></div>';

	//Item 4
	$output .='<div class="quover-features-item"><div class="quover-features-item-wrapper">'. '<div class="quover-features-item-icon"><i class="' .$icon4 .'"></i></div><h2 class="quover-features-item-title">'.$title_four.'</h2><p class="quover-features-item-text">'.$text_four.'</p></div></div>';

	$output .='</div></div>';
	
	return $output;
}

add_shortcode("bearr-quover-features", "bearr_shortcode_quover");