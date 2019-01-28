<?php
/*
    Bearr Functions
*/

/* Post Formats*/
function bearr_post_formats_scripts() {
	wp_enqueue_script( 'jquery' );

	//Image Lightbox
	wp_enqueue_script( 'simple-lightbox-js', plugin_dir_url( __FILE__ ) .  '/js/vendor/simplelightbox/dist/simple-lightbox.min.js', array(), '20151218', true );
	wp_enqueue_style( 'simple-lightbox-css', plugin_dir_url( __FILE__ ) .  '/js/vendor/simplelightbox/dist/simplelightbox.min.css' );

	//Owl Carousel
	wp_enqueue_style( 'owl-carousel-css', plugin_dir_url( __FILE__ ) . 'js/vendor/owl.carousel/assets/owl.carousel.css' );
	wp_enqueue_style( 'owl-carousel-theme-css', plugin_dir_url( __FILE__ ) . 'js/vendor/owl.carousel/assets/owl.theme.default.min.css' );
	wp_enqueue_script( 'owl-carousel-js', plugin_dir_url( __FILE__ ) . 'js/vendor/owl.carousel/owl.carousel.min.js', array(), '20151215', true );

	//theme files	
	wp_enqueue_script( 'bearr-lightbox-js', plugin_dir_url( __FILE__ ) . '/js/custom/bearr-lightbox.js', array(), '20151215', true );
	wp_enqueue_script( 'bearr-post-formats-js', plugin_dir_url( __FILE__ ) . '/js/custom/bearr-post-formats.js', array(), '20151215', true );
	wp_enqueue_style( 'post-formats-css', plugin_dir_url( __FILE__ ) . 'css/post-formats.css' );
}
add_action( 'wp_enqueue_scripts', 'bearr_post_formats_scripts' );


/*
 * Enable shortcode on menu
 */
function bearr_site_url_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
    ), $atts));

    $site_url = get_site_url();
    $site_url_ok = preg_replace('#^https?://#', '', rtrim($site_url,'/'));

    $retour ='';
    
    $retour .=  $site_url_ok;
    
    return $retour;
}

add_shortcode("bearr-site-url", "bearr_site_url_shortcode");

add_filter('wp_nav_menu_items', 'do_shortcode');

/*
 * Generic Meta-Boxes
 */

//Custom Header
function bearr_custom_header( $meta_boxes ) {
    $prefix = 'bearr_'; 

    /*page subtitle*/
    $meta_boxes[] = array(
        'title'      => __( 'Header Details', 'bearr' ),
        'post_types' => array( 'post', 'page' ),
        'fields'     => array(            
            array(
                'id'   => $prefix. 'page_subtitle',
                'name' => __( 'Page Subtitle', 'bearr' ),
                'type' => 'text',
            ),  
            array(
                'id'   => $prefix. 'header_type',
                'name' => __( 'Header type', 'bearr' ),
                'type' => 'radio',
                'std'   => 'classic',
                'inline' => false,
                'options' => array(
                    'classic' => __( 'Classic (Default)', 'bearr' ),
                    'image' => __( 'Image Background', 'bearr' ),
                    'color' => __( 'Color Background', 'bearr' ),
                ),
            ),   
            array(
                'id'   => $prefix. 'header_text_align',
                'name' => __( 'Text Align of the Header', 'bearr' ),
                'type' => 'radio',
                'std'   => 'left',
                'inline' => false,
                'options' => array(
                    'left' => __( 'Left', 'bearr' ),
                    'center' => __( 'Center', 'bearr' ),
                    'right' => __( 'Right', 'bearr' ),
                ),
            ),
            array(
                'id'   => $prefix. 'mini_hero_text_color',
                'name' => __( 'Custom Text Color', 'bearr' ),
                'desc' => 'Edit to customize the text color of this page or post. Only works if "Color Background" of "Image Background" option is selected.',
                'std'   => '#ffffff',
                'required'  => false,
                'type' => 'color',
            ),
            array(
                'id'   => $prefix. 'mini_hero_color',
                'name' => __( 'Custom Background Color', 'bearr' ),
                'desc' => 'Edit to customize the background color of this page or post heading. Only works if "Color Background" option is selected.',
                'std'   => '#333333',
                'required'  => false,
                'type' => 'color',
            ), 
            array(
                'id'   => $prefix. 'mini_hero_image',
                'name' => __( 'Background Image', 'bearr' ),
                'desc' => 'Only works if "Image Background" option is selected.',
                'required'  => false,
                'type' => 'image_upload',
                'max_file_uploads' => 1,
            ),                       
        ),
    );

    return $meta_boxes;
}

$bearr_setup_custom_page_header = get_option( 'bearr_setup_custom_page_header' );

if ( $bearr_setup_custom_page_header == 'true') {
    add_filter( 'rwmb_meta_boxes', 'bearr_custom_header' );
}

//Only page Subtitle
function bearr_generic_meta_boxes( $meta_boxes ) {
	$prefix = 'bearr_';	

	/*page subtitle*/
    $meta_boxes[] = array(
        'title'      => __( 'Page Details', 'bearr' ),
        'post_types' => 'page',
        'fields'     => array(
            array(
                'id'   => $prefix. 'page_subtitle',
                'name' => __( 'Page Subtitle', 'bearr' ),
                'type' => 'text',
            ),           
        ),
    );

    return $meta_boxes;
}

$bearr_setup_use_page_subtitle = get_option( 'bearr_setup_use_page_subtitle' );

if ( $bearr_setup_use_page_subtitle == 'true' && $bearr_setup_custom_page_header == 'false') {
    add_filter( 'rwmb_meta_boxes', 'bearr_generic_meta_boxes' );
}


