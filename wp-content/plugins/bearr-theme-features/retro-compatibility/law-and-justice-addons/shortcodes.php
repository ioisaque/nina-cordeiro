<?php
/**
 * Shortcodes
 *
 *
 * @package law-and-justice
 */

/*-----------------------------------------------------------------------------------*/
/*	Title of Section
/*-----------------------------------------------------------------------------------*/
function law_and_justice_shortcode_title_of_section($atts, $content = null) {
	extract(shortcode_atts(array(
		"title" => '',
	), $atts));
	
	$output ='';
	
	$output .='<div class=""><h2 class="title-section">'. $title.'</h2></div>';
	
	return $output;
}

add_shortcode("tb-section-title", "law_and_justice_shortcode_title_of_section");

/*-----------------------------------------------------------------------------------*/
/*	Title 1
/*-----------------------------------------------------------------------------------*/

function law_and_justice_shortcode_title($atts, $content = null) {
	extract(shortcode_atts(array(
		"title" => '',
	), $atts));
	
	$output ='';
	
	$output .='<h2 class="title1">'. $title.'</h2>';
	
	return $output;
}

add_shortcode("tb-title", "law_and_justice_shortcode_title");

/*-----------------------------------------------------------------------------------*/
/*	Line Block
/*-----------------------------------------------------------------------------------*/

function law_and_justice_shortcode_line_block($atts, $content = null) {
	extract(shortcode_atts(array(
	), $atts));
	
	$output ='';
	
	$output .='<hr class="line-block"/>';
	
	return $output;
}

add_shortcode("tb-line-block", "law_and_justice_shortcode_line_block");

/*-----------------------------------------------------------------------------------*/
/*	Button
/*-----------------------------------------------------------------------------------*/
function law_and_justice_shortcode_button($atts, $content = null) {
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

add_shortcode("tb-button", "law_and_justice_shortcode_button");



/*-----------------------------------------------------------------------------------*/
/*	Slide Item
/*-----------------------------------------------------------------------------------*/
function law_and_justice_slide($atts, $content = null) {
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
	
	$slide_title = rwmb_meta( 'tb_slide_title' );	
	$slide_text = rwmb_meta( 'tb_slide_text' );
	$slide_link_text = rwmb_meta( 'tb_slide_link_text');
	$slide_link = rwmb_meta( 'tb_slide_link');
	$slide_pictures = rwmb_meta( 'tb_slide_image', 'size=full_hd' );
	foreach ( $slide_pictures as $slide_picture ) {
	   $slide_picture_url = $slide_picture['url'];
	}


	$retour ='';
	
	$retour .='<div class="featured-slide slide bg-cover viewport" style="background-image: url(' .$slide_picture_url .');">';
	$retour .='<div class="slide-inner">';
	$retour .='<div class="slide-icon"></div>';
	$retour .='<h1 class="slide-title">'.$slide_title .'</h1>' ;
	$retour .='<p class="slide-text">'.$slide_text.'</p>';
	if (!empty($slide_link) && !empty($slide_link_text)) {
		$retour .='<a class="primary-btn light-color" href="'.$slide_link .'">' .$slide_link_text .'</a>';
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

add_shortcode("tb-slide", "law_and_justice_slide");

/*-----------------------------------------------------------------------------------*/
/*	Featured Slider
/*-----------------------------------------------------------------------------------*/
function law_and_justice_tb_slider($atts, $content = null) {
	extract(shortcode_atts(array(
		"ids" => ''
	), $atts));

	$slider_ids = explode(",", $ids);
		
	wp_enqueue_script( 'custom-slider-js', get_template_directory_uri() . '/js/custom/custom-slider.js', array(), '20151215', true );

	$output = '';
	$output .= '<div class="owl-carousel main-carousel owl-theme">';
	foreach ($slider_ids as $slide_id) {
		$output .= do_shortcode("[tb-slide id=".$slide_id."]");
	}
	$output .= '</div>';

	return $output;
}

add_shortcode("tb-slider", "law_and_justice_tb_slider");


/*-----------------------------------------------------------------------------------*/
/*	Testimonial Item
/*-----------------------------------------------------------------------------------*/

function law_and_justice_testimonials($atts, $content = null) {
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
	
	$testimonial_desc = rwmb_meta( 'testimonial_desc' );	
	$testimonial_name = rwmb_meta( 'testimonial_name' );
	
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

add_shortcode("tb-testimonial", "law_and_justice_testimonials");

/*-----------------------------------------------------------------------------------*/
/*	Testimonial Carousel
/*-----------------------------------------------------------------------------------*/
function law_and_justice_tb_testimonials($atts, $content = null) {
	extract(shortcode_atts(array(
		"ids" => '',
		"text_color" => ''
	), $atts));

	$testimonial_ids = explode(",", $ids);
	$testimonial_color = $text_color;
		
	wp_enqueue_script( 'custom-testimonials-js', get_template_directory_uri() . '/js/custom/custom-testimonials.js', array(), '20151215', true );

	$output = '';
	$output .= '<div class="section-testimonials ' .$testimonial_color .'"><div class="">';
		$output .= '<div class="owl-carousel testimonial-carousel common-carousel owl-theme">';

	foreach ($testimonial_ids as $tid) {
		$output .= '<div class="slide">' . do_shortcode("[tb-testimonial id=".$tid."]") . '</div>';
	}

		$output .= '</div>';
	$output .= '</div></div>';
	return $output;
}

add_shortcode("tb-testimonials", "law_and_justice_tb_testimonials");


/*-----------------------------------------------------------------------------------*/
/*	Team Membem Item
/*-----------------------------------------------------------------------------------*/
function law_and_justice_team_member($atts, $content = null) {
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
	
	$team_member_name = rwmb_meta( 'tb_team_name' );	
	$team_member_position = rwmb_meta( 'tb_team_position' );
	$team_member_photos = rwmb_meta( 'tb_team_photo', 'size=law_and_justice_team_photo' );		
	foreach ( $team_member_photos as $team_member_photo ) {
	   $team_member_photo_url = $team_member_photo['url'];
	}


	$retour ='';
	
	$retour .='<figure class="team-item"><a href="?page_id=2275">';
	$retour .='<img src="'.$team_member_photo_url .'">' ;
	$retour .='<figcaption><div class="team-caption"><h4 class="team-item-heading">'.$team_member_name.'</h4>';
	$retour .='<p class="team-item-text">' .$team_member_position .'</p>';
	$retour .='</div></figcaption>';
	$retour .='</a></figure>';

	endwhile; else:
	$retour ='';
	$retour .= "nothing found.";
	endif;

	//Reset Query
    wp_reset_query();
	
	return $retour;
}

add_shortcode("tb-team-member", "law_and_justice_team_member");


/*-----------------------------------------------------------------------------------*/
/*	Team Carousel for Visual Composer
/*-----------------------------------------------------------------------------------*/

function law_and_justice_tb_team_carousel($atts, $content = null) {
	extract(shortcode_atts(array(
		"ids" => ''
	), $atts));

	$team_ids = explode(",", $ids);
		
	wp_enqueue_script( 'custom-team-js', get_template_directory_uri() . '/js/custom/custom-team.js', array(), '20151215', true );

	$output = '';
	$output .= '<div class="">';
	$output .= '<div id="testimonial-carousel" class="owl-carousel team-carousel common-carousel owl-theme">';

	foreach ($team_ids as $team_id) {
		$output .= '<div class="slide">' . do_shortcode("[tb-team-member id=".$team_id."]") . '</div>';
	}

	$output .= '</div>';
	$output .= '</div>';
	return $output;
}

add_shortcode("tb-team-carousel", "law_and_justice_tb_team_carousel");


/*-----------------------------------------------------------------------------------*/
/*	Client Item
/*-----------------------------------------------------------------------------------*/
function law_and_justice_client_item($atts, $content = null) {
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
	
	$client_logos = rwmb_meta( 'tb_client_logo', 'size=law_and_justice_client_logo' );		
	foreach ( $client_logos as $client_logo ) {
	   $client_logo_url = $client_logo['url'];
	}


	$retour ='';
	
	$retour .='<div class="client-item text-center">';
	$retour .='<img src="'.$client_logo_url .'" alt="">' ;
	$retour .='</div>';

	endwhile; else:
	$retour ='';
	$retour .= "nothing found.";
	endif;

	//Reset Query
    wp_reset_query();
	
	return $retour;
}

add_shortcode("tb-client", "law_and_justice_client_item");


/*-----------------------------------------------------------------------------------*/
/*	Client Carousel
/*----------------------------------------------------------------------------------*/

function law_and_justice_tb_client_carousel($atts, $content = null) {
	extract(shortcode_atts(array(
		"ids" => ''
	), $atts));

	$clients_ids = explode(",", $ids);
		
	wp_enqueue_script( 'custom-clients-js', get_template_directory_uri() . '/js/custom/custom-clients.js', array(), '20151215', true );

	$output = '';
	$output .= '<div class="">';
	$output .= '<div class="owl-carousel clients-carousel common-carousel">';

	foreach ($clients_ids as $client_id) {
		$output .= '<div class="slide">' . do_shortcode("[tb-client id=".$client_id."]") . '</div>';
	}

	$output .= '</div>';
	$output .= '</div>';
	return $output;
}

add_shortcode("tb-clients-carousel", "law_and_justice_tb_client_carousel");

/*-----------------------------------------------------------------------------------*/
/*	Blog Grid
/*-----------------------------------------------------------------------------------*/
function law_and_justice_blog_grid($atts, $content = null) {
	extract(shortcode_atts(array(
		"number" => "4", 
	), $atts));
	
	global $post;
	
	$output = '';		
		
		$args = array(
			'orderby'=> 'post_date',
			'order' => 'date',
			'post_type' => 'post',
			'posts_per_page' => $number,
			'ignore_sticky_posts' => true

		);
		
		$my_query = new WP_Query($args);
		if( $my_query->have_posts() ) {
		
			$output .= '<section class="section-news"><div class="">';
				$output .= '<div class="news-item-wrapper"><div class="row">';	
		
				while ($my_query->have_posts()) : $my_query->the_post();
			
					ob_start();  
					get_template_part('template-parts/content', 'block');
					$result = ob_get_contents();  
					ob_end_clean();
					$output .= $result;
			
				endwhile; 
			
				$output .= '</div></div>';
			$output .= '</div></section>';	
			}
		wp_reset_query();
	return $output;
}

add_shortcode("tb-blog-grid", "law_and_justice_blog_grid");	

/*-----------------------------------------------------------------------------------*/
/*	Counters
/*-----------------------------------------------------------------------------------*/
function law_and_justice_shortcode_counter($atts, $content = null) {
	extract(shortcode_atts(array(		
		"title_one" => '',
		"title_two" => '',
		"title_three" => '',
		"count_to1" => '',
		"count_to2" => '',		
		"count_to3" => '',
		
	), $atts));

	wp_enqueue_script( 'count-to-js', get_template_directory_uri() . '/vendor/count-to.js', array(), '20151215', true );
	wp_enqueue_script( 'custom-counters-js', get_template_directory_uri() . '/js/custom/custom-counters.js', array(), '20151215', true );
	wp_localize_script( 'custom-counters-js','tb_counter_scripts' , array( 'counter1_number' => $count_to1, 'counter2_number' => $count_to2, 'counter3_number' => $count_to3,) );	

	$output ='<div class="container-counters"><div class="row">';
	
	//Item 1
	$output .='<div class="counter-col col-sm-4">'. '<h3 class="counter-title counter-item-title1">0'. '</h3><p class="counter-text">'.$title_one.'</p></div>';

	//Item 2
	$output .='<div class="counter-col col-sm-4">'. '<h3 class="counter-title counter-item-title2">0'.'</h3><p class="counter-text">'.$title_two.'</p></div>';

	//Item 3
	$output .='<div class="counter-col col-sm-4">'. '<h3 class="counter-title counter-item-title3">0'.'</h3><p class="counter-text">'.$title_three. '</p></div>';

	$output .='</div></div>';
	
	return $output;
}

add_shortcode("tb-counter", "law_and_justice_shortcode_counter");

/*-----------------------------------------------------------------------------------*/
/*	Quover Features
/*-----------------------------------------------------------------------------------*/
function law_and_justice_shortcode_quover($atts, $content = null) {
	extract(shortcode_atts(array(		
		"title_one" => '',
		"title_two" => '',
		"title_three" => '',
		"icon1" => '',
		"icon2" => '',		
		"icon3" => '',
		
	), $atts));	

	$icon1_url = wp_get_attachment_url( $icon1 );
	$icon2_url = wp_get_attachment_url( $icon2 );
	$icon3_url = wp_get_attachment_url( $icon3 );

	$output ='<div class="container-fluid quover-features"><div class="row">';
	
	//Item 1
	$output .='<div class="practice-areas-item"><div class="practice-areas-item-wrapper">'. '<div class="practice-areas-item-icon"><img src="' .$icon1_url .'" alt=""/>'. '</div><h2 class="practice-areas-title">'.$title_one.'</h2></div></div>';

	//Item 2
	$output .='<div class="practice-areas-item"><div class="practice-areas-item-wrapper">'. '<div class="practice-areas-item-icon"><img src="' .$icon2_url .'" alt=""/>'. '</div><h2 class="practice-areas-title">'.$title_two.'</h2></div></div>';

	//Item 3
	$output .='<div class="practice-areas-item"><div class="practice-areas-item-wrapper">'. '<div class="practice-areas-item-icon"><img src="' .$icon3_url .'" alt=""/>'. '</div><h2 class="practice-areas-title">'.$title_three.'</h2></div></div>';

	$output .='</div></div>';
	
	return $output;
}

add_shortcode("quover-features", "law_and_justice_shortcode_quover");