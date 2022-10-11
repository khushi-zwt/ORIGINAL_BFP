var $ = jQuery.noConflict();

/* Script on ready
------------------------------------------------------------------------------*/
$( document ).ready( function() {
	//do jQuery stuff when DOM is ready

	/* Responsive Jquery Navigation */
	$( '.hamburger' ).click( function( event ) {
		$( '.mobilenav' ).toggleClass( 'is-open' );
	} );

	$( '.mobilenav .nav-backdrop' ).click( function() {
		$( '.mobilenav' ).removeClass( 'is-open' );
	} );

	var clickable = $( '.menu-state' ).attr( 'data-clickable' );
	$( '.mobilenav li:has(ul)' ).addClass( 'has-sub' );
	$( '.mobilenav .has-sub>a' ).after( '<em class="caret">' );
	if ( clickable == 'true' ) {
		$( '.mobilenav .has-sub>.caret' ).addClass( 'trigger-caret' );
	} else {
		$( '.mobilenav .has-sub>a' ).addClass( 'trigger-caret' ).attr( 'href','javascript:;' );
	}

	/* menu open and close on single click */
	$( '.mobilenav .has-sub>.trigger-caret' ).click( function() {
		var element = $( this ).parent( 'li' );
		if ( element.hasClass( 'is-open' ) ) {
			element.removeClass( 'is-open' );
			element.find( 'li' ).removeClass( 'is-open' );
			element.find( 'ul' ).slideUp( 200 );
		}
		else {
			element.addClass( 'is-open' );
			element.children( 'ul' ).slideDown( 200 ) ;
			element.siblings( 'li' ).children( 'ul' ).slideUp( 200 );
			element.siblings( 'li' ).removeClass( 'is-open' );
			element.siblings( 'li' ).find( 'li' ).removeClass( 'is-open' );
			element.siblings( 'li' ).find( 'ul' ).slideUp( 200 );
		}
	} );

	$('.by-author-slider').slick({
		dots: false,
		infinite: true,
		speed: 300,
		slidesToShow: 1,
		slidesToScroll: 1,
		responsive: [
			{
			  breakpoint: 768,
			  settings: {
				arrows :false,
				dots: true,
				slidesToShow: 1,
				slidesToScroll: 1
			  }
			},
			{
			  breakpoint: 576,
			  settings: {
				arrows :false,
				dots: true,
				slidesToShow: 1,
				slidesToScroll: 1
			  }
			}
			// You can unslick at a given breakpoint now by adding:
			// settings: "unslick"
			// instead of a settings object
		  ]
	  });

	$('.about-background-image').click(function(){
		$(this).toggleClass('active');
	});

	$(".js-example-placeholder-single").select2({
		placeholder: "Search",
		allowClear: true
	});
});

//---- pie chart script ----- //
// if ($('.additional-slider').length > 0) {
// 	var $ = jQuery.noConflict();
// 	var piemenu = new wheelnav('piemenu');
// 	piemenu.clockwise = false;
// 	piemenu.wheelRadius = piemenu.wheelRadius *0.89;
// 	piemenu.createWheel();
// 	piemenu.setTooltips(['1','2','3','4','5','6','7','8','9','10']);
	

// 	function additional_tab(a) {
// 		$('.additional-slider').slick('slickGoTo', a - 1);
// 	}
// }

//---- Discover script ----- //
if ($('.discover-slider').length > 0) {
	var $ = jQuery.noConflict();
	var piemenu = new wheelnav('piemenu-discover');
	piemenu.clockwise = false;
	piemenu.wheelRadius = piemenu.wheelRadius *0.89;
	piemenu.createWheel();
	piemenu.setTooltips(['1','2','3','4','5','6','7','8','9','10']); 
	

	function discover_tab(a) {
		$('.discover-slider').slick('slickGoTo', a - 1);
		$('html,body').animate({
			scrollTop: $(".click-and-discover").offset().top
		});
	}
}

if ($('.discover-slider').length > 0) {
	$('.discover-slider').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		swipe: false,
		swipeToSlide: false,
		adaptiveHeight: true,
		rows: 0
	});
}


/* Script on load
------------------------------------------------------------------------------*/
$( window ).on( 'load',function() {
	// page is fully loaded, including all frames, objects and images

} );

/* Script on scroll
------------------------------------------------------------------------------*/
$( window ).on( 'scroll',function() {

} );

/* Script on resize
------------------------------------------------------------------------------*/
$( window ).on( 'resize',function() {

} );

/* Script all functions
------------------------------------------------------------------------------*/
