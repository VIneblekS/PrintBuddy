const loginForm = document.querySelector('#login-form');
const passwordInput = document.querySelector('#password');
const userInput = document.querySelector('#user');
const keepConnectionInput = document.querySelector('#keepConnection');
const submitInput = document.querySelector('#submit');
const passwordErr = document.querySelector('#password-error');
const userErr = document.querySelector('#user-error');

loginForm.addEventListener('submit', logIn);

function logIn(event) {
	event.preventDefault();

	var xhr = new XMLHttpRequest();

	var user = userInput.value;
	var password = passwordInput.value;
	var keepConnection = (keepConnectionInput.checked) ? '1' : '';
	var submit = submitInput.value;

	const params = `user=${user}` + `&` +
				   `password=${password}` + `&` +
				   `keepConnection=${keepConnection}` + `&` +
				   `login=${submit}`; 

	xhr.open('POST', 'userSystemProcess/logIn.php', true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	xhr.onload = function() {
		if (this.status == 200) {
			var errors = JSON.parse(this.responseText);

			if(errors == null) {
				if (document.referrer.split('/')[2]!=location.hostname)
					window.location.href = 'index.php';
				else
					window.location = document.referrer;
			}

			userErr.innerHTML = errors['userErr'];

			passwordInput.value = '';
			passwordErr.innerHTML = errors['passwordErr'];
		}
	}

	xhr.send(params);
}
