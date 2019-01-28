<?php
/**
 * Shortcodes
 *
 *
 * @package bearr
 */

/*-----------------------------------------------------------------------------------*/
/*	Timeline
/*-----------------------------------------------------------------------------------*/
function bearr_timeline_item_shortcode($atts, $text_content = null) {
	extract(shortcode_atts(array(
		"date" => '',
		"image" => '',
		"title" => '',
		"text_content" => '',
		"position" => '',
	), $atts));	

	if (!empty($image)) {	
		$image_url = wp_get_attachment_url( $image );
	}
	

	$output ='';
	$output .='<div class="row story-wrap ';

	if ( $position == 'right') {
		//$output .='';
	}	

	$output .='">';		

		//content
		$output .='<div class="col-sm-6 ';

		if ( $position == 'right') {
			$output .=' col-sm-push-6 ';
		}

		$output .='" data-match-height="StoryItem"><div class="story-item ';
		if ( $position == 'right') {
			$output .=' story-item-alt ';
		}
		$output .=' ">';
		

			if (!empty($image)) {	
				$output .='<div class="story-item-img"><img src="'. $image_url.'" alt="" class="responsive-image"></div>';
			}

			$output .='<div class="story-item-content">';
				if (!empty($title)) {	
					$output .=' <h2 class="story-item-title">'. $title.'</h2>';
				}

				if (!empty($text_content)) {	
					$output .=' <div class="story-text">'. $text_content.'</div>';
				}

			$output .='</div>';

		$output .='</div></div>';	

		//date
		$output .='<div class="col-sm-6 story-date-wrap';

		if ( $position == 'right') {
			$output .=' story-date-wrap-alt col-sm-pull-6 ';
		}

		$output .='" data-match-height="StoryItem">';

			$output .='<div class="story-date"><div class="story-time">'. $date.'</div></div>';
		
		$output .='</div>';			

	$output .='</div>';

	//Matchheight JS
	wp_enqueue_script( 'bearr-matchheight-js', plugin_dir_url( __FILE__ ) . 'js/vendor/jquery.matchHeight-min.js', array(), '20151218', true );
	
	return $output;


}

add_shortcode("bearr-timeline-item", "bearr_timeline_item_shortcode");