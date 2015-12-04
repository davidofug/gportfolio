<?php
/*
* Creating a function to create our CPT
*/

function gp_type() {

// Set UI labels for Custom Post Type
	$labels = array(
		'name'                => _x( 'G Portfolio', 'Post Type General Name', 'gagawala_graphics' ),
		'singular_name'       => _x( 'G Portfolio','Post Type Singular Name', 'gagawala_graphics' ),
		'menu_name'           => __( 'G Portfolio', 'gagawala_graphics' ),
		'parent_item_colon'   => __( 'Parent G Portfolio item', 'gagawala_graphics' ),
		'all_items'           => __( 'All G Portfolio items', 'gagawala_graphics' ),
		'view_item'           => __( 'View G Portfolio item', 'gagawala_graphics' ),
		'add_new_item'        => __( 'Add New G Portfolio item', 'gagawala_graphics' ),
		'add_new'             => __( 'Add New', 'gagawala_graphics' ),
		'edit_item'           => __( 'Edit G Portfolio item', 'gagawala_graphics' ),
		'update_item'         => __( 'Update G Portfolio item', 'gagawala_graphics' ),
		'search_items'        => __( 'Search G Portfolio item', 'gagawala_graphics' ),
		'not_found'           => __( 'Not Found', 'gagawala_graphics' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'gagawala_graphics' ),
	);
	
// Set other options for Custom Post Type
	
	$args = array(
		'label'               => __( 'portfolios', 'gagawala_graphics' ),
		'description'         => __( 'Show case your work', 'gagawala_graphics' ),
		'labels'              => $labels,
		// Features this CPT supports in Post Editor
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields','post-formats','authors'),
		// Associate this CPT with a taxonomy or custom taxonomy. 
		'taxonomies'          => array( 'gpservice' ),
		/* A hierarchical CPT is like Pages and can have
		* Parent and child items. A non-hierarchical CPT
		* is like Posts.
		*/	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	// Registering Custom Post Type
	register_post_type( 'gportfolio', $args );
}
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
add_action( 'init', 'gp_type', 0 );
?>