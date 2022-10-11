var $ = jQuery.noConflict();

/* Script on ready
------------------------------------------------------------------------------*/
$(() => {
	/* Do jQuery stuff when DOM is ready */

	$(".slideshow").slick({
		infinite: true,
		speed: 300,
		slidesToShow: 1,
		arrows:true,
		rows: 0,
		responsive: [
			{
			breakpoint:576,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				infinite: true,
				dots: true
			}
		},
		{
			breakpoint: 600,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 480,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
		}
	]
});
$(".image-slider").slick({
		dots: false,
		infinite: true,
		speed: 300,
		slidesToShow: 1,
		rows: 0,
		arrows: true
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

