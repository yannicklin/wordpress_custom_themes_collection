<?php $explainer_youtube_id = get_field('explainer_video'); ?>

<?php get_header(); ?>

<div class="page-container grid-container">

	<?php while ( have_posts() ) : the_post(); ?>

        <section class="intro">

            <div class="welcome-message">
                <p class="title"><?php bloginfo('name'); ?></p>
                <p class="tagline"><?php bloginfo('description'); ?></p>
                <button href="https://www.youtube.com/embed/<?php echo $explainer_youtube_id; ?>" data-open-in-lightbox="true" class="explainer-teaser">
                    <img class="icon" src="<?php echo get_theme_file_uri('src/images/play-video-icon.png'); ?>" alt="" role="presentation">
                    <span class="text"><?php the_field('explainer_trigger_text'); ?></span>
                </button>
            </div>

        </section>

        <section class="need-to-talk">
            <div class="max-width-container layout-root">
                <div class="prompt-text">
		            <?php echo get_field('need_to_talk_section')['prompt_text']; ?>
                </div>
                <img class="guide-picture" src="<?php echo get_field('need_to_talk_section')['guide_picture']; ?>" alt="" role="presentation">
            </div>
        </section>

        <section class="content-body" id="how-we-help">
	        <?php the_content(); ?>
        </section>

        <?php get_template_part( 'parts/posts/purpose-summary' ); ?>

        <section class="carer-stories">
            <div class="max-width-container layout-root">
                <?php foreach (get_carer_stories() as $index => $carer_story) : ?>
                    <?php $youtube_video_id = get_field('youtube_video_id', $carer_story['ID']); ?>
                    <div class="slide <?php echo $index === 0 ? 'current' : ''; ?>">
                        <div href="https://www.youtube.com/embed/<?php echo $youtube_video_id; ?>" data-open-in-lightbox="true" class="thumbnail-container">
                            <img
                                src="//img.youtube.com/vi/<?php echo $youtube_video_id; ?>/maxresdefault.jpg"
                                alt=""
                                class="thumbnail"
                                role="presentation"
                            >
                        </div>
                        <div class="meta">
                            <h2 class="story-title">
		                        <?php echo $carer_story['post_title']; ?>
                            </h2>
                            <div class="blurb">
	                            <?php echo elide($carer_story['post_content'], 100); ?>
                            </div>
                            <p>
                                <a
                                    href="<?php echo get_field('carer_stories_section')['cta_link']; ?>"
                                    class="link-to-carer-stories-page"
                                >Watch more stories</a>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </section>

	<?php endwhile; ?>

</div>

<?php get_footer();
