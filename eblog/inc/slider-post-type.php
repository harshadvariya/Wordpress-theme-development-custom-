<?php
// Register Custom Post Type
function slider_post_type() {

	$labels = array(
		'name'                  => _x( 'slider', 'Post Type General Name', 'slider' ),
		'singular_name'         => _x( 'slider', 'Post Type Singular Name', 'slider' ),
		'menu_name'             => __( 'slider', 'slider' ),
		'name_admin_bar'        => __( 'slider', 'slider' ),
		'archives'              => __( 'slider Archives', 'slider' ),
		'attributes'            => __( 'Item Attributes', 'slider' ),
		'parent_item_colon'     => __( 'Parent Item:', 'slider' ),
		'all_items'             => __( 'All slider', 'slider' ),
		'add_new_item'          => __( 'Add New slider', 'slider' ),
		'add_new'               => __( 'Add slide', 'slider' ),
		'new_item'              => __( 'New Item', 'slider' ),
		'edit_item'             => __( 'Edit slider', 'slider' ),
		'update_item'           => __( 'Update slider', 'slider' ),
		'view_item'             => __( 'View slider', 'slider' ),
		'view_items'            => __( 'View slider', 'slider' ),
		'search_items'          => __( 'Search slider', 'slider' ),
		'not_found'             => __( 'Not found', 'slider' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'slider' ),
		'featured_image'        => __( 'Featured Image', 'slider' ),
		'set_featured_image'    => __( 'Set featured image', 'slider' ),
		'remove_featured_image' => __( 'Remove featured image', 'slider' ),
		'use_featured_image'    => __( 'Use as featured image', 'slider' ),
		'insert_into_item'      => __( 'Insert into item', 'slider' ),
		'uploaded_to_this_item' => __( 'Uploaded to this slider', 'slider' ),
		'items_list'            => __( 'slider', 'slider' ),
		'items_list_navigation' => __( 'slider list', 'slider' ),
		'filter_items_list'     => __( 'Filter slider list', 'slider' ),
	);
	$args = array(
		'label'                 => __( 'slider', 'slider' ),
		'description'           => __( 'Company slider Post Type', 'slider' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( '' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-portfolio',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'slider', $args );

}
add_action( 'init', 'slider_post_type', 0 );
?>