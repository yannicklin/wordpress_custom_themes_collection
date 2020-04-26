<?php

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

add_post_type_support( 'page', 'excerpt' );