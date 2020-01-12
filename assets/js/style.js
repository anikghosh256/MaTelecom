$(document).ready(function(){


	$(window).scroll(function () {
		if ($(window).scrollTop() > 30) {
			$("nav").addClass("header-s");
			
		}else{
			$("nav").removeClass("header-s");
			
		}
	});


});

if ($(window).scrollTop() > 30) {
	$("nav").addClass("header-s");
}