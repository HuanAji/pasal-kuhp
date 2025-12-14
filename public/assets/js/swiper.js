// Initialize swiper setelah semua resources loaded
window.addEventListener("load", function () {
    const swiper = new Swiper(".mySwiper", {
        // use 1 per view as safe default for local fallback
        slidesPerView: 1,
        spaceBetween: 20,
        centeredSlides: true,
        loop: true,
        loopedSlides: 3,
        initialSlide: 1,
        preloadImages: false,
        lazy: {
            loadPrevNext: false,
            loadPrevNextAmount: 1,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            0: {
                slidesPerView: 1.2,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 2.5,
                spaceBetween: 20,
            },
        },
        on: {
            beforeInit: function () {
                const swiperContainer = document.querySelector(
                    ".mySwiper .swiper-wrapper"
                );
                const slides =
                    swiperContainer.querySelectorAll(".swiper-slide");

                // Duplikat slide secara manual
                if (slides.length === 3) {
                    slides.forEach((slide) => {
                        const clone = slide.cloneNode(true);
                        swiperContainer.appendChild(clone);
                    });
                }
            },
        },
    });
});
