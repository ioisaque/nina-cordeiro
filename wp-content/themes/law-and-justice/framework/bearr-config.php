<?php
/**
 * "BeaRR Package" Setup Features
 * Setup the "bearr-package" plugin features that the theme supports.
 *
 * @package themepackagename
 */
function bearr_setup_features() {	

	/**
	 * ========= Modules =======================================
	*/

		//Enable Slideshow Module
		update_option( 'bearr_setup_slideshow', 'false');

		//Enable Clients Module
		update_option( 'bearr_setup_clients', 'false');

		//Enable Team Module
		update_option( 'bearr_setup_team', 'false');

		//Enable Testimonials Module
		update_option( 'bearr_setup_testimonials', 'false');

		//Enable Elements Module
		update_option( 'bearr_setup_elements', 'false');

			//--->> Enable Elements: Title 2 ELEMENT
			update_option( 'bearr_setup_elements_title2', 'false');

		//Enable Gallery Module
		update_option( 'bearr_setup_gallery', 'false');

		//Enable Timeline  Module
		update_option( 'bearr_setup_timeline', 'false');

		//Enable Blogroll  Module
		update_option( 'bearr_setup_blogroll', 'false');

		//Enable GridBlog  Module
		update_option( 'bearr_setup_gridblog', 'false');

		//Enable CountDown  Module
		update_option( 'bearr_setup_countdown', 'false');

		//Enable Wedding Elements Module
		update_option( 'bearr_setup_wedding_elements', 'false');

		//Enable Quover Module
		update_option( 'bearr_setup_quover', 'false');

		//Enable Portfolio Module
		update_option( 'bearr_setup_portfolio', 'false');

		//Enable Restaurant Elements Module
		update_option( 'bearr_setup_restaurant_elements', 'false');
	

	/**
	 * ========= Customizations =======================================
	 */

		//Change "Clients" label to "Gifts"
		update_option( 'bearr_setup_change_clients_to_gifts', 'false');

		//Use Subtitle on Pages
		update_option( 'bearr_setup_use_page_subtitle', 'false');

		//Use Mini Hero Template
		update_option( 'bearr_setup_custom_page_header', 'false');

	/**
	 * ========= Retro Compatibility =======================================
	 */

		//Enable Retro Compatibility: Law and Justice Theme
		update_option( 'bearr_setup_retro_law_and_justice', 'true');
		

}

add_action( 'init', 'bearr_setup_features' );

bearr_setup_features();

//Delete options when theme changes
function bearr_delete_options() {
	
	// ======= Modules ==============

		//Enable Slideshow Module
		delete_option( 'bearr_setup_slideshow' );

		//Enable Clients Module
		delete_option( 'bearr_setup_clients' );

		//Enable Team Module
		delete_option( 'bearr_setup_team' );

		//Enable Elements Module
		delete_option( 'bearr_setup_elements');

			//--->> Enable Elements: TItle 2 ELEMENT
			delete_option( 'bearr_setup_elements_title2');

		//Enable Testimonials Module
		delete_option( 'bearr_setup_testimonials' );

		//Enable Gallery Module
		delete_option( 'bearr_setup_gallery' );

		//Enable Timeline  Module
		delete_option( 'bearr_setup_timeline' );

		//Enable Blogroll  Module
		delete_option( 'bearr_setup_blogroll' );

		//Enable GridBlog  Module
		delete_option( 'bearr_setup_gridblog' );

		//Enable CountDown  Module
		delete_option( 'bearr_setup_countdown' );

		//Enable Wedding Elements Module
		delete_option( 'bearr_setup_wedding_elements' );

		//Enable Quover Module
		delete_option( 'bearr_setup_quover' );

		//Enable Portfolio Module
		delete_option( 'bearr_setup_portfolio' );

		//Enable Restaurant Elements Module
		delete_option( 'bearr_setup_restaurant_elements' );

	// ======= Retro Compatibility  ==============

		//Enable Retro Compatibility: Law and Justice Theme
		delete_option( 'bearr_setup_retro_law_and_justice' );
		

	// ======= Customizations  ==============

		//Change "Clients" label to "Gifts"
		delete_option( 'bearr_setup_change_clients_to_gifts' );

		//Use Subtitle on Pages
		delete_option( 'bearr_setup_use_page_subtitle' );

		//Use Mini Hero Template
		delete_option( 'bearr_setup_custom_page_header' );
}


add_action('switch_theme', 'bearr_delete_options');