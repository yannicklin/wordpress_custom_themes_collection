<section class="site-purpose-summary">

	<div class="max-width-container layout-root">
		<?php foreach (get_field('site_purposes') as $item) : ?>

			<a href="<?php echo $item['destination_page']; ?>" class="icon-link">
				<img class="icon" src="<?php echo $item['icon']; ?>" alt="" role="presentation">
			</a>
			<h3 class="title">
				<?php echo $item['title']; ?>
			</h3>
			<p class="body">
				<?php echo $item['description']; ?>
			</p>

		<?php endforeach; ?>
	</div>

</section>