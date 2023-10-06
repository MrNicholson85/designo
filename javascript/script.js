/**
 * Front-end JavaScript
 *
 * The JavaScript code you place here will be processed by esbuild. The output
 * file will be created at `../theme/js/script.min.js` and enqueued in
 * `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */
/* global wp */
import Swiper from 'swiper';
import $ from 'jquery';

function initializeSlider() {
	const swiper = new Swiper('.swiper', {
		direction: 'horizontal',
		loop: true,
		pagination: {
			el: '.swiper-pagination',
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		scrollbar: {
			el: '.swiper-scrollbar',
		},
	});

	return swiper;
}

// Wrap your code in the jQuery document ready function
$(document).ready(function () {
	initializeSlider();
});
