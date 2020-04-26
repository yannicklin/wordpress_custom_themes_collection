<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

// BEGIN ENQUEUE PARENT ACTION

if (!function_exists('chld_thm_cfg_parent_css')):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style('chld_thm_cfg_parent', get_template_directory_uri() . '/style.css'); 
    }
endif;
add_action('wp_enqueue_scripts', 'chld_thm_cfg_parent_css');

// END ENQUEUE PARENT ACTION



/* ================================== *
 *    General Function Debug Log      *
 * ================================== */
function chineselearn_function_debug_log($message, $function) {
	$logpath = get_stylesheet_directory().'/debug.log';
	$output = 'ERROR From Func: '.$function .PHP_EOL;
	$output .= $message.' @ '.date("Y/mm/dd h:i:sa").PHP_EOL;
	error_log($output, 3, $logpath);
}



/* ================================== *
 *    Load Custom JS Script      *
 * ================================== */
add_action( 'wp_enqueue_scripts', 'chineselearn_add_custom_js_files' );
function chineselearn_add_custom_js_files() {
    wp_enqueue_script('chineselearn_custom', get_stylesheet_directory_uri() . '/chineselearn.js', array('jquery'));
}



/* =========================================== *
 *    Force to use GD rather than Imagick      *
 * =========================================== */
add_filter( 'wp_image_editors', 'chineselearn_force_to_use_GD' );
function chineselearn_force_to_use_GD($array) {
    return array( 'WP_Image_Editor_GD', 'WP_Image_Editor_Imagick' );
}



/* =========================================== *
 *    Custom Trim Functon for all Excerpt      *
 * =========================================== */
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'chineselearn_custom_excerpt_trim');
function chineselearn_custom_excerpt_trim($text) {
// Creates an excerpt if needed; and shortens the manual excerpt as well
	global $post;
	$raw_excerpt = $text;
	if ( '' == $text ) {
		$text = get_the_content('');
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
	}
	$text = strip_tags($text);
	
	if ('zh-hant' == ICL_LANGUAGE_CODE){
		$excerpt_length = apply_filters('excerpt_length', 50);
	}else{
		$excerpt_length = apply_filters('excerpt_length', 80);
	}
	
	$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
	$text = wp_trim_words( $text, $excerpt_length, $excerpt_more ); //since wp3.3
	return apply_filters('wp_trim_excerpt', $text, $raw_excerpt); //since wp3.3
}


 
/* =========================================================== *
 *    Date Fields in Formdiable Pro (Weekend Unavailable)      *
 * =========================================================== */	
add_action('frm_date_field_js', 'chineselearn_date_field_weekend_unavailable');
function chineselearn_date_field_weekend_unavailable($field_id){
  $date_fields_array = array("y7gyw", "y7gyw2");//change FIELDKEY to the key of your date field
  
  if(in_array(str_replace("field_", "", $field_id) , $date_fields_array)) { 
    echo ',beforeShowDay: function(date){var day=date.getDay();return [(0 != day && 6 != day)];}';
  }
}



/* ============================================================ *
 *    Date Fields in Formdiable Pro (Within 30 Days Range)      *
 * ============================================================ */	
add_action('frm_date_field_js', 'chineselearn_date_field_within_30_days_range');
function chineselearn_date_field_within_30_days_range($field_id){
  $date_fields_array = array("y7gyw", "y7gyw2");//change FIELDKEY to the key of your date field
  
  if(in_array(str_replace("field_", "", $field_id) , $date_fields_array)) { 
    echo ',minDate:+1,maxDate:+30';
  }
}



/* ======================================================================= *
 *    Date Fields in Formdiable Pro (Default as x Days after Current)      *
 * ======================================================================= */	
add_filter('frm_get_default_value', 'chineselearn_set_default_as_days_after_current', 10, 3);
function chineselearn_set_default_as_days_after_current($new_value, $field){
  	$date_fields_array = array(99, 117);//change to the ID of your date field
  	$days_after = 1; // One Day after
  
	if(in_array($field->id , $date_fields_array)) { 
	  	$new_value = strtotime("+". $days_after ." day");
		$new_value = date("d/m/Y", $new_value);
	}
	return $new_value;
}



/* ===================================================== *
 *    reCaptcha Fields in Formdiable Pro (Language)      *
 * ===================================================== */	
add_filter('frm_recaptcha_lang', 'chineselearn_recaptcha_lang_change', 10, 2);
function recaptcha_lang_change($lang, $field){
  $recaptcha_fields_array_zhTW = array("62n6q33", "62n6q342"); //change ID to the key of recaptcha field
  
  if(in_array($field['field_key'] , $recaptcha_fields_array_zhTW)) { 
    $lang = 'zh-TW';
  }else{
	$lang = 'en';
  }
  return $lang;
}



/* ===================================================== *
 *    Parsing ShortCode: [chineselearn_get_post_id]      *
 * ===================================================== */	
if (is_plugin_active('shortcodes-ultimate/shortcodes-ultimate.php')) {
	add_filter( 'su/data/shortcodes', 'register_chineselearn_shortcode_get_post_id' );
	/**
	  * Filter to modify original shortcodes data and add custom shortcodes
	  *
	  * @param array   $shortcodes Original plugin shortcodes
	  * @return array Modified array
	  */
	function register_chineselearn_shortcode_get_post_id( $shortcodes ) {

	  // Add new shortcode
	  $shortcodes['get_post_id'] = array(

		// Shortcode name
		'name' => __( 'Get Current POST ID', 'chineselearninfo' ),

		// Shortcode type. Can be 'wrap' or 'single'
		// Example: [b]this is wrapped[/b], [this_is_single]
		'type' => 'single',

		// Shortcode group.
		// Can be 'content', 'box', 'media' or 'other'.
		// Groups can be mixed, for example 'content box'
		'group' => 'content',

		// Shortcode description for cheatsheet and generator
		'desc' => __( 'Get Current POST ID', 'chineselearninfo' ),

		// Custom icon (font-awesome)
		'icon' => 'plus',

		// Name of custom shortcode function
		// IMPORTANT: this is the name of the next function
		'function' => 'return_chineselearn_shortcode_get_post_id',
	  );

	  // Return modified data
	  return $shortcodes;
	}

	/**
	 * Callback function
	 *
	 * @param array   $atts    Shortcode attributes
	 * @param string  $content Shortcode content
	 * @return string Shortcode markup
	 */
	function return_chineselearn_shortcode_get_post_id( $atts, $content = null ) {
	  return get_the_ID();
	}  
}  



/* ===================================================== *
 *    Enhancement for WPML and WP Content Crawler        *
 * ===================================================== */	
if (is_plugin_active('wp-content-crawler/wp-content-crawler.php') && is_plugin_active('sitepress-multilingual-cms/sitepress.php')) {
	/**
	* Add the crawled post to default language under WPML. Fires just after a post is inserted/updated.
	*
	* @param array $postData       Data that was used to create/update a post in the database. If 'ID' key has
	*                              a valid integer value, this means this is fired for an update.
	* @param PostData $data        Data retrieved from the target site according to the site settings
	* @param PostSaver $this       PostSaver itself
	* @param int $siteIdToCheck    ID of the site for which the post is retrieved
	* @param string $postUrl       URL of the post
	* @param array $urlTuple       An array containing the URL data. The keys are columns of the DB table storing the URLs.
	* @param bool $isRecrawl       True if this is a recrawl.
	* @param int $postId           ID of the saved post
	* @param bool $isFirstPage     True if this is the first page of the post
	* @since 1.6.3
	*/
	add_action('wpcc/post/after_save', 'chineselearn_wp_crawler_wpml_meta_append', 10, 9);
	function chineselearn_wp_crawler_wpml_meta_append($arraypostData, $postData, $postSaver, $siteIdToCheck, $postUrl, $urlTuple, $isRecrawl, $postId, $isFirstPage ){
		if ( !$isRecrawl ){
			if (stristr($arraypostData['post_title'], '[ENG]')){
				$language_code = 'en';
			} elseif (stristr($arraypostData['post_title'], '[CHT]')){
				$language_code = 'zh-hant';
			} else {
				$language_code = 'en';
			}
			$wpml_element_type = apply_filters( 'wpml_element_type', 'post' );
			
			$set_language_args = array(
				'element_id'    => $postId,
				'element_type'  => $wpml_element_type,
				'trid'   => false,
				'language_code'   => $language_code
			);
			do_action( 'wpml_set_element_language_details', $set_language_args );
		}
	}
	
	/**
	 * obtain the date of the first revision and apply it to the post being published
	 */
	add_action( 'draft_to_publish', 'chineselearn_new_post_use_draft_datetime', 10, 3); 
	function chineselearn_new_post_use_draft_datetime( $post ) {
		if ( $post->post_date_gmt == $post->post_modified_gmt) {
			$revisions = wp_get_post_revisions($post->ID);
			$oldest = NULL;
			foreach($revisions as $revision){
				$oldest = $revision->ID;
			};
			$previousdate = get_the_date( 'Y-m-d H:i:s', $oldest );
			wp_update_post(
				array (
					'ID'            => $post->ID,
					'post_date'     => $previousdate,
					'post_date_gmt' => get_gmt_from_date( $previousdate )
				)
			);
		}
	}
}