<?php
/*
 * Plugin Name:       LiteSpeed Cache
 * Plugin URI:        https://www.yourportfolio.com
 * Description:       Online course - practice 
 * Version:           1.0
 * Author:            ALex
 * Author URI:        https://www.alexsomedomain.alex
 * License:           GPLv3
 * License URI:       http://www.gnu.org/licenses/gpl.html
 * Text Domain:       litespeed-cache
 * Domain Path:       /lang
 */
 if(!function_exists( 'add_action' ) ) {
     echo 'Hi there I\'m just a plugin, not much I can do when called directly.';
     exit;
 }


require plugin_dir_path(__FILE__) . '/inc/widget-about.php';
require plugin_dir_path(__FILE__) . '/inc/metaboxes.php';
require plugin_dir_path(__FILE__) . '/inc/acf.php';
require plugin_dir_path(__FILE__) . '/inc/custom-post-type.php';