<?php
/* Template Name: Standard Content Page */
/**
 * This is the default page template file
 */

get_header(); ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <div class="max-width-container">
            <h1 class="post-title">
                <?php the_title(); ?>
            </h1>
            <div class="post-content">
                <?php the_content(); ?>
            </div>
        </div>
    <? endwhile; ?>
<?php get_footer();
