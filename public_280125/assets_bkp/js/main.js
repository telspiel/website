// JavaScript Document

var swiper = new Swiper(".mySwiper", {
  effect: "coverflow",
  grabCursor: false,
  centeredSlides: true,
  slidesPerView: "auto",
  allowTouchMove: false,
  loop: false,
  initialSlide: 2,
  coverflowEffect: {
    rotate: 10,
    stretch: 0,
    depth: 400,
    modifier: 1,
    slideShadows: false,
  }
});


$("#selectedcountries g").on('click', function () {
  $('.landingcontent').hide();
  var iconid = $(this).attr('data-bs-target').substring(1) + '-icon';
  $('#' + iconid).show().siblings("g").hide();
  var targetid = $(this).attr('data-bs-target')
  $('html, body').animate({
    scrollTop: $(targetid).offset().top
  })
})


Fancybox.bind("[data-fancybox]", {  
	
});


// counter
window.onload = () => {
	$(".loader").hide();
  // $(selector).countMe(delay,speed)
  $(".userscount").countMe(40, 65);
  $(".countriescount").countMe(30, 30);
  $(".servicescount").countMe(40, 50);
  $(".transactionscount").countMe(100, 200);
}
