(function($){
  $(function(){

    $('.sidenav').sidenav();
    $('.parallax').parallax();
    $('.materialboxed').materialbox();
    $('.carousel').carousel({
    	dist: 0,
	    padding: 0,
	    fullWidth: true,
	    indicators: true,
    	});
    setInterval(function(){ $('.carousel').carousel('next'); }, 5000);

  }); // end of document ready
})(jQuery); // end of jQuery name space


