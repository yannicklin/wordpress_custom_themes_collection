<?php $yt_id = get_field('youtube_video_id', get_the_ID()); ?>

<a data-open-in-lightbox="true" href="<?php echo get_youtube_link($yt_id); ?>" class="carer-story-archive-item">
    <div class="thumbnail-container">
        <img
            class="thumbnail"
            src="<?php echo get_carer_story_thumbnail($yt_id); ?>"
            alt="<?php the_title(); ?>"
        >
    </div>
    <div class="video-title">
	    <?php the_title(); ?>
    </div>
    <div class="video-description">
	    <?php echo elide(get_the_content(), 100); ?>
    </div>
</a>