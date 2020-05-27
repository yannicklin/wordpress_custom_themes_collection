(function($) {
	$(document).ready(function() {
		$('footer .frm_submit').detach().appendTo('footer #frm_field_10_container');
		$('footer.site-footer').append('<a id="float-gymboree" href="/timetable-price/#membership-gymmaster" title="Book a Trial Class!!" alt="Gymbo Toll as a link to book a trial class"><span class="float-gymboree-label">Booking Here!</span><img src="/wp-content/uploads/2019/10/GymboToll.png"></a>');
		
		// Custom Events Tracking
		$(document).on( 'frmFormComplete', function( event, form, response ) {
			var formID = $(form).find('input[name="form_id"]').val();
			if ( formID == 1 ) { // Newsletter
				ga('send', 'event', 'Newsletter Subscription', 'sent'); // Google Analytic Tracking
				fbq('track', 'SubmitApplication'); // Facebook Pixel Tracking
			} else if (formID == 3) { // Contact Enquiry
				ga('send', 'event', 'Contact Us', 'sent'); // Google Analytic Tracking
				fbq('track', 'SubmitApplication'); // Facebook Pixel Tracking
			}
		});
	})
})(jQuery);