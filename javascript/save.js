var emptySaves = document.querySelectorAll('.empty-save');
var filledSaves = document.querySelectorAll('.filled-save');

emptySaves.forEach((saveButton, index) => {
	saveButton.index = index;
	saveButton.addEventListener('click', saveManual);
});

function saveManual(event) {
	var eventIndex = event.currentTarget.index;

	event.preventDefault();

	var xhr = new XMLHttpRequest();

	var save = emptySaves[eventIndex].id;

	const params = `save=${save}`; 

	xhr.open('POST', 'saveSystemProcess/save.php', true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	xhr.onload = function() {
		if (this.status == 200) {
			var errors = JSON.parse(this.responseText);

			if (errors == 0) {
				window.location.href = 'login.php';
			} else if(errors == null) {
				emptySaves[eventIndex].classList.add('no-display');
				filledSaves[eventIndex].classList.remove('no-display');
			}
		}
	}

	xhr.send(params);
}

filledSaves.forEach((unsaveButton, index) => {
	unsaveButton.index = index;
	unsaveButton.addEventListener('click', unsaveManual);
});

function unsaveManual(event) {
	var eventIndex = event.currentTarget.index;

	event.preventDefault();

	var xhr = new XMLHttpRequest();

	var unsave = filledSaves[eventIndex].id;

	const params = `unsave=${unsave}`; 

	xhr.open('POST', 'saveSystemProcess/unsave.php', true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	xhr.onload = function() {
		if (this.status == 200) {
			var errors = JSON.parse(this.responseText);

			if (errors == 0) {
				window.location.href = 'login.php';
			} else if(errors == null) {
				emptySaves[eventIndex].classList.remove('no-display');
				filledSaves[eventIndex].classList.add('no-display');
			}
		}
	}

	xhr.send(params);
}
