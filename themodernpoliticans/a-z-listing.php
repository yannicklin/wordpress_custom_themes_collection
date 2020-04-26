<?php $_a_z_listing_1nd_column_end = 'N'; ?>

<div id="letters grid-container">
	<div class="az-letters grid-100">
		<?php $a_z_query->the_letters(); ?><div class="clear"></div>
	</div>
</div>
<?php if ( $a_z_query->have_letters() ) : ?>
<div id="az-slider" class="grid-container">
	<div class="grid-50 grid-parent">
		<?php
		while ( $a_z_query->have_letters() ) :
			$a_z_query->the_letter();
			if ( $a_z_query->have_items() ) : 
    		if ( strcasecmp( $a_z_query->get_the_letter_title(), $_a_z_listing_1nd_column_end ) > 0 ) : ?>
  				</div><div class="grid-50 grid-parent">
  			<?php endif; ?>
				<div class="grid-100 grid-parent" id="<?php $a_z_query->the_letter_id(); ?>">
					<h2 class="a-z-index-letter-title">
						<span><?php $a_z_query->the_letter_title(); ?></span>
					</h2>
          <?php
					while ( $a_z_query->have_items() ) :
						$a_z_query->the_item();
					?>
          	<div class="a-z-index-letter-record grid-100 flexbox-vertical-center">
              <a class="modal-link" href="<?php $a_z_query->the_permalink(); ?>"><div class="politician-featured-image-10rem"><?php the_post_thumbnail('thumbnail'); ?></div><div class="politician-name"><?php $a_z_query->the_title(); ?></a>
              </a></div>
          	</div>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
		<?php endwhile; ?>
	</div>
</div>
<?php else : ?>
	<p><?php esc_html_e( 'There are no posts included in this index.', 'themodernpoliticians' ); ?></p>
<?php
endif;
