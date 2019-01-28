<?php
// theme class: Tbm_law_and_justice_Kirki
// config: tbm_law_and_justice_kc
//main config
Tbm_law_and_justice_Kirki::add_config( 'tbm_law_and_justice_kc', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );

/*
** PANELS ==================================================
*/

//General
Tbm_law_and_justice_Kirki::add_panel( 'lawy_general', array(
    'priority'    => 10,
    'title'       => __( 'Law & Justice: Theme Options', 'law-and-justice' ),
    'description' => __( 'Customization here', 'law-and-justice' ),
) );

/*
** SECTIONS ==================================================
*/

//Layout
Tbm_law_and_justice_Kirki::add_section( 'lawy_layout', array(
    'title'          => __( 'Layout', 'law-and-justice'),
    //'description'    => __( '' ),
    'panel'          => 'lawy_general', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

//Color Scheme
Tbm_law_and_justice_Kirki::add_section( 'lawy_colors', array(
    'title'          => __( 'Color Scheme' , 'law-and-justice'),
    //'description'    => __( '' ),
    'panel'          => 'lawy_general', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

//Typography
Tbm_law_and_justice_Kirki::add_section( 'lawy_typography', array(
    'title'          => __( 'Tipography', 'law-and-justice'),
    //'description'    => __( '' ),
    'panel'          => 'lawy_general', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

//Page Loader
Tbm_law_and_justice_Kirki::add_section( 'lawy_pageloader', array(
    'title'          => __( 'Page loader', 'law-and-justice'),
    //'description'    => __( '' ),
    'panel'          => 'lawy_general', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

//Header
Tbm_law_and_justice_Kirki::add_section( 'lawy_header', array(
    'title'          => __( 'Header', 'law-and-justice' ),
    //'description'    => __( '' ),
    'panel'          => 'lawy_general', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

//Footer
Tbm_law_and_justice_Kirki::add_section( 'lawy_footer', array(
    'title'          => __( 'Footer', 'law-and-justice' ),
    //'description'    => __( '' ),
    'panel'          => 'lawy_general', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

//Social Networks
Tbm_law_and_justice_Kirki::add_section( 'lawy_social', array(
    'title'          => __( 'Social Networks', 'law-and-justice' ),
    //'description'    => __( '' ),
    'panel'          => 'lawy_general', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

//Extra Options
Tbm_law_and_justice_Kirki::add_section( 'lawy_extra', array(
    'title'          => __( 'Extra Options', 'law-and-justice' ),
    //'description'    => __( '' ),
    'panel'          => 'lawy_general', // Not typically needed.
    'priority'       => 160,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '', // Rarely needed.
) );

/*
** CONTROLS ==================================================
*/

//>> Layout ==================
Tbm_law_and_justice_Kirki::add_field( 'tbm_law_and_justice_kc', array(
	'type'        => 'radio',
	'settings'    => 'layout_custom',
	'label'       => esc_html__( 'Layout Style', 'law-and-justice' ),
	'section'     => 'lawy_layout',
	'default'     => 'sidebar_right',
	'priority'    => 10,
	'choices'     => array(
		'no_sidebar'   => esc_attr__( 'No Sidebar', 'law-and-justice' ),
		'sidebar_left' => esc_attr__( 'Sidebar on left', 'law-and-justice' ),
		'sidebar_right'  => esc_attr__( 'Sidebar on right', 'law-and-justice' ),
	),
) );



//>> Color Scheme ==================
//Color 1
Tbm_law_and_justice_Kirki::add_field( 'tbm_law_and_justice_kc', array(
	'type'        => 'color',
	'settings'    => 'color_one',
	'label'       => __( 'Accent Color', 'law-and-justice' ),
	'section'     => 'lawy_colors',
	'default'     => '#ffa800',
	'priority'    => 10,
	'alpha'       => false,
) );

//Color 2
Tbm_law_and_justice_Kirki::add_field( 'tbm_law_and_justice_kc', array(
	'type'        => 'color',
	'settings'    => 'color_two',
	'label'       => __( 'Color 2', 'law-and-justice' ),
	'section'     => 'lawy_colors',
	'default'     => '#111111',
	'priority'    => 10,
	'alpha'       => false,
) );


//>> Typography ==================

//font 1 (titles)
Tbm_law_and_justice_Kirki::add_field( 'tbm_law_and_justice_kc', array(
	'type'        => 'typography',
	'settings'    => 'font1',
	'label'       => esc_attr__( 'Headings', 'law-and-justice' ),
	'section'     => 'lawy_typography',
	'default'     => array(
		'font-family'    => 'Montserrat',
		'variant'        => 'regular',
		//'font-size'      => '14px',
		//'line-height'    => '1.5',
		//'letter-spacing' => '0',
		'subsets'        => array( 'latin-ext' ),
		//'color'          => '#333333',
		//'text-transform' => 'none',
		//'text-align'     => 'left'
	),
	'priority'    => 10,
) );

//font2 (texts)
Tbm_law_and_justice_Kirki::add_field( 'tbm_law_and_justice_kc', array(
	'type'        => 'typography',
	'settings'    => 'font2',
	'label'       => esc_attr__( 'Body', 'law-and-justice' ),
	'section'     => 'lawy_typography',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		//'font-size'      => '14px',
		//'line-height'    => '1.5',
		//'letter-spacing' => '0',
		'subsets'        => array( 'latin-ext' ),
		//'color'          => '#333333',
		//'text-transform' => 'none',
		//'text-align'     => 'left'
	),
	'priority'    => 10,
) );

//>> Page Loader ======================
//Loader Check
Tbm_law_and_justice_Kirki::add_field( 'tbm_law_and_justice_kc', array(
	'settings' => 'loader_check',
	'label'    => __( 'Show Page loader?', 'law-and-justice' ),
	'section'  => 'lawy_pageloader',
	'type'     => 'checkbox',
	'priority' => 10,
	'default'     => '1',
) );

//Page Loader: Background Color
Tbm_law_and_justice_Kirki::add_field( 'tbm_law_and_justice_kc', array(
	'type'        => 'color',
	'settings'    => 'loader_bg_color',
	'label'       => __( 'Page Loader: Background Color', 'law-and-justice' ),
	'section'     => 'lawy_pageloader',
	'default'     => '#111111',
	'priority'    => 10,
	'alpha'       => true,
) );

//Page Loader: Logo
Tbm_law_and_justice_Kirki::add_field( 'tbm_aquarella_kc', array(
	'type'        => 'image',
	'settings'    => 'loader_logo',
	'label'       => __( 'Page Loader: Logo', 'law-and-justice' ),
	//'description' => __( 'You can use a background image (like a pattern) if you want. ', 'aquarella' ),
	//'help'        => __( 'This is some extra help text.', 'aquarella' ),
	'section'     => 'lawy_pageloader',
	'default'     => '',
	'priority'    => 10,
) );

//>> Header ======================
//Header - e-mail
Tbm_law_and_justice_Kirki::add_field( 'tbm_law_and_justice_kc', array(
	'settings' => 'header_email',
	'label'    => __( 'E-mail', 'law-and-justice' ),
	'section'  => 'lawy_header',
	'type'     => 'text',
	'priority' => 10,
	'default'  => '',
) );

//Header - Phone
Tbm_law_and_justice_Kirki::add_field( 'tbm_law_and_justice_kc', array(
	'settings' => 'header_phone',
	'label'    => __( 'Phone', 'law-and-justice' ),
	'section'  => 'lawy_header',
	'type'     => 'text',
	'priority' => 10,
	'default'  => '',
) );


//>> Footer ======================
//Footer- Bottom Text
Tbm_law_and_justice_Kirki::add_field( 'tbm_law_and_justice_kc', array(
	'type'     => 'text',
	'settings' => 'footer_bottom_text',
	'label'    => __( 'Footer: Bottom Text', 'law-and-justice' ),
	'section'  => 'lawy_footer',
	'default'  => esc_attr__( '“Ideas are the beginning points of all fortunes” - Napoleon Hill', 'law-and-justice' ),
	'priority' => 11,
) );

//>> Social Networks ==================
//Facebook
Tbm_law_and_justice_Kirki::add_field( 'tbm_law_and_justice_kc', array(
	'settings' => 'facebook_check',
	'label'    => __( 'Show Facebook button?', 'law-and-justice' ),
	'section'  => 'lawy_social',
	'type'     => 'checkbox',
	'priority' => 10,
	'default'     => '1',
) );

Tbm_law_and_justice_Kirki::add_field( 'tbm_law_and_justice_kc', array(
	'settings' => 'facebook',
	'label'    => __( 'Facebook URL', 'law-and-justice' ),
	'section'  => 'lawy_social',
	'type'     => 'text',
	'priority' => 10,
	'default'  => 'http://www.facebook.com',
) );

//Twitter
Tbm_law_and_justice_Kirki::add_field( 'tbm_law_and_justice_kc', array(
	'settings' => 'twitter_check',
	'label'    => __( 'Show Twitter button?', 'law-and-justice' ),
	'section'  => 'lawy_social',
	'type'     => 'checkbox',
	'priority' => 10,
	'default'     => '1',
) );

Tbm_law_and_justice_Kirki::add_field( 'tbm_law_and_justice_kc', array(
	'settings' => 'twitter',
	'label'    => __( 'Twitter URL', 'law-and-justice' ),
	'section'  => 'lawy_social',
	'type'     => 'text',
	'priority' => 10,
	'default'  => 'http://www.twitter.com',
) );

//Instagram
Tbm_law_and_justice_Kirki::add_field( 'tbm_law_and_justice_kc', array(
	'settings' => 'instagram_check',
	'label'    => __( 'Show instagram button?', 'law-and-justice' ),
	'section'  => 'lawy_social',
	'type'     => 'checkbox',
	'priority' => 10,
	'default'     => '1',
) );

Tbm_law_and_justice_Kirki::add_field( 'tbm_law_and_justice_kc', array(
	'settings' => 'instagram',
	'label'    => __( 'instagram URL', 'law-and-justice' ),
	'section'  => 'lawy_social',
	'type'     => 'text',
	'priority' => 10,
	'default'  => 'http://www.instagram.com',
) );

//Youtube
Tbm_law_and_justice_Kirki::add_field( 'tbm_law_and_justice_kc', array(
	'settings' => 'youtube_check',
	'label'    => __( 'Show youtube button?', 'law-and-justice' ),
	'section'  => 'lawy_social',
	'type'     => 'checkbox',
	'priority' => 10,
	'default'     => '1',
) );

Tbm_law_and_justice_Kirki::add_field( 'tbm_law_and_justice_kc', array(
	'settings' => 'youtube',
	'label'    => __( 'Youtube URL', 'law-and-justice' ),
	'section'  => 'lawy_social',
	'type'     => 'text',
	'priority' => 10,
	'default'  => 'http://www.youtube.com',
) );

//Google Plus
Tbm_law_and_justice_Kirki::add_field( 'tbm_law_and_justice_kc', array(
	'settings' => 'gplus_check',
	'label'    => __( 'Show google plus button?', 'law-and-justice' ),
	'section'  => 'lawy_social',
	'type'     => 'checkbox',
	'priority' => 10,
	'default'     => '1',
) );

Tbm_law_and_justice_Kirki::add_field( 'tbm_law_and_justice_kc', array(
	'settings' => 'gplus',
	'label'    => __( 'Google Plus', 'law-and-justice' ),
	'section'  => 'lawy_social',
	'type'     => 'text',
	'priority' => 10,
	'default'  => 'http://plus.google.com',
) );