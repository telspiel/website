  var swiper = new Swiper(".mySwiper", {
     autoplay: true,
  });


  var swiper = new Swiper(".videoslider", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    initialSlide: 1,
    coverflowEffect: {
      rotate: 0,
      stretch: 0,
      depth: 600,
      modifier: 1,
      slideShadows: true,
    },
    pagination: {
      el: ".swiper-pagination",
    },
    // loop: true,

  });

  Fancybox.bind("[data-fancybox]", {
    // Your options go here
  });

  if ($(window).width() <= 580) {
    $(".header").children().removeClass("navbar-dark");
    $(".header").children().removeClass("bg-transparent").addClass("bg-light");
  }

  AOS.init();
