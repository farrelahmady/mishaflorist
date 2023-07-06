import Swiper from "swiper/bundle";
import "swiper/css/bundle";

new Swiper("#hero-swiper", {
    loop: true,
    navigation: {
        nextEl: "#hero-swiper-next",
        prevEl: "#hero-swiper-prev",
    },
    autoplay: {
        delay: 3000,
    },
    keyboard: true,
    grabCursor: true,
});

new Swiper("#collection-swiper", {
    freeMode: true,
    slidesPerView: "auto",
    spaceBetween: 10,
    grabCursor: true,
    keyboard: true,
    scrollbar: {
        el: ".swiper-scrollbar",
        hide: true,
    },
    breakpoints: {
        768: {
            spaceBetween: 20,
        },
    },
});
