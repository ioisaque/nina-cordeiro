<?php
/**
 * Meta Boxes Configurations
 *
 *
 * @package bearr
 */


add_filter( 'rwmb_meta_boxes', 'bearr_team_meta_meta_boxes' );
function bearr_team_meta_meta_boxes( $meta_boxes ) {
	$prefix = 'bearr_';
	
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
                'type' => 'image_upload',
                'max_file_uploads' => 1
            ), 

        ),
    );    

    return $meta_boxes;
}






