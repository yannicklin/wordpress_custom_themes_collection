<?php
global $author;
$guide_id = intval($author);
$curauth = get_userdata($guide_id);
$feature_video_id = get_field('about_video');

get_header(); ?>

    <div class="max-width-container">
        <h1 class="post-title">
            Meet <?php echo $curauth->first_name; ?>
        </h1>
        <div class="layout-root <?php echo acf_is_empty($feature_video_id) ? 'no-video' : 'has-video'; ?>">
            <div class="summary-content">
                <?php echo get_guide_avatar($guide_id); ?>
                <p>
                    <a href="/talk-to-someone/" class="connect-link">
                        Connect with a guide
                    </a>
                </p>
            </div>
            <div class="main-content">
                <div class="bio">
                    <?php if (isset($feature_video_id) && !acf_is_empty($feature_video_id)) {
	                    get_template_part( 'parts/media/embedded-youtube' );
                    } ?>
                    <?php echo get_guide_user_field('description', $guide_id); ?>
                </div>
            </div>
        </div>
    </div>

<?php get_footer();
