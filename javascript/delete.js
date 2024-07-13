const popUp = document.querySelector('#popUp');
const deleteButton = document.querySelector('#deleteButton');

function togglePopUp(id) {
    if(id != null)
        deleteButton.id = id;

    popUp.classList.toggle('hidden');
}

function deleteCourse() {
    
    // Append the needed data to a new object
    var formData = new FormData();
    formData.append('courseId', deleteButton.id);
    formData.append('deleteCourse', true);

    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'courseSystemProcess/deleteCourse', true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

    xhr.onload = function() {
        if (this.status == 200) {
        
            document.getElementById(deleteButton.id).remove();
            popUp.classList.toggle('hidden');
        }
    }

    // Send the form data
    xhr.send(formData);

}

function deleteFAQ() {
    
    // Append the needed data to a new object
    var formData = new FormData();
    formData.append('faqId', deleteButton.id);
    formData.append('deleteFAQ', true);

    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'faqSystemProcess/deleteFAQ', true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

    xhr.onload = function() {
        if (this.status == 200) {

            document.getElementById(deleteButton.id).remove();
            popUp.classList.toggle('hidden');
        }
    }

    // Send the form data
    xhr.send(formData);

}

function deleteManual() {
    
    // Append the needed data to a new object
    var formData = new FormData();
    formData.append('manualId', deleteButton.id);
    formData.append('deleteManual', true);

    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'manualsSystemProcess/deleteManual', true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

    xhr.onload = function() {
        if (this.status == 200) {

            document.getElementById(deleteButton.id).remove();
            popUp.classList.toggle('hidden');
        }
    }

    // Send the form data
    xhr.send(formData);

}