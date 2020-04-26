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

//===========================================================//
//===========================================================//
/**
 * Add some plugins to TGM plugin activation
 */
function tmp_remove_vantage_recommended_plugins() {
    remove_action( 'tgmpa_register', 'vantage_recommended_plugins' );
}
add_action( 'after_setup_theme', 'tmp_remove_vantage_recommended_plugins', 20 ); 


/**
 * remove width & height attributes from images
 */
function tmp_img_width_height_attrs($html) {	
	return preg_replace('/(width|height)="\d+"\s/', "", $html);
}
add_filter('post_thumbnail_html', 'tmp_img_width_height_attrs');


/**
 * Goolge Map Key API
 */
function tmp_google_map_api_acf_pro() {	
	acf_update_setting('google_api_key', 'AIzaSyBLsycO8KnUvclV09T-FRirVv0_KASbJEk');
}
add_action('acf/init', 'tmp_google_map_api_acf_pro');


/**
 * Change Vantage Grid Loop Image Spec
 */
function tmp_vantage_grid_image_no_crop(){
	remove_image_size( 'vantage-grid-loop' );
	add_image_size( 'vantage-grid-loop', 400, 400, false );
}
add_action( 'init', 'tmp_vantage_grid_image_no_crop', 50 );