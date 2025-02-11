const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

const brands = new Swiper(".brands-slider", {
  loop: true,
  slidesPerView: 1.5,
  spaceBetween: 30,
  autoplay: true,
  centeredSlides: true,
  breakpoints: {
    640: {
      slidesPerView: 2,
      spaceBetween: 20,
      centeredSlides: true,
    },
    768: {
      slidesPerView: 4,
      spaceBetween: 40,
    },
    1024: {
      slidesPerView: 5.5,
      spaceBetween: 50,
    },
    1920: {
      slidesPerView: 7.5,
      spaceBetween: 50,
    },
  },
});



const testimonial = new Swiper(".testimonial-slider", {
  loop: true,
  slidesPerView: 1,
  spaceBetween: 30,
  autoplay: true, 
  centeredSlidesBounds: true,
  breakpoints: {
    640: {
      slidesPerView: 1,
      spaceBetween: 30,
      centeredSlides: true,
    },
    768: {
      slidesPerView: 3.5,
      spaceBetween: 40,
    },
    1024: {
      slidesPerView: 3.5,
      spaceBetween: 50,
    },
  },
});

const caseslider = new Swiper(".case-slider", {
  loop: true,
  slidesPerView: 1,
  spaceBetween: 30,
  autoplay: true, 
  centeredSlidesBounds: true,
  breakpoints: {
    640: {
      slidesPerView: 1,
      spaceBetween: 30,
      centeredSlides: true,
    },
    768: {
      slidesPerView: 3.5,
      spaceBetween: 40,
    },
    1024: {
      slidesPerView: 3.5,
      spaceBetween: 50,
    },
  },
});
const worklife = new Swiper(".worklife-slider", {
  //loop: true,
  slidesPerView: 1,
  spaceBetween: 30,
  autoplay: false, 
  breakpoints: {
    640: {
      slidesPerView: 1,
     
      centeredSlides: true,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    1024: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
  },

  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

});

const leadership = new Swiper(".leadership-slider", {
  //loop: true,
  slidesPerView: 1,  
  autoplay: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

const locations = new Swiper(".locations-swiper", {
  //loop: true,
  slidesPerView: 2,
  spaceBetween: 30,
  autoplay: true, 
  breakpoints: {
    640: {
      slidesPerView: 2,     
      centeredSlides: true,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    1024: {
      slidesPerView: 6,
      spaceBetween: 30,
    },
  },

  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

});

$('#industry-filter').select2({
  theme: "bootstrap-5",
  minimumResultsForSearch: Infinity,
  width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
  placeholder: $(this).data('placeholder'),
});

$('#products-filter').select2({
  theme: "bootstrap-5",
  minimumResultsForSearch: Infinity,
  width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
  placeholder: $(this).data('placeholder'),
});


