<?php

function get_support_topic_root_pages($index_post_id) {
	return get_children([
		'post_parent' => $index_post_id,
		'order' => 'ASC',
		'orderby' => 'menu_order'
	]);
}