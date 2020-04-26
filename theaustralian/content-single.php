<?php
/**
 * @package GeneratePress
 */
 
// No direct access, please
if ( ! defined( 'ABSPATH' ) ) exit;
?>

<article id="story" <?php generate_article_schema( 'CreativeWork' ); ?>>
		
		<header class="entry-header">
			<?php do_action( 'generate_before_entry_title'); ?>
			<?php if ( generate_show_title() ) : ?>
				<?php the_title( '<h1 class="story-headline" itemprop="headline">', '</h1>' ); ?>
			<?php endif; ?>
			
		</header><!-- .entry-header -->

		<?php do_action( 'generate_before_content'); ?>

		<?php do_action( 'generate_after_entry_title'); ?>
		
		<?php do_action( 'generate_after_entry_header'); ?>
		<div class="entry-content" itemprop="text">
			<?php the_content(); ?>
			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'generatepress' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->
		
		<?php do_action( 'generate_after_entry_content' ); ?>
		<?php do_action( 'generate_after_content' ); ?>
