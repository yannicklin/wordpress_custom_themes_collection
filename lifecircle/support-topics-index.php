<?php
/* Template Name: Support Topics Index */

get_header(); ?>

	<div class="max-width-container layout-root">

		<?php
		while ( have_posts() ) : the_post();
			global $post;
			foreach (get_support_topic_root_pages(get_the_ID()) as $post) :
				setup_postdata($post);
				get_template_part( 'parts/pages/support-topic-index-item' );
				wp_reset_postdata();
			endforeach;
		endwhile;
		?>

		<a href="<?php echo get_field('support_link_url'); ?>'" class="support-link">
			<img class="support-link__icon" role="presentation" src="<?php echo get_theme_file_uri('src/images/conversation-icon.png'); ?>" alt="">
			<span class="support-link__text">
				<?php echo get_field('support_link_text'); ?>
			</span>
		</a>

	</div>

<?php get_footer();
