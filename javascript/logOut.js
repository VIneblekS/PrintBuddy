function logOut() {
    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'userSystemProcess/logOut', true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

    xhr.onload = function() {
        if (this.status == 200) {
    
            // Refresh the page after log out
            location.reload();
        }
    }

    // Finalize the log out action
    xhr.send();
}