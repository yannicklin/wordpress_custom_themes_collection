<a href="<?php the_permalink(); ?>" class="article-teaser">
	
	<h1 class="article-teaser__title">
		<?php the_title(); ?>
	</h1>
	<div class="article-teaser__thumbnail">
	<?php
		$image = get_field('feature_image');
		$size = 'support-topic-article-thumbnail';
		if( $image ) { echo wp_get_attachment_image( $image, $size ); }
	?>
	</div>
	<div class="article-teaser__excerpt">
		<?php echo elide(get_the_excerpt(), 120); ?>
	</div>
	<p class="article-teaser__cta">
		READ MORE...
	</p>
</a>