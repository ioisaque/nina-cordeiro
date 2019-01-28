<?php
/**
 * Meta Boxes Configurations
 *
 *
 * @package law-and-justice
 */


add_filter( 'rwmb_meta_boxes', 'law_and_justice_meta_boxes' );
function law_and_justice_meta_boxes( $meta_boxes ) {
	$prefix = 'tb_';

	/*Slider*/
    $meta_boxes[] = array(
        'title'      => __( 'Slide Content', 'law-and-justice' ),
        'post_types' => 'slider',
        'fields'     => array(    
        	array(
                'id'   => $prefix. 'slide_title',
                'name' => __( 'Slide Title', 'law-and-justice' ),
                'type' => 'text',
            ),     	
            array(
                'id'   => $prefix. 'slide_text',
                'name' => __( 'Slide Text', 'law-and-justice' ),
                'type' => 'textarea',
            ),             
            array(
                'id'   => $prefix. 'slide_link_text',
                'name' => __( 'Button Text', 'law-and-justice' ),
                'desc' => 'example: See More',
                'type' => 'text',
            ),
             array(
                'id'   => $prefix. 'slide_link',
                'name' => __( 'Link', 'law-and-justice' ),
                'desc' => 'example: http://www.google.com',
                'type' => 'text',
            ),
             array(
                'id'   => $prefix. 'slide_image',
                'name' => __( 'Link', 'law-and-justice' ),
                'desc' => 'Minimum: 1360 x 720 pixels / Recommended: 1920 x 1080 pixels',
                'type' => 'image',
                'max_file_uploads' => 1,
            ), 

        ),
    );

	/*Testimonials*/
    $meta_boxes[] = array(
        'title'      => __( 'Testimonial Details', 'law-and-justice' ),
        'post_types' => 'testimonials',
        'fields'     => array(
            array(
                'id'   => 'testimonial_desc',
                'name' => __( 'Testimonial Text', 'law-and-justice' ),
                'type' => 'textarea',
            ),
            array(
                'id'   => 'testimonial_name',
                'name' => __( 'By who?', 'law-and-justice' ),
                'type' => 'text',
            ),            
        ),
    );

    /*Team*/
    $meta_boxes[] = array(
        'title'      => __( 'Team Member Details', 'law-and-justice' ),
        'post_types' => 'team',
        'fields'     => array(    
        	array(
                'id'   => $prefix. 'team_name',
                'name' => __( 'Team Membem Name', 'law-and-justice' ),
                'type' => 'text',
            ),     	
            array(
                'id'   => $prefix. 'team_position',
                'name' => __( 'Team Membem Position', 'law-and-justice' ),
                'type' => 'text',
            ),    
            array(
                'id'   => $prefix. 'team_photo',
                'name' => __( 'Team Membem Picture', 'law-and-justice' ),
                'type' => 'image',
                'max_file_uploads' => 1
            ), 

        ),
    );

    /*Clients*/
    $meta_boxes[] = array(
        'title'      => __( 'Client Content', 'law-and-justice' ),
        'post_types' => 'clients',
        'fields'     => array(   
             array(
                'id'   => $prefix. 'client_logo',
                'name' => __( 'Client Logo', 'law-and-justice' ),
                'desc' => 'Recommended: 170 x 133 pixels',
                'type' => 'image',
                'max_file_uploads' => 1,
            ), 

        ),
    );

    return $meta_boxes;
}






