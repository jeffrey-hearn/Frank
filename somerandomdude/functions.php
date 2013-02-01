<?php
#add_action('wp_enqueue_scripts', 'frank_enqueue_scripts');
#add_action('wp_enqueue_scripts', 'frank_enqueue_scripts');

require_once('admin/srd-theme-options.php');
if (!is_admin()) {  
	add_action('init', 'frank_enqueue_scripts');
	add_action('init', 'frank_enqueue_styles');  
}  

function frank_init() {
	wp_deregister_script( 'l10n' );
}

function frank_theme_options() {
	frank_build_settings_page();
}

function frank_enqueue_scripts() {
	
	global $wp_scripts;
	
	wp_register_script('somerandomdude', (get_stylesheet_directory_uri().'/js/somerandomdude.js'), false, '1.0', true);
	wp_enqueue_script('somerandomdude');
	
	$frank_general = get_option( '_frank_options' );
}



function frank_enqueue_styles() {
	
	global $wp_styles;
	
	wp_register_style('frank_srd_stylesheet', get_stylesheet_directory_uri().'/style.css', null, '0.1', 'all' );
	
	wp_register_style('frank_srd_stylesheet_ie', get_stylesheet_directory_uri().'/ie.css', null, '0.1', 'all' );
	wp_register_style('frank_srd_stylesheet_ie7', get_stylesheet_directory_uri().'/ie7.css', null, '0.1', 'all' );
	
	$wp_styles->add_data('frank_srd_stylesheet_ie', 'conditional', 'IE');
	$wp_styles->add_data('frank_srd_stylesheet_ie7', 'conditional', 'IE 7');
	
	wp_enqueue_style('frank_srd_stylesheet');
	wp_enqueue_style('frank_srd_stylesheet_ie');
	wp_enqueue_style('frank_srd_stylesheet_ie7');
	
}

?>