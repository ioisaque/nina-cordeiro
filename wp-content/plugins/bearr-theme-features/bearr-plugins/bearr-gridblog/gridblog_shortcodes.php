<?php
/**
 * Shortcodes
 *
 *
 * @package bearr
 */

/*-----------------------------------------------------------------------------------*/
/*	Blog Grid
/*-----------------------------------------------------------------------------------*/
function bearr_blog_grid($atts, $content = null) {
	extract(shortcode_atts(array(
		"postsperpage" => "", 
	), $atts));
	
	global $post;
	
	$output = '';

	$args = array(
		'post_type' => 'post',
		'posts_per_page' => $postsperpage,
		//'p' => $id
	);
	$my_query = new WP_Query($args);
	if( $my_query->have_posts() ) :

		$output ='';			
			
			$output .= '<section class="module-gridblog">';
				$output .= '<div class="news-item-wrapper"><div class="row">';	
		
				while ($my_query->have_posts()) : $my_query->the_post();	

					$post_permalink = get_permalink();				
					$post_title = get_the_title();
					$post_date = get_the_date('M d');
					if(function_exists('excerpt')){
					    $post_excerpt = excerpt(15);
					} else {
						$post_excerpt = get_the_excerpt();	
					}
					//the post		
					$output .= '<div class="col-md-6"><div class="gridblog-item">';
						$output .= '<a href="'. $post_permalink .'"><article class="row">';	
							$output .= '<div class="col-sm-3"><div class="gridblog-date"><time>'. $post_date .'</time></div></div>';
							$output .= '<div class="col-sm-9"><h3 class="gridblog-title">'. $post_title .'</h3><p class="gridblog-text">'.$post_excerpt .'</p><p class="gridblog-read-more">READ MORE &gt;&gt;</p>';
						$output .= '</article></a>';	
					$output .= '</div></div>';	    
						        
				
				endwhile; 
			
				$output .= '</div></div>';
			$output .= '</section>';	

		wp_reset_query();
	return $output;

	else:
		$output ='';
		$output .= "nothing found.";
	endif;

	//Reset Query
    wp_reset_query();
	
	return $output;

}

add_shortcode("bearr-blog-grid", "bearr_blog_grid");	