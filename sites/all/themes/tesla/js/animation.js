(function ($) {
  Drupal.behaviors.anim = {
    attach: function (context, settings) {
    

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

		// hide all data elemenet
		$('.index-row-data').each(function() {
			$(this).css('opacity', 0);
		})

		// data element effect
		function dataEffect(element) {
			element.each(function() {
				$('.index-row-data', this).each(function() {
					$(this).animate({
						opacity: 1,
					}, 1000, function() {
						$(this).fadeOut(5).fadeIn(10).fadeOut(10).fadeIn(10).fadeOut(10).fadeIn(10).fadeOut(10).fadeIn(10).fadeOut(10).fadeIn(10).fadeOut(10).fadeIn(10);
					});
				});
			})
		}

		$(window).scroll(function() {

		 	$('.index-row-wrapper').each(function(index) {
		 		scrollPos = $(window).scrollTop() + $(window).height();
		 		endOffset = $(this).offset();
		 		endPos = endOffset.top;
		 		diff = endPos - scrollPos;
		 		diffEnd = endPos + $(this).height() - scrollPos;

		 		if (diff < $(window).height() * -1.1 && $(this).attr('effect') == undefined) {
					dataEffect($(this));
					$(this).attr('effect', 1);
				} 
		 	})
		})

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

	}}

}(jQuery));