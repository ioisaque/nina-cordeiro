<?php
/**
 * Custom Post Types
 *
 *
 * @package law-and-justice
 */
class BEARR_Gallery_Post_Types {
	
	public function __construct()
	{
		$this->register_post_type();
	}

	public function register_post_type()
	{
		$args = array();		

		// Gallery
		$args['post-type-gallery'] = array(
			'labels' => array(
				'name' => __( 'Image Gallery', 'bearr' ),
				'singular_name' => __( 'Image Gallery', 'bearr' ),
				'add_new' => __( 'Add New', 'bearr' ),
				'add_new_item' => __( 'Add New Gallery', 'bearr' ),
				'edit_item' => __( 'Edit Gallery', 'bearr' ),
				'new_item' => __( 'New Gallery', 'bearr' ),
				'view_item' => __( 'View Gallery', 'bearr' ),
				'search_items' => __( 'Search Through Gallery', 'bearr' ),
				'not_found' => __( 'No Gallery found', 'bearr' ),
				'not_found_in_trash' => __( 'No Gallery found in Trash', 'bearr' ),
				'parent_item_colon' => __( 'Parent Gallery:', 'bearr' ),
				'menu_name' => __( 'Image Gallery', 'bearr' ),
				
			),		  
			'hierarchical' => false,
	        'description' => __( 'Add a Gallery', 'bearr' ),
	        'supports' => array( 'title'),
	        'menu_icon' =>  'dashicons-format-gallery',
	        'public' => true,
	        'publicly_queryable' => true,
	        'exclude_from_search' => true,
	        'query_var' => true,
	        'rewrite' => true 
		);

		// Register post type: name, arguments
		register_post_type('gallery', $args['post-type-gallery']);
	}
}

function bearr_gallery_types() { new BEARR_Gallery_Post_Types(); }

add_action( 'init', 'bearr_gallery_types' );


/*-----------------------------------------------------------------------------------*/
/*	Show the shorcode and ID on Admin
/*-----------------------------------------------------------------------------------*/

function bearr_gallery_meta_boxes(){
	add_meta_box('gallery', __('Testimonial ID!', 'bearr'), 'bearr_gallery_metabox', 'gallery', 'side', 'core');
}

add_action( 'add_meta_boxes', 'bearr_gallery_meta_boxes' );


/*-----------------------------------------------------------------------------------*/
/*	Create Custom Spaces for Custom Post Types on admin pages
/*-----------------------------------------------------------------------------------*/
function bearr_gallery_metabox($post, $metabox){
	?>
		<code>[bearr-gallery id=<?php print $post->ID ?>]</code>
		<small class="description"><?php _e('Get the shortcode code to display the Gallery on another page!', 'bearr') ?></small>
	<?php
}

//modify Gallery admin page structure
add_filter( 'manage_edit-gallery_columns', 'bearr_edit_gallery_columns' ) ;

function bearr_edit_gallery_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'gallery', 'bearr' ),
		'shortcode' => __( 'Embed Code', 'bearr' ),
		'date' => __( 'Date', 'bearr' )
	);

	return $columns;
}


add_action( 'manage_gallery_posts_custom_column', 'bearr_manage_gallery_columns', 10, 2 );

function bearr_manage_gallery_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {
		case 'shortcode' :
			echo "<input type=text readonly=readonly value='[bearr-gallery id={$post->ID}]' size=35 style='font-weight:bold;text-align:Center;' onclick='this.select()' />";
			break;

		default :
			break;
	}
}