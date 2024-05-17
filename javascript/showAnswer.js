const showAnswers = document.querySelectorAll('.show-answer');
//const showAnswer = document.querySelector('.show-answer');

const answer = document.querySelectorAll('.answer');

showAnswers.forEach((showAnswer, index) => {
	showAnswer.addEventListener('click', () => {
		answer[index].classList.toggle('active');
	});
});