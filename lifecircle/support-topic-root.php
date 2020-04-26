<?php
/* Template Name: Support Topic */

get_header();
	while ( have_posts() ) : the_post(); ?>

		<div class="max-width-container layout-root">
			<?php get_template_part( 'parts/menus/topics-nav' ); ?>
			<div class="main-section">
				<h1 class="post-title">
					<?php the_title(); ?>
				</h1>
				<div class="post-content">
					<?php the_content(); ?>
				</div>
				<div class="next-actions">
					<?php foreach (get_field('next_actions') as $next_action) : ?>
                    <a class="next-action__link" href="<?php echo $next_action['link_destination']; ?>">
                        <img class="next-action__icon" src="<?php echo $next_action['link_icon']; ?>" alt="" role="presentation">
                        <span class="next-action__text">
                            <?php echo $next_action['link_text']; ?>
                        </span>
                    </a>
					<?php endforeach; ?>
				</div>
				<div class="mobile-teasers-wrap">
					<?php get_template_part( 'parts/posts/guide-teasers' ); ?>
                </div>
            </div>
            <div class="desktop-teasers-wrap">
	            <?php get_template_part( 'parts/posts/guide-teasers' ); ?>
            </div>
        </div>

	<?php endwhile;
get_footer(); ?>