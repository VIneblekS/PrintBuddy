function toggleAnswer(element) {
    const answerElement = element.nextElementSibling;
    answerElement.classList.toggle('hidden');
    element.querySelector('img').classList.toggle('-rotate-90');
}