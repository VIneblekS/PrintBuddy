const logInForm = document.querySelector('#logInForm');

logInForm.addEventListener('submit', logIn);

function logIn(event) {
    event.preventDefault();
    
    // Get the device id if exists
    var deviceId = localStorage.getItem('deviceId');
    
    // Append the needed data to the form one
    var formData = new FormData(logInForm);
    formData.append('deviceId', JSON.stringify(deviceId));
    formData.append('logIn', true);

    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'userSystemProcess/logIn', true);
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
                document.getElementById('userErr').innerHTML = errors['errors']['userErr'];
                document.getElementById('passwordErr').innerHTML = errors['errors']['passwordErr'];
            }
        }
    }

    // Send the form data
    xhr.send(formData);
}