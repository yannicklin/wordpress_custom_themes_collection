<?php

// =============================================================================
// FUNCTIONS.PHP
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Enqueue Parent Stylesheet
//   02. Additional Functions
// =============================================================================

// Enqueue Parent Stylesheet
// =============================================================================

add_filter( 'x_enqueue_parent_stylesheet', '__return_true' );

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

// END ENQUEUE PARENT ACTION



// Additional Functions
// =============================================================================
/* ===== Function: x_current_year ===== */
function x_current_year($a) {
    return date('Y');
}
add_shortcode('x-current-year', 'x_current_year');


/* ===== Function: x_breadcrumbs ===== */
/*
 * Customized the display of Product Category and Product (WOOCOMMERCE)
 * To show the levels of categories and sub-categories
 * Note: Also hard-coded the Shop URL to specific page: Products
 */
function x_breadcrumbs() {

	if ( x_get_option( 'x_breadcrumb_display', '1' ) ) {

	  GLOBAL $post;

	  $is_ltr         = ! is_rtl();
	  $stack          = x_get_stack();
	  $delimiter      = x_get_breadcrumb_delimiter();
	  $home_text      = x_get_breadcrumb_home_text();
	  $home_link      = home_url();
	  $current_before = x_get_breadcrumb_current_before();
	  $current_after  = x_get_breadcrumb_current_after();
	  $page_title     = get_the_title();
	  $blog_title     = get_the_title( get_option( 'page_for_posts', true ) );

	  if ( ! is_404() ) {
		$post_parent = $post->post_parent;
	  } else {
		$post_parent = '';
	  }

	  if ( X_WOOCOMMERCE_IS_ACTIVE ) {
		//$shop_url   = x_get_shop_link();
		$shop_url   = home_url() . 'products';
		$shop_title = x_get_option( 'x_' . $stack . '_shop_title', __( 'The Shop', '__x__' ) );
		$shop_link  = '<a href="'. $shop_url .'">' . $shop_title . '</a>';
	  }

	  echo '<div class="x-breadcrumbs"><a href="' . $home_link . '">' . $home_text . '</a>' . $delimiter;

		if ( is_home() ) {

		  echo $current_before . $blog_title . $current_after;

		} elseif ( is_category() ) {

		  $the_cat = get_category( get_query_var( 'cat' ), false );
		  if ( $the_cat->parent != 0 ) echo get_category_parents( $the_cat->parent, TRUE, $delimiter );
		  echo $current_before . single_cat_title( '', false ) . $current_after;

		} elseif ( x_is_product_category() ) {
		
		  $the_cat = get_queried_object();
		  if ( $the_cat->parent != 0 ) echo x_get_taxonomy_parents( $the_cat->parent, $the_cat->taxonomy, TRUE, $delimiter );
		  echo $current_before . single_cat_title( '', false ) . $current_after;
		
		  /*
		  if ( $is_ltr ) {
			echo $shop_link . $delimiter . $current_before . single_cat_title( '', false ) . $current_after;
		  } else {
			echo $current_before . single_cat_title( '', false ) . $current_after . $delimiter . $shop_link;
		  }
		  */
		
		} elseif ( x_is_product_tag() ) {

		  if ( $is_ltr ) {
			echo $shop_link . $delimiter . $current_before . single_tag_title( '', false ) . $current_after;
		  } else {
			echo $current_before . single_tag_title( '', false ) . $current_after . $delimiter . $shop_link;
		  }

		} elseif ( is_search() ) {

		  echo $current_before . __( 'Search Results for ', '__x__' ) . '&#8220;' . get_search_query() . '&#8221;' . $current_after;

		} elseif ( is_singular( 'post' ) ) {

		  if ( get_option( 'page_for_posts' ) == is_front_page() ) {
			echo $current_before . $page_title . $current_after;
		  } else {
			if ( $is_ltr ) {
			  echo '<a href="' . get_permalink( get_option( 'page_for_posts' ) ) . '">' . $blog_title . '</a>' . $delimiter . $current_before . $page_title . $current_after;
			} else {
			  echo $current_before . $page_title . $current_after . $delimiter . '<a href="' . get_permalink( get_option( 'page_for_posts' ) ) . '">' . $blog_title . '</a>';
			}
		  }

		} elseif ( x_is_portfolio() ) {

		  echo $current_before . get_the_title() . $current_after;

		} elseif ( x_is_portfolio_item() ) {

		  $link  = x_get_parent_portfolio_link();
		  $title = x_get_parent_portfolio_title();

		  if ( $is_ltr ) {
			echo '<a href="' . $link . '">' . $title . '</a>' . $delimiter . $current_before . $page_title . $current_after;
		  } else {
			echo $current_before . $page_title . $current_after . $delimiter . '<a href="' . $link . '">' . $title . '</a>';
		  }

		} elseif ( x_is_product() ) {

		  if ( $is_ltr ) {
			echo $shop_link . $delimiter . $current_before . $page_title . $current_after;
		  } else {
			echo $current_before . $page_title . $current_after . $delimiter . $shop_link;
		  }
		  
		} elseif ( x_is_buddypress() ) {

		  if ( bp_is_group() ) {
			echo '<a href="' . bp_get_groups_directory_permalink() . '">' . x_get_option( 'x_buddypress_groups_title', __( 'Groups', '__x__' ) ) . '</a>' . $delimiter . $current_before . x_buddypress_get_the_title() . $current_after;
		  } elseif ( bp_is_user() ) {
			echo '<a href="' . bp_get_members_directory_permalink() . '">' . x_get_option( 'x_buddypress_members_title', __( 'Members', '__x__' ) ) . '</a>' . $delimiter . $current_before . x_buddypress_get_the_title() . $current_after;
		  } else {
			echo $current_before . x_buddypress_get_the_title() . $current_after;
		  }

		} elseif ( x_is_bbpress() ) {

		  remove_filter( 'bbp_no_breadcrumb', '__return_true' );

		  if ( bbp_is_forum_archive() ) {
			echo $current_before . bbp_get_forum_archive_title() . $current_after;
		  } else {
			echo bbp_get_breadcrumb();
		  }

		  add_filter( 'bbp_no_breadcrumb', '__return_true' );

		} elseif ( is_page() && ! $post_parent ) {

		  echo $current_before . $page_title . $current_after;

		} elseif ( is_page() && $post_parent ) {

		  $parent_id   = $post_parent;
		  $breadcrumbs = array();

		  if ( is_rtl() ) {
			echo $current_before . $page_title . $current_after . $delimiter;
		  }

		  while ( $parent_id ) {
			$page          = get_page( $parent_id );
			$breadcrumbs[] = '<a href="' . get_permalink( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a>';
			$parent_id     = $page->post_parent;
		  }

		  if ( $is_ltr ) {
			$breadcrumbs = array_reverse( $breadcrumbs );
		  }

		  for ( $i = 0; $i < count( $breadcrumbs ); $i++ ) {
			echo $breadcrumbs[$i];
			if ( $i != count( $breadcrumbs ) -1 ) echo $delimiter;
		  }

		  if ( $is_ltr ) {
			echo $delimiter . $current_before . $page_title . $current_after;
		  }

		} elseif ( is_tag() ) {

		  echo $current_before . single_tag_title( '', false ) . $current_after;

		} elseif ( is_author() ) {

		  GLOBAL $author;
		  $userdata = get_userdata( $author );
		  echo $current_before . __( 'Posts by ', '__x__' ) . '&#8220;' . $userdata->display_name . $current_after . '&#8221;';

		} elseif ( is_404() ) {

		  echo $current_before . __( '404 (Page Not Found)', '__x__' ) . $current_after;

		} elseif ( is_archive() ) {

		  if ( x_is_shop() ) {
			echo $current_before . $shop_title . $current_after;
		  } else {
			echo $current_before . __( 'Archives ', '__x__' ) . $current_after;
		  }

		}

	  echo '</div>';

	}
}


/* ===== Function: x_get_taxonomy_parents ===== */
/*
 * Retrieve category parents with separator for general taxonomies.
 * Modified version of get_category_parents()
 *
 * @param int $id Category ID.
 * @param string $taxonomy Optional, default is 'category'. 
 * @param bool $link Optional, default is false. Whether to format with link.
 * @param string $separator Optional, default is '/'. How to separate categories.
 * @param bool $nicename Optional, default is false. Whether to use nice name for display.
 * @param array $visited Optional. Already linked to categories to prevent duplicates.
 * @return string
 */
function x_get_taxonomy_parents( $id, $taxonomy = 'category', $link = false, $separator = '/', $nicename = false, $visited = array() ) {

	$chain = '';
	$parent = get_term( $id, $taxonomy );

	if ( is_wp_error( $parent ) )
		return $parent;

	if ( $nicename )
		$name = $parent->slug;
	else
		$name = $parent->name;

	if ( $parent->parent && ( $parent->parent != $parent->term_id ) && !in_array( $parent->parent, $visited ) ) {
		$visited[] = $parent->parent;
		$chain .= x_get_taxonomy_parents( $parent->parent, $taxonomy, $link, $separator, $nicename, $visited );
	}

	if ( $link )
		$chain .= '<a href="' . esc_url( get_term_link( $parent,$taxonomy ) ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $parent->name ) ) . '">'.$name.'</a>' . $separator;
	else
		$chain .= $name.$separator;

	return $chain;
}

function x_custom_js_script() {
    wp_register_script('fimex_custom', get_stylesheet_directory_uri() . '/fimex.js', array('jquery'),'1.1', true);
    wp_enqueue_script('fimex_custom');
} 
add_action( 'wp_enqueue_scripts', 'x_custom_js_script', 999 );


/* ===== Action: remove subcategory thumbnail ===== */
remove_action( 'woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail'); 


/* ===== Action: customize post formats ===== */
function x_custom_post_formats() {
	add_theme_support( 'post-formats', array( 'image', 'gallery' ) );
}
add_action( 'after_setup_theme', 'x_custom_post_formats', 11 );


// ===== Action: remove Portforlio & Hide the Admin Menu Button ===== */
function x_remove_portfolio_cpt() {   
  remove_action( 'init', 'x_portfolio_init');    
}
add_action( 'after_setup_theme', 'x_remove_portfolio_cpt', 100);
function x_hide_unwanted_admin_menu_items() {
    remove_menu_page( 'edit.php?post_type=x-portfolio' );
}
add_action( 'admin_menu', 'x_hide_unwanted_admin_menu_items' );


/* ===== Action: Enable SVG uploaded ===== */
function x_custom_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'x_custom_mime_types');


/* ===== Overwrite the Entry Meta of X RENEW ===== */
function x_renew_entry_meta() {
	// Date.
	$date = sprintf( '<span><time class="entry-date" datetime="%1$s">%2$s</time></span>',
	  esc_attr( get_the_date( 'c' ) ),
	  esc_html( get_the_date() )
	);

	// Categories.
	if ( get_post_type() == 'x-portfolio' ) {
	  if ( has_term( '', 'portfolio-category', NULL ) ) {
		$categories        = get_the_terms( get_the_ID(), 'portfolio-category' );
		$separator         = ', ';
		$categories_output = '';
		foreach ( $categories as $category ) {
		  $categories_output .= '<a href="'
							  . get_term_link( $category->slug, 'portfolio-category' )
							  . '" title="'
							  . esc_attr( sprintf( __( "View all posts in: &ldquo;%s&rdquo;", '__x__' ), $category->name ) )
							  . '"> '
							  . $category->name
							  . '</a>'
							  . $separator;
		}

		$categories_list = sprintf( '<span>%s</span>',
		  trim( $categories_output, $separator )
		);
	  } else {
		$categories_list = '';
	  }
	} else {
	  $categories        = get_the_category();
	  $separator         = ', ';
	  $categories_output = '';
	  foreach ( $categories as $category ) {
		$categories_output .= '<a href="'
							. get_category_link( $category->term_id )
							. '" title="'
							. esc_attr( sprintf( __( "View all posts in: &ldquo;%s&rdquo;", '__x__' ), $category->name ) )
							. '">'
							. $category->name
							. '</a>'
							. $separator;
	  }

	  $categories_list = sprintf( '<span>%s</span>',
		trim( $categories_output, $separator )
	  );
	}

	// Comments link.
	if ( comments_open() ) {
	  $title  = apply_filters( 'x_entry_meta_comments_title', get_the_title() );
	  $link   = apply_filters( 'x_entry_meta_comments_link', get_comments_link() );
	  $number = apply_filters( 'x_entry_meta_comments_number', get_comments_number() );
		
		$text = ( 0 == $number ) ? __( 'Leave a Comment', '__x__' ) : sprintf( _n( '%s Comment', '%s Comments', $number, '__x__' ), $number );

	  $comments = sprintf( '<span><a href="%1$s" title="%2$s" class="meta-comments">%3$s</a></span>',
		esc_url( $link ),
		esc_attr( sprintf( __( 'Leave a comment on: &ldquo;%s&rdquo;', '__x__' ), $title ) ),
		$text
	  );
	} else {
	  $comments = '';
	}

	// Output.
	if ( x_does_not_need_entry_meta() ) {
	  return;
	} else {
	  printf( '<p class="p-meta">%1$s%2$s%3$s</p>',
		$date,
		$categories_list,
		$comments
	  );
	}
}


?>