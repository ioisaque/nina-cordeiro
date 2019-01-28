<?php
/**
 * Custom Post Types
 *
 *
 * @package bearr
 */
class BEARR_Clients_Post_Types {
	
	public function __construct()
	{
		$this->register_post_type();
	}

	public function register_post_type()
	{
		$args = array();		

		// Clients
		$args['post-type-clients'] = array(
			'labels' => array(
				'name' => __( 'Clients', 'bearr' ),
				'singular_name' => __( 'Client', 'bearr' ),
				'add_new' => __( 'Add New', 'bearr' ),
				'add_new_item' => __( 'Add New Client', 'bearr' ),
				'edit_item' => __( 'Edit Client', 'bearr' ),
				'new_item' => __( 'New Client', 'bearr' ),
				'view_item' => __( 'View Client', 'bearr' ),
				'search_items' => __( 'Search Through Client', 'bearr' ),
				'not_found' => __( 'No clients found', 'bearr' ),
				'not_found_in_trash' => __( 'No clients found in Trash', 'bearr' ),
				'parent_item_colon' => __( 'Parent Client:', 'bearr' ),
				'menu_name' => __( 'Clients', 'bearr' ),
				
			),		  
			'hierarchical' => false,
	        'description' => __( 'Add a Client', 'bearr' ),
	        'supports' => array( 'title'),
	        'menu_icon' =>  'dashicons-id',
	        'public' => true,
	        'publicly_queryable' => true,
	        'exclude_from_search' => true,
	        'query_var' => true,
	        'rewrite' => true 
		);

		// Register post type: name, arguments
		register_post_type('clients', $args['post-type-clients']);
	}
}

function bearr_clients_post_types() { new BEARR_Clients_Post_Types(); }

add_action( 'init', 'bearr_clients_post_types' );


/*-----------------------------------------------------------------------------------*/
/*	Show the shorcode and ID on Admin
/*-----------------------------------------------------------------------------------*/

function bearr_client_meta_boxes(){
	add_meta_box('clients', __('Testimonial ID!', 'bearr'), 'bearr_client_metabox', 'clients', 'side', 'core');
}

add_action( 'add_meta_boxes', 'bearr_client_meta_boxes' );


/*-----------------------------------------------------------------------------------*/
/*	Create Custom Spaces for Custom Post Types on admin pages
/*-----------------------------------------------------------------------------------*/
function bearr_client_metabox($post, $metabox){
	?>
		<code>[bearr-client id=<?php print $post->ID ?>]</code>
		<small class="description"><?php _e('Get the shortcode code to display the client on another page!', 'bearr') ?></small>
	<?php
}

//modify Clients admin page structure
add_filter( 'manage_edit-clients_columns', 'bearr_edit_clients_columns' ) ;

function bearr_edit_clients_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'clients', 'bearr' ),
		'shortcode' => __( 'Embed Code', 'bearr' ),
		'date' => __( 'Date', 'bearr' )
	);

	return $columns;
}


add_action( 'manage_clients_posts_custom_column', 'bearr_manage_clients_columns', 10, 2 );

function bearr_manage_clients_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {
		case 'shortcode' :
			echo "<input type=text readonly=readonly value='[bearr-client id={$post->ID}]' size=35 style='font-weight:bold;text-align:Center;' onclick='this.select()' />";
			break;

		default :
			break;
	}
}