(function ($) {
  Drupal.behaviors.tesla_models = {
    attach: function (context, settings) {

        if (!$('body').hasClass('teslaConfLoaded')) {

        	$('#interior-block .config-berry:nth-child(2)').hide();
            $('#interior-block .config-berry:nth-child(4)').hide();
        	$('#facility-block .config-option').click(function() {
        		if ($(this).data('title').toLowerCase().includes('performance')) {
                    // performance
                    $('#interior-block .config-berry:nth-child(1)').hide();
        			$('#interior-block .config-berry:nth-child(2)').show();
                    $('#interior-block .config-berry:nth-child(3)').hide();
                    $('#interior-block .config-berry:nth-child(4)').show();
                    $('#interior-block .config-berry:nth-child(5)').show();
        		} else {
                    // long range
        			$('#interior-block .config-berry:nth-child(1)').show();
                    $('#interior-block .config-berry:nth-child(2)').hide();
                    $('#interior-block .config-berry:nth-child(3)').show();
                    $('#interior-block .config-berry:nth-child(4)').hide();
                    $('#interior-block .config-berry:nth-child(5)').show();
                    if ($('#interior-block .config-berry:nth-child(2)').hasClass('selected')
                        || $('#interior-block .config-berry:nth-child(4)').hasClass('selected')) {
                        $('#interior-block .config-berry').removeClass('selected');
                        $('#interior-block .config-berry:nth-child(1)').addClass('selected');
                    }
        		}

                $('#interior-block .config-block-desc').html($('#interior-block .config-berry.selected').data('title'));
                $('input.order-interior').val($('#interior-block .config-block-desc').html());
        	})
        }

    }};
}(jQuery));