/**
 * Map jQuery to $
 */
(function( $ ) {
	'use strict';
	

	/**
	 * Functions go here
	 */

	//KOMMENTERA AV FÖR ATT SÄTTA IGÅNG MASONRY

	//FRONTPAGE
	$('.grid').isotope({
		// options
		itemSelector: '.grid-item',
		percentPosition: true,
		masonry: {
			columnWidth: '.grid-item'
		  }
	  });
	  $('.filter button').on("click", function() {
		const value = $(this).attr('data-name');
		$('.grid').isotope({
			filter: value
		})
	  });

	  //GALLERI-PAGE
	  $('.gallery-grid').isotope({
		// options
		itemSelector: '.gallery-grid-item',
		percentPosition: true,
		
	  });
	  $('.filter-galleri button').on("click", function() {
		const value = $(this).attr('data-name-galleri');
		$('.gallery-grid').isotope({
			filter: value
		})
	  });

	const swiper = new Swiper('.mySwiper', {
		spaceBetween: 5,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
	});

	const swiper2 = new Swiper('.mySwiper2', {
		effect: 'cards',
		speed: 400,
		spaceBetween: 10,
		navigation: {
		  nextEl: ".swiper-button-next",
		  prevEl: ".swiper-button-prev",
		},
		thumbs: {
		  swiper: swiper,
		},
	  });

	const swiperCategory = new Swiper('.swiper-category', {
		speed: 1000,
  		spaceBetween: 10,
		slidesPerView: 'auto',
		// effect: 'slide',
		// setWrapperSize: true,
		loop: true,
		// navigation: {
		// 	nextEl: '.swiper-button-next',
		// 	prevEl: '.swiper-button-prev',
		// },
		// autoplay: {
		// 	delay: 3000
		// },
	  });

    //SLUTET

	function openSidebar( event ){
		let overlayOffset = $(window).scrollTop() + 'px';
		let $element = event.data.element;
		let type = event.data.type;

		event.preventDefault();

		sidebarOpen = true;

		$('html').css( '--overlay-offset', overlayOffset);
		$('html').addClass('overlay');

		$(this).toggleClass('open');

		//quickfix adminbar
		$('#wpadminbar').hide();

		$element.toggleClass('open');
	}

	function closeSidebar(){
		sidebarOpen = false;

		let scrollPos = parseInt( $('html').css( '--overlay-offset' ) );

		$('html').css( '--overlay-offset', 0 );
		$('html').removeClass("overlay");
		$(window).scrollTop(scrollPos);
		$('.sidebar-container').removeClass('open');

		$('.header-main .menu-btn').toggleClass('open');

		//quickfix adminbar
		$('#wpadminbar').show();
	}


	/**
	 * Runs when window is ready.
	 * Usually where most code that's not functions go.
	 */
	$(function() {



		// Open mobile-menu sidebar
		$('.open-mobile-menu').on( 'click', { type: 'menu', element: $('.mobile-menu-container') }, openSidebar );
		// Open search bar
		$('.open-search-bar').on( 'click', { type: 'search', element: $('.search-container') }, openSidebar );
		// Open archive sidebar
		$('.open-archive-sidebar').on( 'click', { type: 'product-filters', element: $('.filter-container') }, openSidebar );

		// Close sidebar
		$(document).on( 'click', '.sidebar-container.open', closeSidebar );
		$(document).on( 'click', '.sidebar-inner',function(e) {
			e.stopPropagation();
		});

		// Open & close mega menus
		$('ul.menu-main-list > li').hover(function() {

			if(!$(this).hasClass('mega-menu')){

				$('.mega-menu-wrapper').slideUp();
				$('ul.menu-main-list > li').removeClass('active');

			} else{

				if( $('ul.menu-main-list > li').hasClass('active') ){

					$('ul.menu-main-list > li').not(this).find('.mega-menu-wrapper').hide();
					$('ul.menu-main-list > li').not(this).find('.mega-menu-content').hide();
					$(this).find('.mega-menu-wrapper').show();
					$(this).find('.mega-menu-content').fadeIn();

				} else{

					if($(this).hasClass('mega-menu')){

						$(this).addClass('active');
						$(this).find('.mega-menu-wrapper').slideDown();
						$(this).find('.mega-menu-content').show();

					}

				}

			}

		});

		$('#content').hover(function() {
			$('.mega-menu-wrapper').slideUp();
			$('ul.menu-main-list > li').removeClass('active');
		});

		$('.mobile-menu-list > .menu-item-has-children > a').on( 'click', function(e) {
			e.preventDefault();
			let menuItem = $(this).parent('.menu-item');
			menuItem.children('.sub-menu').slideToggle();
		});

		$('.mobile-menu-list .sub-menu .menu-item-has-children > a').on( 'click', function(e) {
			e.preventDefault();
			let menuItem = $(this).parent('.menu-item');

			$(this).toggleClass('open');

			menuItem.children('.sub-menu').slideToggle();

			menuItem.siblings('.menu-item').slideToggle();
		});

	});

})( jQuery );
