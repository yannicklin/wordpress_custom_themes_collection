<?php
/*
Template Name: Blog
*/

get_header(); ?>


<section class="container padding-right-off padding-left-off">  
			<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
			<section class="top-banner-2 col-lg-8 col-md-6 col-sm-6 col-xs-12" style="background:url(<?php echo $feat_image;?>);">
            </section>

           <section class="banner-overlay-2 col-lg-4 col-md-6 col-sm-6 col-xs-6 hidden-xs"> 
             	<section class="banner-overlay-2-content col-lg-10 col-md-6 col-sm-6  hidden-xs">
             		<h1>News Center</h1>
                    <p><?php // the_title(); ?></p>
                
                </section>             
    	
    		 </section>

</section>

<section class="container breadcrumb">  
			<?php wordpress_breadcrumbs(); ?>
</section>   

            
            <section class="blog-container">
                <section class="container blog-section">   
                	
                    
                    
                    		<section class="col-lg-3 col-md-4 col-sm-4 blog-sidebar padding-left-off">
                            
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
                            
                            
                            
                            
                            
                            
                            
                            
								<section class="title bg-gray">
                                    <h2>News Center</h2>
                                </section>
                                <?php get_sidebar();?>
                            </section>
                    
                    
                    
                    
                    
                    
                               			
                            <section class="col-lg-9 col-md-8 col-sm-8 blog-content bg-white padding-right-off padding-left-off">
                            	<section class="title bg-gray">
                                    <h2>News Center</h2>
                                </section>
                                
                                <section class="blog-listning">
                                
                                <?php
								 
								
								$temp = $wp_query;
								$wp_query = NULL;
								$wp_query = new WP_Query();
								$wp_query->query('cat=22&posts_per_page=5&order=DESC&paged='.$paged); $tb_counter = 1;
								while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                                
                                <section <?php if(function_exists('post_class')) : ?><?php post_class(); ?><?php else : ?>class="post post-<?php the_ID(); ?>"<?php endif; ?>>
                                    <section class="entry">
                                        <?php /*?><h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1><?php */?>
                                        
                                        <?php if ( is_single() ) : ?>
                                            <h3 class="entry-title"><?php the_title(); ?></h3>
                                            <?php else : ?>
                                            <h3 class="entry-title">
                                                    <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                                            </h3>
                                            <section class="blogdate_blogauthor"> 
                                                By <span class="blogauthor"><?php the_author() ?></span> on <?php the_time('F jS') ?>, <?php the_time('Y') ?> 
                                            </section>
                                            <section class="entry-thumbnail  mar-b-10">
                                            	
                                            		<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                                                    <img class="img-responsive" src="<?php echo $feat_image ?>" alt="" />
                                                    <?php //the_post_thumbnail(); ?>
                                            </section>
                                            <?php global $more; $more = 0; ?>
                                            <?php //the_content('Continue Reading'); ?> 
                                            <?php the_content('Read more'); ?>
                                           
                                            
                                        <?php endif; // is_single() ?>
                                        
                                        
                                    </section>
                                </section>
                                
                                <?php $tb_counter++; endwhile; ?>
                                <section class="mypagination">
                               	 <?php my_pagination(); ?>
                                </section>
                                
                            	</section>
                                
                                 
                                
                                <section class="clear"></section>
                                
                                <?php $wp_query = NULL; $wp_query = $temp;?>
                                
                            </section>
                            
                            
                                      
                </section>
            </section>
<!--</section>
</section>-->
<?php get_footer(); ?>