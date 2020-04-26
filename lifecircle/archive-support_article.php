<?php
/* Template Name: Archive Support Article */

get_header();
while ( have_posts() ) : the_post(); ?>

    <div class="max-width-container layout-root">
        <?php get_template_part( 'parts/menus/topics-nav' ); ?>
        <div class="main-section">
            <h1 class="post-title">
                <span class="post-title__parent">
                    <?php echo get_the_title( $post->post_parent ); ?>
                </span>
                <span class="post-title__current">
                    <?php the_title(); ?>
                </span>
            </h1>
            <div class="articles">
                <?php the_content(); ?>
            </div>
        </div>
    </div>

<?php endwhile;
get_footer(); ?>