<?php
/**
 * @see https://make.wordpress.org/themes/2015/08/25/title-tag-support-now-required/
 */
add_action( 'after_setup_theme', 'theme_slug_setup' );

function theme_slug_setup() {

	add_theme_support( 'title-tag' );
}