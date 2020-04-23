(function ($) {
  Drupal.behaviors.anim = {
    attach: function (context, settings) {
    
    	if (!$('body').hasClass('teslaAnimLoaded')) {

    	// topmenu effect
		$('#menu li').css({
			opacity: 0,
			marginLeft: '100px',
		});

		$('#mobile-menu').css({
			opacity: 0,
			marginTop: '-400px',
		});
		 
		setTimeout(function() {
			 $('#menu li').animate({
			 	marginLeft: '0px',
			 	opacity: 1,
			 }, 2000);

			 $('#mobile-menu').animate({
			 	marginTop: '0px',
			 	opacity: 1,
			 }, 2000);
		}, 2000);

		$('#menu li').hover(
			function() {
				$('#menu li').addClass('downScale').removeClass('resetScale');
				$(this).removeClass('downScale').addClass('upScale');
			},
			function() {
				$('#menu li').removeClass('downScale').removeClass('upScale').addClass('resetScale');
			}
		);	

		// mobile menu effect
		$('#mobile-menu').unbind('click');
		$('#mobile-menu-close').unbind('click');
		$('#mobile-menu').click(function() {
			$('#mobile-menu-block').offset({ top: -700}).show().animate({
			 	top: 0,
			 	opacity: 1,
			 }, 800);
		})

		
		$('#mobile-menu-close').click(function() {
			$('#mobile-menu-block').animate({
			 	opacity: 0,
			 }, 400, function() {
			 	$('#mobile-menu-block').offset({ top: -700});
			 });
		})

		// inner-effects
		$('.inner #second-row-left').css({
			'margin-left' : '-1000px',
		});

		$('.inner #second-half-row-right').css({
			'margin-right' : '-1000px',
		});

		function dataInnerEffect(element) {
			
		}

		$(window).scroll(function() {

		 	$('#second-row-left').each(function(index) {
		 		scrollPos = $(window).scrollTop() + $(window).height();
		 		endOffset = $(this).offset();
		 		endPos = endOffset.top;
		 		diff = endPos - scrollPos;
		 		diffEnd = endPos + $(this).height() - scrollPos;

		 		if (diff < $(window).height() * -0.3 && $(this).attr('effect') == undefined) {
					$('.inner #second-row-left').animate({
						'marginLeft': 0,
					}, 1000);
					$(this).attr('effect', 1);
				} 
		 	})

		 	$('#second-half-row-right').each(function(index) {
		 		scrollPos = $(window).scrollTop() + $(window).height();
		 		endOffset = $(this).offset();
		 		endPos = endOffset.top;
		 		diff = endPos - scrollPos;
		 		diffEnd = endPos + $(this).height() - scrollPos;

		 		if (diff < $(window).height() * -0.3 && $(this).attr('effect') == undefined) {
					$('.inner #second-half-row-right').animate({
						'marginRight': 0,
					}, 1000);
					$(this).attr('effect', 1);
				} 
		 	})
		})

		/*
		$('.config-block').each(function() {
			$('.config-option', this).hover(
				function() {
					wrapper = $(this).data('wrapper');
					origDesc = $('#' + wrapper + '-block .config-block-desc').html();
					$('#' + wrapper + '-block .config-block-desc');
					if (!$(this).hasClass('config-button')) {
						$('#' + wrapper + '-block .config-block-desc')
						.html($(this).data('title'));
					}
				},
				function() {
					$('#' + wrapper + '-block .config-block-desc')
					.html(origDesc);
				}
			)
		})
		*/

		$('.first-row-data').hover(
			function() {
				$('.first-row-data').addClass('downScaleS').removeClass('resetScaleS');
				$(this).removeClass('downScaleS').addClass('upScaleS');
			},
			function() {
				$('.first-row-data').removeClass('downScaleS').removeClass('upScaleS').addClass('resetScaleS');
			}
		);	
	
		$('body').addClass('teslaAnimLoaded');


	}
		


	}}

}(jQuery));