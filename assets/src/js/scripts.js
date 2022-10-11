var $ = jQuery.noConflict();

/* Script on ready
------------------------------------------------------------------------------*/
$(() => {
	/* Do jQuery stuff when DOM is ready */
	$('.slideshow').slick({
		infinite:true,
		slidesToShow: 1,
		slidesToScroll:1,
		autoplay: true,
		autoplaySpeed: 3000,
		arrows: true,
		adaptiveHeight:true,
		rows : 0
	  });

	  $('.quote_slider').slick({
		infinite:true,
		slidesToShow: 1,
		slidesToScroll:1,
		autoplay: true,
		autoplaySpeed: 3000,
		arrows: true,
		rows: 0,
	// 	responsive: [
	// 		{
	// 		  breakpoint: 1024,
	// 		  settings: {
	// 			slidesToShow: 1,
	// 			slidesToScroll: 1,
	// 			infinite: true,
	// 			dots: true
	// 		  }
	// 		},
	// 		{
	// 		  breakpoint: 600,
	// 		  settings: {
	// 			slidesToShow: 1,
	// 			slidesToScroll: 1
	// 		  }
	// 		},
	// 		{
	// 		  breakpoint: 480,
	// 		  settings: {
	// 			slidesToShow: 1,
	// 			slidesToScroll: 1
	// 		  }
	// 		}
	// 	  ]
	  });
});

/* Script on load
------------------------------------------------------------------------------*/
window.onload = () => {
	/* Do jQuery stuff when DOM is fully loaded, including all frames, objects and images */
};

/* Script on scroll
------------------------------------------------------------------------------*/
window.onscroll = () => {
	/* Do jQuery stuff on Scroll */
};

/* Script on resize
------------------------------------------------------------------------------*/

window.onresize = (event) => {
	/* Do jQuery stuff on resize */
};

/* Script all functions
------------------------------------------------------------------------------*/