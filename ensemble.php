<?php

/*
 *
 * Plugin Name: Common - Ensemble CPT
 * Description: Ensemble CPT Plugin
 * Author: Austin Tindle
 *
 */

// Settings array. This is so I can retrieve predefined wp_editor() settings to keep the markup clean
$settings = array (
	'sm' => array('textarea_rows' => 3),
	'md' => array('textarea_rows' => 6),
);

/* Custom Post Type ------------------- */

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// Load our CSS
function ensemble_load_plugin_css() {
    wp_enqueue_style( 'ensemble-plugin-style', plugin_dir_url(__FILE__) . 'css/style.css');
}
add_action( 'admin_enqueue_scripts', 'ensemble_load_plugin_css' );

// Add create function to init
add_action('init', 'create_ensemble_type');

// Create the custom post type and register it
function create_ensemble_type() {
	$args = array(
	      'label' => 'Ensembles',
	        'public' => true,
	        'show_ui' => true,
	        'capability_type' => 'post',
	        'hierarchical' => false,
	        'rewrite' => array('slug' => 'ensemble'),
			'menu_icon'  => 'dashicons-album',
	        'query_var' => true,
	        'supports' => array(
	            'title',
	            'thumbnail',
	            'editor')
	    );
	register_post_type( 'ensemble' , $args );
}

add_action("admin_init", "ensemble_init");
add_action('save_post', 'save_ensemble');

// Add the meta boxes to our CPT page
function ensemble_init() {
	add_meta_box("ensemble-required-meta", "Required Information", "ensemble_meta_required", "ensemble", "normal", "high");
}

// Meta box functions
function ensemble_meta_required() {
	global $post; // Get global WP post var
    $custom = get_post_custom($post->ID); // Set our custom values to an array in the global post var

    // Form markup 
    include_once('views/required.php');
}

// Save our variables
function save_ensemble() {
	global $post;

	update_post_meta($post->ID, "ensemble", $_POST["ensemble"]);
}


?>