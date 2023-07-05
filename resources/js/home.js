import Swiper from "swiper/bundle";
import "swiper/css/bundle";

var swiper = new Swiper("#hero-swiper", {
    loop: true,
    navigation: {
        nextEl: "#hero-swiper-next",
        prevEl: "#hero-swiper-prev",
    },
    autoplay: {
        delay: 3000,
    },
});
