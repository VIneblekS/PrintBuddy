getDeviceId();

function getDeviceId() {

    var deviceId = localStorage.getItem('deviceId');
  
    var formData = new FormData();
    formData.append('deviceId', JSON.stringify(deviceId));
  
    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'sessions/session.php', false);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    
    xhr.onload = function() {
        if (this.status == 200) {
        }
    }

	xhr.send(formData);
}