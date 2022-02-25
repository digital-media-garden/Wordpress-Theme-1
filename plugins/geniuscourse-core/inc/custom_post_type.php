<?php
function geniuscourses_register_post_type(){
	
	$args = array(
		'hierarchical' => false,
		'labels' => array(
			'name'              => esc_html_x( 'Brands', 'taxonomy general name', 'geniuscourses' ),
			'singular_name'     => esc_html_x( 'Brand', 'taxonomy singular name', 'geniuscourses' ),
			'search_items'      => esc_html__( 'Search Brands', 'geniuscourses' ),
			'all_items'         => esc_html__( 'All Brands', 'geniuscourses' ),
			'parent_item'       => esc_html__( 'Parent Brand', 'geniuscourses' ),
			'parent_item_colon' => esc_html__( 'Parent Brand:', 'geniuscourses' ),
			'edit_item'         => esc_html__( 'Edit Brand', 'geniuscourses' ),
			'update_item'       => esc_html__( 'Update Brand', 'geniuscourses' ),
			'add_new_item'      => esc_html__( 'Add New Brand', 'geniuscourses' ),
			'new_item_name'     => esc_html__( 'New Brand Name', 'geniuscourses' ),
			'menu_name'         => esc_html__( 'Brand', 'geniuscourses' ),
		),
		'show_ui' => true,
		'rewrite' => array('slug'=>'brands'),
		'query_var' => true,
		'show_admin_column' => true,
		'show_in_rest' => true
	);
	if(!taxonomy_exists('brand')){
		register_taxonomy('brand', array('car'), $args);
	}

	

	unset($args);



	$args = array(
		'hierarchical' => true,
		'labels' => array(
			'name'              => esc_html_x( 'Manufactures', 'taxonomy general name', 'geniuscourses' ),
			'singular_name'     => esc_html_x( 'Manufacture', 'taxonomy singular name', 'geniuscourses' ),
			'search_items'      => esc_html__( 'Search Manufactures', 'geniuscourses' ),
			'all_items'         => esc_html__( 'All Manufactures', 'geniuscourses' ),
			'parent_item'       => esc_html__( 'Parent Manufacture', 'geniuscourses' ),
			'parent_item_colon' => esc_html__( 'Parent Manufacture:', 'geniuscourses' ),
			'edit_item'         => esc_html__( 'Edit Manufacture', 'geniuscourses' ),
			'update_item'       => esc_html__( 'Update Manufacture', 'geniuscourses' ),
			'add_new_item'      => esc_html__( 'Add New Manufacture', 'geniuscourses' ),
			'new_item_name'     => esc_html__( 'New Manufacture Name', 'geniuscourses' ),
			'menu_name'         => esc_html__( 'Manufacture', 'geniuscourses' ),
		),
		'show_ui' => true,
		'rewrite' => array('slug'=>'manufactures'),
		'query_var' => true,
		'show_admin_column' => true,
		'show_in_rest' => true
	);

	register_taxonomy('manufacture', array('car'), $args);

	unset($args);



	$args = array(
		'label' => esc_html__('Cars','geniuscourses'),
		'labels' => array(
			'name'                  => esc_html_x( 'Cars', 'Post type general name', 'geniuscourses' ),
			'singular_name'         => esc_html_x( 'Car', 'Post type singular name', 'geniuscourses' ),
			'menu_name'             => esc_html_x( 'Cars', 'Admin Menu text', 'geniuscourses' ),
			'name_admin_bar'        => esc_html_x( 'Car', 'Add New on Toolbar', 'geniuscourses' ),
			'add_new'               => esc_html__( 'Add New', 'geniuscourses' ),
			'add_new_item'          => esc_html__( 'Add New Car', 'geniuscourses' ),
			'new_item'              => esc_html__( 'New Car', 'geniuscourses' ),
			'edit_item'             => esc_html__( 'Edit Car', 'geniuscourses' ),
			'view_item'             => esc_html__( 'View Car', 'geniuscourses' ),
			'all_items'             => esc_html__( 'All Cars', 'geniuscourses' ),
			'search_items'          => esc_html__( 'Search Cars', 'geniuscourses' ),
			'parent_item_colon'     => esc_html__( 'Parent Cars:', 'geniuscourses' ),
			'not_found'             => esc_html__( 'No Cars found.', 'geniuscourses' ),
			'not_found_in_trash'    => esc_html__( 'No Cars found in Trash.', 'geniuscourses' ),
			'featured_image'        => esc_html_x( 'Car Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'geniuscourses' ),
			'set_featured_image'    => esc_html_x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'geniuscourses' ),
			'remove_featured_image' => esc_html_x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'geniuscourses' ),
			'use_featured_image'    => esc_html_x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'geniuscourses' ),
			'archives'              => esc_html_x( 'Car archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'geniuscourses' ),
			'insert_into_item'      => esc_html_x( 'Insert into Car', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'geniuscourses' ),
			'uploaded_to_this_item' => esc_html_x( 'Uploaded to this Car', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'geniuscourses' ),
			'filter_items_list'     => esc_html_x( 'Filter Cars list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'geniuscourses' ),
			'items_list_navigation' => esc_html_x( 'Cars list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'geniuscourses' ),
			'items_list'            => esc_html_x( 'Cars list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'geniuscourses' ),
		),
		'supports' => array('title','editor','author','thumbnail','excerpt','comments','revisions','page-attributes','post-formats'),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu'=> true,
		'has_archive' => true,
		'show_in_nav_menus' => false,
		'show_in_admin_bar' => false,
		'menu_position' => 100,
		'menu_icon' => 'dashicons-welcome-write-blog',
		'rewrite' => array('slug' => 'cars'),
		'show_in_rest' => true
	);
	register_post_type('car', $args);

	

	

}
add_action('init','geniuscourses_register_post_type');


function geniuscourses_rewrite_rules(){
	geniuscourses_register_post_type();
	flush_rewrite_rules();
}
add_action('after_switch_theme','geniuscourses_rewrite_rules');