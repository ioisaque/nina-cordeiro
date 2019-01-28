<?php
/**
 * Shortcodes
 *
 *
 * @package bearr
 */

/*-----------------------------------------------------------------------------------*/
/*	Restaurant Menu item
/*-----------------------------------------------------------------------------------*/
function bearr_restaurant_menu_item_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(		
		"menu_item_title" => '',
		"menu_item_price" => '',
		"menu_item_description" => '',
	), $atts));		

	$output ='';

	$output .='<li>';

		$output .='<div class="item-compound clearfix"><h4 class="pull-left item-name">'.$menu_item_title .'</h4><p class="pull-right item-price">'.$menu_item_price.'</p></div>';
		if (!empty($menu_item_description)) {
			$output .='<span class="item-description">'.$menu_item_description.'</span>';
		}

	$output .='</li>';
	
	return $output;
}

add_shortcode("bearr_restaurant_menu_item", "bearr_restaurant_menu_item_shortcode");

/*-----------------------------------------------------------------------------------*/
/*	Restaurant Menu
/*-----------------------------------------------------------------------------------*/
function bearr_restaurant_menu_shortcode($atts, $content = null) {
	extract(shortcode_atts(array(
		"menu_heading" => '',
	), $atts));		

	$output ='';
	$output .='<div class="bearr-restaurant-menu">';		

		if (!empty($menu_heading)) {	
			$output .='<div class="menu-heading-wrapper"><h3 class="menu-heading">'. $menu_heading.'</h3></div>';
		}

		$output .='<div class="menu-content-wrapper"><div class="menu-content"><ul>';

			$output .= do_shortcode( $content );
		
		$output .='</ul></div></div>';	


	$output .='</div>';
	
	return $output;
}

add_shortcode("bearr_restaurant_menu", "bearr_restaurant_menu_shortcode");