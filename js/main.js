$(document).ready(function(){
	$('#login').on('mouseenter mouseleave', function(){
		$('#menu').find('ul #exit').toggle();
	});
})