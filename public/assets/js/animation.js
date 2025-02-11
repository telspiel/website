jQuery(document).ready(function ($) {
    var wv = $(window).width();


    AOS.init({
        // Global settings:
        disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
        startEvent: "DOMContentLoaded", // name of the event dispatched on the document, that AOS should initialize on
        initClassName: "aos-init", // class applied after initialization
        animatedClassName: "aos-animate", // class applied on animation
        useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
        disableMutationObserver: false, // disables automatic mutations' detections (advanced)
        debounceDelay: 0, // the delay on debounce used while resizing window (advanced)
        throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)

        // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
        offset: 30, // offset (in px) from the original trigger point
        delay: 0, // values from 0 to 3000, with step 50ms
        duration: 1000, // values from 0 to 3000, with step 50ms
        // easing: "cubic-bezier(0.165, 0.84, 0.44, 1)", // default easing for AOS animations
        easing: "cubic-bezier(.215, .61, .355, 1)",
        once: false, // whether animation should happen only once - while scrolling down
        mirror: false, // whether elements should animate out while scrolling past them
        anchorPlacement: "top-bottom", // defines which position of the element regarding to window should trigger the animation
    });

    setInterval(() => {
        AOS.refresh();
    }, 250);
});

jQuery(window).on('resize', function () {
    AOS.refresh();
});



var previousScroll = 0;  // Declare the previous scroll position variable

$(window).scroll(function () {
  var sticky = $('.hero-section .video-background .content header'),
      scroll = $(window).scrollTop();

  // If scroll position is at the very top, remove the 'top-fixed' class
  if (scroll === 0) {
    sticky.removeClass('fixed');
  }
  // If scrolling down and scroll position is >= 60, remove the 'fixed' class
  else if (scroll > previousScroll && scroll >= 60) {
    sticky.removeClass('fixed');
  }
  // If scrolling up, add the 'fixed' class
  else if (scroll < previousScroll) {
    sticky.addClass('fixed');
  }

  // Update the previous scroll position for the next scroll event
  previousScroll = scroll;
});
