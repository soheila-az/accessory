(function($) {
    "use strict";


    // Elementor front-end
    $(window).on('elementor/frontend/init', function() {


            elementorFrontend.hooks.addAction('frontend/element_ready/Offer_Products.default', function($scope, $) {

              var galleryThumbs = new Swiper(".gallery-thumbs", {
                centeredSlides: true,
                slidesPerView: "auto",
                spaceBetween: 10,
                touchRatio: 0,
                mousewheel:
              		{
              			invert: true,
              		},
                autoplay:
                  {
                    delay: 5000,
                  },
                keyboard: { enabled: !0, onlyInViewport: !0 },
                watchSlidesVisibility: true,
                watchSlidesProgress: true,
                direction: 'vertical'
            });

            var galleryMain = new Swiper(".gallery-main", {
              watchOverflow: true,
              watchSlidesVisibility: true,
              watchSlidesProgress: true,
              speed: 700,
              pagination: {
            	  el: '.swiper-pagination',
            	  clickable: true,
            	  },
              preventInteractionOnTransition: true,
              navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
              },
              effect: 'slide',
              thumbs: {
                swiper: galleryThumbs
              }
            });

            galleryMain.on('slideChangeTransitionStart', function() {
              galleryThumbs.slideTo(galleryMain.activeIndex);
            });

            galleryThumbs.on('transitionStart', function(){
              galleryMain.slideTo(galleryThumbs.activeIndex);
            });

                });


    });



})(jQuery);


jQuery(document).ready(function($) {

  var galleryThumbs = new Swiper(".gallery-thumbs", {
  centeredSlides: true,
  slidesPerView: "auto",
  spaceBetween: 10,
  touchRatio: 0,
  mousewheel:
		{
			invert: true,
		},
  autoplay:
    {
      delay: 5000,
    },
  keyboard: { enabled: !0, onlyInViewport: !0 },
  watchSlidesVisibility: true,
  watchSlidesProgress: true,
  direction: 'vertical'
});

var galleryMain = new Swiper(".gallery-main", {
  watchOverflow: true,
  watchSlidesVisibility: true,
  watchSlidesProgress: true,
  preventInteractionOnTransition: true,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  effect: 'slide',
  thumbs: {
    swiper: galleryThumbs
  }
});

galleryMain.on('slideChangeTransitionStart', function() {
  galleryThumbs.slideTo(galleryMain.activeIndex);
});

galleryThumbs.on('transitionStart', function(){
  galleryMain.slideTo(galleryThumbs.activeIndex);
});

});


jQuery(document).ready(function($) {
  var swiper = new Swiper('.gallery-main-mob', {
      slidesPerView: 1,
      spaceBetween: 10,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
    });
});
