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
import $ from 'jquery';
import { HeroTest } from '../theme/Blocks/HeroBlock/hero';
import { CarouselTest } from '../theme/Blocks/CarouselBlock/carousel';
import AOS from 'aos';

function menuToggle() {
	const menuToggle = document.querySelector('.dps-menu-toggle');
	const mobileMenu = document.querySelector('.dps-mobile-menu');

	menuToggle.onclick = function () {
		mobileMenu.classList.toggle('active');
	};
}

// Wrap your code in the jQuery document ready function
$(document).ready(function () {
	menuToggle();
	HeroTest();
	CarouselTest();
	AOS.init();
});
