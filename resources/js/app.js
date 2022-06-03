require("./bootstrap");

import Alpine from "alpinejs";

import { Swiper } from "swiper";
import "swiper/css";
import "swiper/css/pagination";

window.Alpine = Alpine;

const swiper = new Swiper(".swiper", {
    slidesPerView: 5,
    spaceBetween: 10,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        dynamicBullets: true,
    },
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
});

Alpine.start();
