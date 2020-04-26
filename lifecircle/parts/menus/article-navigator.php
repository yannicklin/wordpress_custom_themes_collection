<?php
/*
Credits:
Snippet by Laurence Lord (http://laurencelord.co.uk)
extends Wordpress Codex (http://codex.wordpress.org/Next_and_Previous_Links).
Credit goes to Rory Powis (https://github.com/rpowis) for the lambdase.
@see https://gist.github.com/LL782/3551634
*/
$ancestors = get_post_ancestors( $post->ID );
/* Get the top Level page->ID count base 1, array base 0 so -1 */
$parent = ($ancestors) ? $ancestors[0]: $post->ID;
$pagelist = get_pages('child_of='. $parent .'&sort_column=menu_order&sort_order=asc');
$pages = array();
foreach ($pagelist as $page) {
	$pages[] += $page->ID;
}
$current = array_search(get_the_ID(), $pages);
$prevID = ( isset($pages[$current-1]) ) ? $pages[$current-1] : '';
$nextID = ( isset($pages[$current+1]) ) ? $pages[$current+1] : '';
?>

<nav class="article-navigator">
	<?php if (!empty($prevID)) { ?>
		<a href="<?php  echo get_permalink($prevID); ?>"
		   title="<?php  echo get_the_title($prevID); ?>"
		   class="previous-page article-navigator__link"
		>Previous article</a>
	<?php } else { ?>
		<span class="filler-item"></span>
	<?php } ?>
	<?php if (!empty($nextID)) { ?>
		<a href="<?php echo get_permalink($nextID); ?>"
		   title="<?php  echo get_the_title($nextID); ?>"
		   class="next-page article-navigator__link"
		>Next article</a>
	<?php } else { ?>
		<span class="filler-item"></span>
	<?php } ?>
</nav>