(function ($) {
  Drupal.behaviors.tesla = {
    attach: function (context, settings) {

        //init configurator buttons
        $('#facility-block .config-buttons .config-button:nth-child(1)').addClass('selected');
        $('.config-block .config-options div').each(function() {
            if ($(this).data('price') == 0) {
                $(this).addClass('selected');
                //$('.config-block-desc', this).html($('.config-berry:nth-child(1)', this).data('title'));
            }
        })

    	// init prices
    	$('.config-block').each(function() {
            // items with price 0 is default selected, so description is ought to be filled
    		if ($('.config-option:nth-child(1)', this).data('price') == '0') {
                $('.config-block-desc', this).html($('.config-option:nth-child(1)', this).data('title'));
            }
    	})

        // facility first item is default selected, so description is ought to be filled
        facilityFirst = $('#facility-block .config-option:nth-child(1)');
        $('#facility-block .price').html(facilityFirst.data('price'));
        $('#range').html(facilityFirst.data('range'));
        $('#topspeed').html(facilityFirst.data('topspeed'));
        $('#acceleration').html(facilityFirst.data('acceleration'));
    	sumPrice();

        // configurator buttons
    	$('body.inner #third-row-wrapper .config-option').each(function() {
    		$(this).click(function() {
    			wrapper = $(this).data('wrapper');
    			//$('#' + wrapper + '-block .price').html($(this).data('price'));
				//$('#' + wrapper + '-block .config-block-desc').html($(this).data('title'));

				sumPrice();

				if ($(this).data('range') !== null) {
					$('#range').html($(this).data('range'));
					$('#topspeed').html($(this).data('topspeed'));
					$('#acceleration').html($(this).data('acceleration'));
				}

				console.log($(this).siblings().first().data('price'));
                if ($(this).hasClass('selected') && ($(this).siblings().first().data('price') != 0 && $(this).data('price') != 0 && !$(this).hasClass('config-option-notnull'))) {
                    $(this).removeClass('selected');
                    $(this).addClass('one-item');
                    $('#' + wrapper + '-block .config-block-desc').html('');
                    $('#' + wrapper + '-block .price').html(0);
                }

                if (!$(this).hasClass('one-item')) {
                    $(this).siblings().removeClass('selected');
                    $(this).addClass('selected');
                    $('#' + wrapper + '-block .config-block-desc').html($(this).data('title'));
                    $('#' + wrapper + '-block .price').html($(this).data('price'));
                } else {
                    $(this).removeClass('one-item');
                }
 
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

        // send order form
        $('#send-order-button').click(function() {
            if ($('.send-order').hasClass('invisible')) {
                $('.send-order').removeClass('invisible');
            } else {
                $('.send-order').addClass('invisible');
            }
        })
  
    }};
}(jQuery));