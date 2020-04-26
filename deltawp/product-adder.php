<?php get_header(); ?>
<section class="container padding-right-off padding-left-off">  
			
			<section class="top-banner-2 col-lg-8 col-md-6 col-sm-6 col-xs-12" style="background:url(<?php bloginfo('template_url'); ?>/img/header_img.jpg);">
            </section>
	
    
				
             <section class="banner-overlay-2 col-lg-4 col-md-6 col-sm-6 hidden-xs"> 
             	<section class="banner-overlay-2-content col-lg-10 col-md-10 col-sm-10  hidden-xs">
             		 <h1>Our Products</h1>
                     <p>Fill the form below to send an Enquiry about products</p>
                
                </section>    
						
                           
                
    	
    		 </section>
        
    
   

</section>

<?php

$category = $_GET['category'];

?>

<section class="container breadcrumb">  
			
			
            
</section>   

<section class="container page-content">
	<section class="col-lg-8 col-md-8 col-sm-8 col-xs-12 main-content bg-white">
    	<section class="title bg-blue">
        	<h2><?php the_title(); ?></h2>
        </section>
        <section class="content single-product-page">
        	
        	<?php content_product_adder(); ?>
            
            <a class="enquire-button  btn btn-primary" href="#myModal" data-target="#enquire" data-toggle="modal">Enquire Now </a>
            <a class="back-button btn btn-primary" href="javascript:history.go(-1)" onMouseOver="self.status=document.referrer;return true">Back To Products List</a>
            
        </section>
    
    	
    
    </section>
    
    <section class="col-lg-4 col-md-4 col-sm-4 col-xs-12 sidebar">
    
    	<section class="contact-us sidebar-form">
        	<section class="title bg-gray">
        		<h2>Contact Us</h2>
            </section>
            
            <section class="content">
            	<img class="img-responsive" src="<?php bloginfo('template_url'); ?>/img/contact-us.jpg" alt="" />
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

<section class="modal fade" id="enquire" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <section class="modal-dialog">
    <section class="modal-content">
      <section class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Enquire Now</h4>
      </section>
      <section class="modal-body">
      
      
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
      
 
        <?php
						require('vemail_forms/product-enquiry.php');
				?> 
      
      
      
      <!-- <p>Enquiry Form </p>-->
      </section>
      
    </section>
  </section>
</section>






   
<?php get_footer(); ?> 
