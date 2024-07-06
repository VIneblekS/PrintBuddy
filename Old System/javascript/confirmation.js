const continueButton = document.querySelector('.continue-button');
const confirmation = document.querySelector('.confirmation');

continueButton.addEventListener('click', () => {
	confirmation.classList.toggle('no-display');
})