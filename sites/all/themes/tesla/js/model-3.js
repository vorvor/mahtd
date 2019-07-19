(function ($) {
  Drupal.behaviors.tesla_model3 = {
    attach: function (context, settings) {
    	console.log('loaded');
    	$('#facility-block .config-option').click(function() {
    		console.log('clack');
    		if ($(this).data('title').toLowerCase().includes('performance')) {
    			$('#extra-block').hide();
    		} else {
    			$('#extra-block').show();
    		}
    	})

    }};
}(jQuery));