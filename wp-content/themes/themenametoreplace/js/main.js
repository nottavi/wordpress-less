(function($){
	$(document).ready(function(){

		// Wysiwyg img
		$('.wysiwyg-content .img').each(function(){
			$(this).addClass($(this).find('img').attr('class'));
			$(this).find('img').attr('class', '');
		});

		// Menu mobile
		$('#menu-burger').on('click', function () {
			$('body').toggleClass('nav-open');
		});
		
		// Scroll to
		$('.scroll-to').on('click', function(e){
			e.preventDefault();
			$('html, body').animate({
				scrollTop: $($(this).attr('href')).offset().top
			}, 'slow');
		});
		
	});
})(jQuery);