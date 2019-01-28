<?php
/**
 * TGM Plugin Activation Configuration
 *
 *
 * @package law-and-justice
 */

function law_and_justice_require_plugins() {
 
 	//Plugins
    $plugins = array( 
    	array(
			'name'     				=> esc_html( 'BeaRR: Theme Features', 'law-and-justice' ),
			'slug'     				=> 'bearr-theme-features',
			'source'   				=> get_template_directory() . '/plugins/bearr-theme-features.zip',
			'required' 				=> true,
			'version' 				=> '',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
    	array(
			'name'     				=> esc_html( 'Kirki', 'law-and-justice' ),
			'slug'     				=> 'kirki',
			'required' 				=> true,
			'version' 				=> '',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
		array(
			'name'     				=> esc_html( 'King Composer: Page Builder', 'law-and-justice' ),
			'slug'     				=> 'kingcomposer',
			'required' 				=> false,
			'version' 				=> '',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
		array(
			'name'     				=> esc_html( 'One Click Demo Import', 'law-and-justice' ),
			'slug'     				=> 'one-click-demo-import',
			'required' 				=> false,
			'version' 				=> '',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),    	
		array(
			'name'     				=> esc_html( 'Contact Form 7', 'law-and-justice' ),
			'slug'     				=> 'contact-form-7',
			'required' 				=> true,
			'version' 				=> '',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),		
	);

    //Configs
    $config = array( 
    	'id'           => 'law-and-justice',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.			
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
    );
 
    tgmpa( $plugins, $config );
 
}

add_action( 'tgmpa_register', 'law_and_justice_require_plugins' );