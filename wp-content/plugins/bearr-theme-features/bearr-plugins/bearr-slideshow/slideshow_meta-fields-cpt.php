<?php
/**
 * Meta Boxes Configurations
 *
 *
 * @package bearr
 */


add_filter( 'rwmb_meta_boxes', 'bearr_slideshow_meta_boxes' );
function bearr_slideshow_meta_boxes( $meta_boxes ) {
	$prefix = 'bearr_';

	/*Slider*/
    $meta_boxes[] = array(
        'title'      => __( 'Slide Content', 'bearr' ),
        'post_types' => 'slider',
        'fields'     => array(    
        	array(
                'id'   => $prefix. 'slide_title',
                'name' => __( 'Slide Title', 'bearr' ),
                'type' => 'text',
            ),     	
            array(
                'id'   => $prefix. 'slide_text',
                'name' => __( 'Slide Text', 'bearr' ),
                'type' => 'textarea',
            ),             
            array(
                'id'   => $prefix. 'slide_link_text',
                'name' => __( 'Button Text', 'bearr' ),
                'desc' => 'example: See More',
                'type' => 'text',
            ),
             array(
                'id'   => $prefix. 'slide_link',
                'name' => __( 'Link', 'bearr' ),
                'desc' => 'example: http://www.google.com',
                'type' => 'text',
            ),
             array(
                'id'   => $prefix. 'slide_image',
                'name' => __( 'image', 'bearr' ),
                'desc' => 'Minimum: 1360 x 720 pixels / Recommended: 1920 x 1080 pixels',
                'required'  => true,
                'type' => 'image_upload',
                'max_file_uploads' => 1,
            ), 
             array(
                'id'   => $prefix. 'slide_extra',
                'name' => __( 'Extra Content (Like Shortcodes)', 'bearr' ),
                'desc' => 'Extra content displayed below the slide content. {Example: A countdown shortcode.).',
                'type' => 'textarea',
            ), 

        ),
    );	

    return $meta_boxes;
}






