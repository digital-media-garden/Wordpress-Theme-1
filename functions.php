<?php
/**
 * Geniuscourses functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Geniuscourses
 */


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
	
}
add_action( 'widgets_init', 'geniuscourses_widgets_init' );




 function geniuscourses_enqueue_scripts(){
	wp_enqueue_style('geniuscourses-font-awesome','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css', array(), '1.0', 'all');
	wp_enqueue_style('owl.carousel', get_template_directory_uri().'/assets/js/lib/owlcarousel/assets/owl.carousel.min.css', array(), '1.0', 'all');
	wp_enqueue_style('tempusdominus-bootstrap-4', get_template_directory_uri().'/assets/js/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css', array(), '1.0', 'all');
	wp_enqueue_style('geniuscourses-bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), '1.0', 'all');
	wp_enqueue_style('geniuscourses-style', get_template_directory_uri().'/assets/css/style.css', array(), '1.0', 'all');


	wp_enqueue_script('geniuscourses-script', get_template_directory_uri().'/assets/js/script.js', array('jquery'), '1.0', true);
	wp_enqueue_script('bootstrap.bundle', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('easing', get_template_directory_uri().'/assets/js/lib/easing/easing.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('waypoints', get_template_directory_uri().'/assets/js/lib/waypoints/waypoints.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('owl.carousel', get_template_directory_uri().'/assets/js/lib/owlcarousel/owl.carousel.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('moment', get_template_directory_uri().'/assets/js/lib/tempusdominus/js/moment.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('moment-timezone', get_template_directory_uri().'/assets/js/lib/tempusdominus/js/moment-timezone.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('tempusdominus-bootstrap-4', get_template_directory_uri().'/assets/js/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('geniuscourses-main', get_template_directory_uri().'/assets/js/main.js', array('jquery'), '1.0', true);

	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
 }
 add_action('wp_enqueue_scripts', 'geniuscourses_enqueue_scripts');


function geniuscourses_ajax_example(){
	if(!wp_verify_nonce($_REQUEST['nonce'], 'ajax-nonce')){
		die;
	}

	if(isset($_REQUEST['string_one'])){
		echo $_REQUEST['string_one'];
	}

	echo "<br>";

	if(isset($_REQUEST['string_two'])){
		echo $_REQUEST['string_two'];
	}

	$cars = new WP_Query(array('post-type'=>'car','posts_per_page'=>-1));
	
	if($cars->have_posts()) : while($cars->have_posts()) : $cars->the_post();  
    
	get_template_part('partials/content', 'car');

    endwhile;  endif; 

	wp_reset_postdata(); 

	die;

}
add_action('wp_ajax_geniuscourses_ajax_example', 'geniuscourses_ajax_example');
add_action('wp_ajax_nopriv_geniuscourses_ajax_example', 'geniuscourses_ajax_example');




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


	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );


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



function geniuscourses_custom_search($form){
	$form = "html for form";

	return $form;
}
add_filter('get_search_form','geniuscourses_custom_search');


//add_action( 'after_setup_theme', 'geniuscourses_setup' ); //? delete this?


function geniuscourses_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'geniuscourses_content_width', 640 );
}
add_action( 'after_setup_theme', 'geniuscourses_content_width', 0 );






function gc_add_class_on_li($classes,$item,$args){
	if(isset($args->add_li_class)){
		$classes[] = $args->add_li_class;
	}
	return $classes;
}
add_filter('nav_menu_css_class','gc_add_class_on_li',1,3);