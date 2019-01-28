<?php
/**
 * Meta Boxes Configurations
 *
 *
 * @package bearr
 */


add_filter( 'rwmb_meta_boxes', 'bearr_gallery_meta_meta_boxes' );
function bearr_gallery_meta_meta_boxes( $meta_boxes ) {
	$prefix = 'bearr_';
	

    /*Galleries*/
    $meta_boxes[] = array(
        'title'      => __( 'Gallery Content', 'bearr' ),
        'post_types' => 'gallery',
        'fields'     => array(   
            array(
                'id'   => $prefix. 'gallery_images',
                'name' => __( 'Gallery Images', 'bearr' ),
                'desc' => 'Images to be displayed in this gallery. (Recommended size: minimum 479 x 423 pixels',
                'type' => 'image_upload',
            ),             

        ),
    );

    return $meta_boxes;
}






