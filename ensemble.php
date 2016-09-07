<?php

/*
 *
 * Plugin Name: Common - Ensemble CPT
 * Description: Ensemble CPT Plugin
 * Author: Austin Tindle
 *
 */
// Uncomment to show errors

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// Settings array. This is so I can retrieve predefined wp_editor() settings to keep the markup clean
$settings = array (
	'sm' => array('textarea_rows' => 3),
	'md' => array('textarea_rows' => 6),
);

// Load our CSS
function ensemble_load_plugin_css() {
    wp_enqueue_style( 'ensemble-plugin-style', plugin_dir_url(__FILE__) . 'css/style.css');
}


/* Custom Post Type ------------------- */

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
	add_meta_box("ensemble-audition-meta", "How to Audition", "ensemble_meta_audition", "ensemble", "normal", "low");
	add_meta_box("ensemble-media-meta", "Media", "ensemble_meta_media", "ensemble", "normal", "low");
}

// Meta box functions
// Required
function ensemble_meta_required() {
	global $post; // Get global WP post var
    $custom = get_post_custom($post->ID); // Set our custom values to an array in the global post var
    $days = $custom['days'][0];

    // Form markup 
    include_once('views/required.php');
}

// How to audition
function ensemble_meta_audition() {
	global $post;
	global $settings;
	$custom = get_post_custom($post->ID);

	wp_editor($custom['audition'][0], 'audition', $settings['sm']);
}

// Media
function ensemble_meta_media() {
	global $post;
	global $settings;
	$custom = get_post_custom($post->ID);

	wp_editor($custom['media'][0], 'media', $settings['sm']);
}

// Save our variables
function save_ensemble() {
	global $post;

	update_post_meta($post->ID, "contact_name", $_POST["contact_name"]);
	update_post_meta($post->ID, "contact_tel", $_POST["contact_tel"]);
	update_post_meta($post->ID, "contact_email", $_POST["contact_email"]);
	update_post_meta($post->ID, "contact_address", $_POST["contact_address"]);
	update_post_meta($post->ID, "start_time", $_POST["start_time"]);
	update_post_meta($post->ID, "end_time", $_POST["end_time"]);
	update_post_meta($post->ID, "course_number", $_POST["course_number"]);
	update_post_meta($post->ID, "status", $_POST["status"]);
	update_post_meta($post->ID, "type", $_POST["type"]);
	update_post_meta($post->ID, "days", $_POST["days"]);

}

?>