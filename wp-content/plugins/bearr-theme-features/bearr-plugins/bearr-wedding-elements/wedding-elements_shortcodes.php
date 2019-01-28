<?php
/**
 * Shortcodes
 *
 *
 * @package bearr
 */

/*-----------------------------------------------------------------------------------*/
/*	Wedding Bio (Groom and Bride)
/*-----------------------------------------------------------------------------------*/
function bearr_wedding_bio_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		"bride_image" => '',
		"bride_title" => '',
		"bride_content" => '',
		"groom_image" => '',
		"groom_title" => '',
		"groom_content" => '',
	), $atts));	

	if (!empty($bride_image)) {	
		$bride_image_url = wp_get_attachment_url( $bride_image );
	}

	if (!empty($groom_image)) {	
		$groom_image_url = wp_get_attachment_url( $groom_image );
	}
	
	

	$output ='';
	$output .='<div class="row wedding-bio-wrapper">';		

		//bride
		$output .='<div class="col-sm-6">';

			$output .='<div class="wedding-bio-item wedding-bio-item-bride">';
		

				if (!empty($bride_image)) {	
					$output .='<figure class="wedding-bio-image"><img src="'. $bride_image_url.'" alt="" class="responsive-image"></figure>';
				}

				$output .='<div class="wedding-bio-content">';
					if (!empty($bride_title)) {	
						$output .='<h2 class="heading wedding-bio-title">'. $bride_title.'</h2>';
					}

					if (!empty($bride_content)) {	
						$output .=' <div class="wedding-bio-text">'. $bride_content.'</div>';
					}

				$output .='</div>';

			$output .='</div>';

		$output .='</div>';	

		//groom
		$output .='<div class="col-sm-6">';

			$output .='<div class="wedding-bio-item wedding-bio-item-groom">';
		

				if (!empty($groom_image)) {	
					$output .='<figure class="wedding-bio-image"><img src="'. $groom_image_url.'" alt="" class="responsive-image"></figure>';
				}

				$output .='<div class="wedding-bio-content">';
					if (!empty($groom_title)) {	
						$output .='<h2 class="heading wedding-bio-title">'. $groom_title.'</h2>';
					}

					if (!empty($groom_content)) {	
						$output .=' <div class="wedding-bio-text">'. $groom_content.'</div>';
					}

				$output .='</div>';

			$output .='</div>';

		$output .='</div>';			

	$output .='</div>';
	
	return $output;
}

add_shortcode("bearr-wedding-bio", "bearr_wedding_bio_shortcode");

/*-----------------------------------------------------------------------------------*/
/*	Wedding Event Reminder
/*-----------------------------------------------------------------------------------*/
function bearr_wedding_event_reminder_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		"event_name" => '',
		"event_time" => '',
		"event_date" => '',
		"event_address" => '',
	), $atts));		

	$output ='';
	$output .='<div class="events-reminder-item">';		

		if (!empty($event_name)) {	
			$output .='<header><h3 class="events-item-heading">'. $event_name.'</h3></header>';
		}

		$output .='<div class="events-item-content"><ul>';

			if (!empty($event_time)) {	
				$output .='<li><span class="events-reminder-item-icon events-reminder-item-icon-time"></span><span class="events-reminder-time-content">'. $event_time.'</span></li>';
			}

			if (!empty($event_date)) {	
				$output .='<li><span class="events-reminder-item-icon events-reminder-item-icon-date"></span><span class="events-reminder-date-content">'. $event_date.'</span></li>';
			}

			if (!empty($event_address)) {	
				$output .='<li><span class="events-reminder-item-icon events-reminder-item-icon-address"></span><span class="events-reminder-date-address">'. $event_address.'</span></li>';
			}

		$output .='</ul></div>';	


	$output .='</div>';
	
	return $output;
}

add_shortcode("bearr-wedding-event-reminder", "bearr_wedding_event_reminder_shortcode");