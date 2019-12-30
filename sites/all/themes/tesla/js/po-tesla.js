(function ($) {
  Drupal.behaviors.accessories = {
    attach: function (context, settings) {

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

		// Populate order fields.
		$('.order-model').val($('#po-tesla-details #model').val());
		$('.order-model-price').val($('#po-tesla-details #price').val());
		$('.order-exterior').val($('#po-tesla-details #exterior').val());
		$('.order-interior').val($('#po-tesla-details #interior').val());
		$('.order-sum-price').val($('.po-tesla-main-image img').attr('src'));

	}}

}(jQuery));