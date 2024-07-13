getDeviceId();

function getDeviceId() {

    // Get the device id
    var deviceId = localStorage.getItem('deviceId');
  
    // Append the needed data to a new object
    var formData = new FormData();
    formData.append('deviceId', JSON.stringify(deviceId));
  
    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'sessions/session.php', false);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    
    xhr.onload = function() {
        if (this.status == 200) {
            window.location.reload();
        }
    }

    // Send the form data
	xhr.send(formData);
}