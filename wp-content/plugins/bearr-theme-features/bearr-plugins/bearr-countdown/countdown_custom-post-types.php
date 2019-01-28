<?php
/**
 * Custom Post Types
 *
 *
 * @package law-and-justice
 */
class BEARR_CountDown_Post_Types {
	
	public function __construct()
	{
		$this->register_post_type();
	}

	public function register_post_type()
	{
		$args = array();		

		// Clients
		$args['post-type-countdown'] = array(
			'labels' => array(
				'name' => __( 'Countdown', 'bearr' ),
				'singular_name' => __( 'CountDown', 'bearr' ),
				'add_new' => __( 'Add New', 'bearr' ),
				'add_new_item' => __( 'Add New CountDown', 'bearr' ),
				'edit_item' => __( 'Edit CountDown', 'bearr' ),
				'new_item' => __( 'New CountDown', 'bearr' ),
				'view_item' => __( 'View CountDown', 'bearr' ),
				'search_items' => __( 'Search Through CountDown', 'bearr' ),
				'not_found' => __( 'No CountDown found', 'bearr' ),
				'not_found_in_trash' => __( 'No CountDown found in Trash', 'bearr' ),
				'parent_item_colon' => __( 'Parent CountDown:', 'bearr' ),
				'menu_name' => __( 'CountDown', 'bearr' ),
				
			),		  
			'hierarchical' => false,
	        'description' => __( 'Creates a CountDown Shortcode', 'bearr' ),
	        'supports' => array( 'title'),
	        'menu_icon' =>  'dashicons-clock',
	        'public' => true,
	        'publicly_queryable' => true,
	        'exclude_from_search' => true,
	        'query_var' => true,
	        'rewrite' => true 
		);

		// Register post type: name, arguments
		register_post_type('countdown', $args['post-type-countdown']);
	}
}

function bearr_countdown_post_types() { new BEARR_CountDown_Post_Types(); }

add_action( 'init', 'bearr_countdown_post_types' );


/*-----------------------------------------------------------------------------------*/
/*	Show the shorcode and ID on Admin
/*-----------------------------------------------------------------------------------*/

function bearr_countdown_meta_boxes(){
	add_meta_box('countdown', __('CountDown ID!', 'bearr'), 'bearr_countdown_metabox', 'countdown', 'side', 'core');
}

add_action( 'add_meta_boxes', 'bearr_countdown_meta_boxes' );


/*-----------------------------------------------------------------------------------*/
/*	Create Custom Spaces for Custom Post Types on admin pages
/*-----------------------------------------------------------------------------------*/
function bearr_countdown_metabox($post, $metabox){
	?>
		<code>[bearr-countdown id=<?php print $post->ID ?>]</code>
		<small class="description"><?php _e('Get the shortcode code to display the Countdown on another page!', 'bearr') ?></small>
	<?php
}

//modify CountDown admin page structure
add_filter( 'manage_edit-countdown_columns', 'bearr_edit_countdown_columns' ) ;

function bearr_edit_countdown_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'clients', 'bearr' ),
		'shortcode' => __( 'Embed Code', 'bearr' ),
		'date' => __( 'Date', 'bearr' )
	);

	return $columns;
}


add_action( 'manage_countdown_posts_custom_column', 'bearr_manage_countdown_columns', 10, 2 );

function bearr_manage_countdown_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {
		case 'shortcode' :
			echo "<input type=text readonly=readonly value='[bearr-countdown id={$post->ID}]' size=35 style='font-weight:bold;text-align:Center;' onclick='this.select()' />";
			break;

		default :
			break;
	}
}