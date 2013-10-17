;(function($) {

	window.main = {
		init: function(){

			$('a[href^=#].scroll-to-btn').click(function(){
				var target = $($(this).attr('href'));
				var offsetTop = (target.length != 0) ? target.offset().top : 0;
				$('html,body').animate({scrollTop: offsetTop},'slow');
				return false;
			});

			$('.mobile-navigation-btn').on('click', function() {
				var navigation = $('#header .main-navigation');
				navigation.slideToggle(200);
			});
		},

		loaded: function(){
			this.setBoxSizing();
		},

		setBoxSizing: function(){
			if( $('html').hasClass('no-boxsizing') ){
		        $('.span:visible').each(function(){
		        	console.log($(this).attr('class'));
		        	var span = $(this);
		            var fullW = span.outerWidth(),
		                actualW = span.width(),
		                wDiff = fullW - actualW,
		                newW = actualW - wDiff;
		 			
		            span.css('width',newW);
		        });
		    }
		},		
		
		resize: function(){
		}
	}

	$(function(){
		main.init();
	});

	$(window).load(function(){
		main.loaded();
	});

})(jQuery);
