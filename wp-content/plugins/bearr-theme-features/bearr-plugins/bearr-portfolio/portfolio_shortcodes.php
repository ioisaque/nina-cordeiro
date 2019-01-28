<?php
/**
 * Shortcodes
 *
 *
 * @package bearr
 */

/*-----------------------------------------------------------------------------------*/
/*	portfolio Item
/*-----------------------------------------------------------------------------------*/

function bearr_portfolio_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		//"id" => '',
		"postsperpage" => '',
		"showfilter" => '',
		"style" => '',
		"columns" => '',
		"margin" => '',
		"linkto" => '',
		
	), $atts));

	

	//Isotope
	wp_enqueue_script( 'imagesloaded', plugin_dir_url( __FILE__ ) . 'js/vendor/imagesloaded.pkgd.min.js', array(), '20151215', true );
	wp_enqueue_script( 'isotope', plugin_dir_url( __FILE__ ) . 'js/vendor/isotope/js/isotope.pkgd.min.js', array(), '20151215', true );
	
	//Image Lightbox
	wp_enqueue_script( 'simple-lightbox-js', plugin_dir_url( __FILE__ ) .  '/js/vendor/simplelightbox/dist/simple-lightbox.min.js', array(), '20151218', true );
	wp_enqueue_style( 'simple-lightbox-css', plugin_dir_url( __FILE__ ) .  '/js/vendor/simplelightbox/dist/simplelightbox.min.css' );
	
	//Custom JS
	if ( file_exists( get_template_directory() . '/framework/js/custom/custom-portfolios.js' ) ) {
		wp_enqueue_script( 'bearr-custom-portfolio-js', get_template_directory_uri() . '/framework/js/custom/custom-portfolio.js', array(), '20151215', true );
	}
	else {
		wp_enqueue_script( 'bearr-custom-portfolio-js', plugin_dir_url( __FILE__ ) . 'js/custom-portfolio.js', array(), '20151215', true );
	}

	//Custom CSS
	wp_enqueue_style( 'bearr-portfolio-css', plugin_dir_url( __FILE__ ) .  '/css/bearr_portfolio_css.css' );
	
	global $post;
	
	$args = array(
		'post_type' => 'portfolio',
		'posts_per_page' => $postsperpage,
		//'p' => $id
	);
	$my_query = new WP_Query($args);

		$retour ='';	

		$retour .='<div class="bearr-portfolio">';

		if( $my_query->have_posts() ) :

			if ($showfilter == 'no' ) {

			}
			else {
				$retour .='<div class="bearr-portfolio-filter">';					

					$retour .='<button class="portfolio-filter-item item-active" data-filter="*">All</button>';

					$terms = get_terms( array(
					    'taxonomy' => 'portfoliocategory',
					    'hide_empty' => false,
					) );

					foreach ( $terms as $term ) :
						$thisterm = $term->name;
						$thistermslug = $term->slug;
						$retour .='<button class="portfolio-filter-item" data-filter=".portfoliocategory-'.$thistermslug.'">'.$thisterm.'</button>';
					endforeach;		 
					
				$retour .='</div>';
			}				

			//Portfolio style
			if ($style == 'masonry' ) {
				$portfoliostyle = 'bearr-portfolio-style-masonry';
			}
			else {
				$portfoliostyle = 'bearr-portfolio-style-box';
			}
			if ($columns == '2') {
				$portfoliocolumns = 'bearr-portfolio-columns-2';
			}
			else if ($columns == '3') {
				$portfoliocolumns = 'bearr-portfolio-columns-3';
			}
			else {
				$portfoliocolumns = 'bearr-portfolio-columns-4';
			}
			if ($margin == 'yes' ) {
				$portfoliomargin = 'bearr-portfolio-margin';
			}
			else {
				$portfoliomargin = '';
			}

			$retour .='<div class="bearr-portfolio-content '.$portfoliostyle.' '.$portfoliocolumns.' '. $portfoliomargin.'">';

				while ($my_query->have_posts()) : $my_query->the_post();	

					$portfolio_image= wp_get_attachment_image_src( get_post_thumbnail_id(), '' );	

					$portfolio_image_ready = $portfolio_image[0];

					//Fancybox or link
					$portfolio_link = get_the_permalink();

					$portfolio_link_class = '';
					$portfolio_link_rel = '';

					if ( $linkto == 'image') {
						$portfolio_link = $portfolio_image_ready;
						$portfolio_link_class = 'bearr-portfolio-lightbox';
						$portfolio_link_rel = 'rel="bearr-portfolio"';

					}
					
					$classes = join( '  ', get_post_class() ); 
					
					$retour .='<div class="portfolio-item-wrapper '.$classes.'">';
						$retour .='<a href="'.$portfolio_link .'" class="portfolio-item '.$portfolio_link_class .'" '.$portfolio_link_rel .' style="background-image: url('.$portfolio_image_ready.')" title="'.get_the_title().'">';
							$retour .='<img src="'.$portfolio_image_ready .'" title="'.get_the_title().'"/>';
							$retour .='<div class="portfolio-item-infos-wrapper"><div class="portfolio-item-infos">';
								$retour .='<div class="portfolio-item-title">'.get_the_title().'</div>';
								$retour .='<div class="portfolio-item-category">';
									$terms = get_the_terms( $post->ID , 'portfoliocategory' );
									if (is_array($terms) || is_object($terms)) {
									   foreach ( $terms as $term ) :
											$thisterm = $term->name;
											$retour .=$thisterm;
										endforeach;
									}									
								$retour .='</div>';
							$retour .='</div></div>';
						$retour .='</a>';
					$retour .='</div>';

				endwhile; else:
					$retour .= "nothing found.";
				endif;

			$retour .='</div>';

		$retour .='</div>';

		//Reset Query
	    wp_reset_query();
	
	return $retour;
}

add_shortcode("bearr-portfolio", "bearr_portfolio_shortcode");



