/* -------------------------------------------

Name: 		App Showcase
Author:		Nazar Miller (millerDigitalDesign)
Portfolio:  https://themeforest.net/user/millerdigitaldesign/portfolio?ref=MillerDigitalDesign

p.s. I am available for Freelance hire (UI design, web development). mail: miller.themes@gmail.com

------------------------------------------- */

$(function () {

    "use strict";

    //preloader
    $(window).on('load', function () {
        $(".status").fadeOut();
        $(".preloader").delay(500).fadeOut("slow");
    })
    
   $('body').scrollspy({target: "#navigation", offset: 91});

    $('#navigation a').on("click",function () {
        //Toggle Class
        $(".active").removeClass("active");
        $(this).closest('li a').addClass("active");
        var theClass = $(this).attr("class");
        $('.' + theClass).parent('li a').addClass('active');
        //Animate
        $('html, body').stop().animate({
            scrollTop: $($(this).attr('href')).offset().top - 85
        }, 1000);
        return false;
    });

    //navbar color after scroll
    $(window).on("scroll", function () {
        var scroll = $(window).scrollTop();

        if (scroll >= 60) {
            $(".navbar").addClass("bg-scroll");
        } else {
            $(".navbar").removeClass("bg-scroll");
        }
    });

    // Testimonials slider
    $("#owl").owlCarousel({
        nav: true,
        loop: true,
        dots: false,
        navSpeed: 1000,
        navContainer: '.nav-container',
        navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            }
        }

    });

    // brands slider
    $('.brands-slider').owlCarousel({
        loop: true,
        nav: true,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplaySpeed: 2000,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    });

    // close popup
    $(".popup").on('click', function () {
        $(".popup").removeClass("active-popup");
        $(".popup").addClass("n-active-popup");
    });

})(jQuery);
