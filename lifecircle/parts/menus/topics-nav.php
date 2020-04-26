<ul class="menu topics-nav">
	<?php wp_nav_menu( array(
		'theme_location' => 'topics',
		'container'      => false,
		'items_wrap'     => '%3$s', // removes the <ul> from the menu as we're using our own markup
	) ); ?>
</ul>