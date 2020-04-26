<div class="guide-teasers" data-ready="false">
	<?php foreach (get_guide_user_profiles() as $profile) :
		$feature_video_id = get_guide_user_field('about_video', $profile->ID);
		if (has_guide_video($profile->ID)) : ?>
			<a
				href="https://www.youtube.com/embed/<?php echo $feature_video_id; ?>"
				data-open-in-lightbox="true"
				class="guide-teaser"
			>
				<?php echo get_guide_avatar($profile->ID); ?>
				<div class="details-container">
					<img
						class="play-button"
						src="<?php echo get_theme_file_uri('src/images/play-video-icon-alt.png'); ?>"
						alt=""
						role="presentation"
					>
					<p class="cta-text">
						LifeCircle Guide -
						<?php echo get_guide_first_name($profile->ID); ?>
					</p>
				</div>
			</a>
		<?php endif; ?>
	<?php endforeach; ?>
</div>