function toggleSaved(element) {

    // Append the needed data
    var formData = new FormData();
    formData.append('printerName', element.id);
    
    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'saveSystemProcess/toggleSave.php', true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

    xhr.onload = function() {
        if (this.status == 200) {

            var saveIcons = element.querySelectorAll('img');
            saveIcons.forEach(saveIcon => {
                saveIcon.classList.toggle('hidden');
            });
        }
    }

    // Send the form data
    xhr.send(formData);
}

function unSave(element) {

    // Append the needed data
    var formData = new FormData();
    formData.append('printerName', element.id);
    
    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'saveSystemProcess/toggleSave.php', true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

    xhr.onload = function() {
        if (this.status == 200) {

            element.parentElement.remove();
        }
    }

    // Send the form data
    xhr.send(formData);
}