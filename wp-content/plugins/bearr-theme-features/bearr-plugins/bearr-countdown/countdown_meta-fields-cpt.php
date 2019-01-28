<?php
/**
 * Meta Boxes Configurations
 *
 *
 * @package bearr
 */


add_filter( 'rwmb_meta_boxes', 'bearr_countdown_rwmb_meta_boxes' );
function bearr_countdown_rwmb_meta_boxes( $meta_boxes ) {
	$prefix = 'bearr_';
	

    /*Countdown*/
    $meta_boxes[] = array(
        'title'      => __( 'CountDown Configuration', 'bearr' ),
        'post_types' => 'countdown',
        'fields'     => array(   
            array(
                'id'   => $prefix. 'countdown-date',
                'name' => __( 'CountDown Date', 'bearr' ),
                'desc' => __( 'Select the event date.', 'bearr' ),
                'type' => 'date',
                'js_options' => array(
                    'dateFormat' => 'yy/mm/dd',
                ),
            ),    
        ),
        'validation' => array(
            'rules'    => array(
                "{$prefix}countdown-date" => array(
                    'required'  => true,
                ),
            ),
            // optional override of default jquery.validate messages
            'messages' => array(
                "{$prefix}password" => array(
                    'required'  => esc_html__( 'Event date is required.', 'bearr' ),
                ),
            ),
        ),
    );

    return $meta_boxes;
}






