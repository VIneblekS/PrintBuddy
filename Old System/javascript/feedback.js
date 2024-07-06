const feedbackInput = document.querySelector('.feedback-text-input');
const submitButton = document.querySelector('#submit');
const feedbackErr = document.querySelector('#feedback-error');

submitButton.addEventListener('click', addFeedback);

function addFeedback(event) {
	event.preventDefault();

	var xhr = new XMLHttpRequest();

	var feedback = feedbackInput.value;
	var addFeedback = submitButton.value;

	const params = `addFeedback=${addFeedback}&feedback=${feedback}`;

	xhr.open('POST', 'feedbackSystemProcess/feedback.php', true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	xhr.onload = function() {
		if (this.status == 200) {
			console.log(this.responseText);

			var error = JSON.parse(this.responseText);

			if(error == null) {
				if (document.referrer.split('/')[2]!=location.hostname)
					window.location.href = 'index.php';
				else
					window.location = document.referrer;
			} else if (error == 0)
				window.location.href = 'login.php';

			feedbackErr.innerHTML = error;
		}
	}

	xhr.send(params);
}