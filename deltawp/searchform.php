<div class="search_box">
     <form action="/" class="searchform search" id="searchform" method="get" role="search">
		<div>
           <!-- <label for="s" class="screen-reader-text">Search for:</label>-->
            <input type="hidden" name="cat" id="cat" value="7"/>
            <input class="form-control" placeholder="Search" type="text" id="s" name="s" value="<?php the_search_query(); ?>" requierd /><input  type="submit" value="Search" id="searchsubmit">
		</div>
	 </form>      
</div>