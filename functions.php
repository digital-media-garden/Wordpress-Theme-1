<?php
/**
 * Geniuscourses functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Geniuscourses
 */


require get_template_directory() . '/inc/widget-about.php';
//require get_template_directory() . '/inc/metaboxes.php';
require get_template_directory() . '/inc/metaboxes.php';
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require get_template_directory() . '/inc/redux-options.php';

add_action( 'tgmpa_register', 'geniuscourses_register_required_plugins' );



function geniuscourses_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin bundled with a theme.
		array(
			'name'               => 'Geniusourses Core', // The plugin name.
			'slug'               => 'geniusourses-core', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/plugins/geniuscourses-core.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
		),

		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Advanced Custom Fields',
			'slug'      => 'advanced-custom-fields',
			'required'  => true,
		),

		array(
			'name'      => 'Gutenberg Template and Pattern Library & Redux Framework',
			'slug'      => 'redux-framework',
			'required'  => true,
		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'geniuscourses',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}






function geniuscourses_paginate($query){

	$big = 999999999; // need an unlikely integer

	$paged ='';
	if(is_singular()) {
		$paged = get_query_var('page');
	} else {
		$paged = get_query_var('paged');
	}


	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, $paged ),
		'total' => $query->max_num_pages,
		'prev_next' => false,
	) );
}




function geniuscourses_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'geniuscourses' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'geniuscourses' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Car Pages Sidebar', 'geniuscourses' ),
			'id'            => 'carsidebar',
			'description'   => esc_html__( 'Appear as a sidebar on Car pages.', 'geniuscourses' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	
	register_widget('geniuscourses_about_widget');
}
add_action( 'widgets_init', 'geniuscourses_widgets_init' );




 function geniuscourses_enqueue_scripts(){
	wp_enqueue_style('geniuscourses-general', get_template_directory_uri().'/assets/css/general.css', array(), '1.0', 'all');

	wp_enqueue_script('geniuscourses-script', get_template_directory_uri().'/assets/js/script.js', array('jquery'), '1.0', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
 }
 add_action('wp_enqueue_scripts', 'geniuscourses_enqueue_scripts');



/* How HOOKS work: 
function geniuscourses_show_meta(){
	echo "<meta name='author' content='CRIC0VA' >";
}
add_action('wp_head', 'geniuscourses_show_meta');
*/

function geniuscourses_theme_init(){

	register_nav_menus(array(
		'header_nav' => 'Header Navigation',
		'footer_nav' => 'Footer Navigation'
	));

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	/*
	* Enable support for Post Thumbnails on posts and pages.
	* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	*/
		
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'car-cover', 240, 188, true );
	//WP reserved: thumb, thumbnail, medium, large, post-thumbnail

	update_option('thumbnail_size_w', 170);
	update_option('thumbnail_size_h', 170);
	update_option('thumbnail_crop', 1);

	set_post_thumbnail_size(170,170);



	add_theme_support('post-formats',
		array(
			'video',
			'quote',
			'image',
			'gallery'
		));
	
		add_post_type_support('car','post-formats');

} // END INIT FUNCTION -  function geniuscourses_theme_init

add_action('after_setup_theme','geniuscourses_theme_init', 0);



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
		'rewrite' => array('slug' => 'brands'),
		'query_var' => true,
		'show_admin_column' => true, //show under taxonomy in admin
		'show_in_rest' => true, //show this taxonomy when editing post 

	);

	if(!taxonomy_exists('brand')) {
		
		register_taxonomy('brand', array('car'), $args);

	}

	//register_taxonomy('brand', array('car'), $args);

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
		'rewrite' => array('slug' => 'manufactures'),
		'query_var' => true,
		'show_admin_column' => true, //show under taxonomy in admin
		'show_in_rest' => true,
	);

	register_taxonomy('manufacture', array('car'), $args);

	unset($args);




	//code TO REGISTER POST TYPE - CARS
	$args = array(
		'label' => esc_html__('Cars', 'geniuscourses'),
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
		'supports' => array('title', 'editor', 'author', 'exerpt', 'comments', 'revisions', 'page-attributes', 'post-formats', 'thumbnail'),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'has_archive' => true,
		'show_in_nav_menus' => false,
		'show_in_admin_bar' => false,
		'menu_position' => 100,
		'menu_icon' => 'dashicons-welcome-write-blog',
		'rewrite' => array('slug' => 'cars'),
		'show_in_rest' => true

	);
	register_post_type('car', $args);

} // END FUNCTION  geniuscourses_register_post_type // 
add_action('init', 'geniuscourses_register_post_type');




// this will be moved to a different file in Список хуков WordPress

function geniuscourses_rewrite_rules(){
	geniuscourses_register_post_type();
	flush_rewrite_rules();
}
add_action('after_switch_theme', 'geniuscourses_rewrite_rules');



function geniuscourses_custom_search($form){
	$form = "html for form";

	return $form;
}
add_filter('get_search_form','geniuscourses_custom_search');





if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function geniuscourses_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Geniuscourses, use a find and replace
		* to change 'geniuscourses' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'geniuscourses', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );


	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/


	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'geniuscourses_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'geniuscourses_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function geniuscourses_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'geniuscourses_content_width', 640 );
}
add_action( 'after_setup_theme', 'geniuscourses_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


// Explaining WP Actions/Hooks - see header.php
// function gc_first_function(){
// 	echo 'Hello World<br>';
// }
// add_action('geniuscourses_our_hook', 'gc_first_function',2);


// function gc_second_function(){
// 	echo 'test<br>';
// }
// add_action('geniuscourses_our_hook', 'gc_second_function',1);

// How to remove filters and actions:
// remove_filter('geniuscourses_first_filter', 'gc_first_filter');
// remove_action('hook', 'action');