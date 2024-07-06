const edits = document.querySelectorAll('.edit-icon');
const cancels = document.querySelectorAll('.cancel-button');
const menus = document.querySelectorAll('.menu');
const inputs = document.querySelectorAll('.form-input');
const forms = document.querySelectorAll('#form');
const errors = document.querySelectorAll('.input-error');

edits.forEach((edit, index) => {
	edit.addEventListener('click', () => {
		menus[index].classList.toggle('no-display');
		inputs[index].classList.toggle('locked');
		edit.classList.toggle('no-display');
		if(index == 3)
		    inputs[index].value = '';
	});
});

cancels.forEach((cancel, index) => {
	cancel.addEventListener('click', () => {
		menus[index].classList.toggle('no-display');
		edits[index].classList.toggle('no-display');
		inputs[index].classList.toggle('locked');
		forms[index].reset();
		errors[index].innerHTML = null;
	});
});

forms.forEach((form, index) => {
	form.index = index;
	form.addEventListener('submit', formRun);
});

function formRun(event) {
	event.preventDefault();

	var formIndex = event.currentTarget.index;

	var submit = `change=1`;

	switch(formIndex) {
		case 0:
			var location = 'userSystemProcess/changeLastName.php';
			var params = `newLastName=`;
			break;
		case 1:
			var location = 'userSystemProcess/changeFirstName.php';
			var params = `newFirstName=`;
			break;
		case 2:
			var location = 'userSystemProcess/changeEmail.php';
			var params = `newEmail=`;
			break;
		case 3:
			var location = 'userSystemProcess/changePassword.php';
			var params = `newPassword=`;
			break;
		case 4:
			var location = 'userSystemProcess/deleteAccount.php';
			submit = `delete=1`;
			var params = `confirmation=`;
			break;
	}

	var xhr = new XMLHttpRequest();

	xhr.open('POST', location, true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	var	formInput = inputs[formIndex].value;

	params += formInput + `&` + submit;

	xhr.onload = function() {
		if (this.status == 200) {

			console.log(this.responseText);

			var error = JSON.parse(this.responseText);

			if (error == null) {
				if (submit == `delete=1`){
					window.location.href = 'index.php';
				} else {
					forms[formIndex].value = formInput;
					menus[formIndex].classList.toggle('no-display');
					edits[formIndex].classList.toggle('no-display');
					inputs[formIndex].classList.toggle('locked');
					errors[formIndex].innerHTML = null;
				}
			} else
				errors[formIndex].innerHTML = error;
		}
	}

	xhr.send(params);

}