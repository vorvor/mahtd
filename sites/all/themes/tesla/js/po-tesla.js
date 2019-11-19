(function ($) {
  Drupal.behaviors.accessories = {
    attach: function (context, settings) {
    
    	// topmenu effect
		$('a.counter-minus').click(function(e) {
			e.preventDefault();
			c = parseInt($('.po-tesla-counter-count').html());
			if (c > 1) {
				$('.po-tesla-counter-count').html(c - 1);
				refreshItems();
			}
		})

		$('a.counter-plus').click(function(e) {
			e.preventDefault();
			c = parseInt($('.po-tesla-counter-count').html());
			$('.po-tesla-counter-count').html(c + 1);
			refreshItems();
		})

		origSrc = $('.po-tesla-main-image img').attr('src');
		$('.po-tesla-image').hover(
			function() {
				src = $('img', this).attr('src');
				$('.po-tesla-main-image img').attr('src', src);
			},
			function() {
				$('.po-tesla-main-image img').attr('src', origSrc);
			}
		)

		$('#po-tesla-send-order-button').click(function() {
			$('#po-tesla-order-form').removeClass('invisible');
			refreshItems();
		})

		function refreshItems() {
			$('.webform-component--po-tesla-name input').val($('.po-tesla-title h1').html());
			$('.webform-component--po-tesla-quantity input').val($('.po-tesla-counter-count').html());
			$('.webform-component--po-tesla-model input').val($('.po-tesla-model').html().trim());
			$('.webform-component--po-tesla-image input').val($('.po-tesla-main-image img').attr('src'));
		}

		hoverEffectPostition();
		$(window).resize(function() {
		  hoverEffectPostition();
		});

		function hoverEffectPostition() {
			$('.view-accessories .views-row').each(function() {
				height = $('.views-field-field-image img', this).height();
				$('.views-field-nothing .po-tesla-details').height(height);
			})
		}


	}}

}(jQuery));