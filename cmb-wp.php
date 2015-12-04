<?php
//Initialize the metabox class
function initialize_cmb_meta_boxes() {
	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once(plugin_dir_path( __FILE__ ) .'libs/cmb-wp/init.php');
}

add_action( 'init', 'initialize_cmb_meta_boxes', 9999 );

//Add Meta Boxes

function gp_fields( $meta_boxes ) {
	$prefix = 'gp_'; // Prefix for all fields

	$meta_boxes[] = array(
		'id' => 'url',
		'title' => 'Website',
		'pages' => array('gportfolio'), // post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Web link',
				'desc' => 'Portfolio web address',
				'id' => $prefix . 'url',
				'type' => 'text'
			),
		),
	);
	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'gp_fields' );
?>