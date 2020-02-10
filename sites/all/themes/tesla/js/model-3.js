(function ($) {
  Drupal.behaviors.tesla_model3 = {
    attach: function (context, settings) {

    	$('#facility-block .config-option').click(function() {
    		if ($(this).data('title').toLowerCase().indexOf('performance') > -1) {
    			$('#extra-block').hide();
    		} else {
    			$('#extra-block').show();
    		}
    	})

    }};
}(jQuery));