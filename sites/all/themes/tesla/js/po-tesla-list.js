(function ($) {
  Drupal.behaviors.poteslalist = {
    attach: function (context, settings) {
    
		function refreshItems() {
			$('.webform-component--accessories input').val($('.accessories-title h1').html() + '#' + $('.accessories-counter-count').html());
		}

		hoverEffectPostition();
		$(window).resize(function() {
		  hoverEffectPostition();
		});

		function hoverEffectPostition() {
			$('.view-po-tesla .views-row').each(function() {

				height = $('.views-field-field-image img', this).height();
				console.log(height);
				padding = height * 0.35;
				$('.views-field-nothing .po-tesla-details', this).height(height);
				$('.views-field-nothing .po-tesla-details', this).css('padding-top', padding + 'px');
				$('.views-field-nothing .po-tesla-details', this).css({
					'marginTop': height * -1 + 'px',
				});
			})
		}

		$('select#edit-term-node-tid-depth option:nth-child(1)').html('Összes');

		


	}}

}(jQuery));