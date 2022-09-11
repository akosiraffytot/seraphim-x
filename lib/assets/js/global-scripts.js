jQuery(document).ready(function($){

	$('.mobile-nav-toggle').sidr({
		name: 'responsive-menu',
		source: '.title-area, .nav-primary',
		displace: false
	});

	$('.site-container').click(function () {
    $.sidr('close', 'responsive-menu');
  });

	$('.sidr-class-no-click > a').on('click', function(e){
		e.preventDefault();
		$(this).next('.sidr-class-sub-menu').slideToggle();
	});

	$('.gotop').on('click', function(){ 
		$('html, body').animate({scrollTop: 0}, '300');
	});
	
	$(window).scroll(function() {
		if ($(window).scrollTop() > 300) {
			$('.gotop').addClass('show');
		} else {
			$('.gotop').removeClass('show');
		}
	});

  // add body class upon page scroll
  $(document).on('scroll',function(){

      if( $(document).scrollTop() > 100 ) {
        $('body').addClass('isscroll');
      } else {
        $('body').removeClass('isscroll');
      }

  }); // End -- minimize header upon scroll and fixed position menu

});