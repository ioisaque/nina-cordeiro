<?php
/**
 * Testimonials: Custom Post Types
 *
 *
 * @package bearr
 */
class BEARR_testimonials_Post_Types {
	
	public function __construct()
	{
		$this->register_post_type();
	}

	public function register_post_type()
	{
		$args = array();	

		// Testimonials
		$args['post-type-testimonials'] = array(
			'labels' => array(
				'name' => __( 'Testimonials', 'amore' ),
				'singular_name' => __( 'Testimonial', 'amore' ),
				'add_new' => __( 'Add New', 'amore' ),
				'add_new_item' => __( 'Add New Testimonial', 'amore' ),
				'edit_item' => __( 'Edit Testimonial', 'amore' ),
				'new_item' => __( 'New Testimonial', 'amore' ),
				'view_item' => __( 'View Testimonial', 'amore' ),
				'search_items' => __( 'Search Through Testimonials', 'amore' ),
				'not_found' => __( 'No testimonials found', 'amore' ),
				'not_found_in_trash' => __( 'No testimonials found in Trash', 'amore' ),
				'parent_item_colon' => __( 'Parent Testimonial:', 'amore' ),
				'menu_name' => __( 'Testimonials', 'amore' ),				
			),		  
			'hierarchical' => false,
	        'description' => __( 'Add a Testimonial', 'amore' ),
	        'supports' => array( 'title'),
	        'menu_icon' =>  'dashicons-testimonial',
	        'public' => true,
	        'publicly_queryable' => true,
	        'exclude_from_search' => true,
	        'query_var' => true,
	        'rewrite' => true 
		);	

		// Register post type: name, arguments
		register_post_type('testimonials', $args['post-type-testimonials']);
	}
}

function bearr_testimonials_types() { new BEARR_testimonials_Post_Types(); }

add_action( 'init', 'bearr_testimonials_types' );


/*-----------------------------------------------------------------------------------*/
/*	Show the shorcode and ID on Admin
/*-----------------------------------------------------------------------------------*/
function bearr_testimonials_id_meta_boxes(){
	add_meta_box('testimonials', __('Testimonial ID!', 'amore'), 'bearr_testimonials_metabox', 'testimonials', 'side', 'core');
}

add_action( 'add_meta_boxes', 'bearr_testimonials_id_meta_boxes' );

/*-----------------------------------------------------------------------------------*/
/*	Create Custom Spaces for Custom Post Types on admin pages
/*-----------------------------------------------------------------------------------*/
function bearr_testimonials_metabox($post, $metabox){
	?>
		<code>[bearr-testimonial id=<?php print $post->ID ?>]</code>
		<small class="description"><?php _e('Get the shortcode code to display the testimonial on another page!', 'amore') ?></small>
	<?php
}

//modify Testimonials admin page structure
add_filter( 'manage_edit-testimonials_columns', 'bearr_testimonials_edit_testimonials_columns' ) ;

function bearr_testimonials_edit_testimonials_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'testimonials', 'amore' ),
		'shortcode' => __( 'Embed Code', 'amore' ),
		'date' => __( 'Date', 'amore' )
	);

	return $columns;
}


add_action( 'manage_testimonials_posts_custom_column', 'bearr_testimonials_manage_testimonials_columns', 10, 2 );

function bearr_testimonials_manage_testimonials_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {
		case 'shortcode' :
			echo "<input type=text readonly=readonly value='[bearr-testimonial id={$post->ID}]' size=35 style='font-weight:bold;text-align:Center;' onclick='this.select()' />";
			break;

		default :
			break;
	}
}