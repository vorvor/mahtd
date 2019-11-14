(function ($) {
  Drupal.behaviors.accessories = {
    attach: function (context, settings) {
    
    	// topmenu effect
		$('a.counter-minus').click(function(e) {
			e.preventDefault();
			c = parseInt($('.accessories-counter-count').html());
			if (c > 1) {
				$('.accessories-counter-count').html(c - 1);
				refreshItems();
			}
		})

		$('a.counter-plus').click(function(e) {
			e.preventDefault();
			c = parseInt($('.accessories-counter-count').html());
			$('.accessories-counter-count').html(c + 1);
			refreshItems();
		})

		origSrc = $('.accessories-main-image img').attr('src');
		$('.accessories-image').hover(
			function() {
				src = $('img', this).attr('src');
				$('.accessories-main-image img').attr('src', src);
			},
			function() {
				$('.accessories-main-image img').attr('src', origSrc);
			}
		)

		$('#accessories-send-order-button').click(function() {
			$('#accessories-order-form').removeClass('invisible');
			refreshItems();
		})

		function refreshItems() {
			$('.webform-component--accessories-name input').val($('.accessories-title h1').html());
			$('.webform-component--accessories-quantity input').val($('.accessories-counter-count').html());
			$('.webform-component--accessories-model input').val($('.accessories-model').html().trim());
			$('.webform-component--accessories-image input').val($('.accessories-main-image img').attr('src'));
		}

		hoverEffectPostition();
		$(window).resize(function() {
		  hoverEffectPostition();
		});

		function hoverEffectPostition() {
			$('.view-accessories .views-row').each(function() {
				height = $('.views-field-field-image img', this).height();
				$('.views-field-nothing .accessories-details').height(height);
			})
		}


	}}

}(jQuery));