<section id="main" class="bg-white">
    <section class="search_box">
        <?php get_search_form(); ?>
    </section>
    <section class="archive">
        <h5>Archives by Month:</h5>
        <ul>
            <?php wp_get_archives('type=monthly&cat=22'); ?>
        </ul>  
    </section> 
    
    <section class="archive latest">
        <h5>Latest News</h5>
        <ul class="latest-blog-posts">
            <?php
            query_posts('cat=22&posts_per_page=5');
            while (have_posts()) : the_post();
            ?>
            <li><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></li>
            <?php
            endwhile;
			wp_reset_query();
            ?>
        </ul>  
    </section> 
    
    <section class="category-list">
         <h5>Categories</h5>
         <ul>
            <?php
            $args = array('child_of' => 22);
            $categories = get_categories( $args );
            foreach($categories as $category) { 
                echo '<li> <a href="' . get_category_link( $category->term_id ) . '?sub='.$category->term_id.'" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </li> ';
          
            }
             
            ?>
          
        </ul>
            
    </section>
    
  

</section>