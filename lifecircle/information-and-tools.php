<?php
/* Template Name: Information And Tools */

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
                <?php
                global $post;
                foreach (get_children( [ 'post_parent' => get_the_ID(), 'post_type' => 'page'] ) as $post) :
	                setup_postdata($post);
	                get_template_part( 'parts/posts/article-teaser' );
	                wp_reset_postdata();
                endforeach;
                ?>
            </div>
        </div>
	    <?php
	    $useful_links = get_field('useful_tools', $post->post_parent);
	    if (!acf_is_empty($useful_links)) { ?>
        <div class="useful-tools">
            <h2 class="useful-tools__title">
                Useful Tools
            </h2>
		    <?php foreach ( $useful_links as $item ) : ?>
				<a class="useful-tool" href="<?php echo $item['url']; ?>">
					<?php echo $item['label']; ?>
				</a>
			<?php endforeach; ?>
        </div>
		<?php }; ?>
    </div>

<?php endwhile;
get_footer(); ?>