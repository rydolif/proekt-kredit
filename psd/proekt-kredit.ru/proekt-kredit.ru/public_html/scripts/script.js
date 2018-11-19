$(document).ready(function() {

	$('.slid').owlCarousel({
		loop:true,
		margin:60,
		nav:true,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:3
			},
			1000:{
				items:4
			}
		}
	})

});