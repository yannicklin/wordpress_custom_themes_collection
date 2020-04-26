<?php get_header(); ?>


  
  	
<section id="slider-banner">
	<section class="container">
    	
		 <?php
        	echo do_shortcode('[smartslider2 slider="4"]');
         ?>
         
     </section>   
</section>




<section class="container listing-area bg-white" >

	
    	<section class="business col-lg-8 col-md-8 col-sm-8  col-xs-12">
        	<h2>Our Business</h2>
            <section class="col-lg-4 col-md-4 col-sm-6 col-xs-12 padding-right-off">
            	<h3>
                <a href="http://www.delta-es.com.au/solutions/renewable-energy-solutions/">Renewable Energy</a>
              </h3>
                <ul>
                  <li>
                    <a href="http://www.delta-es.com.au/solutions/renewable-energy-solutions/#single-phase-inverter">Single Phase Inverter</a>
                  </li>
                  <li>
                    <a href="http://www.delta-es.com.au/solutions/renewable-energy-solutions/#three-phase-inverter">Three Phase Inverter</a>
                  </li>
                </ul>    
            
            </section>
            <section class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
              
              <h3>
                <a href="http://www.delta-es.com.au/solutions/industrial-automation-solutions/">Industrial Automation</a>
              </h3>
                <ul>
                  <li>
                    <a href="http://www.delta-es.com.au/solutions/industrial-automation-solutions/#drives">Drive</a>
                </li>
                  <li>
                    <a href="http://www.delta-es.com.au/solutions/industrial-automation-solutions/#motion">Motion</a>
                  </li>
                  <li>
                    <a href="http://www.delta-es.com.au/solutions/industrial-automation-solutions/#control">Control</a>
                  </li>
                  <li>
                    <a href="http://www.delta-es.com.au/solutions/industrial-automation-solutions/#field-device">Field Device</a>
                  </li>
                  <li>
                    <a href="http://www.delta-es.com.au/solutions/industrial-automation-solutions/#power-quality">Power Quality</a>
                  </li>

                </ul> 
            
            </section>
            <section class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            
            	<h3>
                <a href="http://www.delta-es.com.au/solutions/mission-critical-infrastructure-solutions/">MCIS</a>
              </h3>
                <ul>
                  <li>
                    <a href="http://www.deltapowersolutions.com/en/mcis/ups.php" target="_blank">UPS</a>
                  </li>
                  <li>
                    <a href="http://www.deltapowersolutions.com/en/mcis/data-center.php" target="_blank">DataCentre</a>
                  </li>
                  <li>
                    <a href="http://www.deltapowersolutions.com/en/mcis/data-center-precision-cooling.php" target="_blank">Precision Cooling</a>
                  </li>
                  <li>
                    <a href="http://www.deltapowersolutions.com/en/mcis/pqc-active-power-filter.php" target="_blank">Power Quality Control</a>
                  </li>
                    
                    
                </ul> 
            
            </section>
        
        </section>
        
        <section class="col-lg-4 col-md-4 col-sm-4 col-xs-12 solution">
        	<h2>Solutions</h2>
            <ul>
            <?php
                        $args=array(
                        'post_type' => 'page', //selects pages
                        'post_parent' => '12', //Selects pages with the parent ID of 10
						'order' => 'ASC'
						
                       );
                     
                    $my_query = new WP_Query($args);
                    if( $my_query->have_posts() ) {
                    while ($my_query->have_posts()) : $my_query->the_post(); ?>
                    
            	<li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>
                
                <?php endwhile;} ?>
            </ul>
            
            
        
        </section>
        
</section>

<section class="container features bg-white">
	
     <?php
		$catquery = new WP_Query( 'cat=6&posts_per_page=1&order=DESC' );
		while($catquery->have_posts()) : $catquery->the_post();
	 ?>
	<section class="col-lg-2 col-md-2 col-sm-3 featured-article-img">
        <h2>Features</h2>
        <?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
        <img class="img-responsive" src="<?php echo $feat_image;?>" alt="" />
    </section>

	<section class="col-lg-6 col-md-6 col-sm-5 featured-article">
    	
        <h4><?php the_title(); ?></h4>
        <section class="featured-article-content">
        	<?php //remove_filter ('the_content', 'wpautop'); ?>
            <?php //wp_trim_words( get_the_content(), 280 ); ?>
        	<?php the_content(); ?>
           
    	</section>
    </section>
    <?php endwhile; ?>
    
    <section class="col-lg-4 col-md-4 col-sm-4 news">
    	
        <section class="news-section">
			<?php
                echo do_shortcode('[smoothslider id="2"]');
             ?>
        </section>
       
    
    </section>

</section>



<section class="container gallery-section bg-white">
	<section class="col-lg-8 col-md-8 col-sm-8 col-xs-12 gallery">
    
     <h2>Delta CSR</h2>
     
    
         <section id="demo">
            
    
                  <section id="owl-demo" class="owl-carousel">
                  
                    <?php
						//$postid = get_the_ID(); 
                        $args=array(
                        'post_type' => 'page', //selects pages
                        'post_parent' => '124' , //Selects pages with the parent ID of 10
						'order' => 'DESC'
						
                       );
                     
                    $my_query = new WP_Query($args);
                    if( $my_query->have_posts() ) {
                    while ($my_query->have_posts()) : $my_query->the_post(); ?>
                    
                
                     <section class="item">
                    	<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                        <img src="<?php echo $feat_image;?>" alt="Delta CSR" height="186px">
                        <a href="<?php the_permalink(); ?>" class='description'>  
                            <h6><?php the_title(); ?></h6>
                            <p>  
							  <?php
                                //$postid = get_the_ID(); 
                                $my_postid = get_the_ID();//This is page id or post id
                                $post_title = get_the_title($my_postid);
                                $post_link = get_the_permalink($my_postid);
                                
                                $content_post = get_post($my_postid);
                                $content = $content_post->post_content;
                                $content = apply_filters('the_content', $content);
                                $content = str_replace(']]>', ']]&gt;', $content);
                              
                                echo substr($content, 0, 100);
                               
                               ?> 
                               ...</p>
                             
                         </a>
                    </section> 
                    
                  
                       
                <?php
                    endwhile;
                    }else{ ?>
						
						<p>There is no Related posts found. </p>
						
					<?php	}
                    ?>
                    
                   
                  </section>
                  
                
        </section>
         
       
      
    </section>
    
 

 <?php
//$postid = get_the_ID(); 
$args=array(
'post_type' => 'post',//selects pages
'cat'      => 27, 
'order' => 'DESC'

);
 
$my_query = new WP_Query($args);
$count=1;
if( $my_query->have_posts() ) {
while ($my_query->have_posts()) : $my_query->the_post();
 
$count = $count++; 
    
    ?>
    <section class="col-lg-4 col-md-4 col-sm-4 col-xs-12 video">
    	<h2>Explore</h2>
        <section class="video-section col-lg-12">
        	<a href="#myModal-<?php echo $count; ?>" data-toggle="modal" data-target="#myModal-<?php echo $count; ?>">
            
            		<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
	                <img class="img-responsive center-block"  src="<?php echo $feat_image; ?>" alt="" />
            </a>
        </section>
        
    </section>
    
<!---  Video Pop Up Model box Section -->   
<section class="modal fade" id="myModal-<?php echo $count; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <section class="modal-dialog">
    <section class="modal-content">
      <section class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Explore</h4>
      </section>
      <section class="modal-body">
       <?php
			//$postid = get_the_ID(); 
			$my_postid = get_the_ID();//This is page id or post id
			$post_title = get_the_title($my_postid);
			$post_link = get_the_permalink($my_postid);
			
			$content_post = get_post($my_postid);
			$content = $content_post->post_content;
			$content = apply_filters('the_content', $content);
			$content = str_replace(']]>', ']]&gt;', $content);
		  
			echo $content;
                               
       ?>
         
      <!--<iframe width="560" height="315" src="//www.youtube.com/embed/2bHzZP_6z-A" frameborder="0" allowfullscreen></iframe>
      <p>Delta ASDA-M servo system provides machinery industries with enhanced competitiveness.</p>-->
      </section>
      
    </section>
  </section>
</section>
<!---  Video Pop Up Model box Section -->   


</section> 

 <?php
endwhile;
}else{ ?>
	
	<section class="col-lg-4 col-md-4 col-sm-4 col-xs-12 video">
    	<h2>Explore</h2>
        <section class="video-section col-lg-12">
        	<a href="#myModal" data-toggle="modal" data-target="#myModal">
	                <img class="img-responsive center-block"  src="<?php bloginfo('template_url'); ?>/img/video.jpg" alt="" />
            </a>
        </section>
        
    </section>
    
<!---  Video Pop Up Model box Section -->   
<section class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <section class="modal-dialog">
    <section class="modal-content">
      <section class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Explore</h4>
      </section>
      <section class="modal-body">
      <iframe width="560" height="315" src="//www.youtube.com/embed/2bHzZP_6z-A" frameborder="0" allowfullscreen></iframe>
      <p>Delta ASDA-M servo system provides machinery industries with enhanced competitiveness.</p>
      </section>
      
    </section>
  </section>
</section>
<!---  Video Pop Up Model box Section -->   
	
<?php	}
?>


<?php get_footer(); ?>