const lastNameForm = document.querySelector('#lastNameForm');
const firstNameForm = document.querySelector('#firstNameForm');
const emailForm = document.querySelector('#emailForm');
const passwordForm = document.querySelector('#passwordForm');
const deleteAccountForm = document.querySelector('#deleteAccountForm');

lastNameForm.addEventListener('submit', changeLastName);
firstNameForm.addEventListener('submit', changeFirstName);
emailForm.addEventListener('submit', changeEmail);
passwordForm.addEventListener('submit', changePassword);
deleteAccountForm.addEventListener('submit', deleteAccount);


function toggleEdit(element) {
    element.querySelector('img').classList.toggle('hidden');
    element.querySelector('div').classList.toggle('hidden');
    element.parentElement.querySelector('p').innerHTML = '';
    if (element.querySelector('input').value != element.querySelector('input').placeholder)
        element.querySelector('input').value = element.querySelector('input').placeholder;
    else
        element.querySelector('input').value = '';
    element.querySelector('input').disabled = !element.querySelector('input').disabled;
}

function changeLastName(event) {
    event.preventDefault();

    var formData = new FormData(lastNameForm);

    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'userSystemProcess/changeLastName', true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

    xhr.onload = function() {
        if (this.status == 200) {

            // Recieve the errors 
            var errors = JSON.parse(this.responseText);

            // Check for any errors
            if (errors['errorCnt'] == 0) {

                lastNameForm.querySelector('input').disabled = true;
                location.reload();
            } else {

                // Display the errors to the user
                document.getElementById('lastNameErr').innerHTML = errors['errors']['lastNameErr'];
            }
        }
    }

    // Send the form data
    xhr.send(formData);
}

function changeFirstName(event) {
    event.preventDefault();

    var formData = new FormData(firstNameForm);

    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'userSystemProcess/changeFirstName', true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

    xhr.onload = function() {
        if (this.status == 200) {

            // Recieve the errors 
            var errors = JSON.parse(this.responseText);

            // Check for any errors
            if (errors['errorCnt'] == 0) {

                firstNameForm.querySelector('input').disabled = true;
                location.reload();
            } else {

                // Display the errors to the user
                document.getElementById('firstNameErr').innerHTML = errors['errors']['firstNameErr'];
            }
        }
    }

    // Send the form data
    xhr.send(formData);
}

function changeEmail(event) {
    event.preventDefault();

    var formData = new FormData(emailForm);

    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'userSystemProcess/changeEmail', true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

    xhr.onload = function() {
        if (this.status == 200) {

            // Recieve the errors 
            var errors = JSON.parse(this.responseText);

            // Check for any errors
            if (errors['errorCnt'] == 0) {

                emailForm.querySelector('input').disabled = true;
                location.reload();
            } else {

                // Display the errors to the user
                document.getElementById('emailErr').innerHTML = errors['errors']['emailErr'];
            }
        }
    }

    // Send the form data
    xhr.send(formData);
}

function changePassword(event) {
    event.preventDefault();

    var formData = new FormData(passwordForm);

    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'userSystemProcess/changePassword', true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

    xhr.onload = function() {
        if (this.status == 200) {

            // Recieve the errors 
            var errors = JSON.parse(this.responseText);

            // Check for any errors
            if (errors['errorCnt'] == 0) {

                passwordForm.querySelector('input').disabled = true;
                location.reload();
            } else {

                // Display the errors to the user
                document.getElementById('passwordErr').innerHTML = errors['errors']['passwordErr'];
            }
        }
    }

    // Send the form data
    xhr.send(formData);
}

function deleteAccount(event) {
    event.preventDefault();

    var formData = new FormData(deleteAccountForm);

    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'userSystemProcess/deleteAccount', true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

    xhr.onload = function() {
        if (this.status == 200) {

            // Recieve the errors 
            var errors = JSON.parse(this.responseText);

            // Check for any errors
            if (errors['errorCnt'] == 0)
                location.reload();
            else 

                // Display the errors to the user
                document.getElementById('passwordConfirmErr').innerHTML = errors['errors']['passwordConfirmErr'];
        }
    }

    // Send the form data
    xhr.send(formData);
}