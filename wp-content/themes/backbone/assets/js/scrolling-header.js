/**
 * Map jQuery to $
 */
let sidebarOpen = false;

(function( $ ) {
	'use strict';

	const $header = $('header'),
			$content = $('#content');
	const scrollThreshold = 15;
	const headerHeight = $header.outerHeight(),
			topHeaderHeight = ($('.header-top').length) ? $('.header-top').outerHeight() : 0,
			totalHeaderHeight = headerHeight + topHeaderHeight;
	let scrollPosition,
		 lastScrollPosition = 0;


	/**
	 * Functions go here
	 */



	/**
	 * Runs when window is ready.
	 * Usually where most code that's not functions go.
	 */
	$(function() {

		/**
		 * Scrolling header
		 */
		$(window).scroll(function(event){
			scrollPosition = $(window).scrollTop();

			if( sidebarOpen == true ){
				return;
			}

			//Set fixed header if scrolled below total header height
			if( scrollPosition >= totalHeaderHeight ){
				$header.addClass('header-fixed');
				$content.css('padding-top', headerHeight );
			}
			//Remove fixed header if scrolled above top-header height
			else if( scrollPosition <= topHeaderHeight ){
				$header.removeClass('header-fixed');
				$content.css('padding-top', '' );
				$header.removeClass('header-show');
			}

			//Get out if not scrolled more than threshold
			if( Math.abs( lastScrollPosition - scrollPosition ) <= scrollThreshold ){
				return;
			}

			//Scrolling up, show header
			if( scrollPosition < lastScrollPosition ){
				$header.addClass('header-show');
				$('html').css( '--single-summary-offset', headerHeight + 'px' );
		 	}
			//Scrolling down, hide header
			else {
		 		$header.removeClass('header-show');
				$('html').css( '--single-summary-offset', '0px' );
			}

			lastScrollPosition = scrollPosition;

		});




	});

})( jQuery );
