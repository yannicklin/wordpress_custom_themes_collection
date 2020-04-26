<?php
/* Template Name: Support Topic Article */

get_header();
	while ( have_posts() ) : the_post(); ?>

		<div class="max-width-container layout-root">
			<?php get_template_part( 'parts/menus/topics-nav' ); ?>
			<div class="main-section">
				<?php get_template_part( 'parts/menus/breadcrumbs' ); ?>
                <h1 class="post-title">
					<?php the_title(); ?>
				</h1>
				<div class="post-content">
                <?php
                    $feature_video_id = get_field('feature_video');
                    if (isset($feature_video_id) && !acf_is_empty($feature_video_id)) {
	                    get_template_part( 'parts/media/embedded-youtube' );
                    }
					the_content();
					get_template_part( 'parts/menus/article-navigator' );
                ?>
                </div>
			</div>
		</div>

	<?php endwhile;
get_footer(); ?>