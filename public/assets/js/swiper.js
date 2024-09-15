const swiper = new Swiper('.slider-wrapper', {

    loop: true,
    grabCursor: true,
    spaceBeetwen: true,

    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
      dynamicBullets: true,
      clickable: true
    },

    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },

    breakpoints: {
        0: {
            slidesPerView: 1
        },
        620: {
            slidesPerView: 3
        },
        1024: {
            slidesPerView: 5
        },
    }
});
