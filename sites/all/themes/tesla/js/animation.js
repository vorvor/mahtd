(function ($) {
  Drupal.behaviors.anim = {
    attach: function (context, settings) {
    
    	function blurBg(element, size) {
		     var filterVal = 'blur(' + size + 'px)';
		      element.css({
		        'filter':filterVal,
		        'webkitFilter':filterVal,
		        'mozFilter':filterVal,
		        'oFilter':filterVal,
		        'msFilter':filterVal,
		        'transition':'all 0.5s ease-out',
		        '-webkit-transition':'all 0.5s ease-out',
		        '-moz-transition':'all 0.5s ease-out',
		        '-o-transition':'all 0.5s ease-out',
		    });
		 }

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

		 

		 

		 blurBg($('.index-row-wrapper'), 10);

		 $(window).scroll(function() {

		 	$('.index-row-wrapper').each(function(index) {
		 		scrollPos = $(window).scrollTop() + $(window).height();
		 		endOffset = $(this).offset();
		 		endPos = endOffset.top;
		 		diff = endPos - scrollPos;
		 		diffEnd = endPos + $(this).height() - scrollPos;

		 		if (index == 2) {
		 			console.log(diff);
		 			console.log(diffEnd);
		 			console.log($(window).height() * -0.5);
		 		}

		 		if (diff < $(window).height() * -0.5 && diffEnd > $(window).height() * -0.5) {
					blurBg($(this), 0);
				} else {
					blurBg($(this), 10);
				}

		 	})
		})

	}}

}(jQuery));