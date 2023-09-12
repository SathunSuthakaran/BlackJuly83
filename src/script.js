
document.addEventListener("DOMContentLoaded", function() {
  const carouselSlide = document.querySelector(".carousel-slide");
  const carouselImages = document.querySelectorAll(".carousel-slide img");

  let counter = 0;
  const slideWidth = carouselImages[0].clientWidth;

  function nextSlide() {
    counter++;
    if (counter >= carouselImages.length) {
      counter = 0;
    }
    carouselSlide.style.transition = "transform 0.6s ease";
    carouselSlide.style.transform = `translateX(${-slideWidth * counter}px)`;
  }

  setInterval(nextSlide, 6000); // Change image every 3 seconds
});