function toggleAnswer(element) {
    const answerElement = element.nextElementSibling;
    answerElement.classList.toggle('hidden');
    element.querySelector('img').classList.toggle('-rotate-90');
}

function showCourse(element) {
    window.location.href = element.id;
}

function showManual(element) {
    window.location.href = element.id;
}