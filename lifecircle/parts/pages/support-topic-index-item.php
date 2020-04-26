<a href="<?php the_permalink(); ?>" class="support-topic-index-item">
	<h1 class="support-topic-index-item__title">
		<?php the_title(); ?>
	</h1>
	<div class="support-topic-index-item__excerpt">
		<?php echo elide(get_the_excerpt(), 80); ?>
	</div>
</a>