/**
 * Map jQuery to $
 */
(function( $ ) {
	'use strict';

	/**
	 * Functions go here
	 */
	
	//clickboxes på om-oss sidan
	$(document).ready(function() {
		$('.column-clickbox').click(function() {
		  $(this).toggleClass('active');
		});
	  });
	
	//hamburgermenu
	const menuBtn = $('.line-container');
	const overlay = $('.overlay-mobile');
	const menuMainList = $('.menu-main-mobile');
	let menuOpen = false;
	
	//saker som händer när man klickar på hamburgermenyn
	menuBtn.click(function () {
		if(!menuOpen) {
			overlay.addClass('overlay-mobile-right');
			overlay.removeClass('overlay-mobile-left');
			menuBtn.addClass('open');
			menuMainList.css('display', 'block');
			$('.line').addClass('new-style-pseudo');
			menuOpen = true;
		} else {
			overlay.addClass('overlay-mobile-left');
			overlay.removeClass('overlay-mobile-right');
			menuBtn.removeClass('open');
			$('.line').removeClass('new-style-pseudo');
			menuOpen = false;
		}
	});
	
	//dropdown kategorier
	$(document).ready(function() {
		const subMenu = $('.sub-menu');
		const arrow = $('.rotate-arrow')
		const subMenuArrows = $('.sub-menu li a span');
		let open = false
		$('.menu-item-2378').on('click', function() {
			if(!open) {
				console.log(subMenuArrows)
				subMenu.slideDown(500);
				subMenuArrows.slideDown(500);
				open = !open;
				arrow.css('transform', 'rotate(270deg)');
			}
			else {
				subMenu.slideUp(500);
				subMenuArrows.slideUp(500);
				open = !open;
				arrow.css('transform', 'rotate(90deg)');
			}
		});
	});

	//saker som händer när man skrollar ner på sidan
	 $(window).scroll(function() {
		// Get the current scroll position
		let scroll = $(window).scrollTop();
		let vh = $(window).height();
  		let pixels = vh * 50 / 100;
	  
		// Check if the scroll position is greater than 0
		if (scroll > pixels) {
		  // Apply CSS styles to the element
		 
		  $('.header').css({
			'background-color': '#fff',
			'box-shadow:': '10px 10px 10px rgba(0,0,0,0.5);'
		  });
		  
		  $('.header-list').css({
			'color': '#7A7A7A'
		  });

		  $('.header .sub-menu').css({
			'background-color': '#fff',
			'box-shadow:': '10px 10px 10px rgba(0,0,0,0.5);'
		  });
		  $('.header .sub-menu li').css({
			'color': '#7A7A7A'
		  });
		  $('.text-underline').addClass('after-style');
		  $('.line').addClass('new-style-pseudo');
		} else {
		  // Reset the CSS styles to their default values
		  $('.header').css({
			'background-color': 'transparent'
		  });
		  $('.header-list').css({
			'color': '#fff'
		  });
		  $('.header .sub-menu li').css({
			'color': '#fff'
		  });
		  $('.header .sub-menu').css({
			'background-color': 'transparent',
			'box-shadow:': '10px 10px 10px rgba(0,0,0,0.5);'
		  });
		  $('.text-underline').removeClass('after-style');
		  
		  
		  if(!$('.line-container').hasClass('open')) {
			$('.line').removeClass('new-style-pseudo');
		}
		}
	  });
	/**
	 * Runs when window is ready.
	 * Usually where most code that's not functions go.
	 */
	
	$(function() {

	});

})( jQuery );
