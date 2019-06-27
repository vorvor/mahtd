(function ($) {
  Drupal.behaviors.tesla = {
    attach: function (context, settings) {

    	$('body.inner #third-row-wrapper .config-options div').each(function() {
    		$(this).click(function() {
    			wrapper = $(this).data('wrapper');
    			$('#' + wrapper + '-block .price').html($(this).data('price'));
				$('#' + wrapper + '-block .config-block-desc').html($(this).data('title'));

				sum = parseInt($('#facility-block .price').html().split(' ').join(''))
				+ parseInt($('#exterior-block .price').html().split(' ').join(''))
				+ parseInt($('#interior-block .price').html().split(' ').join(''))
				+ parseInt($('#rim-block .price').html().split(' ').join(''))
				+ parseInt($('#autopilot-block .price').html().split(' ').join(''));

				$('#sumprice').html(String(sum).replace(/(?<!\..*)(\d)(?=(?:\d{3})+(?:\.|$))/g, '$1 '));

				if ($(this).data('range') !== null) {
					$('#range').html($(this).data('range'));
					$('#topspeed').html($(this).data('topspeed'));
					$('#acceleration').html($(this).data('acceleration'));
				}
    		})
    	})
  
    }};
}(jQuery));