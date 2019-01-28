<?php
/**
 * WP-Less and CSS/LESS Files Configuration
 *
 *
 * @package law-and-justice
 */

function bearr_fonts_url() {
    $font_url = '';
    
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'law-and-justice' ) ) {
        $font_url = add_query_arg( 'family', 'Montserrat:300,400,700|Roboto:300,400,700' , "//fonts.googleapis.com/css" );
    }
    return $font_url;
}

//Without LESS
function bearr_noless_enqueue_styles(){	
	//Fonts
	wp_enqueue_style( 'bearr-fonts', bearr_fonts_url(), array(), '1.0.0' );
	//Compiled CSS
	wp_enqueue_style( 'bearr-theme-style', get_template_directory_uri() . '/css/styles.css' );
}

//With LESS
function bearr_less_enqueue_styles(){
	$less = WPLessPlugin::getInstance();
	wp_enqueue_style('theme-main', get_template_directory_uri() . '/css/styles.less');
	$less->dispatch();

	//Fonts
	wp_enqueue_style( 'bearr-fonts', bearr_fonts_url(), array(), '1.0.0' );

	//====== Variables

	//Colors
	$less->addVariable('color1', get_theme_mod('color_one', '#ffa800' ));
	$less->addVariable('color2', get_theme_mod('color_two', '#111111' ));

	//Fonts
	$font1 = get_theme_mod( 'font1', array() );
	$font1_output = '';
	if ( isset( $font1['font-family'] ) ) {
		$font1_output = $font1 ['font-family'];
	}
	else {
		$font1_output = 'Montserrat, sans-serif';
	}
	$less->addVariable('font1', $font1_output);

	$font2 = get_theme_mod( 'font2', array() );
	$font2_output = '';
	if ( isset( $font2['font-family'] ) ) {
		$font2_output = $font2 ['font-family'];
	}
	else {
		$font2_output = 'Roboto, sans-serif;';
	}
	$less->addVariable('font2', $font2_output);

	//Others
	$less->addVariable('loaderbg', get_theme_mod('loader_bg_color', '#111111' ));

}

//If have WP-LESS active
if ( class_exists('WPLessPlugin') ) {
  add_action('wp_enqueue_scripts', 'bearr_less_enqueue_styles');
}

//Else, loads the compiled CSS (color and fonts customization will not work)
else {	
  add_action('wp_enqueue_scripts', 'bearr_noless_enqueue_styles');
}