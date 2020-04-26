<?php

function remove_more_jump_link($link) { 
	$offset = strpos($link, '#more-');
	if ($offset) { $end = strpos($link, '"',$offset); }
	if ($end) { $link = substr_replace($link, '', $offset, $end-$offset); }
	return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');




function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ //Defines a default image
    $first_img = "/images/default.jpg";
  }
  return $first_img;
}

function wordpress_breadcrumbs() {
  $delimiter = '<i class="fa fa-chevron-right"></i>';
  $currentBefore = '<span>';
  $currentAfter = '</span>';
  if ( !is_home() && !is_front_page() || is_paged() ) {
    echo '<div id="crumbs"><a href="'. get_home_url() .'"><i class="fa fa-home"></i></a><i class="fa fa-chevron-right"></i>';
    global $post;
	if ( is_page() && !$post->post_parent ) {
		echo $currentBefore;
		the_title();
		echo $currentAfter; }
	elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $currentBefore;
      the_title();
      echo $currentAfter;
    }
    echo '</div>';
  }
}


//pagination 
if ( ! function_exists( 'my_pagination' ) ) :
	function my_pagination() {
		global $wp_query;

		$big = 999999999; // need an unlikely integer
		
		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages
		) );
	}
endif;







function modify_read_more_link() {
return '<a class="more-link" href="' . get_permalink() . '">Read more</a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );


add_theme_support( 'post-thumbnails' ); 


add_action( 'after_setup_theme', 'wpt_setup' );
    if ( ! function_exists( 'wpt_setup' ) ):
        function wpt_setup() { 
            register_nav_menu( 'primary', __( 'Primary navigation', 'wptuts' ) );
        } endif;

 // Register custom navigation walker
require_once('wp_bootstrap_navwalker.php');


function delta_enqueue() {
wp_enqueue_script( 'bootstrap', get_template_directory_uri(). '/js/bootstrap.js', array( 'jquery' ) );
//wp_enqueue_script( 'slides', get_template_directory_uri(). '/js/jquery.slides.js', array( 'jquery' ) );
wp_enqueue_script( 'scripts', get_template_directory_uri(). '/js/scripts.js', array( 'jquery' ) );



}
add_action('wp_footer', 'delta_enqueue');

?>