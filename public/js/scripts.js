var swiper = new Swiper('.swiper-container1', {
    breakpoints: {
        640: {
            slidesPerView: 1,
            spaceBetween: 30,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 40,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 50,
        },
    },
    centeredSlides: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    loop: true,
    momentumRatio: 1,
    freeMode: true,
    freeModeFluid: true,
    speed: 3000,
    // grabCursor: true,
    autoplay: true,
    // autoplayDisableOnInteraction: false,
    autoplay: {
    	delay: 3000,
    },
});