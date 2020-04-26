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


/******************************
*  Below are modified parts   *
******************************/

add_action( 'after_setup_theme', function() {
	load_child_theme_textdomain('vantage', get_stylesheet_directory());
});

// change top menu link while not in the origin home page
if ( !function_exists( 'trafooco_change_primary_menu_item_link' ) ):
function trafooco_change_primary_menu_item_link($items, $args){
    if(!is_front_page() && 'primary' == $args->theme_location ) {
        foreach($items as $item){
            if ('#' == substr($item->url, 0, 1) )
                $item->url = esc_url( home_url( '/' ) ). '/' .  $item->url;
        }
    }
    return $items;
}
endif;
add_filter('wp_nav_menu_objects', 'trafooco_change_primary_menu_item_link', 10, 2);

// customize woocommerce pages -> remove breadcrumb
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

// customize woocommerce single product page
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 5);

add_action('woocommerce_single_product_summary', function() {
    woocommerce_get_template( 'single-product/tabs/description.php' );
}, 10);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);

// remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
// remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

remove_action('woocommerce_single_variation', 'woocommerce_single_variation', 10);
add_action('woocommerce_before_add_to_cart_button', 'woocommerce_single_variation', 10);

add_filter( 'woocommerce_dropdown_variation_attribute_options_args', function( $args ){
    $args['show_option_none'] = '';
    return $args;
});

add_filter( 'woocommerce_add_error', function( $message ) {
    $message = str_replace('<strong>Billing ', '<strong>'.__( 'Billing', 'woocommerce' ).' ' ,$message );
    $message = str_replace('is a required field.', __( 'is a required field.', 'woocommerce' ) ,$message );
    return $message;
});

add_filter( 'woocommerce_default_address_fields', function ( $address_fields ) {
	
	if ( ICL_LANGUAGE_CODE=='zh-hant' ) {
		$fields['last_name'] = $address_fields['last_name'];
		$fields['last_name']['class'] = array('form-row-first');
		$fields['last_name']['clear'] = false;
		$fields['first_name'] = $address_fields['first_name'];
		$fields['first_name']['class'] = array('form-row-last');
		$fields['first_name']['clear'] = true;

		$fields['email'] = $address_fields['email'];
		$fields['phone'] = $address_fields['phone'];
		//$fields['company'] = $address_fields['company'];
		
		$fields['country'] = $address_fields['country'];
		$fields['country']['class'] = array('form-row-first');
		$fields['state'] = $address_fields['state'];
		$fields['state']['class'] = array('form-row-last');
		$fields['state']['clear'] = true;
		$fields['city'] = $address_fields['city'];
		$fields['city']['required'] = false;
		$fields['city']['class'] = array('form-row-first');
		$fields['postcode']['class'] = array('form-row-last');
		$fields['postcode']['clear'] = true;

		$fields['address_1'] = $address_fields['address_1'];
		//$fields['address_2'] = $address_fields['address_2'];

		
	} else {
		$fields['first_name'] = $address_fields['first_name'];
		$fields['first_name']['class'] = array('form-row-first');
		$fields['first_name']['clear'] = false;
		$fields['last_name'] = $address_fields['last_name'];
		$fields['last_name']['class'] = array('form-row-first');
		$fields['last_name']['clear'] = true;

		$fields['email'] = $address_fields['email'];
		$fields['phone'] = $address_fields['phone'];
		
		$fields['address_1'] = $address_fields['address_1'];
		//$fields['address_2'] = $address_fields['address_2'];

		$fields['city'] = $address_fields['city'];
		$fields['city']['required'] = false;
		$fields['city']['class'] = array('form-row-first');
		$fields['postcode']['class'] = array('form-row-last');
		$fields['postcode']['clear'] = true;

		$fields['country'] = $address_fields['country'];
		$fields['country']['class'] = array('form-row-first');
		$fields['state'] = $address_fields['state'];
		$fields['state']['class'] = array('form-row-last');
		$fields['state']['clear'] = true;
	}

	return $fields;
});

add_filter('woocommerce_states', function($states){
/*
	$states['TW'] = array(
		        '基隆市' => '基隆市',
		        '台北市' => '台北市',
		        '新北市' => '新北市',
		        '宜蘭縣' => '宜蘭縣',
		        '桃園市' => '桃園市',
		        '新竹市' => '新竹市',
		        '新竹縣' => '新竹縣',
		        '苗栗縣' => '苗栗縣',
		        '台中市' => '台中市',
		        '彰化縣' => '彰化縣',
		        '南投縣' => '南投縣',
			
			'雲林縣' => '雲林縣',
		        '嘉義市' => '嘉義市',
		        '嘉義縣' => '嘉義縣',
		        '台南市' => '台南市',

		        '高雄市' => '高雄市',
		        '屏東縣' => '屏東縣',
		        '花蓮縣' => '花蓮縣',
		        '台東縣' => '台東縣',
		        '澎湖縣' => '澎湖縣',
		        '金門縣' => '金門縣',
		        '連江縣' => '連江縣',
			);
*/
	$states['TW'] = array(
		        __( 'Keelung City', 'vantage' ) => 	__( 'Keelung City', 'vantage' ),
		        __( 'Taipei City', 'vantage' ) 	=> 	__( 'Taipei City', 'vantage' ),
		        __( 'New Taipei City', 'vantage' ) => 	__( 'New Taipei City', 'vantage' ),
		        __( 'Yilan County', 'vantage' ) => 	__( 'Yilan County', 'vantage' ),
		        __( 'Taoyuan City', 'vantage' ) => 	__( 'Taoyuan City', 'vantage' ),
		        __( 'Hsinchu City', 'vantage' ) => 	__( 'Hsinchu City', 'vantage' ),
		        __( 'Hsinchu County', 'vantage' ) => 	__( 'Hsinchu County', 'vantage' ),
		        __( 'Miaoli County', 'vantage' ) => 	__( 'Miaoli County', 'vantage' ),
		        __( 'Taichung City', 'vantage' ) => 	__( 'Taichung City', 'vantage' ),
		        __( 'Changhua County', 'vantage' ) => 	__( 'Changhua County', 'vantage' ),
		        __( 'Nantou County', 'vantage' ) => 	__( 'Nantou County', 'vantage' ),
		        __( 'Yunlin County', 'vantage' ) => 	__( 'Yunlin County', 'vantage' ),
		        __( 'Chiayi City', 'vantage' ) => 	__( 'Chiayi City', 'vantage' ),
		        __( 'Chiayi County', 'vantage' ) => 	__( 'Chiayi County', 'vantage' ),
		        __( 'Tainan City', 'vantage' ) => 	__( 'Tainan City', 'vantage' ),
		        __( 'Kaohsiung City', 'vantage' ) => 	__( 'Kaohsiung City', 'vantage' ),
		        __( 'Pingtung County', 'vantage' ) => 	__( 'Pingtung County', 'vantage' ),
		        __( 'Hualien County', 'vantage' ) => 	__( 'Hualien County', 'vantage' ),
		        __( 'Taitung County', 'vantage' ) => 	__( 'Taitung County', 'vantage' ),
		        __( 'Penghu County', 'vantage' ) => 	__( 'Penghu County', 'vantage' ),
		        __( 'Kinmen County', 'vantage' ) => 	__( 'Kinmen County', 'vantage' ),
		        __( 'Lienchiang County', 'vantage' ) => __( 'Lienchiang County', 'vantage' ),
			);
	return $states;
});

// customize login page
add_filter( 'login_headerurl', function() {
    return home_url();
});

add_filter( 'login_headertitle', function() {
    return __('TRAFOOCO BACKEND ADMIN PANEL', 'vantage');
} );

function trafooco_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/../../uploads/2016/08/trafooco-logo-bottom.png);
            background-size: 128px 78px;
            height: 78px;
            width: 128px;
            padding-bottom: 20px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'trafooco_login_logo' );