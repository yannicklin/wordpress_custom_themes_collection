<?php /* Template Name: related_products-page */ ?>
<?php get_header(); ?>

<section class="container padding-right-off padding-left-off">  
			<?php if(has_post_thumbnail()) { ?>
			<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
			<section class="top-banner-2 col-lg-8 col-md-6 col-sm-6 col-xs-12" style="background:url(<?php echo $feat_image;?>);">
            </section>
			<?php }else{ ?>
            
            <section class="top-banner-2 col-lg-8 col-md-6 col-sm-6 col-xs-12" style="background:url(<?php bloginfo('template_url'); ?>/img/news.jpg);">
            </section>
            
            
            <?php } ?>
    
				
             <section class="banner-overlay-2 col-lg-4 col-md-6 col-sm-6 hidden-xs"> 
             	<section class="banner-overlay-2-content col-lg-10 col-md-10 col-sm-12 hidden-xs">
             		<h1><?php echo get_the_title( $post->post_parent ); ?></h1>
                    <p><?php the_title(); ?></p>
                
                </section>    
						
                           
                
    	
    		 </section>
        
    
   

</section>

<section class="container breadcrumb">  
			<?php wordpress_breadcrumbs(); ?>
</section>   

<section class="container page-content">
	<section class="col-lg-8 col-md-8 col-sm-8 col-xs-12 main-content bg-white">
    	<section class="title bg-green">
        	<h2><?php the_title(); ?></h2>
            
        </section>
        <section class="content">
         	<?php //get_page( $page_id );echo $page_id; ?> 
            
        	 <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
				the_content();
			endwhile; else: ?>
				<p>Sorry, no posts matched your criteria.</p>
			<?php endif; ?>
            
        </section>
    
    
    	<section class="related-category col-lg-12 blue">
        	<h2>Related Categories</h2>
            
            <section class="related-item-list">
            	<ul class="related-items">
                
				<?php
						$postid = get_the_ID(); 
					
                        $args=array(
                        'post_type' => 'page', //selects pages
                        'post_parent' => $postid, //Selects pages with the parent ID of 10
						'order' => 'ASC'
						
                       );
                     
                    $my_query = new WP_Query($args);
                    if( $my_query->have_posts() ) {
                    while ($my_query->have_posts()) : $my_query->the_post(); ?>
                    
                
                    <li>
                     <section class="imageHolder">
                        <?php //$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
            
                                <a href="<?php the_permalink() ?>">
                                	
                               		<?php //$featuredImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
       								<img class="img-reponsive center-block" width="121" height="99" src="<?php  echo catch_that_image() ?> " alt="" />
                                </a>
                        </section>
                         
                        <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                       
                    </li> 
                    
                   
                       
                <?php
                    endwhile;
                    }else{ ?>
						
						<p>There is no Related categories found. </p>
						
					<?php	}
                    ?>
                   
                </ul>
          </section>    
        
        </section>	
    
    </section>
    
    <section class="col-lg-4 col-md-4 col-sm-4 col-xs-12 sidebar">
    
    	<section class="contact-us sidebar-form">
        	<section class="title bg-gray">
        		<h2>Contact Us</h2>
            </section>
            
            <section class="content">
            	<img class="img-responsive " src="<?php bloginfo('template_url'); ?>/img/contact-us.jpg" alt="" />
                <p>Have a question or need any assistance that should be answered by a professional? Contact us, and let our staff help you.</p>
        		
               <?php
						require('vemail_forms/sidebar-contact-us-form.php');
				?> 
                
       		</section>
        </section>
        
        <section class="inner-video-section">
        	<section class="title bg-gray">
        		<h2>Related Videos & Cases</h2>
                
            </section>
            <section class="content">
                <a href="#myModal" data-toggle="modal" data-target="#myModal">
	                <img class="img-responsive center-block"  src="<?php bloginfo('template_url'); ?>/img/video.jpg" alt="" />
                </a>
            </section>
        </section>    
    	
        
    </section>

</section>


<!---  Video Pop Up Model box Section -->
<section class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <section class="modal-dialog">
    <section class="modal-content">
      <section class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Related Videos & Cases</h4>
      </section>
      <section class="modal-body">
      
      <iframe width="560" height="315" src="//www.youtube.com/embed/2bHzZP_6z-A" frameborder="0" allowfullscreen></iframe>
      <p>Delta ASDA-M servo system provides machinery industries with enhanced competitiveness.</p>
      </section>
      
    </section>
  </section>
</section>
<!---  Video Pop Up Model box Section -->   

<?php get_footer(); ?> 