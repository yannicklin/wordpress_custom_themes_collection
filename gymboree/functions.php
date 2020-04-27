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

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'font-awesome' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// END ENQUEUE PARENT ACTION

/* CUSTOM JS Insert */
add_action( 'wp_enqueue_scripts', 'gym_js_scripts' );
function gym_js_scripts() {
   wp_enqueue_script( 'gymboree', get_stylesheet_directory_uri() . '/theme.js', array( 'jquery' ), false, true );
}

/* CUSTOMIZER Section */
function gym_wp_customizer_section_update() {     
	global $wp_customize;
	$wp_customize->remove_section( 'zakra_customize_upsell_section' );  //Modify this line as needed  
}
add_action( 'customize_register', 'gym_wp_customizer_section_update', 11 );

/* ADMIN Side Panel Section */
function gym_wp_admin_menu_page_update() {
    remove_submenu_page('themes.php', 'zakra-about');
}
add_action( 'admin_init', 'gym_wp_admin_menu_page_update' );

/* Change Zakra Post Read More Text */
if ( ! function_exists( 'zakra_post_readmore' ) ) :
	/**
	 * Post read more HTML.
	 *
	 * @param string $readmore_alignment CSS class.
	 */
	function zakra_post_readmore( $readmore_alignment ) {
		?>
		<div class="<?php zakra_css_class( 'zakra_read_more_wrapper_class' ); ?> tg-text-align--<?php echo esc_attr(
			$readmore_alignment ); ?>">
			<a href="<?php the_permalink(); ?>" class="tg-read-more">
				<?php echo apply_filters( 'gymboree_read_more_text', esc_html__( 'Read More &raquo;', 'gymboree' ) ); // WPCS: XSS OK. ?></a>
		</div>
		<?php
	}
endif;

/* Change Expert Length */
apply_filters( 'excerpt_length', 100 );

/* Ensure the Responsive Video Play */
add_theme_support( 'responsive-embeds' );
