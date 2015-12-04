<?php
//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'gportfolio_taxonomy', 0 );
function gportfolio_taxonomy() {
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
  $labels = array(
    'name' => _x( 'Services', 'taxonomy general name' ),
    'singular_name' => _x( 'Service', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Services' ),
    'all_items' => __( 'All Services' ),
    'parent_item' => __( 'Parent Service' ),
    'parent_item_colon' => __( 'Parent Service:' ),
    'edit_item' => __( 'Edit Service' ), 
    'update_item' => __( 'Update Service' ),
    'add_new_item' => __( 'Add New Service' ),
    'new_item_name' => __( 'New Service Name' ),
    'menu_name' => __( 'Services' ),
  ); 	
// Now register the taxonomy
  register_taxonomy('gpservices',array('gportfolio'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'service' ),
  ));
}
//hook into the init action and call create_topics_nonhierarchical_taxonomy when it fires

add_action( 'init', 'gportfolio_tag', 0 );
function gportfolio_tag() {

// Labels part for the GUI

  $labels = array(
    'name' => _x( 'Service Tags', 'taxonomy general name' ),
    'singular_name' => _x( 'Service Tag', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Service Tags' ),
    'popular_items' => __( 'Popular Service Tags' ),
    'all_items' => __( 'All Service Tags' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Service Tag' ), 
    'update_item' => __( 'Update Service Tag' ),
    'add_new_item' => __( 'Add New Service Tag' ),
    'new_item_name' => __( 'New Service Tag Name' ),
    'separate_items_with_commas' => __( 'Separate service tag with commas' ),
    'add_or_remove_items' => __( 'Add or remove service tags' ),
    'choose_from_most_used' => __( 'Choose from the most used service tags' ),
    'menu_name' => __( 'Tags' ),
  ); 

// Now register the non-hierarchical taxonomy like tag

  register_taxonomy('gptags','gportfolio',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'service' ),
  ));
}
?>