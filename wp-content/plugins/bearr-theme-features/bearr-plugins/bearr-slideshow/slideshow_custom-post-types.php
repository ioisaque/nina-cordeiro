<?php
/**
 * Custom Post Types
 *
 *
 * @package bearr
 */
class BEARR_Slideshow_Post_Types {
	
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
				'name' => __( 'Slider', 'bearr' ),
				'singular_name' => __( 'Slider Item', 'bearr' ),
				'all_items' => 'Slides',
				'add_new' => __( 'Add Slide', 'bearr' ),
				'add_new_item' => __( 'Add New Slide', 'bearr' ),
				'edit_item' => __( 'Edit Slide', 'bearr' ),
				'new_item' => __( 'New Slide', 'bearr' ),
				'view_item' => __( 'View Slide', 'bearr' ),
				'search_items' => __( 'Search Through Slide', 'bearr' ),
				'not_found' => __( 'No slides found', 'bearr' ),
				'not_found_in_trash' => __( 'No slides found in Trash', 'bearr' ),
				'parent_item_colon' => __( 'Parent Slide:', 'bearr' ),
				'menu_name' => __( 'Slider', 'bearr' ),
				
			),		  
			'hierarchical' => false,
	        'description' => __( 'Add a slide', 'bearr' ),
	        'supports' => array( 'title'),
	        'menu_icon' =>  'dashicons-format-image',
	        'public' => true,
	        'publicly_queryable' => true,
	        'exclude_from_search' => true,
	        'query_var' => true,
	        'rewrite' => array('slug' => 'slider', 'with_front' => false)
		);			

		// Register post type: name, arguments
		register_post_type('slider', $args['post-type-slider']);
	}
}

function bearr_slideshow_types() { new BEARR_Slideshow_Post_Types(); }

add_action( 'init', 'bearr_slideshow_types' );


/*-----------------------------------------------------------------------------------*/
/*	Show the shorcode and ID on Admin
/*-----------------------------------------------------------------------------------*/

function bearr_slideshow_id_metabox(){
	add_meta_box('slider', __('Slide ID!', 'bearr'), 'bearr_slideshow_metabox', 'slider', 'side', 'core');
}

add_action( 'add_meta_boxes', 'bearr_slideshow_id_metabox' );


/*-----------------------------------------------------------------------------------*/
/*	Create Custom Spaces for Custom Post Types on admin pages
/*-----------------------------------------------------------------------------------*/
function bearr_slideshow_metabox($post, $metabox){
	?>
		<code>[bearr-slide id=<?php print $post->ID ?>]</code>
		<small class="description"><?php _e('Get the shortcode code to display the slide on another page!', 'bearr') ?></small>
	<?php
}


//Modify Slider page structure
add_filter( 'manage_edit-slider_columns', 'bearr_slideshow_edit_slider_columns' ) ;

function bearr_slideshow_edit_slider_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Slides', 'bearr' ),
		'shortcode' => __( 'Embed Code', 'bearr' ),
		'date' => __( 'Date', 'bearr' )
	);

	return $columns;
}


add_action( 'manage_slider_posts_custom_column', 'bearr_slideshow_manage_slider_columns', 10, 2 );

function bearr_slideshow_manage_slider_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {
		case 'shortcode' :
			echo "<input type=text readonly=readonly value='[bearr-slide id={$post->ID}]' size=35 style='font-weight:bold;text-align:Center;' onclick='this.select()' />";
			break;

		default :
			break;
	}
}