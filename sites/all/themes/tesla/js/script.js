(function ($) {
  Drupal.behaviors.tesla = {
    attach: function (context, settings) {

        //init configurator buttons
        $('#facility-block .config-buttons .config-button:nth-child(1)').addClass('selected');
        $('.config-block .config-options div').each(function() {
            if ($(this).data('price') == 0) {
                $(this).addClass('selected');
                $('.send-order .order-' + $(this).data('wrapper')).val($(this).data('title'));            }
        })

    	// init prices
    	$('.config-block').each(function() {
            // items with price 0 is default selected, so description is ought to be filled
    		if ($('.config-option:nth-child(1)', this).data('price') == '0' && !$('.config-option:nth-child(1)', this).hasClass('config-button')) {
                $('.config-block-desc', this).html($('.config-option:nth-child(1)', this).data('title'));
            }
    	})

        // facility first item is default selected, so description is ought to be filled
        facilityFirst = $('#facility-block .config-option:nth-child(1)');
        $('#facility-block .price').html(facilityFirst.data('price'));
        $('#range').html(facilityFirst.data('range'));
        $('#topspeed').html(facilityFirst.data('topspeed'));
        $('#acceleration').html(facilityFirst.data('acceleration'));
        $('.send-order .order-facility').val(facilityFirst.data('title'));
    	sumPrice();

        // configurator buttons
    	$('body.inner #third-row-wrapper .config-option').each(function() {
    		$(this).click(function() {
    			wrapper = $(this).data('wrapper');
    			//$('#' + wrapper + '-block .price').html($(this).data('price'));
				//$('#' + wrapper + '-block .config-block-desc').html($(this).data('title'));

				if ($(this).data('range') !== null) {
					$('#range').html($(this).data('range'));
					$('#topspeed').html($(this).data('topspeed'));
					$('#acceleration').html($(this).data('acceleration'));
				}

                if ($(this).hasClass('selected') && ($(this).siblings().first().data('price') != 0 && $(this).data('price') != 0 && !$(this).hasClass('config-option-notnull'))) {
                    $(this).removeClass('selected');
                    $(this).addClass('one-item');
                    $('#' + wrapper + '-block .config-block-desc').html('');
                    $('#' + wrapper + '-block .price').html(0);
                    $('.send-order .order-' + wrapper).val('');
                }

                if (!$(this).hasClass('one-item')) {
                    $(this).siblings().removeClass('selected');
                    $(this).addClass('selected');
                    if (!$(this).hasClass('config-button')) {
                        $('#' + wrapper + '-block .config-block-desc').html($(this).data('title'));
                    }
                    if ($(this).data('option-condition') == 1) {
                        $(this).siblings('.optional').show();
                    } else {
                        $(this).siblings('.optional').hide();
                    }
                    
                    $('#' + wrapper + '-block .price').html($(this).data('price'));
                    // in some case interior is free
                    if (wrapper == 'interior' || wrapper == 'facility') {
                        if ($('#facility-block .config-option.selected').data('with-free-items') == 1) {
                            $('#interior-block .price').html('0');
                        } else {
                            $('#interior-block .price').html($('#interior-block .config-option.selected').data('price'));
                        }
                    }


                    // fil send order form fields
                    $('.send-order .order-' + wrapper).val($(this).data('title'));
                } else {
                    $(this).removeClass('one-item');
                }

                sumPrice();
    		})
    	})

    	function sumPrice() {
    		sum = 0;
			$('.config-block').each(function() {
				if ($('.price', this).html() !== null) {
					sum += parseInt($('.price', this).html().split(' ').join(''));
				}
			})
			
			$('#sumprice').html(String(sum).replace('/(?<!\..*)(\d)(?=(?:\d{3})+(?:\.|$))/g', '$1 '));
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
            //if ($('.send-order').hasClass('invisible')) {
                $('.send-order').removeClass('invisible');
            //} else { 
                //$('.send-order').addClass('invisible');
            //}
        })

        // fill order form with config data
        $('.send-order .order-model').val($('h2.row-title').html());
  
    }};
}(jQuery));