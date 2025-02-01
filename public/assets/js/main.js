// Swipers

var swiper1 = new Swiper(".products-swipper .swiper", {
  slidesPerView: 4,
  spaceBetween: 10,
  pagination: {
    el: ".products-swipper .swiper-pagination",
    clickable: true,
  },
  autoplay: {
    delay: 5000, // time in milliseconds between transitions
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    320: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    480: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    640: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
    1200: {
      slidesPerView: 4,
      spaceBetween: 20,
    },
  },
});

var swiper2 = new Swiper(".testimonial-swipper .swiper", {
  slidesPerView: 1,
  spaceBetween: 10,
  loop: true,
  pagination: {
    el: ".testimonial-swipper .swiper-pagination-bullets",
    clickable: true,
  },
  autoplay: {
    delay: 4000, // time in milliseconds between transitions
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    320: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    480: {
      slidesPerView: 2,
      spaceBetween: 10,
    },
    640: {
      slidesPerView: 2,
      spaceBetween: 10,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 10,
    },
    1200: {
      slidesPerView: 4,
      spaceBetween: 10,
    },
  },
});

var swiper3 = new Swiper(".brands-swiper .swiper", {
  slidesPerView: 4,
  spaceBetween: 10,
  loop: true,
  autoplay: {
    delay: 5000, // time in milliseconds between transitions
  },
  breakpoints: {
    320: {
      slidesPerView: 2,
      spaceBetween: 10,
    },
    480: {
      slidesPerView: 2,
      spaceBetween: 10,
    },
    640: {
      slidesPerView: 4,
      spaceBetween: 10,
    },
    768: {
      slidesPerView: 4,
      spaceBetween: 10,
    },
    1200: {
      slidesPerView: 7,
      spaceBetween: 10,
    },
  },
});

// Onscroll nav code
onscroll = function () {
  if (document.body.scrollTop > 60 || document.documentElement.scrollTop > 50) {
    $("nav").addClass("fixed-top", 300);
    $("nav").addClass("bg-dark", 300);
    $("nav .container-fluid").removeClass("py-3", 300);
    $("nav .container-fluid").addClass("py-0", 300);
    $("nav").addClass("py-0");
  } else {
    $("nav").removeClass("fixed-top", 300);
    $("nav").removeClass("bg-dark", 300);
    $("nav .container-fluid").removeClass("py-0", 300);
    $("nav .container-fluid").addClass("py-3", 300);
    $("nav").removeClass("py-0", 300);
  }
};