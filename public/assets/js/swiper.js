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

// JavaScript untuk Pasal Hukum
document.addEventListener("DOMContentLoaded", function () {
    const pasalHeaders = document.querySelectorAll(".pasal-item .pasal-header");
    const categoryButtons = document.querySelectorAll(".category-btn");
    const searchInput = document.getElementById("searchInput");
    const pasalList = document.getElementById("pasalList");
    const noResults = document.getElementById("noResults");
    const quickSearchButtons = document.querySelectorAll(".quick-btn");

    let activePasal = null;
    let currentCategory = "all";
    let currentSearch = "";

    // Fungsi untuk membuka/tutup pasal
    function togglePasal(header) {
        const pasalId = header.getAttribute("data-pasal");
        const pasalContent = document.getElementById(pasalId);
        const toggleIcon = header.querySelector(".toggle-icon i");

        // Jika pasal yang diklik sudah aktif, tutup saja
        if (header.classList.contains("active")) {
            header.classList.remove("active");
            pasalContent.classList.remove("active");
            toggleIcon.classList.remove("active");
            activePasal = null;
        } else {
            // Tutup pasal yang sebelumnya aktif
            if (activePasal) {
                const prevHeader = document.querySelector(
                    `[data-pasal="${activePasal}"]`
                );
                const prevContent = document.getElementById(activePasal);
                const prevIcon = prevHeader.querySelector(".toggle-icon i");

                prevHeader.classList.remove("active");
                prevContent.classList.remove("active");
                prevIcon.classList.remove("active");
            }

            // Buka pasal yang baru diklik
            header.classList.add("active");
            pasalContent.classList.add("active");
            toggleIcon.classList.add("active");
            activePasal = pasalId;
        }
    }

    // Event listener untuk pasal headers
    pasalHeaders.forEach((header) => {
        header.addEventListener("click", function () {
            togglePasal(this);
        });
    });

    // Event listener untuk kategori buttons
    categoryButtons.forEach((button) => {
        button.addEventListener("click", function () {
            // Update active button
            categoryButtons.forEach((btn) => btn.classList.remove("active"));
            this.classList.add("active");

            // Update current category
            currentCategory = this.getAttribute("data-category");

            // Filter pasal berdasarkan kategori dan pencarian
            filterPasals();
        });
    });

    // Event listener untuk search input
    searchInput.addEventListener("input", function () {
        currentSearch = this.value.toLowerCase().trim();
        filterPasals();
    });

    // Event listener untuk quick search buttons
    quickSearchButtons.forEach((button) => {
        button.addEventListener("click", function () {
            searchInput.value = this.getAttribute("data-search");
            currentSearch = searchInput.value.toLowerCase().trim();
            filterPasals();
        });
    });

    // Fungsi untuk filter pasal berdasarkan kategori dan pencarian
    function filterPasals() {
        const pasalItems = document.querySelectorAll(".pasal-item");
        let visibleCount = 0;

        pasalItems.forEach((item) => {
            const pasalCategory = item.getAttribute("data-category");
            const pasalNumber = item.getAttribute("data-pasal");
            const pasalTitle = item
                .querySelector(".pasal-title")
                .textContent.toLowerCase();
            const pasalSubtitle = item
                .querySelector(".pasal-subtitle")
                .textContent.toLowerCase();
            const pasalContent = item
                .querySelector(".pasal-body")
                .textContent.toLowerCase();

            // Filter berdasarkan kategori
            const categoryMatch =
                currentCategory === "all" || pasalCategory === currentCategory;

            // Filter berdasarkan pencarian
            const searchMatch =
                !currentSearch ||
                pasalTitle.includes(currentSearch) ||
                pasalSubtitle.includes(currentSearch) ||
                pasalContent.includes(currentSearch) ||
                pasalNumber.includes(currentSearch);

            // Tampilkan atau sembunyikan pasal
            if (categoryMatch && searchMatch) {
                item.style.display = "block";
                visibleCount++;
            } else {
                item.style.display = "none";
                // Tutup pasal yang disembunyikan jika terbuka
                const header = item.querySelector(".pasal-header");
                if (header.classList.contains("active")) {
                    togglePasal(header);
                }
            }
        });

        // Tampilkan pesan jika tidak ada hasil
        if (visibleCount === 0) {
            noResults.style.display = "block";
            pasalList.style.display = "none";
        } else {
            noResults.style.display = "none";
            pasalList.style.display = "block";
        }
    }

    // Buka pasal pertama secara default
    if (pasalHeaders.length > 0) {
        pasalHeaders[0].click();
    }
});
