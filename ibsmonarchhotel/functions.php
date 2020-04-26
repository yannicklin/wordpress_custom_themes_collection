<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

        
if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css' );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css' );

// END ENQUEUE PARENT ACTION

// REPLACE LOGO FOR MOBILE SMALL USE
add_action('wp_head', 'ibs_logo_mobile_replace');

function ibs_logo_mobile_replace(){
?>
<script>
jQuery( document ).ready( function( $ ) {

   function change_image_res() {

       if ( $( window ).width() < 600 ) { //which means 37.5em at most environments
           $( '#site-title a img.logo' ).attr( "src", '/wp-content/uploads/2016/01/ibs-logo-dark.jpg' );
       } else {
           $( '#site-title a img.logo' ).attr( "src", '/wp-content/uploads/2016/01/logo-banner.jpg' );
       }
   }

   $( window ).load( function() {
       change_image_res();
   } );

   $( window ).resize( function() {
       change_image_res();
   } );

} );
</script>
<?php
}
?>