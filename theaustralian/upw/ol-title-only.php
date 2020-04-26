<?php if ($instance['before_posts']) : ?>
  <div class="upw-before">
    <?php echo wpautop($instance['before_posts']); ?>
  </div>
<?php endif; ?>

<div class="upw-posts hfeed">

  <?php if ($upw_query->have_posts()) : ?>
      <ol>
      <?php while ($upw_query->have_posts()) : $upw_query->the_post(); ?>

        <?php $current_post = ($post->ID == $current_post_id && is_single()) ? 'active' : ''; ?>
            <li>
                <?php if (get_the_title() && $instance['show_title']) : ?>
                    <h4 class="entry-title">
                        <a href="<?php the_permalink(); ?>" rel="bookmark">
                            <?php the_title(); ?>
                        </a>
                    </h4>
                <?php endif; ?>
            </li>
      <?php endwhile; ?>
    </ol>
  <?php else : ?>

    <p class="upw-not-found">
      <?php _e('No posts found.', 'the-australian'); ?>
    </p>

  <?php endif; ?>

</div>

<?php if ($instance['after_posts']) : ?>
  <div class="upw-after">
    <?php echo wpautop($instance['after_posts']); ?>
  </div>
<?php endif; ?>