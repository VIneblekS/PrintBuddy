function toggleSaved(element) {

    // Append the needed data to a new object
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

    // Append the needed data to a new object
    var formData = new FormData();
    formData.append('printerName', element.id);
    
    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'saveSystemProcess/toggleSave.php', true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

    xhr.onload = function() {
        if (this.status == 200) {
            
            // Remove the save card
            element.parentElement.remove();

            // If there are no more saves show the empty page
            if(JSON.parse(this.responseText) == null)
                location.reload();
        }
    }

    // Send the form data
    xhr.send(formData);
}