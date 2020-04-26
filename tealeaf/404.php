<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package vantage
 * @since vantage 1.0
 * @license GPL 2.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">

		<article id="post-0" class="post error404 not-found">

			<div class="entry-main">

				<?php do_action('vantage_entry_main_top') ?>

				<header class="entry-header">
					<?php if( siteorigin_page_setting( 'page_title' ) ) : ?>
						<h1 class="entry-title"><?php echo apply_filters( 'vantage_404_title', __( "That page can't be found.", 'vantage' ) ); ?></h1>
					<?php endif; ?>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<p><?php echo apply_filters( 'vantage_404_message', __( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'vantage' ) ); ?></p>

					<?php get_search_form(); ?>
          
					<div class="result-page-images">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/animated_teapot.gif" srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/animated_teapot.gif 480w" sizes="(max-width: 400px) 100vw, 400px" class="so-widget-image" height="400" width="400">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/animated_chess.gif" srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/animated_chess.gif 468w" sizes="(max-width: 400px) 100vw, 400px" class="so-widget-image" height="245" width="400">
          </div>
				</div><!-- .entry-content -->

				<?php do_action('vantage_entry_main_bottom') ?>

			</div><!-- .entry-main -->

		</article><!-- #post-0 .post .error404 .not-found -->

	</div><!-- #content .site-content -->
</div><!-- #primary .content-area -->

<?php get_footer(); ?>
