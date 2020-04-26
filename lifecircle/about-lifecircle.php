<?php
/* Template Name: About Page */

get_header(); ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <div class="max-width-container">
            <div class="post-content">
                <?php the_content(); ?>
            </div>
        </div>
        <section class="strategic-partners">
            <div class="max-width-container">
                <h3 class="strategic-partners__title">
		            <?php echo get_field('strategic_partners_section')['heading']; ?>
                </h3>
                <div class="strategic-partners__text-content">
		            <?php echo get_field('strategic_partners_section')['text_content']; ?>
                </div>
                <div class="strategic-partners__logos">
		            <?php foreach(get_field('strategic_partners_section')['logos'] as $logo) : ?>
                        <a class="strategic-partners__logo" href="<?php echo $logo['url']; ?>">
                            <img src="<?php echo $logo['logo_image']; ?>" alt="some logo" role="presentation">
                        </a>
		            <?php endforeach; ?>
                    <div class="filler"></div>
                    <div class="filler"></div>
                    <div class="filler"></div>
                </div>
            </div>
        </section>

        <section class="corporate-section">
            <div class="max-width-container">
                <a data-open-in-lightbox="true" href="<?php echo get_youtube_link(get_field('corporate_section')['video_id']); ?>" class="thumbnail-container">
                    <img
                        class="thumbnail"
                        src="<?php echo get_carer_story_thumbnail(get_field('corporate_section')['video_id']); ?>"
                        alt="<?php the_title(); ?>"
                    >
                </a>
                <div class="corporate-section__text-content">
                    <?php echo get_field('corporate_section')['text_content']; ?>
                </div>
            </div>
        </section>

        <section class="our-patron">
            <div class="max-width-container">
                <h3 class="our-patron__title">
		            <?php echo get_field('our_patron_section')['heading']; ?>
                </h3>
                <div class="our-patron__text-content">
		            <?php echo get_field('our_patron_section')['text_content']; ?>
                </div>
            </div>
        </section>

        <div class="max-width-container">
            <section class="board-members">
                <h2 class="board-members__title">
		            <?php echo get_field('board_section')['heading']; ?>
                </h2>
                <div class="board-members__text-content">
		            <?php echo get_field('board_section')['text_content']; ?>
                </div>
	            <div class="board-viz">
		            <?php foreach(get_field('board_section')['board_members'] as $board_member) : ?>
                        <div class="board-viz__member">
                            <img class="board-viz__member-avatar" src="<?php echo $board_member['avatar']; ?>" alt="<?php echo $board_member['name']; ?>">
                            <h4 tabindex="0" class="board-viz__member-name"><?php echo $board_member['name']; ?></h4>
                            <div class="board-viz__member-bio">
                                <span class="dismiss-button">&times;</span>
                                <h5 tabindex="0" class="board-viz__bio-name"><?php echo $board_member['name']; ?></h5>
                                <?php echo $board_member['bio']; ?>
                            </div>
                        </div>
		            <?php endforeach; ?>
                    <div class="filler"></div>
                    <div class="filler"></div>
                </div>
            </section>
        </div>

        <section class="ceo-section">
            <div class="max-width-container">
                <h3 class="ceo-section__title">
                    <?php echo get_field('ceo_section')['heading']; ?>
                </h3>
                <?php $youtube_video_id = get_field('ceo_section')['video_id']; ?>
                <div class="ceo-section__pictures-container">
                    <img
                        class="ceo-section__avatar"
                        src="<?php echo get_field('ceo_section')['avatar']; ?>"
                        alt="Our CEO"
                    >
                    <div href="https://www.youtube.com/embed/<?php echo $youtube_video_id; ?>" data-open-in-lightbox="true" class="thumbnail-container">
                        <img
                            src="//img.youtube.com/vi/<?php echo $youtube_video_id; ?>/maxresdefault.jpg"
                            alt=""
                            class="thumbnail"
                            role="presentation"
                        >
                    </div>
                </div>
                <div class="ceo-section__text-content">
                    <?php echo get_field('ceo_section')['text_content']; ?>
                </div>
            </div>
        </section>

        <section class="site-purpose-summary">

            <div class="max-width-container layout-root">
                <?php foreach (get_field('next_actions') as $item) : ?>

                    <a href="<?php echo $item['destination_page']; ?>" class="icon-link">
                        <img class="icon" src="<?php echo $item['icon']; ?>" alt="" role="presentation">
                    </a>
                    <h3 class="title">
                        <?php echo $item['title']; ?>
                    </h3>
                    <div class="body">
                        <?php echo $item['description']; ?>
                    </div>

                <?php endforeach; ?>
            </div>

        </section>
    <? endwhile; ?>
<?php get_footer();
