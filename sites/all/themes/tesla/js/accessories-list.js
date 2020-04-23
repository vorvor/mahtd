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

		// Accessories user filter.
		// Init.
		$('#user-accessories-filter .config-button.filter').hide();
		$('.view-accessories .views-row').each(function() {
			tid = $('.accessories-tid', this).data('tid');
			$('#user-accessories-filter .config-button[data-tid="' + tid + '"]').show();
			model = $('.views-field-field-accessories-model .field-content', this).html().split(',');
			$.each(model, function(i, item) {
				$('#user-accessories-filter .config-button[data-model="' + item + '"]').show();
			})
		})

		// Action.
		$('#user-accessories-filter .config-button.category').click(function() {
			
				

				tid = $(this).data('tid');
				$('#user-accessories-filter .config-button.category').removeClass('selected');
				$(this).addClass('selected');
				$(this).closest('h3').addClass('selected');
				
				$('.view-accessories .views-row').show();
				$('.view-accessories .views-row').each(function() {
					if ($('.accessories-tid', this).data('tid') !== tid) {
						$(this).hide();
					}
				})

				model = $('.config-button.model.selected').data('model');
				if (model !== undefined) {
					$(this).addClass('selected');
					$(this).closest('h3').addClass('selected');

					$('.view-accessories .views-row').each(function() {
						if ($('.views-field-field-accessories-model .field-content', this).html().indexOf(model) == -1) {
							$(this).hide();
						}
					})
				}
			
		})

		$('#user-accessories-filter .config-button.model').click(function() {
			
			tid = $('.config-button.category.selected').data('tid');
			if (tid !== undefined) {
				$('.view-accessories .views-row').show();
				$('.view-accessories .views-row').each(function() {
					if ($('.accessories-tid', this).data('tid') !== tid) {
						$(this).hide();
					}
				})
			}

			model = $(this).data('model');
			$('#user-accessories-filter .config-button.model').removeClass('selected');
			$(this).addClass('selected');
			$(this).closest('h3').addClass('selected');

			$('.view-accessories .views-row').each(function() {
				if ($('.views-field-field-accessories-model .field-content', this).html().indexOf(model) == -1) {
					$(this).hide();
				}
			})




		})

		$('#reset-filter .config-button').click(function() {
			$('.view-accessories .views-row').show();
			$('#user-accessories-filter .config-button').removeClass('selected');
		})


	}}

}(jQuery));