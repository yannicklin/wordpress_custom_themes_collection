<?php
/**
 * The Template for displaying all single posts.
 *
 * @package GeneratePress
 */
 
// No direct access, please
if ( ! defined( 'ABSPATH' ) ) exit;

get_header(); ?>

	<div id="primary" <?php generate_content_class();?>>
		<main id="content">
		<?php do_action('generate_before_main_content'); ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) : ?>
					<div class="comments-area">
						<?php comments_template(); ?>
					</div>
			<?php endif; ?>

		<?php endwhile; // end of the loop. ?>

			<?php 	generate_content_nav( 'nav-below' ); ?>
		<?php do_action('generate_after_main_content'); ?>
			</article><!-- #post-## -->
			<?php do_action('generate_sidebars'); ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();