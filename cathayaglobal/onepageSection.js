(function($) {
  $( "h2.entry-title" ).each( function() {
  		var panelId = $( this ).html().toLowerCase().replace(/\s+/g, "-");
  		$( this ).wrap(function() {
    		return "<span style='padding-top:96px;' id='" + panelId + "'></span>";
  		})
	})
})( jQuery );