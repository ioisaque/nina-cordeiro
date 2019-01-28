<?php
/**
 * Portfolio: Custom Post Types
 *
 *
 * @package bearr
 */
class BEARR_portfolio_Post_Types {
	
	public function __construct()
	{
		$this->register_post_type();
	}

	public function register_post_type()
	{
		$args = array();	

		// Portfolio
		$args['post-type-portfolio'] = array(
			'labels' => array(
				'name' => __( 'Portfolio', 'bearr' ),
				'singular_name' => __( 'Item', 'bearr' ),
				'add_new' => __( 'Add New Item', 'bearr' ),
				'add_new_item' => __( 'Add New Item', 'bearr' ),
				'edit_item' => __( 'Edit Item', 'bearr' ),
				'new_item' => __( 'New Item', 'bearr' ),
				'view_item' => __( 'View Item', 'bearr' ),
				'search_items' => __( 'Search Through portfolio', 'bearr' ),
				'not_found' => __( 'No items found', 'bearr' ),
				'not_found_in_trash' => __( 'No items found in Trash', 'bearr' ),
				'parent_item_colon' => __( 'Parent Item:', 'bearr' ),
				'menu_name' => __( 'Portfolio', 'bearr' ),				
			),		  
			'hierarchical' => false,
	        'description' => __( 'Add a Portfolio Item', 'bearr' ),
	        'supports' => array( 'title', 'editor', 'thumbnail'),
	        'menu_icon' =>  'dashicons-images-alt',
	        'public' => true,
	        'publicly_queryable' => true,
	        'exclude_from_search' => false,
	        'query_var' => true,
	        'rewrite' => true,
	        // This is where we add taxonomies to our CPT
        	//'taxonomies'          => array( 'category' ),
		);	

		// Register post type: name, arguments
		register_post_type('portfolio', $args['post-type-portfolio']);
	}
}

function bearr_portfolio_types() { new BEARR_portfolio_Post_Types(); }

add_action( 'init', 'bearr_portfolio_types' );

/*-----------------------------------------------------------------------------------*/
/*	Creating Custom Taxonomy 
/*-----------------------------------------------------------------------------------*/
// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_portfolio_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_portfolio_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Portfolio Categories', 'taxonomy general name', 'bearr' ),
		'singular_name'     => _x( 'Portfolio Category', 'taxonomy singular name', 'bearr' ),
		'search_items'      => __( 'Search Portfolio Categories', 'bearr' ),
		'all_items'         => __( 'All Portfolio Categories', 'bearr' ),
		'parent_item'       => __( 'Parent Portfolio Category', 'bearr' ),
		'parent_item_colon' => __( 'Parent Portfolio Category:', 'bearr' ),
		'edit_item'         => __( 'Edit Portfolio Category', 'bearr' ),
		'update_item'       => __( 'Update Portfolio Category', 'bearr' ),
		'add_new_item'      => __( 'Add New Portfolio Category', 'bearr' ),
		'new_item_name'     => __( 'New Portfolio Category', 'bearr' ),
		'menu_name'         => __( 'Portfolio Categories', 'bearr' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'portfoliocategory' ),
	);

	register_taxonomy( 'portfoliocategory', array( 'portfolio' ), $args );
}


/*-----------------------------------------------------------------------------------*/
/*	Show the shorcode and ID on Admin
/*-----------------------------------------------------------------------------------*/
function bearr_portfolio_id_meta_boxes(){
	add_meta_box('portfolio', __('portfolio ID!', 'bearr'), 'bearr_portfolio_metabox', 'portfolio', 'side', 'core');
}

//add_action( 'add_meta_boxes', 'bearr_portfolio_id_meta_boxes' );

/*-----------------------------------------------------------------------------------*/
/*	Create Custom Spaces for Custom Post Types on admin pages
/*-----------------------------------------------------------------------------------*/
function bearr_portfolio_metabox($post, $metabox){
	?>
		<code>[bearr-portfolio id=<?php print $post->ID ?>]</code>
		<small class="description"><?php _e('Get the shortcode code to display the portfolio on another page!', 'bearr') ?></small>
	<?php
}

//modify portfolio admin page structure
//add_filter( 'manage_edit-portfolio_columns', 'bearr_portfolio_edit_portfolio_columns' ) ;

function bearr_portfolio_edit_portfolio_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'portfolio', 'bearr' ),
		'shortcode' => __( 'Embed Code', 'bearr' ),
		'date' => __( 'Date', 'bearr' )
	);

	return $columns;
}


//add_action( 'manage_portfolio_posts_custom_column', 'bearr_portfolio_manage_portfolio_columns', 10, 2 );

function bearr_portfolio_manage_portfolio_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {
		case 'shortcode' :
			echo "<input type=text readonly=readonly value='[bearr-portfolio id={$post->ID}]' size=35 style='font-weight:bold;text-align:Center;' onclick='this.select()' />";
			break;

		default :
			break;
	}
}