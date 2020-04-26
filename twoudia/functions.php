<?php

// enqueue the child theme stylesheet
Function wp_schools_enqueue_scripts() {
wp_register_style( 'childstyle', get_stylesheet_directory_uri() . '/style.css'  );
wp_enqueue_style( 'childstyle' );
}
add_action( 'wp_enqueue_scripts', 'wp_schools_enqueue_scripts', 11);

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

// END ENQUEUE PARENT ACTION


// MANUAL ADDED - REMOVE WPML & VISUAL COMPOSER HEAD META GENERATOR //
add_action( 'after_setup_theme', 'twoudia_theme_locale' );
function twoudia_theme_locale() {
	load_child_theme_textdomain( 'qode', get_stylesheet_directory() . '/languages' );
}

// MANUAL ADDED - REMOVE WPML & VISUAL COMPOSER HEAD META GENERATOR //
add_action('init', 'remove_vs_wpml_metas', 100);
function remove_vs_wpml_metas() {
    global $sitepress;
    remove_action('wp_head', array( $sitepress, 'meta_generator_tag' ) );
	if ( is_plugin_active( 'plugin-directory/plugin-file.php' ) ) {
  		remove_action('wp_head', array(visual_composer(), 'addMetaData'));
	}
}

// MANUAL ADDED - MOBILE APP REDIRECT FUNCTION //

// https://www.twoudia.com/mobileapp-redirect?app=fimexproductcategory //
// https://www.twoudia.com/mobileapp-redirect?app=chineselearninfo //
	
Function TW_MOBILEAPP_REDIRECT() {
	$redirectURL = $AndroidAPP = $iOSAPP = '';
	if (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === '/mobileapp-redirect'){
		
		switch(strtoupper($_GET["app"])){
			case 'CHINESELEARNINFO':
				$AndroidAPP = 'ChineseLearnInfo';
				$WEBURI = 'app-chinese-learn-info/';
				break;
			case 'FIMEXPRODUCTCATEGORY':
				$iOSAPP = 'fimex-product-category/id1084698788';
				$AndroidAPP = 'FIMEX.ProductCategory';
				$WEBURI = 'app-fimex-product-category/';
				break;
			default:
				break;
		}
		
		// Include and instantiate the class.
		require_once 'Mobile_Detect.php';
		$detect = new Mobile_Detect;
		
		// Check for a specific platform with the help of the magic methods:
		if ($_GET["app"] <> ''){
			if( $detect->isiOS() ){
				$redirectURL='https://geo.itunes.apple.com/app/' . $iOSAPP;
			}else if ($detect->isAndroidOS()){
				$redirectURL='market://details?id=com.twoudia.' . $AndroidAPP;
			}else {
				$redirectURL='https://www.twoudia.com/activities/' . $WEBURI;
			}
		}
		
		if($redirectURL == ''){return null;}else{
			header('Location: ' . $redirectURL, false, 302);
			die();
		}
	}
}

add_action( 'init', 'TW_MOBILEAPP_REDIRECT' );

// CUSTOMIZE LOGIN PAGE
add_filter( 'login_headerurl', function() {
    return home_url();
});

add_filter( 'login_headertitle', function() {
    return 'TWOUDIA SECRET GARDEN DOOR';
} );

function TW_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/../../uploads/2015/10/twoudia-logo-144.png);
            background-size: 144px;
            height: 144px;
            width: 144px;
            padding-bottom: 0px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'TW_login_logo' );

