// JavaScript Document
jQuery(document).ready(function($){
	
 
	
	
  $('#select').change(function() {
	var option = jQuery(this).val();
	jQuery.get( site_url + '/wp-content/themes/Delta WP/select.php', {select:option}, function(data) {
	  jQuery('#result').html(data).hide().fadeIn(200);
	});
  });


  $("#owl-demo").owlCarousel({
	autoPlay: 3000,
	items : 2,
	itemsDesktop : [1199,3],
	itemsDesktopSmall : [979,3]
  });
  
  $("#owl-demo-v").owlCarousel({
	autoPlay: false,
	items : 1,
	itemsDesktop : [1199,1],
	itemsDesktopSmall : [979,1]
  });
	
			
	
	
$(function() {
	
window.prettyPrint && prettyPrint()

$(document).on('click', '.yamm .dropdown-menu', function(e) {
  e.stopPropagation()
})

$('.dropdown-toggle').click(function() {
	$(this).next('.dropdown-menu').slideDown(600);
	//$(this).next('.open .dropdown-menu').fadeToggle(500);
	$('.open .dropdown-menu').slideUp(600);
	
});


$(document).click(function(){                   
  $('.dropdown-menu').slideUp(600);
});


/*$(".dropdown").hover(
  function () {
     $('ul.dropdown-menu').stop(true,true).slideDown('medium');
  }, 
  function () {
     $('ul.dropdown-menu').stop(true,true).slideUp('medium');
  }
);*/




})
	
/*$( "a.dropdown-toggle" ).click(function () {
if ( $(this).siblings("ul").is( ":hidden" ) ) {
    $("#mega-menu ul").hide();
$(this).siblings("ul").slideToggle('slow','easeOutBounce');
} 

else {
$(this).siblings("ul").hide();
}
});*/


   
// Get current url
// Select an a element that has the matching href and apply a class of 'active'. Also prepend a - to the content of the link
var url = window.location.href;
//alert(url);
$('.sidebar-menu li a[href="'+url+'"]').addClass('current-page');
$('.sidebar-menu li a.current-page').parent().addClass('active');

$('#mega-menu ul li a[href="'+url+'"]').addClass('current-page');
 
});
	