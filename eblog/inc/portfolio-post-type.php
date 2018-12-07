<?php
// Register Custom Post Type
function portfolio_post_type() {

	$labels = array(
		'name'                  => _x( 'Portfolio', 'Post Type General Name', 'portfolio' ),
		'singular_name'         => _x( 'Portfolio', 'Post Type Singular Name', 'portfolio' ),
		'menu_name'             => __( 'Portfolio', 'portfolio' ),
		'name_admin_bar'        => __( 'Portfolio', 'portfolio' ),
		'archives'              => __( 'Portfolio Archives', 'portfolio' ),
		'attributes'            => __( 'Item Attributes', 'portfolio' ),
		'parent_item_colon'     => __( 'Parent Item:', 'portfolio' ),
		'all_items'             => __( 'All Portfolio', 'portfolio' ),
		'add_new_item'          => __( 'Add New Portfolio', 'portfolio' ),
		'add_new'               => __( 'Add Portfolio', 'portfolio' ),
		'new_item'              => __( 'New Item', 'portfolio' ),
		'edit_item'             => __( 'Edit Portfolio', 'portfolio' ),
		'update_item'           => __( 'Update Portfolio', 'portfolio' ),
		'view_item'             => __( 'View Portfolio', 'portfolio' ),
		'view_items'            => __( 'View Portfolio', 'portfolio' ),
		'search_items'          => __( 'Search Portfolio', 'portfolio' ),
		'not_found'             => __( 'Not found', 'portfolio' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'portfolio' ),
		'featured_image'        => __( 'Featured Image', 'portfolio' ),
		'set_featured_image'    => __( 'Set featured image', 'portfolio' ),
		'remove_featured_image' => __( 'Remove featured image', 'portfolio' ),
		'use_featured_image'    => __( 'Use as featured image', 'portfolio' ),
		'insert_into_item'      => __( 'Insert into item', 'portfolio' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Portfolio', 'portfolio' ),
		'items_list'            => __( 'Portfolio', 'portfolio' ),
		'items_list_navigation' => __( 'Portfolio list', 'portfolio' ),
		'filter_items_list'     => __( 'Filter Portfolio list', 'portfolio' ),
	);
	$args = array(
		'label'                 => __( 'Portfolio', 'portfolio' ),
		'description'           => __( 'Company Portfolio Post Type', 'portfolio' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category' ),
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
	register_post_type( 'portfolio', $args );

}
add_action( 'init', 'portfolio_post_type', 0 );
?>