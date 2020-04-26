<?php get_header(); ?>


<?php 
//} elseif ( is_front_page() ) {
  
//} elseif ( is_home() ) {
  
if ( is_page('10') || is_page('14') ||  is_page('22') || is_page('20') || is_page('24') || is_page('18') ||  is_page('16')  ) {?>
  
<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
<section class="container top-banner" style="background:url(<?php echo $feat_image;?>);">
	
    
    			
             <section class="banner-overlay col-lg-6 col-md-6 col-sm-6 hidden-xs"> 
             
             		<?php
						$banner_title=get_post_meta($post->ID,'Banner Title',true);
						if($banner_title != '') {
						echo '<h1>'. $banner_title .'</h1>';
						} else {
						echo '<h1>Delta Electronics</h1>';
						}
						//echo $content;
					?>
                    
                    <?php
						$banner_description=get_post_meta($post->ID,'Banner Description',true);
						if($banner_description != '') {
						echo '<p>'. $banner_description .'</p>';
						} else {
						echo '<p>To provide innovative, clean and energy-efficient solutions for a better tomorrow.</p>';
						}
						//echo $content;
					?>    
                        
                           
                
    	
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
    
    
    </section>
    
    <section class="col-lg-4 col-md-4 col-sm-4 col-xs-12 sidebar">
    
    	<section class="contact-us sidebar-form">
        	<section class="title bg-gray">
        		<h2>Contact Us</h2>
            </section>
            
            <section class="content">
            	<img class="img-responsive" src="<?php bloginfo('template_url'); ?>/img/contact-us.jpg" alt="" width="267" height="100" />
                <p>Have a question or need any assistance that should be answered by a professional? Contact us, and let our staff help you.</p>
        		<?php // echo $content; ?>
                
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
	                <img class="img-responsive center-block"  src="<?php bloginfo('template_url'); ?>/img/video.jpg" alt="" width="232" height="185" />
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
  
<?php  
}

elseif ( is_page('69') || is_page('93') || is_page('114') || is_page('116') || is_page('118') || is_page('120') || is_page('122') || is_page('124') || is_page('126') || is_page('216') || is_page('218') ) {?>
<section class="container padding-right-off padding-left-off">  
			<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
			<section class="top-banner-2 col-lg-8 col-md-6 col-sm-6 col-xs-12" style="background:url(<?php echo $feat_image;?>);">
            </section>
	
    
				
             <section class="banner-overlay-2 col-lg-4 col-md-6 col-sm-6 hidden-xs"> 
             	<section class="banner-overlay-2-content col-lg-10 col-md-6 col-sm-6 hidden-xs">
             		<h1>About Delta</h1>
                    <p><?php the_title(); ?></p>
                
                </section>    
						
                           
                
    	
    		 </section>
        
    
   

</section>

<section class="container breadcrumb">  
			
			<?php wordpress_breadcrumbs(); ?>
            		
                   
</section>   








<section class="container page-content">


	<section class="col-lg-4 col-md-4 col-sm-4 col-xs-12 sidebar-left ">
    
    
    	<section class="sidebar-menu">
        	<section class="title bg-gray">
        		<h2>About Delta</h2>
                
            </section>
            <section class="content">
            
               <ul class="sidebar-menu">
                	<li><a href="<?php echo site_url(); ?>/about-delta/delta-group/">Overview</a></li>
                   <!-- <li><a href="<?php //echo site_url(); ?>/about-delta/australian-operations/">Australian operations</a></li>-->
                    <li><a href="<?php echo site_url(); ?>/about-delta/csr/">CSR</a></li>
                    <li><a href="<?php echo site_url(); ?>/about-delta/careers/">Careers</a></li>
                    
				</ul>
            </section>
        </section>
    
    
    
    
    
    
    	<section class="contact-us sidebar-form">
        	<section class="title bg-gray">
        		<h2>Contact Us</h2>
            </section>
            
            <section class="content">
            	<img class="img-responsive" src="<?php bloginfo('template_url'); ?>/img/contact-us.jpg" alt="" width="267" height="100"  />
                <p>Have a question or need any assistance that should be answered by a professional? Contact us, and let our staff help you.</p>
        		<?php // echo $content; ?>
                
                <?php
						require('vemail_forms/sidebar-contact-us-form.php');
				?>  
             
                
       		</section>
        </section>
        
            
    	
        
    </section>





	<section class="col-lg-8 col-md-8 col-sm-8 col-xs-12 main-content bg-white">
    	<section class="title bg-gray">
        	<h2><?php the_title(); ?></h2>
            
        </section>
        <section class="content">
        
        	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
				the_content();
			endwhile; else: ?>
				<p>Sorry, no posts matched your criteria.</p>
			<?php endif; ?>
            
            
            <section class="csr-thumbnail-nav">
            <?php 
			if ( is_page('124')){
            
            			$postid = get_the_ID(); 
                        $args=array(
                        'post_type' => 'page', //selects pages
                        'post_parent' => $postid , //Selects pages with the parent ID of 10
						'order' => 'DESC'
						
                       );
                     
                    $my_query = new WP_Query($args);
                    if( $my_query->have_posts() ) {
                    while ($my_query->have_posts()) : $my_query->the_post(); ?>
                    
                
                    <section class="csr-thumbnail-nav-item">
                     <section class="imageHolder">
                        <?php //$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
            
                                <a href="<?php the_permalink() ?>">
                                	
                                    <?php //echo catch_that_image() ?>
                               		<?php //$featuredImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                                    <?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
       								<img class="img-reponsive center-block" width="100%" height="186" src="<?php  echo $feat_image; ?> " alt="" />
                                </a>
                        </section>
                        
                        <a href="<?php the_permalink() ?>"> 
                        <h3><?php the_title(); ?></h3>
                        <p><?php
                                //$postid = get_the_ID(); 
                                $my_postid = get_the_ID();//This is page id or post id
                                $post_title = get_the_title($my_postid);
                                $post_link = get_the_permalink($my_postid);
                                
                                $content_post = get_post($my_postid);
                                $content = $content_post->post_content;
                                $content = apply_filters('the_content', $content);
                                $content = str_replace(']]>', ']]&gt;', $content);
                              
                                echo substr($content, 0, 100);
                               
                          ?> </p>
                       	  </a>	
                    </section> 
                    
                  
                       
                <?php
                    endwhile;
                    }else{ ?>
						
						<p>There is no Related items found. </p>
						
					<?php	}
                    ?>
                    
                </section>	
            
				
				
				
			<?php } ?>
            
            
            
            
            
        </section>
    
    
    		
    
    </section>

</section>

<?php
}elseif ( is_page('182') || is_page('608') || is_page('606') || is_page('610')  ) {?>
<section class="container padding-right-off padding-left-off">  
			<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
			<section class="top-banner-2 col-lg-8 col-md-6 col-sm-6 col-xs-12" style="background:url(<?php echo $feat_image;?>);">
            </section>
	
    
				
             <section class="banner-overlay-2 col-lg-4 col-md-6 col-sm-6 hidden-xs"> 
             	<section class="banner-overlay-2-content col-lg-10 col-md-6 col-sm-6 hidden-xs">
                
                
                	
                
             		<h1>Services and Support</h1>
                    <p><?php the_title(); ?></p>
                
                </section>    
						
                           
                
    	
    		 </section>
        
    
   

</section>

<section class="container breadcrumb">  
			
			<?php wordpress_breadcrumbs(); ?>
            		
                   
</section>   








<section class="container page-content">


	<section class="col-lg-4 col-md-4 col-sm-4 col-xs-12 sidebar-left ">
    
    
    	<section class="sidebar-menu">
        	<section class="title bg-gray">
        		<h2>Services and Support</h2>
                
            </section>
            <section class="content">
            
               <ul class="sidebar-menu">
                	
                    <li><a href="<?php echo site_url(); ?>/services-support/product-registration/">Product Registration</a></li>
                    <li><a href="<?php echo site_url(); ?>/services-support/replacement-request/">Replacement Request</a></li>
                  	<li><a href="<?php echo site_url(); ?>/services-support/faqs/">FAQs</a></li>
                    
				</ul>
            </section>
        </section>
    
    
    
    
    
    
    	<section class="contact-us sidebar-form">
        	<section class="title bg-gray">
        		<h2>Contact Us</h2>
            </section>
            
            <section class="content">
            	<img class="img-responsive" src="<?php bloginfo('template_url'); ?>/img/contact-us.jpg" alt="" width="267" height="100" />
                <p>Have a question or need any assistance that should be answered by a professional? Contact us, and let our staff help you.</p>
        		<?php // echo $content; ?>
                <?php
						require('vemail_forms/sidebar-contact-us-form.php');
				?>  
             
                
       		</section>
        </section>
        
            
    	
        
    </section>





	<section class="col-lg-8 col-md-8 col-sm-8 col-xs-12 main-content bg-white">
    	<section class="title bg-gray">
        	<h2><?php the_title(); ?></h2>
            
        </section>
        <section class="content">
        	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
				the_content();
			endwhile; else: ?>
				<p>Sorry, no posts matched your criteria.</p>
			<?php endif; ?>
        </section>
    
    
    		
    
    </section>

</section>

<?php
}elseif ( is_page('180') || is_page('199') || is_page('203') || is_page('308')  ) {?>
<section class="container padding-right-off padding-left-off">  
			<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
			<section class="top-banner-2 col-lg-8 col-md-6 col-sm-6 col-xs-12" style="background:url(<?php echo $feat_image;?>);">
            </section>
	
    
				
             <section class="banner-overlay-2 col-lg-4 col-md-6 col-sm-6 hidden-xs"> 
             	<section class="banner-overlay-2-content col-lg-10 col-md-6 col-sm-6 hidden-xs">
                
                
                	
                
             		<h1>Contact Us</h1>
                    <p><?php the_title(); ?></p>
                
                </section>    
						
                           
                
    	
    		 </section>
        
    
   

</section>

<section class="container breadcrumb">  
			
			<?php wordpress_breadcrumbs(); ?>
            		
                   
</section>   








<section class="container page-content">


	<section class="col-lg-4 col-md-4 col-sm-4 col-xs-12 sidebar-left ">
    
    
    	<section class="sidebar-menu">
        	<section class="title bg-gray">
        		<h2>Contact Us</h2>
                
            </section>
            <section class="content">
            
               <ul class="sidebar-menu">
                	<li><a href="<?php echo site_url(); ?>/contact-us/ausnz-office/">Aust & NZ Offices </a></li>
                    <li><a href="<?php echo site_url(); ?>/contact-us/delta-global-office/">Global Operations </a></li>
                 
				</ul>
            </section>
        </section>
    
    
        
    </section>





	<section class="col-lg-8 col-md-8 col-sm-8 col-xs-12 main-content bg-white">
    	<section class="title bg-gray">
        	<h2><?php the_title(); ?></h2>
            
        </section>
        <section class="content">
        
        <?php 
            if( is_page(180) ){ ?>
            
            
            
            
				
                
                	<?php
                            $postid = get_the_ID(); 
							$args=array(
							'post_type' => 'page', //selects pages
							'post_parent' => $postid , //Selects pages with the parent ID of 10
							'order' => 'ASC'
                            
                           );
                         
                        $my_query = new WP_Query($args);
                        if( $my_query->have_posts() ) {
                        while ($my_query->have_posts()) : $my_query->the_post(); ?>
                    
						<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                        <section class="col-lg-6 main-topics mar-b-25 "><img class="img-responsive" src="<?php echo $feat_image;?>" alt="" width="auto" height="auto" />
                        	<h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                        </section>   
                      
                    
				
                    <?php endwhile;} ?>
                    
               
            
            <?php }?> 
        
        
        
        
        
        
         <?php if( is_page(199)){?>
         
         	<section class="local-office-contact">
            	<section class="title"><h2>Delta Energy Systems - Australia</h2></section>
                
                
                    <section class="office-img col-lg-4 col-md-4 col-sm-4">
                        <?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                        <img class="img-responsive" src="<?php echo $feat_image;?>" alt="" width="auto" height="auto" />
                    
                    </section>
                    <section class="office-info col-lg-8 col-md-8 col-sm-8">
                    
                    	<?php
							$office = get_post_meta($post->ID,'Office',true);
							if($office != '') {
							echo '<h3>'. $office .'</h3>';
							} else {
							echo '<h3>Melbourne Office</h3>';
							}
							//echo $content;
						?>
                    
                       <!-- <h3>Melbourne Office</h3>-->
                       
                       <?php
							$address = get_post_meta($post->ID,'Address',true);
							if($office != '') {
							echo '<p>'. $address .'</p>';
							} else {
							echo '<p>20-21/45 Normanby Road Notting Hill, VIC 3168, Australia</p>';
							}
							//echo $content;
						?>
                        <!--<p>20-21/45 Normanby Road Notting Hill, VIC 3168, Australia</p>-->
                        
                        <?php
							$tel = get_post_meta($post->ID,'Tel',true);
							if($tel != '') {
							echo '<p> Tel: '. $tel .'</p>';
							} else {
							echo '<p>Tel: +61-3-9543-3720</p>';
							}
							//echo $content;
						?>
                        
                       <!-- <p>Tel: +61-3-9543-3720</p>-->
                        <?php
							$fax = get_post_meta($post->ID,'Fax',true);
							if($tel != '') {
							echo '<p> Fax: '. $fax .'</p>';
							} else {
							echo '<p>Fax: +61-3-9544-0606</p>';
							}
							//echo $content;
						?>
                       
                       
                       <!-- <p>Fax: +61-3-9544-0606</p>-->
                    
                    </section>
         		
         	</section>
            
           <?php /*?> <script type="text/javascript" src="http://vemail.digitalglare.com/download/scripts/5.8.40/js/third_party/jquery/jquery.js" /></script>
        <script type="text/javascript" src="http://vemail.digitalglare.com/download/scripts/5.8.40/js/webform_validation.js" /></script>
        <script type="text/javascript" src="http://vemail.digitalglare.com/download/scripts/5.8.40/js/quickform.js" /></script>
        <script type="text/javascript" src="http://vemail.digitalglare.com/download/scripts/5.8.40/js/third_party/jquery/plugins/uploadify/swfobject.js" /></script>
        <script type="text/javascript" src="http://vemail.digitalglare.com/download/scripts/5.8.40/js/third_party/jquery/plugins/uploadify/jquery.uploadify.v2.1.4.min.js" /></script>
        <script type="text/javascript">
            var _e_r = new RegExp("^(?:[\\#\\$\\&'\\*\\+\\-\\/\\=\\?\\^\\_\\`\\{\\}\\|\\~a-zA-Z0-9-]+(?:\\.[\\#\\$\\&'\\*\\+\\-\\/\\=\\?\\^\\_\\`\\{\\}\\|\\~a-zA-Z0-9-]+)*@[a-zA-Z0-9-]{1,63}(?:\\.[a-zA-Z0-9-]{1,63})*\\.[a-zA-Z][a-zA-Z0-9-]{1,62})?$");
            function validateEmail(addr) {
                return _e_r.test(addr) && (addr == "" || addr.indexOf("@") < 65);
            }

            var fix_form_width = false;
        </script><?php */?>
            
            <section class="contact-form">
            	<section class="title"><h2>Contact Us</h2></section>
                
                <section class="contact-form-section">
               <!-- <form class="form-horizontal" role="form">-->
                
                   <?php
						require('vemail_forms/contact-us-form.php');
				?>  
                
                
                </section>
                
            </section>    
            
            
            
            
            
         
        	
            <?php } ?>
            
        	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
			
				the_content();
				
			endwhile; else: ?>
            
				<p>Sorry, no posts matched your criteria.</p>
                
			<?php endif; ?>
            
            
        </section>
    
    
    		
    
    </section>

</section>


<?php
}elseif ( is_page('205') || is_page('211') ) {?>
<section class="container padding-right-off padding-left-off">  
			<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
			<section class="top-banner-2 col-lg-8 col-md-6 col-sm-6 col-xs-12" style="background:url(<?php echo $feat_image;?>);">
            </section>
	
    
				
             <section class="banner-overlay-2 col-lg-4 col-md-6 col-sm-6 hidden-xs"> 
             	<section class="banner-overlay-2-content col-lg-10 col-md-6 col-sm-6 hidden-xs">
                
                
                	
                
             		<h1>News Center</h1>
                    <p><?php the_title(); ?></p>
                
                </section>    
						
                           
                
    	
    		 </section>
        
    
   

</section>

<section class="container breadcrumb">  
			
			<?php wordpress_breadcrumbs(); ?>
            		
                   
</section>   








<section class="container page-content">


	<section class="col-lg-4 col-md-4 col-sm-4 col-xs-12 sidebar-left ">
    
    
    	<section class="sidebar-menu">
        	<section class="title bg-gray">
        		<h2>News and Events</h2>
                
            </section>
            <section class="content">
            
               <ul class="sidebar-menu">
                	<li><a href="<?php echo site_url(); ?>/news-and-events/">Delta News</a></li>
                    <li><a href="<?php echo site_url(); ?>/news-and-events/events-training/">Events & Training</a></li>
                    <li><a href="<?php echo site_url(); ?>/news-and-events/media-contact/">Media Contact</a></li>
                 
				</ul>
            </section>
        </section>
    
    
    
    
    
    
    	<section class="contact-us sidebar-form">
        	<section class="title bg-gray">
        		<h2>Contact Us</h2>
            </section>
            
            <section class="content">
            	<img class="img-responsive" src="<?php bloginfo('template_url'); ?>/img/contact-us.jpg" alt="" width="267" height="100" />
                <p>Have a question or need any assistance that should be answered by a professional? Contact us, and let our staff help you.</p>
        		 <?php
						require('vemail_forms/sidebar-contact-us-form.php');
				?>  
         
               
                
       		</section>
        </section>
        
            
    	
        
    </section>





	<section class="col-lg-8 col-md-8 col-sm-8 col-xs-12 main-content bg-white">
    	<section class="title bg-gray">
        	<h2><?php the_title(); ?></h2>
            
        </section>
        <section class="content">
        	<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
				the_content();
			endwhile; else: ?>
				<p>Sorry, no posts matched your criteria.</p>
			<?php endif; ?>
        </section>
    
    
    		
    
    </section>

</section>



<?php }else{ ?>


<?php //$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
<section class="container top-banner" style="background:url(<?php bloginfo('template_url'); ?>/img/header_img.jpg);">
	
    
    			
             <section class="banner-overlay col-lg-6 col-md-6 col-sm-6 hidden-xs"> 
             
             		<?php
						$banner_title=get_post_meta($post->ID,'Banner Title',true);
						if($banner_title != '') {
						echo '<h1>'. $banner_title .'</h1>';
						} else {
						echo '<h1>Delta Electronics</h1>';
						}
						//echo $content;
					?>
                    
                    <?php
						$banner_description=get_post_meta($post->ID,'Banner Description',true);
						if($banner_description != '') {
						echo '<p>'. $banner_description .'</p>';
						} else {
						echo '<p>To provide innovative, clean and energy-efficient solutions for a better tomorrow.</p>';
						}
						//echo $content;
					?>    
                        
                           
                
    	
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
         	<?php 
            if( is_page(12) ){ ?>
            
            
            
            
				
                
                	<?php
                            $postid = get_the_ID(); 
							$args=array(
							'post_type' => 'page', //selects pages
							'post_parent' => $postid , //Selects pages with the parent ID of 10
							'order' => 'ASC'
                            
                           );
                         
                        $my_query = new WP_Query($args);
                        if( $my_query->have_posts() ) {
                        while ($my_query->have_posts()) : $my_query->the_post(); ?>
                    
						<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                        <section class="col-lg-6 mar-b-25"><a href="<?php the_permalink() ?>"><img class="img-responsive" src="<?php echo $feat_image;?>" alt="" width="auto" height="auto" /></a>
                        	<h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                        </section>   
                      
                    
				
                    <?php endwhile;} ?>
                    
               
            
            <?php }?> 
            
        	 <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
				the_content();
			endwhile; else: ?>
				<p>Sorry, no posts matched your criteria.</p>
			<?php endif; ?>
            
        </section>
    
    	
    
    </section>
    
    <section class="col-lg-4 col-md-4 col-sm-4 col-xs-12 sidebar">
    
    	<section class="contact-us sidebar-form">
        	<section class="title bg-gray">
        		<h2>Contact Us</h2>
            </section>
            
            <section class="content">
            	<img class="img-responsive" src="<?php bloginfo('template_url'); ?>/img/contact-us.jpg" alt="" width="267" height="100" />
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
	                <img class="img-responsive center-block"  src="<?php bloginfo('template_url'); ?>/img/video.jpg" alt="" width="232" height="185" />
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




<?php } ?>

<?php get_footer(); ?> 