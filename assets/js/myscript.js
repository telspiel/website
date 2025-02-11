const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

// const brands = new Swiper(".brands-slider", {
//   loop: true,
//   slidesPerView: 1.5,
//   spaceBetween: 30,
//   autoplay: true,
//   centeredSlides: true,
//   autoplay: {
//     delay: 0, // Set to 1ms for continuous animation
//     disableOnInteraction: false, // Keep autoplay running on user interaction
//   },
//   speed: 4000, // Speed of sliding (lower values = faster movement)
//   breakpoints: {
//     640: {
//       slidesPerView: 2,
//       spaceBetween: 20,
//       centeredSlides: true,
//     },
//     768: {
//       slidesPerView: 4,
//       spaceBetween: 40,
//     },
//     1024: {
//       slidesPerView: 5.5,
//       spaceBetween: 50,
//     },
//     1920: {
//       slidesPerView: 7.5,
//       spaceBetween: 50,
//     },
//   },
//   freeMode: true, // Enable free scrolling
// });



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




const swiper = new Swiper('.brandsLogo-slider', {
  spaceBetween: 0,
  //autoplay: true, 
  autoplay: {
    delay: 1500,
    disableOnInteraction: false,
  },
  speed: 1000,
  breakpoints: {
    0: {
      slidesPerView: 2,     
    },
    768: {
      slidesPerView: 4,
    },
    1024: {
      slidesPerView: 7,
    },
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

document.querySelectorAll('.dropdown-item').forEach(function(item) {
  item.addEventListener('click', function() {
      var newText = this.getAttribute('data-tab-name');
      $(this).parent().parent().parent().find('.changetext').text(newText);
  });
});







// text animation
var TxtType = function(el, toRotate, period) {
  this.toRotate = toRotate;
  this.el = el;
  this.loopNum = 0;
  this.period = parseInt(period, 10) || 500;
  this.txt = '';
  this.tick();
  this.isDeleting = false;
};

TxtType.prototype.tick = function() {
  var i = this.loopNum % this.toRotate.length;
  var fullTxt = this.toRotate[i];

  if (this.isDeleting) {
  this.txt = fullTxt.substring(0, this.txt.length - 1);
  } else {
  this.txt = fullTxt.substring(0, this.txt.length + 1);
  }

  this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

  var that = this;
  var delta = 200 - Math.random() * 100;

  if (this.isDeleting) { delta /= 2; }

  if (!this.isDeleting && this.txt === fullTxt) {
  delta = this.period;
  this.isDeleting = true;
  } else if (this.isDeleting && this.txt === '') {
  this.isDeleting = false;
  this.loopNum++;
  delta = 500;
  }

  setTimeout(function() {
  that.tick();
  }, delta);
};

window.onload = function() {
  var elements = document.getElementsByClassName('typewrite');
  for (var i=0; i<elements.length; i++) {
      var toRotate = elements[i].getAttribute('data-type');
      var period = elements[i].getAttribute('data-period');
      if (toRotate) {
        new TxtType(elements[i], JSON.parse(toRotate), period);
      }
  }
  // INJECT CSS
  var css = document.createElement("style");
  css.type = "text/css";
  css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid transparent}";
  document.body.appendChild(css);
};

// auto number increace
document.addEventListener("DOMContentLoaded", () => {
  const incrementNumbers = () => {
    const elements = document.querySelectorAll('.number');

    elements.forEach((el) => {
      const target = +el.getAttribute('data-target');
      const speed = 500; // Adjust for faster/slower increments
      const step = Math.ceil(target / speed);

      let count = 0;

      const updateNumber = () => {
        count += step;
        if (count >= target) {
          el.textContent = target;
        } else {
          el.textContent = count;
          requestAnimationFrame(updateNumber);
        }
      };

      updateNumber();
    });
  };

  incrementNumbers();
});

// Initialize GSAP and ScrollTrigger
gsap.registerPlugin(ScrollTrigger);

// Animate each box on scroll
gsap.utils.toArray('.slideup').forEach(box => {
  gsap.fromTo(
    box,
    { opacity: 0, y: 50 },
    {
      opacity: 1,
      y: 0,
      duration: 1,
      scrollTrigger: {
        trigger: box,
        start: "top 80%", // When the top of the box is 80% down the viewport
        end: "top 50%",  // Animation ends when the box reaches 50%
        scrub: false,    // Set to true for smoother animations on scroll
      }
    }
  );
});