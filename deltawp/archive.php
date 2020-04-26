<?php
/*
Template Name: Archive
*/

get_header(); ?>

<section class="container padding-right-off padding-left-off">  
			
			<section class="top-banner-2 col-lg-8 col-md-6 col-sm-6 col-xs-12" style="background:url(<?php bloginfo('template_url'); ?>/img/news.jpg);">
            </section>

           <section class="banner-overlay-2 col-lg-4 col-md-6 col-sm-6 col-xs-12"> 
             	<section class="banner-overlay-2-content col-lg-10 col-md-10 col-sm-10 col-xs-10">
             		<h1>News Center</h1>
                    <p>Archives</p>
                
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
                      				
                                    
                                    
                                    <section class="col-lg-3 col-md-4 col-sm-5 blog-sidebar padding-left-off">
                                        <section class="title bg-gray">
                                            <h2>News Center</h2>
                                        </section>
                                        <?php get_sidebar();?>
                                    </section>
                                    
                                    
                                    
                                             
                                        <section class="col-lg-9 col-md-8 col-sm-7 blog-content bg-white padding-right-off padding-left-off">
                                         <section class="title bg-gray">
                                            <h2>News Center</h2>
                                        </section>
                                        
                                        <section class="blog-listning">
                                        
												<?php /*?><h2 class="fancy"><span><?php _e('Blog','gpp_i18n'); ?></span></h2><?php */?>
                                                
                                                <?php
                                                $month_post = get_query_var('monthnum');
                                                $year_post = get_query_var('year');
                                                //echo $month_post;
                                                //echo $year_post;
                                                $posts = get_posts('monthnum='.$month);
                                                
                                                
                                                
                                                $temp = $wp_query;
                                                $wp_query = NULL;
                                                $wp_query = new WP_Query();
                                                $wp_query->query('cat=22&posts_per_page=5&monthnum='.$month_post.'&year=='.$year_post.'&paged='.$paged); $tb_counter = 1;
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
                                                            <section class="entry-thumbnail mar-b-10">
                                                                    <?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                                                    				<img class="img-responsive" src="<?php echo $feat_image ?>" alt="" />
                                                            </section>
                                                            <?php global $more; $more = 0; ?>
                                                            <?php the_content('Continue Reading'); ?> 
                                                            
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
                            
                </section>
            </section>
</section>
</section>
<?php get_footer(); ?>