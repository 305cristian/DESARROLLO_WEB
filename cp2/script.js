const carousel = document.querySelector('.carousel');
const slides = document.querySelectorAll('.slide');
const dotsContainer = document.querySelector('.carousel-puntos');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');
let currentSlide = 0;


function updateDots() {
    const dots = Array.from(dotsContainer.querySelectorAll('.punto'));
    dots.forEach((dot, index) => {
        dot.classList.remove('active');
        if (index === currentSlide) {
            dot.classList.add('active');
        }
    });
}


slides.forEach(() => {
    const dot = document.createElement('div');
    dot.classList.add('punto');
    dotsContainer.appendChild(dot);
});

const dots = Array.from(dotsContainer.querySelectorAll('.punto'));


dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
        currentSlide = index;
        updateCarousel();
        updateDots();
    });
});

nextBtn.addEventListener('click', () => {
    currentSlide = (currentSlide + 1) % slides.length;
    updateCarousel();
    updateDots();
});

prevBtn.addEventListener('click', () => {
    currentSlide = (currentSlide - 1 + slides.length) % slides.length;
    updateCarousel();
    updateDots();
});

function updateCarousel() {
    const slideWidth = slides[0].offsetWidth;
    const translateX = -currentSlide * slideWidth;
    carousel.style.transform = `translateX(${translateX}px)`;
    updateDots();
}

function hilo(){   
    currentSlide = (currentSlide + 1) % slides.length;
    updateCarousel();
    updateDots();
   
}

updateCarousel();
updateDots();

setInterval(hilo,5000);
