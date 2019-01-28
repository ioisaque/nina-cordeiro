<?php
/**
 * Custom Post Types
 *
 *
 * @package law-and-justice
 */
class TB_Post_Types {
	
	public function __construct()
	{
		$this->register_post_type();
	}

	public function register_post_type()
	{
		$args = array();
		// Slideshow
		$args['post-type-slider'] = array(
			'labels' => array(
				'name' => __( 'Slider', 'law-and-justice' ),
				'singular_name' => __( 'Slider Item', 'law-and-justice' ),
				'all_items' => 'Slides',
				'add_new' => __( 'Add Slide', 'law-and-justice' ),
				'add_new_item' => __( 'Add New Slide', 'law-and-justice' ),
				'edit_item' => __( 'Edit Slide', 'law-and-justice' ),
				'new_item' => __( 'New Slide', 'law-and-justice' ),
				'view_item' => __( 'View Slide', 'law-and-justice' ),
				'search_items' => __( 'Search Through Slide', 'law-and-justice' ),
				'not_found' => __( 'No slides found', 'law-and-justice' ),
				'not_found_in_trash' => __( 'No slides found in Trash', 'law-and-justice' ),
				'parent_item_colon' => __( 'Parent Slide:', 'law-and-justice' ),
				'menu_name' => __( 'Slider', 'law-and-justice' ),
				
			),		  
			'hierarchical' => false,
	        'description' => __( 'Add a slide', 'law-and-justice' ),
	        'supports' => array( 'title'),
	        'menu_icon' =>  'dashicons-businessman',
	        'public' => true,
	        'publicly_queryable' => true,
	        'exclude_from_search' => false,
	        'query_var' => true,
	        'rewrite' => array('slug' => 'slider', 'with_front' => false)
		);	

		// Team
		$args['post-type-team'] = array(
			'labels' => array(
				'name' => __( 'Team Members', 'law-and-justice' ),
				'singular_name' => __( 'Team Member', 'law-and-justice' ),
				'all_items' => 'Team Members',
				'add_new' => __( 'Add New', 'law-and-justice' ),
				'add_new_item' => __( 'Add New Team Member', 'law-and-justice' ),
				'edit_item' => __( 'Edit Team Member', 'law-and-justice' ),
				'new_item' => __( 'New Team Member', 'law-and-justice' ),
				'view_item' => __( 'View Team Member', 'law-and-justice' ),
				'search_items' => __( 'Search Through Team Members', 'law-and-justice' ),
				'not_found' => __( 'No members found', 'law-and-justice' ),
				'not_found_in_trash' => __( 'No members found in Trash', 'law-and-justice' ),
				'parent_item_colon' => __( 'Parent Team Member:', 'law-and-justice' ),
				'menu_name' => __( 'Team', 'law-and-justice' ),
				
			),		  
			'hierarchical' => false,
	        'description' => __( 'Add a team member', 'law-and-justice' ),
	        'supports' => array( 'title', 'thumbnail'),
	        'menu_icon' =>  'dashicons-businessman',
	        'public' => true,
	        'publicly_queryable' => true,
	        'exclude_from_search' => false,
	        'query_var' => true,
	        'rewrite' => array('slug' => 'team', 'with_front' => false)
		);	  

		// Testimonials
		$args['post-type-testimonials'] = array(
			'labels' => array(
				'name' => __( 'Testimonials', 'law-and-justice' ),
				'singular_name' => __( 'Testimonial', 'law-and-justice' ),
				'add_new' => __( 'Add New', 'law-and-justice' ),
				'add_new_item' => __( 'Add New Testimonial', 'law-and-justice' ),
				'edit_item' => __( 'Edit Testimonial', 'law-and-justice' ),
				'new_item' => __( 'New Testimonial', 'law-and-justice' ),
				'view_item' => __( 'View Testimonial', 'law-and-justice' ),
				'search_items' => __( 'Search Through Testimonials', 'law-and-justice' ),
				'not_found' => __( 'No testimonials found', 'law-and-justice' ),
				'not_found_in_trash' => __( 'No testimonials found in Trash', 'law-and-justice' ),
				'parent_item_colon' => __( 'Parent Testimonial:', 'law-and-justice' ),
				'menu_name' => __( 'Testimonials', 'law-and-justice' ),
				
			),		  
			'hierarchical' => false,
	        'description' => __( 'Add a Testimonial', 'law-and-justice' ),
	        'supports' => array( 'title'),
	        'menu_icon' =>  'dashicons-testimonial',
	        'public' => true,
	        'publicly_queryable' => true,
	        'exclude_from_search' => false,
	        'query_var' => true,
	        'rewrite' => true 
		);	

		// Clients
		$args['post-type-clients'] = array(
			'labels' => array(
				'name' => __( 'Clients', 'law-and-justice' ),
				'singular_name' => __( 'Client', 'law-and-justice' ),
				'add_new' => __( 'Add New', 'law-and-justice' ),
				'add_new_item' => __( 'Add New Client', 'law-and-justice' ),
				'edit_item' => __( 'Edit Client', 'law-and-justice' ),
				'new_item' => __( 'New Client', 'law-and-justice' ),
				'view_item' => __( 'View Client', 'law-and-justice' ),
				'search_items' => __( 'Search Through Client', 'law-and-justice' ),
				'not_found' => __( 'No clients found', 'law-and-justice' ),
				'not_found_in_trash' => __( 'No clients found in Trash', 'law-and-justice' ),
				'parent_item_colon' => __( 'Parent Client:', 'law-and-justice' ),
				'menu_name' => __( 'Clients', 'law-and-justice' ),
				
			),		  
			'hierarchical' => false,
	        'description' => __( 'Add a Client', 'law-and-justice' ),
	        'supports' => array( 'title'),
	        'menu_icon' =>  'dashicons-testimonial',
	        'public' => true,
	        'publicly_queryable' => true,
	        'exclude_from_search' => false,
	        'query_var' => true,
	        'rewrite' => true 
		);

		// Register post type: name, arguments
		register_post_type('slider', $args['post-type-slider']);
		register_post_type('team', $args['post-type-team']);
		register_post_type('testimonials', $args['post-type-testimonials']);
		register_post_type('clients', $args['post-type-clients']);
	}
}

function law_and_justice_types() { new TB_Post_Types(); }

add_action( 'init', 'law_and_justice_types' );


/*-----------------------------------------------------------------------------------*/
/*	Show the shorcode and ID on Admin
/*-----------------------------------------------------------------------------------*/

function law_and_justice_slider_meta_boxes(){
	add_meta_box('slider', __('Slide ID!', 'law-and-justice'), 'law_and_justice_slider_metabox', 'slider', 'side', 'core');
}

function law_and_justice_member_meta_boxes(){
	add_meta_box('team', __('Team Member ID!', 'law-and-justice'), 'law_and_justice_member_metabox', 'team', 'side', 'core');
}

function law_and_justice_testimonial_meta_boxes(){
	add_meta_box('testimonials', __('Testimonial ID!', 'law-and-justice'), 'law_and_justice_testimonial_metabox', 'testimonials', 'side', 'core');
}

function law_and_justice_client_meta_boxes(){
	add_meta_box('clients', __('Testimonial ID!', 'law-and-justice'), 'law_and_justice_client_metabox', 'clients', 'side', 'core');
}

add_action( 'add_meta_boxes', 'law_and_justice_slider_meta_boxes' );
add_action( 'add_meta_boxes', 'law_and_justice_member_meta_boxes' );
add_action( 'add_meta_boxes', 'law_and_justice_testimonial_meta_boxes' );
add_action( 'add_meta_boxes', 'law_and_justice_client_meta_boxes' );


/*-----------------------------------------------------------------------------------*/
/*	Create Custom Spaces for Custom Post Types on admin pages
/*-----------------------------------------------------------------------------------*/

function law_and_justice_slider_metabox($post, $metabox){
	?>
		<code>[tb-slide id=<?php print $post->ID ?>]</code>
		<small class="description"><?php _e('Get the shortcode code to display the slide on another page!', 'law-and-justice') ?></small>
	<?php
}


function law_and_justice_member_metabox($post, $metabox){
	?>
		<code>[tb-team-member id=<?php print $post->ID ?>]</code>
		<small class="description"><?php _e('Get the shortcode code to display the team member on another page!', 'law-and-justice') ?></small>
	<?php
}

function law_and_justice_testimonial_metabox($post, $metabox){
	?>
		<code>[tb-testimonial id=<?php print $post->ID ?>]</code>
		<small class="description"><?php _e('Get the shortcode code to display the testimonial on another page!', 'law-and-justice') ?></small>
	<?php
}

function law_and_justice_client_metabox($post, $metabox){
	?>
		<code>[tb-client id=<?php print $post->ID ?>]</code>
		<small class="description"><?php _e('Get the shortcode code to display the client on another page!', 'law-and-justice') ?></small>
	<?php
}




//Modify Slider page structure
add_filter( 'manage_edit-slider_columns', 'law_and_justice_edit_slider_columns' ) ;

function law_and_justice_edit_slider_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Slides', 'law-and-justice' ),
		'shortcode' => __( 'Embed Code', 'law-and-justice' ),
		'date' => __( 'Date', 'law-and-justice' )
	);

	return $columns;
}


add_action( 'manage_slider_posts_custom_column', 'law_and_justice_manage_slider_columns', 10, 2 );

function law_and_justice_manage_slider_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {
		case 'shortcode' :
			echo "<input type=text readonly=readonly value='[tb-slide id={$post->ID}]' size=35 style='font-weight:bold;text-align:Center;' onclick='this.select()' />";
			break;

		default :
			break;
	}
}



//modify Team admin page structure
add_filter( 'manage_edit-team_columns', 'law_and_justice_edit_team_columns' ) ;

function law_and_justice_edit_team_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Team Members', 'law-and-justice' ),
		'shortcode' => __( 'Embed Code', 'law-and-justice' ),
		'date' => __( 'Date', 'law-and-justice' )
	);

	return $columns;
}


add_action( 'manage_team_posts_custom_column', 'law_and_justice_manage_team_columns', 10, 2 );

function law_and_justice_manage_team_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {
		case 'shortcode' :
			echo "<input type=text readonly=readonly value='[tb-team-member id={$post->ID}]' size=35 style='font-weight:bold;text-align:Center;' onclick='this.select()' />";
			break;

		default :
			break;
	}
}


//modify Testimonials admin page structure
add_filter( 'manage_edit-testimonials_columns', 'law_and_justice_edit_testimonials_columns' ) ;

function law_and_justice_edit_testimonials_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'testimonials', 'law-and-justice' ),
		'shortcode' => __( 'Embed Code', 'law-and-justice' ),
		'date' => __( 'Date', 'law-and-justice' )
	);

	return $columns;
}


add_action( 'manage_testimonials_posts_custom_column', 'law_and_justice_manage_testimonials_columns', 10, 2 );

function law_and_justice_manage_testimonials_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {
		case 'shortcode' :
			echo "<input type=text readonly=readonly value='[tb-testimonial id={$post->ID}]' size=35 style='font-weight:bold;text-align:Center;' onclick='this.select()' />";
			break;

		default :
			break;
	}
}

//modify Clients admin page structure
add_filter( 'manage_edit-clients_columns', 'law_and_justice_edit_clients_columns' ) ;

function law_and_justice_edit_clients_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'clients', 'law-and-justice' ),
		'shortcode' => __( 'Embed Code', 'law-and-justice' ),
		'date' => __( 'Date', 'law-and-justice' )
	);

	return $columns;
}


add_action( 'manage_clients_posts_custom_column', 'law_and_justice_manage_clients_columns', 10, 2 );

function law_and_justice_manage_clients_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {
		case 'shortcode' :
			echo "<input type=text readonly=readonly value='[tb-client id={$post->ID}]' size=35 style='font-weight:bold;text-align:Center;' onclick='this.select()' />";
			break;

		default :
			break;
	}
}