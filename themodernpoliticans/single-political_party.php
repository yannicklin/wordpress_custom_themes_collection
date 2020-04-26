<?php
/* ==============
 * Template for single Polictians
 * Not completed in the parts of Offices and Elections
 ============= */
?>

<?php get_header(); ?>

<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">

	<?php while ( have_posts() ) : the_post(); ?>
    
    <article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
      <div class="entry-main">

        <?php do_action('vantage_entry_main_top') ?>

        <?php if ( ( the_title( '', '', false ) && siteorigin_page_setting( 'page_title' ) ) || ( has_post_thumbnail() && siteorigin_setting('blog_featured_image') ) || ( siteorigin_setting( 'blog_post_metadata' ) && get_post_type() == 'post' ) ) : ?>
          <header class="entry-header">
						
            <?php if ( the_title( '', '', false ) && siteorigin_page_setting( 'page_title' ) ) : ?>
              <h1 class="entry-title"><?php the_title(); ?></h1>
            <?php endif; ?>

          </header><!-- .entry-header -->
        <?php endif; ?>

        <div class="entry-content">
          <div class="political-party panel-basic-information grid-container">
			<div class="grid-50 feature-image"><?php the_post_thumbnail('medium'); ?></div>
            <div class="grid-50 grid-parent">
              <h3 class="grid-100"> Basic Information </h3>  
              <label id="label-Members" class="grid-30">Members</label><div id="Members" class="grid-70"><?php the_field('members'); ?></div><div class="clear"></div>
              <label id="label-Foundation-Year" class="grid-30">Foundation-Year</label><div id="Foundation-Year" class="grid-70"><?php the_field('foundation_year'); ?></div><div class="clear"></div>
              <label id="label-Website" class="grid-30">Website</label><div id="Website" class="grid-70"><a href="<?php the_field('website'); ?>"><?php the_field('website'); ?></a></div><div class="clear"></div>
              <?php
              if( get_field('leader') ):
                  // override $post
                  $post = get_field('leader');
                  setup_postdata( $post ); 
              ?>
                <label id="label-Leader" class="grid-30">Leader</label>
                <div class="grid-70 grid-parent">
                  <a href="<?php the_permalink(); ?>">
                    <div id="Leader" class="grid-40"><?php the_title(); ?></div>
                    <?php if (has_post_thumbnail()) : ?>
                    <div class="leader-image grid-60"><?php the_post_thumbnail('medium'); ?></div>
                    <?php endif; ?>
                  </a>
                </div><div class="clear"></div>
              <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
              endif; ?>
            </div><div class="clear"></div>
			<?php 
			  $image_ids = get_field('gallery', false, false);

			  if( $image_ids ): ?>
					<label class="label-Gallery grid-30">Gallery</label><div class="Gallery grid-70 grid-parent">
						<?php 
					  $shortcode = '[' . 'gallery ids="' . implode(',', $image_ids) . '"]';
					  echo do_shortcode( $shortcode );
						?>
					</div><div class="clear"></div>
			  <?php endif; ?>
          </div>
          
          <?php if( have_rows('offices') ): ?>
          	<div class="political-party panel-offices grid-container">
              <h3 class="grid-100">Offices</h3>
              <?php
                while ( have_rows('offices') ) : the_row(); ?>
              		<div class="offices-row grid-100 grid-parent">
                  <?php 
                  $office = get_sub_field('office');
                  if (!empty($office)) :
                  ?>
                    <div class="office-address grid-50"><?php echo $office['address']; ?></div>
                    <img class="office-google-map grid-50" src="http://maps.google.com/maps/api/staticmap?center=<?php echo $office['lat']; ?>,<?php echo $office['lng']; ?>&markers=<?php echo $office['lat']; ?>,<?php echo $office['lng']; ?>&zoom=14&size=360x300&sensor=FALSE" /><div class="clear"></div>
                  <?php endif;?>

                  <?php
                    $state = get_sub_field('state');
                    if (!empty($state)) :
                  ?>
                    <label class="label-office-state grid-40">State</label><div class="office-state grid-60"><?php echo $state->name; ?></div><div class="clear"></div>
                  <?php endif;?>

                  <label class="label-office-telephone grid-40">Telephone</label><div class="office-telephone grid-60"><?php the_sub_field('telephone'); ?></div><div class="clear"></div>
                  <label class="label-office-post-code grid-40">Post Code</label><div class="office-post-code grid-60"><?php the_sub_field('post_code'); ?></div><div class="clear"></div>
				  <label class="label-office-type grid-40">Type</label><div class="office-type grid-60"><?php the_sub_field('type'); ?></div><div class="clear"></div>
              	</div> <!-- offices-row -->
                <?php endwhile; ?>
              </div>
          <?php endif; ?>
          
			<div class="political-party panel-politicians grid-container">
			  <h3 class="grid-100">Politicians</h3>
			  <?php
				$args_query_politicans = array(
				  'numberposts'	=> -1,
				  'post_type'		=> 'politician',
				  'orderby' => 'title',
				  'order'	=> 'ASC',
				  'meta_query'	=> array(
					array(
					  'key'		=> 'party',
					  'value'		=> get_the_ID(),
					  'compare'	=> '='
					)
				  )
				);
			  
				$result_query_politicians = new WP_Query( $args_query_politicans );          
				
				while ( $result_query_politicians->have_posts() ) : $result_query_politicians->the_post(); ?>
					<div class="politician-name grid-50"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
					<a href="<?php the_permalink(); ?>"><div class="politician-featured-image grid-50"><?php the_post_thumbnail('medium'); ?></div></a><div class="clear"></div>
              <?php endwhile; 
			  wp_reset_query();	 // Restore global post data stomped by the_post(). ?>
			  </div>
        	<?php the_content(); ?>
        </div><!-- .entry-content -->
        
        <?php do_action('vantage_entry_main_bottom') ?>

      </div>

    </article><!-- #post-<?php the_ID(); ?> -->
    
		<?php if ( siteorigin_setting( 'navigation_post_nav' ) ) vantage_content_nav( 'nav-below' ); ?>

		<?php if ( comments_open() || '0' != get_comments_number() ) : ?>
			<?php comments_template( '', true ); ?>
		<?php endif; ?>

	<?php endwhile; // end of the loop. ?>

	</div><!-- #content .site-content -->
</div><!-- #primary .content-area -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>