document.addEventListener("DOMContentLoaded", function () {
    let slides = document.querySelectorAll(".slideshow img");
    let index = 0;

    function showNextSlide() {
        slides[index].classList.remove("active"); // Ukryj obecny
        index = (index + 1) % slides.length; // Przejdź do następnego
        slides[index].classList.add("active"); // Pokaż nowy
    }

    slides[index].classList.add("active"); // Pokaż pierwszy obraz od razu
    setInterval(showNextSlide, 3000); // Zmienia co 3 sekundy
});