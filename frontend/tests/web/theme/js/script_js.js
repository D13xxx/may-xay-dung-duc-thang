jQuery(document).ready(function($) {
	$('.slider').owlCarousel({
		items: 1,
		animateOut: 'fadeOut',
		loop: true,
		nav:false,
		dots:true
	});
	$('.cars').owlCarousel({
		items: 4,
		animateOut: 'fadeOut',
		loop: false,
		margin:10,
		nav:true,
		dots:false,
		autoplay:true,
		autoplayTimeout:4000,
		smartSpeed:250,
		navText: ["<i class='fa fa-chevron-left' aria-hidden='true'></i>","<i class='fa fa-chevron-right' aria-hidden='true'></i>"],
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

	});
	$('.group_service').owlCarousel({
		items: 4,
		animateOut: 'fadeOut',
		loop: false,
		margin:10,
		nav:true,
		dots:false,
		autoplay:true,
		autoplayTimeout:4000,
		smartSpeed:250,
		navText: ["<i class='fa fa-chevron-left' aria-hidden='true'></i>","<i class='fa fa-chevron-right' aria-hidden='true'></i>"],
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

	});
	$('.list_technology').owlCarousel({
		items: 4,
		animateOut: 'fadeOut',
		loop: false,
		margin:30,
		nav:true,
		dots:false,
		autoplay:true,
		autoplayTimeout:4000,
		smartSpeed:250,
		navText: ["<i class='fa fa-chevron-left' aria-hidden='true'></i>","<i class='fa fa-chevron-right' aria-hidden='true'></i>"],
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

	});
	$('.list_advisory').owlCarousel({
		items: 4,
		animateOut: 'fadeOut',
		loop: false,
		margin:10,
		nav:false,
		dots:false,
		autoplay:true,
		autoplayTimeout:4000,
		smartSpeed:250,

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

	});
	$('.list_service').owlCarousel({
		items: 4,
		animateOut: 'fadeOut',
		loop: false,
		margin:10,
		nav:false,
		dots:false,
		autoplay:true,
		autoplayTimeout:4000,
		smartSpeed:250,

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

	});
	$('.slide_list').owlCarousel({
		items: 4,
		animateOut: 'fadeOut',
		loop: false,
		margin:10,
		nav:false,
		dots:false,
		autoplay:true,
		autoplayTimeout:4000,
		smartSpeed:250,

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

	});
	$('.slide_furniture').owlCarousel({
		items: 4,
		animateOut: 'fadeOut',
		loop: false,
		margin:5,
		nav:false,
		dots:false,
		autoplay:true,
		autoplayTimeout:4000,
		smartSpeed:250,

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

	});
	$('.functions_slide').owlCarousel({items: 4,
		animateOut: 'fadeOut',
		loop: false,
		margin:10,
		nav:false,
		dots:false,
		autoplay:true,
		autoplayTimeout:4000,
		smartSpeed:250,

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

	});

	$('.slide_img').owlCarousel({
		items: 4,
		animateOut: 'fadeOut',
		loop: false,
		margin:5,
		nav:false,
		dots:false,
		autoplay:true,
		autoplayTimeout:4000,
		smartSpeed:250,

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

	});
	$('.slide_for_img').owlCarousel({
		items: 1,
		loop: true,
		nav:true,
		dots:true
	});
});