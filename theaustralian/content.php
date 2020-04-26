<?php
/**
 * @package GeneratePress
 */
 
// No direct access, please
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<?php do_action( 'generate_before_content' ); ?>
	<header class="entry-header">
		<?php do_action( 'generate_before_entry_title' ); ?>
		<?php the_title( sprintf( '<h4 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
	</header><!-- .entry-header -->
	<content>
		<div class="entry-image-resize">
			<?php do_action( 'generate_after_entry_header' ); ?>
		</div>
		<div class="content-right">
			<?php do_action( 'generate_after_entry_title' ); ?>
			<div class="entry-summary">
				<p>
					<?php
					if (ICL_LANGUAGE_CODE=='zh-hans'){
						echo esc_html(mb_substr(get_the_excerpt(),0,apply_filters('excerpt_length', 55) * 5 ,'UTF8') . " .... ");
					}else if (ICL_LANGUAGE_CODE=='ko') {
						echo  get_the_excerpt();
					}else{
						echo  get_the_excerpt();
					}
					?>
				</p>
			</div>
		</div><!-- .entry-summary -->
	</content>
</article><!-- #post-## -->