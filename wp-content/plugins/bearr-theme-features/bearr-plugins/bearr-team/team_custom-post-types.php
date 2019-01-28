<?php
/**
 * Custom Post Types
 *
 *
 * @package bearr
 */
class BEARR_team_Post_Types {
	
	public function __construct()
	{
		$this->register_post_type();
	}

	public function register_post_type()
	{
		$args = array();		

		// Team
		$args['post-type-team'] = array(
			'labels' => array(
				'name' => __( 'Team Members', 'bearr' ),
				'singular_name' => __( 'Team Member', 'bearr' ),
				'all_items' => 'Team Members',
				'add_new' => __( 'Add New', 'bearr' ),
				'add_new_item' => __( 'Add New Team Member', 'bearr' ),
				'edit_item' => __( 'Edit Team Member', 'bearr' ),
				'new_item' => __( 'New Team Member', 'bearr' ),
				'view_item' => __( 'View Team Member', 'bearr' ),
				'search_items' => __( 'Search Through Team Members', 'bearr' ),
				'not_found' => __( 'No members found', 'bearr' ),
				'not_found_in_trash' => __( 'No members found in Trash', 'bearr' ),
				'parent_item_colon' => __( 'Parent Team Member:', 'bearr' ),
				'menu_name' => __( 'Team', 'bearr' ),
				
			),		  
			'hierarchical' => false,
	        'description' => __( 'Add a team member', 'bearr' ),
	        'supports' => array( 'title', 'thumbnail'),
	        'menu_icon' =>  'dashicons-businessman',
	        'public' => true,
	        'publicly_queryable' => true,
	        'exclude_from_search' => true,
	        'query_var' => true,
	        'rewrite' => array('slug' => 'team', 'with_front' => false)
		);	

		// Register post type: name, arguments
		register_post_type('team', $args['post-type-team']);
	}
}

function bearr_team_post_types() { new BEARR_team_Post_Types(); }

add_action( 'init', 'bearr_team_post_types' );


/*-----------------------------------------------------------------------------------*/
/*	Show the shorcode and ID on Admin
/*-----------------------------------------------------------------------------------*/

function bearr_team_meta_boxes(){
	add_meta_box('team', __('Team ID!', 'bearr'), 'bearr_team_metabox', 'team', 'side', 'core');
}

add_action( 'add_meta_boxes', 'bearr_team_meta_boxes' );


/*-----------------------------------------------------------------------------------*/
/*	Create Custom Spaces for Custom Post Types on admin pages
/*-----------------------------------------------------------------------------------*/
function bearr_team_metabox($post, $metabox){
	?>
		<code>[bearr-team id=<?php print $post->ID ?>]</code>
		<small class="description"><?php _e('Get the shortcode code to display the client on another page!', 'bearr') ?></small>
	<?php
}

//modify Clients admin page structure
add_filter( 'manage_edit-teams_columns', 'bearr_edit_team_columns' ) ;

function bearr_edit_team_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'team', 'bearr' ),
		'shortcode' => __( 'Embed Code', 'bearr' ),
		'date' => __( 'Date', 'bearr' )
	);

	return $columns;
}


add_action( 'manage_team_posts_custom_column', 'bearr_manage_team_columns', 10, 2 );

function bearr_manage_team_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {
		case 'shortcode' :
			echo "<input type=text readonly=readonly value='[bearr-team id={$post->ID}]' size=35 style='font-weight:bold;text-align:Center;' onclick='this.select()' />";
			break;

		default :
			break;
	}
}