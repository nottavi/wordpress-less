(function($){
	$(document).ready(function(){

		// Wysiwyg img (classic editor)
		$('.wysiwyg-content .img').each(function(){
			$(this).addClass($(this).find('img').attr('class'));
			$(this).find('img').attr('class', '');
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