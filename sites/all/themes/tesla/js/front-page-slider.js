(function ($) {
  Drupal.behaviors.accessories = {
    attach: function (context, settings) {

    	$('.views-slideshow-controls-bottom').hide();


		function startTyping() {		
			new TypeIt('.view-front-slider .views-field-title .field-content',
				{
					cursorSpeed: 100,
					nextStringDelay: 0,
					breakDelay: 0,
					afterComplete: (instance) => {
	    				//$('#views_slideshow_controls_text_next_front_slider-block_1 a').trigger("click");
	    			},

				})
				.options({speed: 58500, deleteSpeed: 75})
				.go();

			new TypeIt('.view-front-slider .views-field-field-body .field-content',
				{
					cursorSpeed: 100,
					nextStringDelay: 0,
				})
				.options({speed: 58500, deleteSpeed: 75})
				.go();

		}

		startTyping();
		setTimeout('startTyping', 10000);


	}}

}(jQuery));