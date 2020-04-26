<?php

function get_carer_stories() {
	$args = array(
		'post_type'=> 'carer_story',
		'order'    => 'ASC'
	);

	$the_query = new WP_Query( $args );
	$posts = object_to_array($the_query)['posts'];

	return $posts;
}

function get_carer_story_thumbnail($youtube_id) {
	return "//img.youtube.com/vi/" . $youtube_id . "/maxresdefault.jpg";
}

function get_youtube_link($youtube_id) {
	return "https://www.youtube.com/watch/" . $youtube_id;
}