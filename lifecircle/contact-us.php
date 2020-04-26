<?php
/* Template Name: Contact Page */

get_header();
        while ( have_posts() ) : the_post(); ?>
            <div class="max-width-container">
                <div class="contact-section">
                    <h1 class="post-title">
		                <?php the_title(); ?>
                    </h1>
                    <div class="content-and-form">
                        <div class="post-content">
		                    <?php the_content(); ?>
                        </div>
                        <div class="contact-form">
                            <?php echo do_shortcode('[contact-form-7 id="294" title="Contact Form"]'); ?>
                        </div>
                    </div>
                </div>
                <div class="guides-section">
                    <h2 class="guides-blurb-title">
                        Our Guides
                    </h2>
                    <div class="guides-content-container">
                        <div class="guides-blurb">
                            <?php echo get_field('guides_blurb'); ?>
                        </div>
                        <div class="guides-gallery">
                            <?php foreach(get_guide_user_profiles() as $profile) : ?>
                                <a href="<?php echo get_author_posts_url($profile->ID); ?>" class="guide-profile">
	                                <?php echo get_guide_avatar($profile->ID); ?>
                                    <span class="guide-profile__name">
                                        Meet
	                                    <?php echo get_guide_first_name($profile->ID); ?>
                                    </span>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile;
get_footer();
