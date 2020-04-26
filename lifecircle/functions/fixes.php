<?php
	add_theme_support( 'post-thumbnails' ); 

	add_action( 'after_setup_theme', 'lc_imagesize_setup' );
	function lc_imagesize_setup() {
		//remove_image_size( 'article-story-thumbnail' );
		add_image_size( 'support-topic-article-thumbnail', 274, 155, true );
	}
?>