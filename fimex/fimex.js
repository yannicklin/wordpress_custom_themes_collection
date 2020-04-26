(function($){
	
	// HomePage Categories Section
	if ($('body').hasClass('home')){
		$('body.home .x-anchor-content span.x-graphic').addClass('hexagon');
		$('body.home .x-anchor-content i.x-graphic-primary').addClass('hexagon').removeClass('x-icon');
	}
	// Tabs (in Catagory)
	if ($('body').hasClass('page-id-21')) {
		$(window).on( 'load hashchange', function() {
			var tabnav = location.href.split("#tab-").slice(-1)[0];
			if ( tabnav || tabnav != '' ) {
				$('.x-nav-tabs .x-nav-tabs-item a[data-x-toggleable="x-legacy-tab-' + tabnav + '"]').trigger('click');
			}
		});
	}
	
})(jQuery);