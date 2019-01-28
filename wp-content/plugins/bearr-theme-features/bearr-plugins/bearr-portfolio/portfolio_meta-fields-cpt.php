<?php
/**
 * Meta Boxes Configurations
 *
 *
 * @package bearr
 */


add_filter( 'rwmb_meta_boxes', 'bearr_portfolio_meta_boxes' );
function bearr_portfolio_meta_boxes( $meta_boxes ) {
	$prefix = 'bearr_';	

	/*portfolio*/
    $meta_boxes[] = array(
        'title'      => __( 'Project Details', 'bearr' ),
        'post_types' => 'portfolio',
        'fields'     => array(
            array(
                'id'   => $prefix. 'portfolio_subtitle',
                'name' => __( 'Project Subtitle', 'bearr' ),
                'type' => 'text',
            ),
            array(
                'id'   => $prefix. 'portfolio_hero',
                'name' => __( 'Main Image', 'bearr' ),
                'type' => 'image_upload',
                'max_file_uploads' => 1,
            ),            
            array(
                'id'   => $prefix. 'portfolio_client',
                'name' => __( 'Client', 'bearr' ),
                'type' => 'text',
            ),
            array(
                'id'   => $prefix. 'portfolio_url',
                'name' => __( 'Project URL', 'bearr' ),
                'type' => 'url',
            ), 
            array(
                'id'   => $prefix. 'portfolio_gallery',
                'name' => __( 'Project Gallery', 'bearr' ),
                'type' => 'image_upload',
            ),
        ),
    );

    return $meta_boxes;
}