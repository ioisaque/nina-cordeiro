<?php

add_filter( 'rwmb_meta_boxes', 'tb_cpt_meta_fields' );

function tb_cpt_meta_fields( $meta_boxes ) {
	$prefix = 'tb_';

    /*Post Format: Quote*/
    $meta_boxes[] = array(
        'title'      => __( 'Post Format: Quote - Options', 'teddy' ),
        'post_types' => array( 'post'),
        'context' => 'normal',
        'show' => array(
            'relation' => 'OR',
            'post_format' => array('Quote'),
            ),
        'fields'     => array(    
            array(
                'id'   => $prefix. 'quote_author',
                'name' => __( 'Quote Author', 'teddy' ),
                'type' => 'text',
                //'desc' => 'Please input the URL for your link in this field. (Example: http://www.themebear.co)',
            )
        ),
    );

	/*Post Format: Link*/
    $meta_boxes[] = array(
        'title'      => __( 'Post Format: Link - Options', 'teddy' ),
        'post_types' => array( 'post'),
        'context' => 'normal',
		'show' => array(
			'relation' => 'OR',
			'post_format' => array('Link'),
			),
        'fields'     => array(    
        	array(
                'id'   => $prefix. 'link_url',
                'name' => __( 'Link URL', 'teddy' ),
                'type' => 'text',
                'desc' => 'Please input the URL for your link in this field. (Example: http://www.themebear.co)',
            )
        ),
    );


    /*Post Format: Vídeos*/
    $meta_boxes[] = array(
        'title'      => __( 'Post Format: Video – Options', 'teddy' ),
        'post_types' => array( 'post'),
        'context' => 'normal',
		'show' => array(
			'relation' => 'OR',
			'post_format' => array('Video'),
			),
        'fields'     => array(    
        	array(
                'id'   => $prefix. 'video',
                'name' => __( 'Vídeo', 'teddy' ),
                'type' => 'wysiwyg',
                'desc' => 'Please enter the link of your video inside the [embed shortcode].<br/><b>This can be used for YouTube and Vimeo.</b><br/>
                <b>Example:</b></br><br/>
				[embed]https://www.youtube.com/watch?v=ScMzIvxBSi4[/embed]<br/><br/>	
				The video will be displayed in place of the featured image.<br/>
				You can also use the <b>Vídeopress (via the Jetpack plugin)</b> and paste the shortcode here.',
            )
        ),
    );    

    return $meta_boxes;
}

