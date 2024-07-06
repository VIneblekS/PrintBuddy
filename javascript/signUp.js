const signUpForm = document.querySelector('#signUpForm');

signUpForm.addEventListener('submit', signUp);

function signUp(event) {
    event.preventDefault();

    // Get the device id if exists
    var deviceId = localStorage.getItem('deviceId');
  
    // Append the needed data to the form one
    var formData = new FormData(signUpForm);
    formData.append('deviceId', JSON.stringify(deviceId));
    formData.append('signUp', true);

    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'userSystemProcess/signUp.php', true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

    xhr.onload = function() {
	    if (this.status == 200) {
            
            // Recieve the errors 
            var errors = JSON.parse(this.responseText);
        
            // Check for any errors
            if (errors['errorCnt'] == 0) {
                
                // Asign a device id if needed
                if(!deviceId)
                    localStorage.setItem('deviceId', errors['deviceId']);
                
                // Redirect to the last page visited
                if (document.referrer.split('/')[2]!=location.hostname)
                    window.location.href = 'index.php';
                else
                    window.location = document.referrer;
            } else {
            
                // Display the errors to the user
                document.getElementById('usernameErr').innerHTML = errors['errors']['usernameErr'];
                document.getElementById('firstNameErr').innerHTML = errors['errors']['firstNameErr'];
                document.getElementById('lastNameErr').innerHTML = errors['errors']['lastNameErr'];
                document.getElementById('emailErr').innerHTML = errors['errors']['emailErr'];
                document.getElementById('passwordErr').innerHTML = errors['errors']['passwordErr'];
                document.getElementById('passwordConfirmErr').innerHTML = errors['errors']['passwordConfirmErr'];
            }
        }
    }

    // Send the form data
    xhr.send(formData);
}