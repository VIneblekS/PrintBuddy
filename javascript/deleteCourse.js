const popUp = document.querySelector('#popUp');
const deleteButton = document.querySelector('#deleteButton');

function togglePopUp(id) {

    deleteButton.id = id;
    popUp.classList.toggle('hidden');
}

function deleteFAQ() {
    
    // Append the needed data
    var formData = new FormData();
    formData.append('courseId', deleteButton.id);
    formData.append('deleteCourse', true);

    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'courseSystemProcess/deleteCourse.php', true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

    xhr.onload = function() {
        if (this.status == 200) {
            console.log(this.responseText);

            document.getElementById(deleteButton.id).remove();
            popUp.classList.toggle('hidden');
        }
    }

    // Send the form data
    xhr.send(formData);

}