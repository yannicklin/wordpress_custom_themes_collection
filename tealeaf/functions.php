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

// Load Theme Translate (Vantage) from child theme
function twoudia_theme_vantage_set_text_domain(){
	load_theme_textdomain( 'vantage', get_stylesheet_directory() . '/languages' );
}
add_action('after_setup_theme', 'twoudia_theme_vantage_set_text_domain', 15);

// Add custom Map Maker for WPSL (Wordpress Store Locator)
add_filter( 'wpsl_admin_marker_dir', 'twoudia_admin_marker_dir' );
function twoudia_admin_marker_dir() {
    $admin_marker_dir = get_stylesheet_directory() . '/wpsl-markers/';
    return $admin_marker_dir;
}
define( 'WPSL_MARKER_URI', dirname( get_bloginfo( 'stylesheet_url') ) . '/wpsl-markers/' );

// Let each store can accept comments (WP Store Locator)
add_filter( 'wpsl_post_type_args', 'twoudia_accept_store_comments' );
function twoudia_accept_store_comments( $args ) {
    $args['supports'] = array( 'title', 'editor', 'author', 'excerpt', 'revisions', 'thumbnail', 'comments' );
    return $args;
}

// Change Single Store Layout to full-width (WP Store Locator)
add_filter( 'body_class', 'twoudia_single_store_body_class' );
function twoudia_single_store_body_class( $classes ) {
  if ( is_singular( 'wpsl_stores' ) ) {
        $classes[] = 'page-template-templatestemplate-full-php';
    }
  return $classes;
}

// Change excerpt length to 150 for Chinese display
add_filter('excerpt_length', 'twoudia_custom_excerpt_length', 10, 1);
function twoudia_custom_excerpt_length( $length ){
	if ('zh-' == substr(ICL_LANGUAGE_CODE, 0, 3)){
		return 200;
	}else{
		return $length;
	}
}