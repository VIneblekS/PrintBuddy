const loginForm = document.querySelector('#login-form');
const answerInput = document.querySelector('#answer');
const questionInput = document.querySelector('#question');
const submitInput = document.querySelector('#submit');
const answerErr = document.querySelector('#answer-error');
const questionErr = document.querySelector('#question-error');
const confirmation = document.querySelector('.confirmation');
const continueButton = document.querySelector('.continue-button');

submitInput.addEventListener('click', submitFAQ);

function submitFAQ(event) {
	event.preventDefault();

	var xhr = new XMLHttpRequest();

	var question = questionInput.value;
	var answer = answerInput.value;
	var submit = submitInput.value;

	const params = `question=${question}` + `&` +
				   `answer=${answer}` + `&` +
				   `faqAdd=${submit}`; 

	xhr.open('POST', 'faqSystemProcess/submitFAQ.php', true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	xhr.onload = function() {
		if (this.status == 200) {
			var errors = JSON.parse(this.responseText);

			if(errors == null) {
				if (confirmation != null) {
					confirmation.classList.toggle('no-display');
					continueButton.addEventListener('click', () => {
						if (document.referrer.split('/')[2]!=location.hostname)
							window.location.href = 'faq.php';
						else
							window.location = document.referrer;
					});
				} else {
					if (document.referrer.split('/')[2]!=location.hostname)
						window.location.href = 'faq.php';
					else
						window.location = document.referrer;
				}
			} else if (errors == 0) {
				window.location.href = 'login.php';
			} else {
				answerErr.innerHTML = errors['answerErr'];
				questionErr.innerHTML = errors['questionErr'];
			}
		}
	}

	xhr.send(params);
}
