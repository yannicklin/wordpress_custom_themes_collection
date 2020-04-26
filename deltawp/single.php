<?php
/*
Template Name: single page
*/

get_header(); ?>

<section class="container padding-right-off padding-left-off">  
			
			<section class="top-banner-2 col-lg-8 col-md-6 col-sm-6 col-xs-12" style="background:url(<?php bloginfo('template_url'); ?>/img/news.jpg);">
            </section>

           <section class="banner-overlay-2 col-lg-4 col-md-6 col-sm-6 hidden-xs"> 
             	<section class="banner-overlay-2-content col-lg-10 col-md-10 col-sm-10 hidden-xs">
             		<h1>News Center</h1>
                    <p><?php the_title(); ?></p>
                
                </section>             
    	
    		 </section>

</section>


<section class="container breadcrumb">  
			
			<?php 
				// if there is a parent, display the link
					$parent_title = get_the_title( $post->post_parent );
					if ( $parent_title != the_title( ' ', ' ', false ) ) {
						echo '<a href="'. get_home_url() .'"><i class="fa fa-home"></i></a><i class="fa fa-chevron-right"></i><a href="/news-and-events/">News and Events</a><i class="fa fa-chevron-right"></i> ';
					} 
					// then go on to the current page link
					?>
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
				<?php the_title(); ?></a>
            
</section>   


            <section class="blog-container margin-top-130">
                <section class="container blog-section">
                	
                    
                    		
                            <section class="col-lg-3 col-md-4 col-sm-4 blog-sidebar padding-left-off">
                            	
                                <section class="sidebar-menu">
                                    <section class="title bg-gray">
                                        <h2>News and Events</h2>
                                        
                                    </section>
                                    <section class="content">
                                    
                                       <ul class="sidebar-menu">
                                            <li class="active"><a href="<?php echo site_url(); ?>/news-and-events/">Delta News</a></li>
                                          	<li><a href="<?php echo site_url(); ?>/news-and-events/events-training/">Events & Training</a></li>
                                            <li><a href="<?php echo site_url(); ?>/news-and-events/media-contact/">Media Contact</a></li>
                                            
                                            
                                        </ul>
                                    </section>
                                </section>
                            
                            
                            
                            
                            
								<section class="title bg-gray">
                                    <h2>News Center</h2>
                                </section>
                                <?php get_sidebar();?>
                            </section>
                            
                            
                			<section class="col-lg-9 col-md-8 col-sm-8 blog-content bg-white padding-right-off padding-left-off">
                             <section class="title bg-gray">
                                	<h2><?php the_title(); ?></h2>
                             </section>
                             
                             <section class="blog-listning">
                             	
                                
                             
                            	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <section class="entry">
                                
                                <section class="blogdate_blogauthor"> 
									By <span class="blogauthor"><?php the_author() ?></span> on <?php the_time('F jS') ?>, <?php the_time('Y') ?> 
                                </section>
                                <section class="entrybody">
                                			<section class="entry-thumbnail mar-b-10">
                                            
                                               <?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                      						   <img class="img-responsive" src="<?php echo $feat_image;?>" alt="...">
                                                   
                                              
                                            </section>
                                            <?php 
											global $more;    // Declare global $more (before the loop).
											$more = 1;       // Set (inside the loop) to display all content, including text below more.
											the_content();
											?>
								
                                    <section class="pull-left margin-top-30">
                                        <!-- AddThis Button BEGIN -->
                                        <section class="addthis_toolbox addthis_default_style addthis_16x16_style">
                                        <a class="addthis_button_facebook"></a>
                                        <a class="addthis_button_twitter"></a>
                                        <a class="addthis_button_email"></a>
                                        <a class="addthis_button_print"></a>
                                        <a class="addthis_button_compact"></a><a class="addthis_counter addthis_bubble_style"></a>
                                        </section>
                                      <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
                                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5208c9cd110db099"></script>
                                        <!-- AddThis Button END -->
                                    </section>														
                                </section>
                                
                                <?php trackback_rdf(); ?>
                                </section>
                                
                                <?php /*?><?php comments_template(); ?><?php */?>
                                <?php endwhile; else: ?>
                                <p> <?php _e('Sorry, no posts matched your criteria.'); ?> </p>
                                <?php endif; ?>
                                
                                <br/>
								
                                <section class="mar-t-25 clearfix">	                            
                                    <section class="col-xs-6 col-lg-6 text-left pad-l-0 prev">
                                        <?php previous_post_link( '%link', 'Older', true, '13 and 3 and 14 and 1 and 16' ); ?> <?php if(!get_adjacent_post(false, '', true)) { echo '<span>&laquo;Older</span>'; } 
                                        // if there are no older articles ?>
                                    </section>
                                    <section class="col-xs-6 col-lg-6 text-right pad-r-0 next">
                                        <?php next_post_link( '%link', 'Next', true, '13 and 3 and 14 and 1 and 16' ); ?> <?php if(!get_adjacent_post(false, '', false)) { echo '<span>Next </span>'; } 
                                        // if there are no newer articles ?> 
                                    </section>
                                </section>
                                 
                                
                            </section>
                         
                            
            	</section>                
            </section>
</section>
</section>
<?php get_footer(); ?>