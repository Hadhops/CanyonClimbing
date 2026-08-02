<?php


/*
* File to keep all posts and taxonomies in
*/

add_action( 'init', 'cp_change_post_object' );
// Change dashboard Posts to News
function cp_change_post_object() {
    $get_post_type = get_post_type_object('post');
    $labels = $get_post_type->labels;
        $labels->name = 'News';
        $labels->singular_name = 'News';
        $labels->add_new = 'Add News';
        $labels->add_new_item = 'Add News';
        $labels->edit_item = 'Edit News';
        $labels->new_item = 'News';
        $labels->view_item = 'View News';
        $labels->search_items = 'Search News';
        $labels->not_found = 'No News found';
        $labels->not_found_in_trash = 'No News found in Trash';
        $labels->all_items = 'All News';
        $labels->menu_name = 'News';
        $labels->name_admin_bar = 'News';
}


// Register Custom Event
function events_post_type_generate() {

	$labels = array(
		'name'                  => _x( 'Events', 'Event General Name', 'canyon' ),
		'singular_name'         => _x( 'Event', 'Event Singular Name', 'canyon' ),
		'menu_name'             => __( 'Events', 'canyon' ),
		'name_admin_bar'        => __( 'Event', 'canyon' ),
		'archives'              => __( 'Item Archives', 'canyon' ),
		'parent_item_colon'     => __( 'Parent Item:', 'canyon' ),
		'all_items'             => __( 'All Items', 'canyon' ),
		'add_new_item'          => __( 'Add New Item', 'canyon' ),
		'add_new'               => __( 'Add New', 'canyon' ),
		'new_item'              => __( 'New Item', 'canyon' ),
		'edit_item'             => __( 'Edit Item', 'canyon' ),
		'update_item'           => __( 'Update Item', 'canyon' ),
		'view_item'             => __( 'View Item', 'canyon' ),
		'search_items'          => __( 'Search Item', 'canyon' ),
		'not_found'             => __( 'Not found', 'canyon' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'canyon' ),
		'featured_image'        => __( 'Featured Image', 'canyon' ),
		'set_featured_image'    => __( 'Set featured image', 'canyon' ),
		'remove_featured_image' => __( 'Remove featured image', 'canyon' ),
		'use_featured_image'    => __( 'Use as featured image', 'canyon' ),
		'insert_into_item'      => __( 'Insert into item', 'canyon' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'canyon' ),
		'items_list'            => __( 'Items list', 'canyon' ),
		'items_list_navigation' => __( 'Items list navigation', 'canyon' ),
		'filter_items_list'     => __( 'Filter items list', 'canyon' ),
	);
	$rewrite = array(
		'slug'                  => 'events',
		'with_front'            => false,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Event', 'canyon' ),
		'description'           => __( 'Events', 'canyon' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', ),
		'taxonomies'            => array( 'events_categories' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-calendar',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'post',
	);
	register_post_type( 'events', $args );

}
add_action( 'init', 'events_post_type_generate', 0 );



// Register Custom Event Category
function events_cat_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Event Categories', 'Event Category General Name', 'canyon' ),
		'singular_name'              => _x( 'Event Category', 'Event Category Singular Name', 'canyon' ),
		'menu_name'                  => __( 'Event Category', 'canyon' ),
		'all_items'                  => __( 'All Items', 'canyon' ),
		'parent_item'                => __( 'Parent Item', 'canyon' ),
		'parent_item_colon'          => __( 'Parent Item:', 'canyon' ),
		'new_item_name'              => __( 'New Item Name', 'canyon' ),
		'add_new_item'               => __( 'Add New Item', 'canyon' ),
		'edit_item'                  => __( 'Edit Item', 'canyon' ),
		'update_item'                => __( 'Update Item', 'canyon' ),
		'view_item'                  => __( 'View Item', 'canyon' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'canyon' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'canyon' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'canyon' ),
		'popular_items'              => __( 'Popular Items', 'canyon' ),
		'search_items'               => __( 'Search Items', 'canyon' ),
		'not_found'                  => __( 'Not Found', 'canyon' ),
		'no_terms'                   => __( 'No items', 'canyon' ),
		'items_list'                 => __( 'Items list', 'canyon' ),
		'items_list_navigation'      => __( 'Items list navigation', 'canyon' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'events_categories', array( 'events' ), $args );

}
add_action( 'init', 'events_cat_taxonomy', 0 );



// Register Custom Post Type Publications
function publications_post_type_generate() {

	$labels = array(
		'name'                  => _x( 'Publications', 'Event General Name', 'canyon' ),
		'singular_name'         => _x( 'Publication', 'Event Singular Name', 'canyon' ),
		'menu_name'             => __( 'Publications', 'canyon' ),
		'name_admin_bar'        => __( 'Publication', 'canyon' ),
		'archives'              => __( 'Item Archives', 'canyon' ),
		'parent_item_colon'     => __( 'Parent Item:', 'canyon' ),
		'all_items'             => __( 'All Items', 'canyon' ),
		'add_new_item'          => __( 'Add New Item', 'canyon' ),
		'add_new'               => __( 'Add New', 'canyon' ),
		'new_item'              => __( 'New Item', 'canyon' ),
		'edit_item'             => __( 'Edit Item', 'canyon' ),
		'update_item'           => __( 'Update Item', 'canyon' ),
		'view_item'             => __( 'View Item', 'canyon' ),
		'search_items'          => __( 'Search Item', 'canyon' ),
		'not_found'             => __( 'Not found', 'canyon' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'canyon' ),
		'featured_image'        => __( 'Featured Image', 'canyon' ),
		'set_featured_image'    => __( 'Set featured image', 'canyon' ),
		'remove_featured_image' => __( 'Remove featured image', 'canyon' ),
		'use_featured_image'    => __( 'Use as featured image', 'canyon' ),
		'insert_into_item'      => __( 'Insert into item', 'canyon' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'canyon' ),
		'items_list'            => __( 'Items list', 'canyon' ),
		'items_list_navigation' => __( 'Items list navigation', 'canyon' ),
		'filter_items_list'     => __( 'Filter items list', 'canyon' ),
	);
	$rewrite = array(
		'slug'                  => 'publications',
		'with_front'            => false,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Publication', 'canyon' ),
		'description'           => __( 'Publications', 'canyon' ),
		'labels'                => $labels,
		'supports'              => array( 'title',  'excerpt', 'thumbnail'),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-book-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'post',
	);
	register_post_type( 'publications', $args );

}
add_action( 'init', 'publications_post_type_generate', 0 );