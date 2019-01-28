<?php
/**
 * Shortcodes
 *
 *
 * @package bearr
 */

/*-----------------------------------------------------------------------------------*/
/*	Blogroll
/*-----------------------------------------------------------------------------------*/
function bearr_blogroll_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		"postsperpage" => ''
	), $atts));

	//Owl Carousel
	wp_enqueue_style( 'owl-carousel-css', plugin_dir_url( __FILE__ ) . 'js/vendor/owl.carousel/assets/owl.carousel.css' );
	wp_enqueue_style( 'owl-carousel-theme-css', plugin_dir_url( __FILE__ ) . 'js/vendor/owl.carousel/assets/owl.theme.default.min.css' );
	wp_enqueue_script( 'owl-carousel-js', plugin_dir_url( __FILE__ ) . 'js/vendor/owl.carousel/owl.carousel.min.js', array(), '20151215', true );
	if ( file_exists( get_template_directory() . '/framework/js/custom/custom-blogroll.js' ) ) {
		wp_enqueue_script( 'bearr-custom-blogroll-carousel-js', get_template_directory_uri() . '/framework/js/custom/custom-blogroll.js', array(), '20151215', true );
	}
	else {
		wp_enqueue_script( 'bearr-custom-blogroll-carousel-js', plugin_dir_url( __FILE__ ) . 'js/custom-blogroll.js', array(), '20151215', true );
	}
	

	global $post;
	
	$args = array(
		'post_type' => 'post',
		'posts_per_page' => $postsperpage,
		//'p' => $id
	);
	$my_query = new WP_Query($args);
	if( $my_query->have_posts() ) :

		$retour ='';

		$retour .= '<div class="owl-carousel-wrapper blogroll-carousel-wrapper">';
		$retour .= '<div class="owl-carousel blogroll-carousel">';

		while ($my_query->have_posts()) : $my_query->the_post();	
		
		$post_permalink = get_permalink();
		$post_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
		$post_title = get_the_title();
		$post_excerpt = get_the_excerpt();
		
		$retour .='<div class="blog-item">';
			//Featured Image
			
				$retour .='<a href="'.$post_permalink .'">' ;
					$retour .='<figure ' ;
						if ( has_post_thumbnail() ) { 
							$retour .='class="blog-item-img blog-item-img-cover" style=" background-image: url('.$post_image[0] .')"' ;
						}
					$retour .='class="blog-item-img" ></figure>';
				$retour .='</a>';
			
			//Blog Content
			$retour .='<div class="blog-content"><article class="post">';
				$retour .='<h3 class="heading">'.$post_title .'</h3>' ;
				$retour .='<p>'.$post_excerpt .'</p>' ;
				$retour .='<a href="'.$post_permalink .'" class="primary-btn"><span>'. __('See More', 'bearr') .'</span></a>' ;
			$retour .='</article></div>';
			
		$retour .='</div>';

		endwhile; 
		$retour .= '</div>';
		$retour .= '</div>';

		else:
		$retour ='';
		$retour .= "nothing found.";
	endif;

	//Reset Query
    wp_reset_query();
	
	return $retour;
}

add_shortcode("bearr-blogroll", "bearr_blogroll_shortcode");