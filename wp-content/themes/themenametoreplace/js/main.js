(function($){
	$(document).ready(function(){

		// Wysiwyg img
		$('.wysiwyg-content .img').each(function(){
			$(this).addClass($(this).find('img').attr('class'));
			$(this).find('img').attr('class', '');
		});
		
	});
})(jQuery);