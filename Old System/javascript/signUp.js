const signupForm = document.querySelector('#signup-form');
const usernameInput = document.querySelector('#username');
const firstNameInput = document.querySelector('#firstName');
const lastNameInput = document.querySelector('#lastName');
const emailInput = document.querySelector('#email');
const passwordInput = document.querySelector('#password');
const confirmPasswordInput = document.querySelector('#passwordConfirm');
const submitInput = document.querySelector('#submit');
const usernameErr = document.querySelector('#username-error');
const firstNameErr = document.querySelector('#firstName-error');
const lastNameErr = document.querySelector('#lastName-error');
const emailErr = document.querySelector('#email-error');
const passwordErr = document.querySelector('#password-error');
const passwordConfirmErr = document.querySelector('#passwordConfirm-error');


signupForm.addEventListener('submit', signUp);

function signUp(event) {
	event.preventDefault();

	var xhr = new XMLHttpRequest();

	var username = usernameInput.value;
	var firstName = firstNameInput.value;
	var lastName = lastNameInput.value;
	var email = emailInput.value;
	var password = passwordInput.value;
	var passwordConfirm = confirmPasswordInput.value;
	var submit = submitInput.value;

	const params = `username=${username}` + `&` +
				   `firstName=${firstName}` + `&` +
				   `lastName=${lastName}` + `&` +
				   `email=${email}` + `&` +
				   `password=${password}` + `&` +
				   `passwordConfirm=${passwordConfirm}` + `&` +
				   `signup=${submit}`; 

	xhr.open('POST', 'userSystemProcess/signUp.php', true);
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

			console.log(errors);

			usernameErr.innerHTML = errors['usernameErr'];
			firstNameErr.innerHTML = errors['firstNameErr'];
			lastNameErr.innerHTML = errors['lastNameErr'];
			emailErr.innerHTML = errors['emailErr'];
			passwordInput.value = '';
			passwordErr.innerHTML = errors['passwordErr'];
			confirmPasswordInput.value = '';
			passwordConfirmErr.innerHTML = errors['passwordConfirmErr'];
		}
	}

	xhr.send(params);
}
