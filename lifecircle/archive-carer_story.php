<?php get_header(); ?>

<div class="max-width-container">
	<h1 class="page-title">
		Stories of care
	</h1>

	<div class="stories-list">
		<?php while ( have_posts() ) : the_post();
			get_template_part( 'parts/pages/carer-story-archive-item' );
		endwhile; ?>
        <span class="flex-space-filler"></span>
        <span class="flex-space-filler"></span>
	</div>

</div>

<?php get_footer();
