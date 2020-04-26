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
      <div class="entry-main" id="modal-ready">

        <?php do_action('vantage_entry_main_top') ?>

        <?php if ( ( the_title( '', '', false ) && siteorigin_page_setting( 'page_title' ) ) || ( has_post_thumbnail() && siteorigin_setting('blog_featured_image') ) || ( siteorigin_setting( 'blog_post_metadata' ) && get_post_type() == 'post' ) ) : ?>
          <header class="entry-header">
						
            <?php if ( the_title( '', '', false ) && siteorigin_page_setting( 'page_title' ) ) : ?>
              <h1 class="entry-title"><?php the_title(); ?></h1>
            <?php endif; ?>

          </header><!-- .entry-header -->
        <?php endif; ?>

        <div class="entry-content">
          <div class="politician panel-basic-information grid-container">
            <div class="grid-50 grid-parent">
              <h3 class="grid-100"> Basic Information </h3>  
              <label id="label-First-Name" class="grid-30">First Name</label><div id="First-Name" class="grid-70"><?php the_field('first_name'); ?></div><div class="clear"></div>
              <label id="label-Middle-Name" class="grid-30">Middle Name</label><div id="Middle-Name" class="grid-70"><?php the_field('middle_name'); ?></div><div class="clear"></div>
              <label id="label-Last-Name" class="grid-30">Last Name</label><div id="Last-Name" class="grid-70"><?php the_field('last_name'); ?></div><div class="clear"></div>
              <label id="label-DOB" class="grid-30">D.O.B.</label><div id="DOB" class="grid-70"><?php the_field('dob'); ?></div><div class="clear"></div>
              <label id="label-Website" class="grid-30">Website</label><div id="Website" class="grid-70"><a href="<?php the_field('website'); ?>"><?php the_field('website'); ?></a></div><div class="clear"></div>
              <label id="label-Email" class="grid-30">Email</label><div id="Email" class="grid-70"><a href="mailto:<?php the_field('Email'); ?>"><?php the_field('Email'); ?></a></div><div class="clear"></div>
              <?php
              if( get_field('party') ):
                  // override $post
                  $post = get_field('party');
                  setup_postdata( $post ); 
              ?>
                <label id="label-Policitial-Party" class="grid-30">Party</label>
                <div class="grid-70 grid-parent">
                  <a href="<?php the_permalink(); ?>">
                    <div id="Policitial-Party" class="grid-40"><?php the_title(); ?></div>
                    <?php if (has_post_thumbnail()) : ?>
                    <div class="political-party-image grid-60"><?php the_post_thumbnail('medium'); ?></div>
                    <?php endif; ?>
                  </a>
                </div><div class="clear"></div>
              <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly
              endif; ?>
            </div>
          	<div class="grid-50 feature-image"><?php the_post_thumbnail('medium'); ?></div>
          </div>
          
          <div class="pt-tabs grid-container">
            <ul class="pt-tabs__navigation nav nav-tabs grid-80" role="tablist">
              <li class="nav-item active">
                <a class="nav-link active" data-toggle="tab" href="#tab-politicians-offices" role="tab" aria-expanded="true">Offices</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-politicians-elections" role="tab" aria-expanded="false">Elections</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-politicians-others" role="tab" aria-expanded="false">Others</a>
              </li>
            </ul><div class="clear"></div>

            <div class="pt-tabs__content tab-content grid-80 grid-parent">
              <div class="tab-pane grid-100 grid-parent active" id="tab-politicians-offices" role="tabpanel">
                <h3>Office Content</h3>
				<?php if( have_rows('offices') ): ?>
                  <div class="politician panel-offices grid-100 grid-parent">
                    <label class="label-offices">Offices</label><div class="offices">
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
                      </div> <!-- offices-row -->
                      <?php endwhile; ?>
                    </div>
                  </div>
                <?php endif; ?>
              </div>
              <div class="tab-pane grid-100 grid-parent" id="tab-politicians-elections" role="tabpanel">
                <h3>Elections Content</h3>
				<?php
                  if( have_rows('elections') ):
                ?>
					<label id="label-Elections" class="grid-30">Elections</label>
					<div id="Elections" class="grid-70">
						<?php
						while ( have_rows('elections') ) : the_row();
						  the_sub_field('election');
						  the_sub_field('type');
						  the_sub_field('Result');
						endwhile; ?>
				    </div>
				<?php endif; ?>
              </div>
              <div class="tab-pane grid-100 grid-parent" id="tab-politicians-others" role="tabpanel">
                <h3>Other Content</h3>
                <?php the_content(); ?>
              </div>
            </div><div class="clear"></div>
          </div>
            
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