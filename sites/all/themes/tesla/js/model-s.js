(function ($) {
  Drupal.behaviors.tesla_models = {
    attach: function (context, settings) {
    	$('#interior-block .config-berry:nth-child(4)').hide();
        $('#interior-block .config-berry:nth-child(5)').hide();
    	$('#facility-block .config-option').click(function() {
    		if ($(this).data('title').toLowerCase().includes('performance')) {
    			$('#interior-block .config-berry:nth-child(4)').show();
                $('#interior-block .config-berry:nth-child(5)').show();
    		} else {
    			$('#interior-block .config-berry:nth-child(4)').hide();
                $('#interior-block .config-berry:nth-child(5)').hide();
                if ($('#interior-block .config-berry:nth-child(4)').hasClass('selected')
                    || $('#interior-block .config-berry:nth-child(5)').hasClass('selected')) {
                    $('#interior-block .config-berry').removeClass('selected');
                    $('#interior-block .config-berry:nth-child(1)').addClass('selected');
                }
    		}
    	})

    }};
}(jQuery));