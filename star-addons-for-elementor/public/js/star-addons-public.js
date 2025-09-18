(function( $ ) {
	'use strict';

	/*====================
	PRELOADER JS
	======================*/
	$(window).on('load', function() {
		$('.preloader').fadeOut();
	});

	$( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/widget', function( $scope ) {
            
            // Star Banner Slider
	        var bannerSlider = $(".star-banner-slider");
	        if (bannerSlider.length) {
	            bannerSlider.owlCarousel({
                    items: 1,
                    loop: true,
                    nav: true,
                    navText: [
                        "<i class='fa fa-arrow-left'></i>", 
                        "<i class='fa fa-arrow-right'></i>"],
                    dots: false,
                    autoplay: true,
                    autoplayHoverPause: true,
                    smartSpeed: 500,
                    animateOut: "slideOutLeft",
                    animateIn: "slideInRight",
                    responsive: {
                        0: {
                            nav: false
                        },
                        768: {
                            nav: false
                        },
                        992: {
						    nav: true
						},
						1200: {
							nav: true
						}
                    },
                });
	        }

			// LP Course Categories Slider
			$('.star-lp-course-category-area .lp-course-category-slider-new').owlCarousel({
				nav: true,
				margin: 0,
				loop: true,
				dots: false,
				autoplay: true,
				autoplayHoverPause: true,
				smartSpeed: 500,
				animateOut: "slideOutLeft",
                animateIn: "slideInRight",
				navText: [
					"<i class='fa fa-arrow-left'></i>",
					"<i class='fa fa-arrow-right'></i>"
				],
				responsive: {
					0: {
						items: 1
					},
					375: {
						items: 2
					},
					768: {
						items: 3
					},
					992: {
						items: 4
					},
					1200: {
						items: 5
					}
				}
			});

			// LP Course Tags Slider
			$('.star-lp-course-tag-area .lp-course-tag-slider-new').owlCarousel({
				nav: true,
				margin: 0,
				loop: true,
				dots: false,
				autoplay: true,
				autoplayHoverPause: true,
				smartSpeed: 500,
				animateOut: "slideOutLeft",
                animateIn: "slideInRight",
				navText: [
					"<i class='fa fa-arrow-left'></i>",
					"<i class='fa fa-arrow-right'></i>"
				],
				responsive: {
					0: {
						items: 1
					},
					375: {
						items: 2
					},
					768: {
						items: 3
					},
					992: {
						items: 4
					},
					1200: {
						items: 5
					}
				}
			});
            
            // Star Testimonial Slider
			$('.star-testimonial-slides').owlCarousel({
				loop: true,
				nav: false,
				dots: true,
				margin: 30,
				autoplay: true,
				autoplayHoverPause: true,
				navText: [
					"<i class='fa fa-arrow-left'></i>",
					"<i class='fa fa-arrow-right'></i>"
				],
				responsive: {
					0: {
						items: 1
					},
					576: {
						items: 1
					},
					768: {
						items: 2
					},
					992: {
						items: 2
					}
				}
			});

			// Star Team Slider
			$('.star-team-slides').owlCarousel({
				loop: true,
				nav: false,
				dots: true,
				margin: 30,
				autoplay: true,
				autoplayHoverPause: true,
				navText: [
					"<i class='fa fa-arrow-left'></i>",
					"<i class='fa fa-arrow-right'></i>"
				],
				responsive: {
					0: {
						items: 1
					},
					576: {
						items: 2
					},
					768: {
						items: 2
					},
					992: {
						items: 4
					}
				}
			});

			// Star Blog Slider
			$('.star-blog-slides').owlCarousel({
				loop: true,
				nav: false,
				dots: true,
				margin: 30,
				autoplay: true,
				autoplayHoverPause: true,
				navText: [
					"<i class='fa fa-arrow-left'></i>",
					"<i class='fa fa-arrow-right'></i>"
				],
				responsive: {
					0: {
						items: 1
					},
					576: {
						items: 1
					},
					768: {
						items: 2
					},
					992: {
						items: 2
					},
					1200: {
						items: 3
					}
				}
			});

			// Star Demos Slider
			$('.star-demos-slides').owlCarousel({
				loop: true,
				nav: false,
				dots: true,
				margin: 30,
				autoplay: true,
				autoplayHoverPause: true,
				navText: [
					"<i class='fa fa-arrow-left'></i>",
					"<i class='fa fa-arrow-right'></i>"
				],
				responsive: {
					0: {
						items: 1
					},
					576: {
						items: 1
					},
					768: {
						items: 2
					},
					992: {
						items: 2
					},
					1200: {
						items: 3
					}
				}
			});

			// Star Features Slider
			$('.star-features-slides').owlCarousel({
				loop: true,
				nav: false,
				dots: true,
				margin: 30,
				autoplay: true,
				autoplayHoverPause: true,
				navText: [
					"<i class='fa fa-arrow-left'></i>",
					"<i class='fa fa-arrow-right'></i>"
				],
				responsive: {
					0: {
						items: 1
					},
					576: {
						items: 1
					},
					768: {
						items: 2
					},
					992: {
						items: 2
					},
					1200: {
						items: 3
					}
				}
			});

			/*====================
			Product Category Slider
			======================*/
			$('.category-slider').owlCarousel({
				loop:true,
				margin:0,
				nav:false,
				mouseDrag:true,
				items:1,
				dots:true,
				autoplay:true,
				smartSpeed:1500,
				autoplayHoverPause:true,
				center:false,
				navText: [
					"<i class='bx bx-chevrons-left'></i>",
					"<i class='bx bx-chevrons-right'></i>"
				],
				responsive:{
					0:{
						items:1
					},
					576:{
						items:2
					},
					768:{
						items:3
					},
					992:{
						items:5
					},
					1200:{
						items:5
					}
				}
			});

			/*====================
			Product Slider
			======================*/
			$('.product-slider').owlCarousel({
				loop:true,
				margin:0,
				nav:false,
				mouseDrag:true,
				items:1,
				dots:true,
				autoHeight:true,
				autoplay:false,
				smartSpeed:1500,
				autoplayHoverPause:true,
				center:false,
				navText: [
					"<i class='bx bx-chevrons-left'></i>",
					"<i class='bx bx-chevrons-right'></i>"
				],
				responsive:{
					0:{
						items:1
					},
					576:{
						items:2
					},
					768:{
						items:2
					},
					992:{
						items:3
					},
					1200:{
						items:4
					}
				}
			});

			/*====================
			Product Sidebar Slider
			======================*/
			$('.product-sidebar-slider').owlCarousel({
				loop:true,
				margin:0,
				nav:false,
				mouseDrag:true,
				items:1,
				dots:true,
				autoHeight:true,
				autoplay:false,
				smartSpeed:1500,
				autoplayHoverPause:true,
				center:false,
				navText: [
					"<i class='bx bx-chevrons-left'></i>",
					"<i class='bx bx-chevrons-right'></i>"
				],
				responsive:{
					0:{
						items:1
					},
					576:{
						items:2
					},
					768:{
						items:2
					},
					992:{
						items:2
					},
					1200:{
						items:3
					}
				}
			});

			$('.product-slider .product-popup-btn').on('click', function() {
				$('.product-slider').addClass('product-popup-show');
			});

			$('.product-slider .modal-content .close').on('click', function() {
				$('.product-slider').removeClass('product-popup-show');
			});

			$('.product-sidebar-slider .product-popup-btn').on('click', function() {
				$('.product-sidebar-slider').addClass('product-popup-show');
			});

			$('.product-sidebar-slider .modal-content .close').on('click', function() {
				$('.product-sidebar-slider').removeClass('product-popup-show');
			});

			/*====================
			Service Slider
			======================*/
			$('.service-slider').owlCarousel({
				loop:true,
				margin:0,
				nav:false,
				mouseDrag:true,
				items:1,
				dots:true,
				autoplay:false,
				smartSpeed:1500,
				autoplayHoverPause:true,
				center:false,
				navText: [
					"<i class='bx bx-chevrons-left'></i>",
					"<i class='bx bx-chevrons-right'></i>"
				],
				responsive:{
					0:{
						items:1
					},
					576:{
						items:1
					},
					768:{
						items:2
					},
					992:{
						items:3
					},
					1200:{
						items:3
					}
				}
			});

			/*====================
			Portfolio Slider
			======================*/
			$('.portfolio-slider').owlCarousel({
				loop:true,
				margin:0,
				nav:false,
				mouseDrag:true,
				items:1,
				dots:true,
				autoplay:false,
				smartSpeed:1500,
				autoplayHoverPause:true,
				center:false,
				navText: [
					"<i class='bx bx-chevrons-left'></i>",
					"<i class='bx bx-chevrons-right'></i>"
				],
				responsive:{
					0:{
						items:1
					},
					576:{
						items:1
					},
					768:{
						items:2
					},
					992:{
						items:3
					},
					1200:{
						items:3
					}
				}
			});

			/*====================
			Popup Youtube JS
			======================*/
			$('.popup-youtube').magnificPopup({
				disableOn: 320,
				type: 'iframe',
				mainClass: 'mfp-fade',
				removalDelay: 160,
				preloader: false,
				fixedContentPos: false
			});

			// Gallery Popup JS
			$('.gallery-popup').each(function() {
				$(this).magnificPopup({
					delegate: '.full-screen', 
					type: 'image',
					gallery: {
					  enabled:true
					}
				});
			});

			// Popup Video JS
			$('.popup-video').magnificPopup({
				disableOn: 320,
				type: 'iframe',
				mainClass: 'mfp-fade',
				removalDelay: 160,
				preloader: false,
				fixedContentPos: false
			});

			/*====================
			Popup Image JS
			======================*/
			$('.popup-btn').magnificPopup({
				type: 'image',
				gallery:{
					enabled:true
				}
			});

			// Data Aos
		    AOS.init({
		    	duration: 1200,
		        once: true,
		        disable: function() {
		            var maxWidth = 991;
		            return window.innerWidth < maxWidth;
		        }
		    });

	    });
    });

    // Data Aos
    AOS.init({
    	duration: 1200,
        once: true,
        disable: function() {
            var maxWidth = 991;
            return window.innerWidth < maxWidth;
        }
    });

	// Header Sticky
	$(window).on('scroll',function() {
		if ($(this).scrollTop() > 120){  
			$('.star-navbar-area').addClass("is-sticky");
		}
		else{
			$('.star-navbar-area').removeClass("is-sticky");
		}
	});

	// Mean Menu
	$('.mean-menu').meanmenu({
		meanScreenWidth: "991"
	});

	// Go to Top
	$(function(){
		// Scroll Event
		$(window).on('scroll', function(){
			var scrolled = $(window).scrollTop();
			if (scrolled > 300) $('.star-go-top-area .go-top').addClass('active');
			if (scrolled < 300) $('.star-go-top-area .go-top').removeClass('active');
		});  
		// Click Event
		$('.star-go-top-area .go-top').on('click', function() {
			$("html, body").animate({ scrollTop: "0" },  50);
		});
	});

	/*====================
	FAQ Accordion JS
	======================*/
	$('.accordion-area .accordion .accordion-item.one:nth-child(1) a').addClass('active');
	$('.accordion-area .accordion .accordion-item.one:nth-child(1) .accordion-content').addClass('show');
	
	$('.accordion').find('.accordion-title').on('click', function(){
		// Adds Active Class
		$(this).toggleClass('active');
		// Expand or Collapse This Panel
		$(this).next().slideToggle('fast');
		// Hide The Other Panels
		$('.accordion-content').not($(this).next()).slideUp('fast');
		// Removes Active Class From Other Titles
		$('.accordion-title').not($(this)).removeClass('active');		
	});

	// Image Gallery Js
    $(".image-gallery-area.style-seven .row .gallery:nth-child(1)").addClass('a');
    $(".image-gallery-area.style-seven .row .gallery:nth-child(2)").addClass('b');
    $(".image-gallery-area.style-seven .row .gallery:nth-child(3)").addClass('c');
    $(".image-gallery-area.style-seven .row .gallery:nth-child(4)").addClass('d');
    $(".image-gallery-area.style-seven .row .gallery:nth-child(5)").addClass('e');
    $(".image-gallery-area.style-seven .row .gallery:nth-child(6)").addClass('f');
    $(".image-gallery-area.style-seven .row .gallery:nth-child(7)").addClass('g');
    $(".image-gallery-area.style-seven .row .gallery:nth-child(8)").addClass('h');

    $(".image-gallery-area.style-two .row .gallery:nth-child(1)").addClass('i');
    $(".image-gallery-area.style-two .row .gallery:nth-child(2)").addClass('j');
    $(".image-gallery-area.style-two .row .gallery:nth-child(3)").addClass('k');
    $(".image-gallery-area.style-two .row .gallery:nth-child(4)").addClass('l');
    $(".image-gallery-area.style-two .row .gallery:nth-child(5)").addClass('m');
    $(".image-gallery-area.style-two .row .gallery:nth-child(6)").addClass('n');
    $(".image-gallery-area.style-two .row .gallery:nth-child(7)").addClass('o');
    $(".image-gallery-area.style-two .row .gallery:nth-child(8)").addClass('p');
    $(".image-gallery-area.style-two .row .gallery:nth-child(9)").addClass('q');

    $(".image-gallery-area.style-one .row .gallery:nth-child(1)").addClass('r');
    $(".image-gallery-area.style-one .row .gallery:nth-child(2)").addClass('s');
    $(".image-gallery-area.style-one .row .gallery:nth-child(3)").addClass('t');
    $(".image-gallery-area.style-one .row .gallery:nth-child(4)").addClass('u');
    $(".image-gallery-area.style-one .row .gallery:nth-child(5)").addClass('v');
    $(".image-gallery-area.style-one .row .gallery:nth-child(6)").addClass('w');
    $(".image-gallery-area.style-one .row .gallery:nth-child(7)").addClass('x');
    $(".image-gallery-area.style-one .row .gallery:nth-child(8)").addClass('y');
    
    $(".image-gallery-area.style-four .row .image-gallery-col:nth-child(1)").addClass('col-lg-4 col-md-6');
    $(".image-gallery-area.style-four .row .image-gallery-col:nth-child(2)").addClass('col-lg-4 col-md-6');
    $(".image-gallery-area.style-four .row .image-gallery-col:nth-child(3)").addClass('col-lg-4 col-md-6');
    $(".image-gallery-area.style-four .row .image-gallery-col:nth-child(4)").addClass('col-lg-8 col-md-6');
    $(".image-gallery-area.style-four .row .image-gallery-col:nth-child(5)").addClass('col-lg-4 col-md-6');
    $(".image-gallery-area.style-four .row .image-gallery-col:nth-child(6)").addClass('col-lg-4 col-md-6');
    $(".image-gallery-area.style-four .row .image-gallery-col:nth-child(7)").addClass('col-lg-8 col-md-6');

    $(".image-gallery-area.style-three .row .image-gallery-col:nth-child(1)").addClass('col-lg-4 col-md-6');
    $(".image-gallery-area.style-three .row .image-gallery-col:nth-child(2)").addClass('col-lg-4 col-md-6');
    $(".image-gallery-area.style-three .row .image-gallery-col:nth-child(3)").addClass('col-lg-4 col-md-6');
    $(".image-gallery-area.style-three .row .image-gallery-col:nth-child(4)").addClass('col-lg-8 col-md-6');
    $(".image-gallery-area.style-three .row .image-gallery-col:nth-child(5)").addClass('col-lg-4 col-md-6');
    $(".image-gallery-area.style-three .row .image-gallery-col:nth-child(6)").addClass('col-lg-4 col-md-6');
    $(".image-gallery-area.style-three .row .image-gallery-col:nth-child(7)").addClass('col-lg-4 col-md-6');
    $(".image-gallery-area.style-three .row .image-gallery-col:nth-child(8)").addClass('col-lg-4 col-md-6');
 
    $('.a, .b').wrapAll('<div class="col-lg-3 col-md-6"></div>');
	$('.c, .d').wrapAll('<div class="col-lg-3 col-md-6"></div>');
	$('.e, .f').wrapAll('<div class="col-lg-3 col-md-6"></div>');
	$('.g, .h').wrapAll('<div class="col-lg-3 col-md-6"></div>'); 

	$('.i, .j, .k').wrapAll('<div class="col-lg-4 col-md-6"></div>');
	$('.m, .n, .l').wrapAll('<div class="col-lg-4 col-md-6"></div>');
	$('.o, .p, .q').wrapAll('<div class="col-lg-4 col-md-6"></div>');

	$('.r, .s, .t, .u').wrapAll('<div class="col-lg-6"></div>');
	$('.r, .s').wrapAll('<div class="row"></div>');
    $('.r').wrapAll('<div class="col-lg-6"></div>');
    $('.s').wrapAll('<div class="col-lg-6"></div>');
    $('.v, .w, .x, .y').wrapAll('<div class="col-lg-6"></div>');
    $('.x, .y').wrapAll('<div class="row"></div>');
    $('.x').wrapAll('<div class="col-lg-6"></div>');
    $('.y').wrapAll('<div class="col-lg-6"></div>');
    
    $(".image-gallery-area.style-one .row .gallery").removeClass('col-lg-3');
    $(".image-gallery-area.style-two .row .gallery").removeClass('col-lg-4');
    $(".image-gallery-area.style-three .row .image-gallery-col").removeClass('col-lg-3');
    $(".image-gallery-area.style-four .row .image-gallery-col").removeClass('col-lg-3');
    $(".image-gallery-area.style-seven .row .gallery").removeClass('col-lg-3');

})( jQuery );
