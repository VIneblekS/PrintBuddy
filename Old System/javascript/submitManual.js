const loginForm = document.querySelector('#login-form');
const printerNameInput = document.querySelector('#printerName');
const descriptionInput = document.querySelector('#description');
const videoInput = document.querySelector('#video');
const documentInput = document.querySelector('#document');
const imageInput = document.querySelector('#image');
const submitInput = document.querySelector('#submit');
const printerNameErr = document.querySelector('#printerName-error');
const descriptionErr = document.querySelector('#description-error');
const videoErr = document.querySelector('#video-error');
const documentErr = document.querySelector('#document-error');
const imageErr = document.querySelector('#image-error');
const confirmation = document.querySelector('.confirmation');
const continueButton = document.querySelector('.continue-button');

submitInput.addEventListener('click', submitManual);

function submitManual(event) {
	event.preventDefault();

	var xhr = new XMLHttpRequest();

	var printerName = printerNameInput.value;
	var description = descriptionInput.value;
	var video = videoInput.value;
	var uploadDocument = documentInput.files[0];
	var image = imageInput.files[0];
	var submit = submitInput.value;

	var formData = new FormData();
    formData.append('printerName', printerName);
    formData.append('description', description);
    formData.append('video', video);
    formData.append('document', uploadDocument);
    formData.append('image', image);
    formData.append('manualAdd', submit);

	xhr.open('POST', 'manualSystemProcess/submitManual.php', true);

	xhr.onload = function() {
		if (this.status == 200) {

			var errors = JSON.parse(this.responseText);

			if(errors == null) {
				if (confirmation != null) {
					confirmation.classList.toggle('no-display');
					continueButton.addEventListener('click', () => {
						if (document.referrer.split('/')[2]!=location.hostname)
							window.location.href = 'manuals.php';
						else
							window.location = document.referrer;
					});
				} else {
					if (document.referrer.split('/')[2]!=location.hostname)
						window.location.href = 'manuals.php';
					else
						window.location = document.referrer;
				}
			} else if (errors == 0) {
				window.location.href = 'login.php';
			} else {
				printerNameErr.innerHTML = errors['printerNameErr'];
				descriptionErr.innerHTML = errors['descriptionErr'];
				videoErr.innerHTML = errors['videoErr'];
				documentErr.innerHTML = errors['documentErr'];
				imageErr.innerHTML = errors['imageErr'];
			}
		}
	}

	xhr.send(formData);

}
