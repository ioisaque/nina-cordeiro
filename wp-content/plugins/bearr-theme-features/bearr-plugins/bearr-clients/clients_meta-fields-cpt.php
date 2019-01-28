<?php
/**
 * Meta Boxes Configurations
 *
 *
 * @package bearr
 */


add_filter( 'rwmb_meta_boxes', 'bearr_clients_meta_meta_boxes' );
function bearr_clients_meta_meta_boxes( $meta_boxes ) {
	$prefix = 'bearr_';
	

    /*Clients*/
    $meta_boxes[] = array(
        'title'      => __( 'Item Content', 'bearr' ),
        'post_types' => 'clients',
        'fields'     => array(   
            array(
                'id'   => $prefix. 'client_title',
                'name' => __( 'Title', 'bearr' ),
                'type' => 'text',
            ),
            array(
                'id'   => $prefix. 'client_url',
                'name' => __( 'Site URL', 'bearr' ),
                'type' => 'text',
            ),
            array(
                'id'   => $prefix. 'client_logo',
                'name' => __( 'Logo', 'bearr' ),
                'desc' => 'Recommended: 170 x 133 pixels',
                'type' => 'image_upload',
                'max_file_uploads' => 1,
            ), 
              

        ),
    );

    return $meta_boxes;
}






