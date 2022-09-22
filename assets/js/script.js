$(document).ready(function(){

	// Menu
	$( ' .icon-mobile ' ).on( 'click', function( e ){
		if ( $( '#nav-cb' ).attr( 'checked') ) {
			$( '#nav-cb' ).removeAttr( 'checked');
		}else{
			$( '#nav-cb' ).attr( 'checked', true );
		}
		e.preventDefault();
	} );

	// Slick Banner
	$('.slick-banners').slick({
		dots: true,
		arrows: false,
		infinite: false,
		autoplaySpeed: 5000,
	});

	// Slick Espaço
	$('.slick-espaco').slick({
		dots: false,
		arrows: true,
		prevArrow: $('.fa-arrow-left'),
      	nextArrow: $('.fa-arrow-right'),
		infinite: false,
		autoplaySpeed: 5000,
	});

	// Removendo erro do form
	setTimeout( function(e) {
		$('.form-output').fadeOut();
	}, 5000);
});