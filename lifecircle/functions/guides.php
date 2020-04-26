<?php

function get_guide_user_profiles() {
	return get_users([
		'role' => 'author'
	]);
}

function get_guide_user_field($field = '', $user_id) {
	return get_the_author_meta($field, $user_id);
}

function get_guide_first_name($user_id) {
	$meta = get_user_meta($user_id);
	return object_to_array($meta)['first_name'][0];
}

function get_guide_avatar($user_id) {
	return get_avatar($user_id, 250);
}

function has_guide_video($user_id) {
	$feature_video_id = get_guide_user_field('about_video', $user_id);
	return isset($feature_video_id) && !acf_is_empty($feature_video_id);
}