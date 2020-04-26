<?php

// =============================================================================
// VIEWS/RENEW/CONTENT-GALLERY.PHP
// -----------------------------------------------------------------------------
// Gallery post output for Renew.
// =============================================================================

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-wrap">
    <?php x_get_view( 'renew', '_content', 'post-header' ); ?>

    <?php if ( is_single() ) { ?>
		<div class="entry-featured">
		  <?php x_featured_gallery(); ?>
		</div>
		<?php x_get_view( 'global', '_content', 'the-content' ); ?>
		<?php x_get_view( 'renew', '_content', 'post-footer' ); ?>
	<?php } else { ?>
		<div class="entry-featured">
		  <?php x_featured_image(); ?>
		</div>
    <?php }; ?>
  </div>
</article>