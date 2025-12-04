import Swiper from 'swiper/bundle';

window.addEventListener("load", () => {
  if (document.querySelector(".single-zimmer-suiten")) {
    new Swiper('.room-images-swiper', {
      slidesPerView: 1,
      loop: true,
      speed: 900,
      autoplay: {
        delay: 10000,
        disableOnInteraction: false,
      },
      effect: 'slide',
      navigation: {
        nextEl: '.room-images-swiper-col .swiper-button-next',
        prevEl: '.room-images-swiper-col .swiper-button-prev',
      },
    });
  }
  if (document.querySelector(".page-template-page-experience-skiing")) {
    new Swiper('.ski-images-swiper', {
      slidesPerView: 1,
      loop: true,
      speed: 900,
      autoplay: {
        delay: 10000,
        disableOnInteraction: false,
      },
      effect: 'slide',
      navigation: {
        nextEl: '.ski-images-swiper-col .swiper-button-next',
        prevEl: '.ski-images-swiper-col .swiper-button-prev',
      },
    });
  }
  if (document.querySelector(".page-template-page-experience-biking")) {
    new Swiper('.trails-images-swiper', {
      slidesPerView: 1,
      loop: true,
      speed: 900,
      autoplay: {
        delay: 10000,
        disableOnInteraction: false,
      },
      effect: 'slide',
      navigation: {
        nextEl: '.trails-images-swiper-col .swiper-button-next',
        prevEl: '.trails-images-swiper-col .swiper-button-prev',
      },
    });
    new Swiper('.trailsSwiper', {
      slidesPerView: 1,
      loop: true,
      speed: 900,
      autoplay: {
        delay: 10000,
        disableOnInteraction: false,
      },
      effect: 'slide',
      navigation: {
        nextEl: '.trails-swiper-button-next',
        prevEl: '.trails-swiper-button-prev',
      },
    });
  }
});