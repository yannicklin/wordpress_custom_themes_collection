<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// END ENQUEUE PARENT ACTION

function cg_adding_scripts() {
    wp_register_script('cg_onepage_section', get_stylesheet_directory_uri() . '/onepageSection.js', array('jquery'), null, true);
    wp_enqueue_script('cg_onepage_section');
} 
add_action( 'wp_enqueue_scripts', 'cg_adding_scripts', 10 ); 

