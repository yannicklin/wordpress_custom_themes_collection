<?php /* Template Name: Landing Page */ ?>
<?php get_header('landingpage'); ?>


<header class="navbar" role="navigation">
      <section class="container landing-page-header">
        
          
           <img class="center-block" src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="delta energy" />
           <p>To provide innovative, clean and energy-efficient solutions for a better tomorrow.</p>
          
        
      </section>
    </header>


<section id="landing-page-content">
	<section class="container bg-white">
    		
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
					the_content();
				endwhile; else: ?>
					<p>Sorry, no posts matched your criteria.</p>
			<?php endif; ?>
            
     </section>   
</section>



</section>



<?php get_footer('landingpage'); ?> 