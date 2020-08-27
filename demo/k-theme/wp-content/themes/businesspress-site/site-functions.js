( function( $ ) {
	"use strict";

	// Set Anchor Link
	$(window).on('load', function() {
		var target = location.hash;
		if ( '' != target ) {
			var headerHight = $('.main-header-clone').outerHeight()+45;
			var position = $(target).offset().top-headerHight;
			$('html,body').animate({scrollTop:position}, 200, 'swing');
		}
	});

	// Set Download Overlay
	$('.theme-download').on('click', function() {
		$('body').addClass('theme-download-opened');
	} );
	$('.theme-download-overlay').on('click',function() {
		$('body').removeClass('theme-download-opened');
	} );


} )( jQuery );