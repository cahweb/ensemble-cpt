<?php
/*
 *
 * Plugin Name: Common - Ensemble CPT
 * Description: Ensemble CPT Plugin
 * Author: Austin Tindle
 * Version: 0.1.1
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

/* in future plugins, it would be better to declare all custom variables in this file, rather than
 * referencing them in the view */

/* I ran into a problem trying to properly validate the checkbox values from required.php so that
 * more than one day can be selected for a meeting time. The way the system of assigning vars
 * to the $custom array stores other arrays seems to be the wrong way to handle custom metavalues.
 * In the next plugin I will overhaul the cpt-template to get rid of doing it this way,
 * but for now it will be a mix of both methods to get this plugin to work.
 *
 * EDIT: The problem was that update_post_meta serializes the data it seems, so it needed to be
 * unserialized
 */

function ensemble_meta_required() {
	global $post; // Get global WP post var
    $custom = get_post_meta($post->ID); // Set our custom values to an array in the global post var
    $days = unserialize($custom['days']);

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
	update_post_meta($post->ID, "audition", $_POST["audition"]);
	update_post_meta($post->ID, "media", $_POST["media"]);
}

// Keep the markup clean, write a display function for the checkboxes
// This took me almost 2 days to figure out
function ensemble_display_checkboxes() {
	global $post;
	$custom = get_post_custom($post->ID);

	$days = unserialize($custom['days'][0]); // Actually it was this line specifically
	$dayNames = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');

	foreach ($dayNames as $name) {
		// If the name of the day is stored in our custom metavalues, display the checkbox as checked
		// Theres a better way to do all of this, but I haven't learned it yet
		if (in_array($name, $days)) { ?>
			<input type="checkbox" name="days[]" value="<?php echo $name . '"' . 'checked>' . $name ?>
		<?php } else { ?>
			<input type="checkbox" name="days[]" value="<?php echo $name . '">' . $name ?>
		<?php }
	}
}