(function ($) {
  Drupal.behaviors.tesla_modelx = {
    attach: function (context, settings) {
        if (!$('body').hasClass('teslaConfLoaded')) {

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

                $('#interior-block .config-block-desc').html($('#interior-block .config-berry.selected').data('title'));
                $('input.order-interior').val($('#interior-block .config-block-desc').html());
        	})

            function secondHalfBgPos() {
                secondHalfW = $('#second-half-row-right').width();
                windowW = $(window).width();
                shift = -1757 + (windowW - secondHalfW);
                $('#second-half-row-wrapper').css('background-position', shift  + 'px 0');
            }

            secondHalfBgPos();
            $(window).resize(function() {
                secondHalfBgPos();  
            })
        }

    }};
}(jQuery));