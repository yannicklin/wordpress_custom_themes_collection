<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'astra-theme-css','astra-menu-animation' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

// END ENQUEUE PARENT ACTION


/*=== ShortCode: [theme_author] Get Theme Author ===*/
function twoudia_theme_author( ) {
    return array('theme_name' => __( 'TWOUDIA', 'twoudia' ), 'theme_author_url' => 'https://www.twoudia.com/',);
}
add_filter( 'astra_theme_author', 'twoudia_theme_author', 10, 3 );


if ( ! function_exists( 'is_plugin_active' ) ){
    require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
}

if (is_plugin_active('speed-contact-bar/speed-contact-bar.php')){
	// Passed parameter: a string of CSS
	function msurgery_change_speed_contact_bar_icons ( $list_items ) {
		
		foreach ($list_items as &$value) {			
			$value = str_replace(plugins_url()."/speed-contact-bar/public/assets/images/", get_stylesheet_directory_uri()."/images/", $value);
		}
		unset($value);
		
		return $list_items;
	}
	add_filter( 'speed_contact_bar_data', 'msurgery_change_speed_contact_bar_icons' );
	
	// Passed parameter: a string of CSS
	function msurgery_change_speed_contact_bar_style ( $css_code ) {
		// Adds style for search form, appends it to existing code with '.='
		// The content has to be surrounded by the STYLE element
		$css_code .= "<style type='text/css'>\n";
		$css_code .= "#scb-directs li img { margin-right: 1rem; }\n";
		$css_code .= "</style>\n";

		return $css_code;
	}
	add_filter( 'speed_contact_bar_style', 'msurgery_change_speed_contact_bar_style' );
}




