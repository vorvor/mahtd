(function ($) {
  Drupal.behaviors.tesla = {
    attach: function (context, settings) {

    	// init prices
    	$('.config-block').each(function() {
    		$('.price', this).html($('.config-button:nth-child(1)', this).data('price'));
    	})
    	sumPrice();

        // configurator buttons
    	$('body.inner #third-row-wrapper .config-options div').each(function() {
    		$(this).click(function() {
    			wrapper = $(this).data('wrapper');
    			$('#' + wrapper + '-block .price').html($(this).data('price'));
				$('#' + wrapper + '-block .config-block-desc').html($(this).data('title'));

				sumPrice();

				if ($(this).data('range') !== null) {
					$('#range').html($(this).data('range'));
					$('#topspeed').html($(this).data('topspeed'));
					$('#acceleration').html($(this).data('acceleration'));
				}

				$(this).siblings().removeClass('selected');
				$(this).addClass('selected');
    		})
    	})

    	function sumPrice() {
    		sum = 0;
			$('.config-block').each(function() {
				if ($('.price', this).html() !== null) {
					sum += parseInt($('.price', this).html().split(' ').join(''));
				}
			})
			
			$('#sumprice').html(String(sum).replace(/(?<!\..*)(\d)(?=(?:\d{3})+(?:\.|$))/g, '$1 '));
    	}

        // menu modal
        $('#mobile-menu, #mobile-menu-close').click(function() {
            if ($('#mobile-menu-block').hasClass('invisible')) {
                $('#mobile-menu-block').removeClass('invisible');
            } else {
                $('#mobile-menu-block').addClass('invisible');
            }
        })
  
    }};
}(jQuery));