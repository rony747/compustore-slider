(function ($) {
    'use strict';
    const swiper = new Swiper('.compu_slider_wrapper .swiper', {
        // Optional parameters
        spaceBetween: 0,
        effect: "fade",
        fadeEffect: {
            crossFade: true
        },
        autoplay: {
            delay: compuSlider.sliderSpeed,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

})(jQuery);
