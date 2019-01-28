<?php
/**
 * law_and_justice functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package law-and-justice
 */

if ( ! function_exists( 'law_and_justice_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function law_and_justice_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on law_and_justice, use a find and replace
	 * to change 'law-and-justice' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'law-and-justice', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 750, 400, true, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'law-and-justice' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'audio',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery'
	) );

	/*	Image Sizes
	 */
	add_image_size( 'law_and_justice_imgsize_1', 1170, 800, true ); 
	add_image_size( 'law_and_justice_logo', 314, 90 );
	add_image_size( 'law_and_justice_team_photo', 265, 325, true ); 
	add_image_size( 'law_and_justice_client_logo', 225, 170 ); 
	add_image_size( 'law_and_justice_full_hd', 1920, 1080, true ); 
	
	/*	Native Site Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 314,
		'flex-height' => true,
	) );

}
endif;
add_action( 'after_setup_theme', 'law_and_justice_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function law_and_justice_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'law_and_justice_content_width', 750 );
}
add_action( 'after_setup_theme', 'law_and_justice_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function law_and_justice_widgets_init() {
	
	//Sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'law-and-justice' ),
		'id'            => 'sidebar-1',
		'description'   =>  esc_html__( 'Widgets will be shown on the main sidebar.', 'law-and-justice' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	//Footer 1
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'law-and-justice' ),
		'id'            => 'widgets-footer-1',
		'description'   => esc_html__('Widget shown in the first column of the footer.', 'law-and-justice' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	//Footer 2
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'law-and-justice' ),
		'id'            => 'widgets-footer-2',
		'description'   => esc_html__( 'Widget shown in the second column of the footer.', 'law-and-justice' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	//Footer 3
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'law-and-justice' ),
		'id'            => 'widgets-footer-3',
		'description'   => esc_html__( 'Widget shown in the third column of the footer.', 'law-and-justice' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	//Footer 4
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'law-and-justice' ),
		'id'            => 'widgets-footer-4',
		'description'   => esc_html__( 'Widget shown in the last column of the footer.', 'law-and-justice' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'law_and_justice_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function law_and_justice_scripts() {
	
	wp_enqueue_style( 'law_and_justice_style', get_stylesheet_uri() );

	//wp_enqueue_script( 'law_and_justice_navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20151215', true );

	//wp_enqueue_script( 'law_and_justice_skip_link_focus_fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array('jquery'), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	//bootstrap
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/framework/js/vendor/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/framework/js/vendor/bootstrap/js/bootstrap.min.js', array('jquery'), '20151215', true );

	//font awesome
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/framework/js/vendor/font-awesome/css/font-awesome.min.css' );

	//Owl Carousel
	wp_enqueue_style( 'owlcarousel', get_template_directory_uri() . '/framework/js/vendor/owl.carousel/assets/owl.carousel.css' );
	wp_enqueue_style( 'owlcarousel_theme', get_template_directory_uri() . '/framework/js/vendor/owl.carousel/assets/owl.theme.default.min.css' );
	wp_enqueue_script( 'owlcarousel', get_template_directory_uri() . '/framework/js/vendor/owl.carousel/owl.carousel.min.js', array('jquery'), '20151215', true );

	//Waypoints		
	wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/framework/js/vendor/imagesloaded.pkgd.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/framework/js/vendor/waypoints.min.js', array('jquery'), '20151215', true );

	//Image Lightbox
	wp_enqueue_script( 'simplelightbox', get_template_directory_uri() . '/framework/js/vendor/simplelightbox/dist/simple-lightbox.min.js', array('jquery'), '20151218', true );
	wp_enqueue_style( 'simplelightbox', get_template_directory_uri() . '/framework/js/vendor/simplelightbox/dist/simplelightbox.min.css' );

	//theme files
	wp_enqueue_script( 'law_and_justice_theme_js', get_template_directory_uri() . '/js/main.js', array('jquery'), '20151215', true );
}
add_action( 'wp_enqueue_scripts', 'law_and_justice_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * navigation bootstrap
 */
require get_template_directory() . '/framework/bearr_wp_bootstrap_navwalker.php';

/**
 * Custom Widgets
 */
require get_template_directory() . '/inc/custom-widgets.php';
/**
 * TGM Plugin Activation
 */
require_once get_template_directory() . '/framework/tgm-plugin-activation/class-tgm-plugin-activation.php';
require get_template_directory() . '/framework/tgm-config.php';
/**
 * Kirki
 */
require_once get_template_directory() . '/framework/kirki/tmb-law_and_justice-kirki.php';
require get_template_directory() . '/framework/kirki-config.php';
/**
 * BeaRR Package - Theme features Setup
 */
require get_template_directory() . '/framework/bearr-config.php';
/**
 * CSS
 * CSS Setup
 */
require get_template_directory() . '/framework/css-config.php';
/**
 * One click Demo Import
 */
require get_template_directory() . '/framework/one-click-demo-install-config.php';
/**
 * Freemius Analytics
 */
// Create a helper function for easy SDK access.
// Create a helper function for easy SDK access.
function law_and_justice_freemius() {
    global $law_and_justice_freemius;

    if ( ! isset( $law_and_justice_freemius ) ) {
        // Include Freemius SDK.
        require_once dirname(__FILE__) . '/freemius/start.php';

        $law_and_justice_freemius = fs_dynamic_init( array(
            'id'                  => '1051',
            'slug'                => 'law-and-justice',
            'type'                => 'theme',
            'public_key'          => 'pk_eb0bdfce76ffd2a5bd33a8ac7adc9',
            'is_premium'          => false,
            'has_addons'          => false,
            'has_paid_plans'      => false,
            'is_org_compliant'    => false,
        ) );
    }

    return $law_and_justice_freemius;
}

// Init Freemius.
law_and_justice_freemius();
// Signal that SDK was initiated.
do_action( 'law_and_justice_freemius_loaded' );