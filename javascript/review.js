const previousButton = document.querySelector('.previous');
const nextButton = document.querySelector('.next');
const slider = document.querySelector('.slider');

let currentIndex = 0;

nextButton.addEventListener('click', () => {
  if (currentIndex < slider.children.length - 1) {
    currentIndex++;
    updateSlider();
  }
});

previousButton.addEventListener('click', () => {
  if (currentIndex > 0) {
    currentIndex--;
    updateSlider();
   }
});

function updateSlider() {
  const offset = -currentIndex * 100;
  slider.style.transform = `translateX(${offset}%)`;
}