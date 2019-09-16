(function ($) {
  Drupal.behaviors.tesla = {
    attach: function (context, settings) {

        //init configurator buttons
        $('#facility-block .config-buttons .config-button:nth-child(1)').addClass('selected');
        $('.config-block .config-options div').each(function() {
            if ($(this).data('price') == 0 && $(this).index() == 0) {
                $(this).addClass('selected');
                $('.send-order .order-' + $(this).data('wrapper')).val($(this).data('title'));
                $('.send-order .order-' + $(this).data('wrapper') + '-price').val($(this).data('price'));
             }
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
        $('.send-order .order-facility-price').val(facilityFirst.data('price'));
    	sumPrice();
        
        // configurator init
        $('body.model-3 #rim-block .config-option:nth-child(3)').hide();
        $('body.model-3 #winter-wheel-block .config-option:nth-child(3)').hide();

        $('body.model-y #rim-block .config-option:nth-child(3)').hide();

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
                    $('.send-order .order-' + wrapper + '-price').val('');
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
                    $('.send-order .order-' + wrapper + '-price').val($(this).data('price'));
                } else {
                    $(this).removeClass('one-item');
                }
                
                if ($('#facility-block .config-option.selected').data('title').toLowerCase().includes('performance')) {
                    // performance
                    $('body.model-3 #rim-block .config-option').hide();
                    $('body.model-y #rim-block .config-option').hide();
                    $('body.model-3 #winter-wheel-block .config-option').hide();
                    
                    $('body.model-3 #rim-block .config-option:nth-child(3)').show().addClass('selected');
                    $('body.model-3 #rim-block .config-block-desc').html($('body.model-3 #rim-block .config-option:nth-child(3)').data('title'));

                    $('body.model-y #rim-block .config-option:nth-child(3)').show().addClass('selected');
                    $('body.model-y #rim-block .config-block-desc').html($('body.model-y #rim-block .config-option:nth-child(3)').data('title'));
                    
                    $('body.model-3 #winter-wheel-block .config-option:nth-child(3)').show();
                    $('body.model-3 #winter-wheel-block .config-block-desc').html('');
                    if ($('body.model-3 #winter-wheel-block .config-option:nth-child(3)').hasClass('selected')) {
                        $('body.model-3 #winter-wheel-block .config-block-desc').html($('body.model-3 #winter-wheel-block .config-option:nth-child(3)').data('title'));
                    }
                    
                } else {
                    $('body.model-3 #rim-block .config-option').show();
                    $('body.model-y #rim-block .config-option').show();

                    $('body.model-3 #winter-wheel-block .config-option').show();
                    $('body.model-3 #rim-block .config-option:nth-child(3)').hide();
                    $('body.model-y #rim-block .config-option:nth-child(3)').hide();

                    $('body.model-3 #winter-wheel-block .config-option:nth-child(3)').hide();
                    
                    $('body.model-3 #rim-block .config-block-desc').html($('body.model-3 #rim-block .config-option:nth-child(1)').data('title'));
                    $('body.model-y #rim-block .config-block-desc').html($('body.model-y #rim-block .config-option:nth-child(1)').data('title'));
                    
                    $('body.model-3 #winter-wheel-block .config-option:nth-child(1)').show();
                    $('body.model-3 #winter-wheel-block .config-block-desc').html('');
                    if ($('body.model-3 #winter-wheel-block .config-option:nth-child(1)').hasClass('selected')) {
                        $('body.model-3 #winter-wheel-block .config-block-desc').html($('body.model-3 #winter-wheel-block .config-option:nth-child(1)').data('title'));
                    }
                    if ($('body.model-3 #winter-wheel-block .config-option:nth-child(2)').hasClass('selected')) {
                        $('body.model-3 #winter-wheel-block .config-block-desc').html($('body.model-3 #winter-wheel-block .config-option:nth-child(2)').data('title'));
                    }
                    
                    $('body.model-3 #rim-block .config-block-desc').html('');
                    if ($('body.model-3 #rim-block .config-option:nth-child(1)').hasClass('selected')) {
                        $('body.model-3 #rim-block .config-block-desc').html($('body.model-3 #rim-block .config-option:nth-child(1)').data('title'));
                    }
                    if ($('body.model-3 #rim-block .config-option:nth-child(2)').hasClass('selected')) {
                        $('body.model-3 #rim-block .config-block-desc').html($('body.model-3 #rim-block .config-option:nth-child(2)').data('title'));
                    }

                    $('body.model-y #rim-block .config-block-desc').html('');
                    if ($('body.model-y #rim-block .config-option:nth-child(1)').hasClass('selected')) {
                        $('body.model-y #rim-block .config-block-desc').html($('body.model-y #rim-block .config-option:nth-child(1)').data('title'));
                    }
                    if ($('body.model-y #rim-block .config-option:nth-child(2)').hasClass('selected')) {
                        $('body.model-y #rim-block .config-block-desc').html($('body.model-y #rim-block .config-option:nth-child(2)').data('title'));
                    }
                }

                $('#order-form .order-rim').val($('#rim-block .config-option.selected:visible').data('title'));

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
			
            strPrice = String(sum);
            var parts = []; // required array
            var len = strPrice.length; //maintaining length
            while (len > 0) {
                len -= 3;
                if (len < 0) { len = 0; }
                parts.unshift(strPrice.slice(len)); //inserting value to required array
                strPrice = strPrice.slice(0, len); //updating string
            }
            
			$('#sumprice').html(parts.join(' '));
            $('.send-order .order-sum-price').val(parts.join(' '));
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

        // funding webform condition couldn't be set on webform conditionals form
        $('#webform-client-form-9 input[name="submitted[financial_construction]"]').click(function() {
            $('select.order-duration option').each(function() {
                $(this).show();
            });

            if ($(this).val() == 'tartós bérlet') {
                $('select.order-duration option').each(function() {
                    if ( parseInt($(this).val()) > 60 ) {
                        $(this).hide();
                    }
                });
            }

            if ($(this).val() == 'nyíltvégű pénzügyi lízing') {
                $('select.order-duration option').each(function() {
                    if ( parseInt($(this).val()) > 72 ) {
                        $(this).hide();
                    }
                });
            }
        })

        // fill order form with config data
        $('.send-order .order-model').val($('h2.row-title').html());
        
        // Frontpage video size correction
        if ($('body').hasClass('front')) {
            window.addEventListener('load', function() {
                var video = document.querySelector('#mahtesla');

                function checkVideoLoad() {
                    if (video.readyState === 4) {
                        frontVideoCorrection();
                    } else {
                        setTimeout(checkVideoLoad, 10);
                    }
                }
                checkVideoLoad();
            }, false);

            $(window).resize(function() {
                frontVideoCorrection();
            })

            function frontVideoCorrection() {
                if ($('#video-bg').is(':visible')) {
                    windowHeight = $(window).height();
                    videoHeight = $('#video-bg video').height() - 50;

                    //if (windowHeight > 894) {
                        $('.front #index-first-row').css('margin-top', videoHeight + 'px');
                        $('#front-jump-down a').css('top', (videoHeight - 20) + 'px');
                    //}
                } else {
                    $('.front #index-first-row').css('margin-top', '-50px');
                }
            }
        }

        $('#mobile-menu-block #submenu-parent').click(function() {
            $('#submenu').slideToggle();
        })

        $(window).scroll(function() {
            if ($('body').hasClass('front')) {
                if ($(this).scrollTop() > 500) {
                    $('#mahtesla').get(0).pause();
                } else {
                    $('#mahtesla').get(0).play();
                }
            }
        })
        
  
    }};
}(jQuery));