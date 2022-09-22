$(document).ready(function(){

	$('.slick-banners').slick({
		dots: true,
		arrows: false,
		infinite: false,
		autoplaySpeed: 5000,
	});

	$('.slick-espaco').slick({
		dots: false,
		arrows: true,
		prevArrow: $('.fa-arrow-left'),
      	nextArrow: $('.fa-arrow-right'),
		infinite: false,
		autoplaySpeed: 5000,
	});

});