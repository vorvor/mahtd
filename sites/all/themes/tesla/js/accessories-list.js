(function ($) {
  Drupal.behaviors.accessorieslist = {
    attach: function (context, settings) {
    
		function refreshItems() {
			$('.webform-component--accessories input').val($('.accessories-title h1').html() + '#' + $('.accessories-counter-count').html());
		}

		hoverEffectPostition();
		$(window).resize(function() {
		  hoverEffectPostition();
		});

		function hoverEffectPostition() {
			$('.view-accessories .views-row').each(function() {

				height = $('.views-field-field-image', this).height();
				padding = height * 0.35;
				$('.views-field-nothing .accessories-details', this).height(height);
				$('.views-field-nothing .accessories-details', this).css('padding-top', padding + 'px');
				$('.views-field-nothing .accessories-details', this).css({
					'marginTop': height * -1 + 'px',
				});
			})
		}


	}}

}(jQuery));