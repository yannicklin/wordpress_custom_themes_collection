<article id="post-<?php the_ID(); ?>" <?php post_class("content-root"); ?>>
	<section class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</section>

	<div class="entry-content">
		<?php	the_content(); ?>
	</div>

</article>
