<?php
/**
 * Shortcodes
 *
 *
 * @package bearr
 */

/*-----------------------------------------------------------------------------------*/
/*	Gallery Item
/*-----------------------------------------------------------------------------------*/
function bearr_gallery_item($atts, $content = null) {
	extract(shortcode_atts(array(
		"id" => ''
	), $atts));

	global $post;
	
	$args = array(
		'post_type' => 'gallery',
		'posts_per_page' => 1,
		'p' => $id
	);
	$my_query = new WP_Query($args);
	if( $my_query->have_posts() ) :

	//JS Scripts
	wp_enqueue_style( 'simple-lightbox-css', plugin_dir_url( __FILE__ ) . 'js/vendor/simplelightbox/dist/simplelightbox.min.css' );
	wp_enqueue_script( 'simple-lightbox-js', plugin_dir_url( __FILE__ ) . 'js/vendor/simplelightbox/dist/simple-lightbox.min.js', array(), '20151215', true );
	if ( file_exists( get_template_directory() . '/framework/js/custom/custom-gallery.js' ) ) {
		wp_enqueue_script( 'bearr-custom-gallery-js', get_template_directory_uri() . '/framework/js/custom/custom-gallery.js', array(), '20151215', true );
	}
	else {
		wp_enqueue_script( 'bearr-custom-gallery-js', plugin_dir_url( __FILE__ ) . 'js/custom-gallery.js', array(), '20151215', true );
	}

	//Output		
	while ($my_query->have_posts()) : $my_query->the_post();
	
	$gallery_images = rwmb_meta( 'bearr_gallery_images', 'size=bearr_gallery_image_1' );		

	$retour ='';
	
	$retour .='<div class="gallery-images row">';



	foreach ( $gallery_images as $gallery_image ) {
	   
	   $gallery_image_url = esc_url($gallery_image['url']);
	   $gallery_image_url_full = esc_url($gallery_image['full_url']);

	   $retour .='<div class="col-lg-3 col-md-4 col-sm-6 no-space"><div class="bearr-gallery-item">' ;

	   $retour .='<a href="'.$gallery_image_url_full .'" style="background-image: url('. $gallery_image_url .')"  rel="gallery">' ;

	   $retour .='<img src="'.$gallery_image_url .'">' ;

	   $retour .='</a></div></div>' ;

	}
	

	$retour .='</div>';

	endwhile; else:
	$retour ='';
	$retour .= "nothing found.";
	endif;

	//Reset Query
    wp_reset_query();
	
	return $retour;
}

add_shortcode("bearr-gallery", "bearr_gallery_item");