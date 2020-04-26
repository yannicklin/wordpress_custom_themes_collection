<?php
/*
Template Name: Search Page
*/
get_header(); ?>

<section class="container padding-right-off padding-left-off">  
			
			<section class="top-banner-2 col-lg-6 col-md-6 col-sm-6 col-xs-12" style="background:url(<?php bloginfo('template_url'); ?>/img/news.jpg);">
            </section>

           <section class="banner-overlay-2 col-lg-6 col-md-6 col-sm-6 hidden-xs"> 
             	<section class="banner-overlay-2-content col-lg-10 col-md-10 col-sm-10 hidden-xs">
             		<h1>News Center</h1>
                    <p><?php the_title(); ?></p>
                
                </section>             
    	
    		 </section>

</section>


<section class="container breadcrumb">  
			<?php wordpress_breadcrumbs(); ?>
</section>    
          
            <section class="blog-container margin-top-130">
                <section class="container blog-section">
                      				
                                    
                                            <section class="col-lg-3 col-md-4 col-sm-4 blog-sidebar padding-left-off">
                                                <section class="title bg-gray">
                                                    <h2>News Center</h2>
                                                </section>
                                                <?php get_sidebar();?>
                                            </section>
                                        
                                    
                                    
                                    
                                                
                                         <section class="col-lg-9 col-md-8 col-sm-8 blog-content bg-white padding-right-off padding-left-off">
                                           
                                            <section class="title bg-gray">
                                                    <h2>Search results for: &quot;<?php echo get_search_query(); ?>&quot;</h2>
                                             </section>
                                            
                                            <section class="blog-listning"> 
                                            <?php if ( have_posts() ) :  // results found?>
                                                <?php while ( have_posts() ) : the_post(); ?>
                                                    <article>
                                                        <h3><?php the_title();  ?></h3>
                                                        <section class="entry-thumbnail">
                                                              
															   <?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                                                               <img class="img-responsive" src="<?php echo $feat_image;?>" alt="...">
                                                               
                                                        </section>
                                                        <p><?php the_excerpt(); ?></p>
                                                        <p><a class="more-link" href="<?php the_permalink(); ?>">View Article</a></p>
                                                    </article>
                                                    <br/>
                                                <?php endwhile; ?>
                                            <?php else :  // no results?>
                                                <article class="margin-top-30 ">
                                                    <h3>Sorry, <br/>we didn't find any content matching your search.</h3>
                                                    <br/><br/>
                                                    <a href="/" class="btn btn-default margin-bottom-20px" style="float:none;">
                                                    <span class="glyphicon glyphicon-list"></span>  BACK TO HOME
                                                    </a>
                                                    <br/>
                                                </article>
                                            <?php endif; ?>
                                            </section>
                                        </section>
                            			
                                        
                					         
                </section>
            </section>
</section>
</section>
<?php get_footer(); ?>