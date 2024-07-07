const popUp = document.querySelector('#popUp');
const deleteButton = document.querySelector('#deleteButton');

function togglePopUp(id) {

    if(id != null)
        deleteButton.id = id;

    popUp.classList.toggle('hidden');
}

function deleteFAQ() {
    
    // Append the needed data
    var formData = new FormData();
    formData.append('faqId', deleteButton.id);
    formData.append('deleteFAQ', true);

    var xhr = new XMLHttpRequest();

    xhr.open('POST', 'faqSystemProcess/deleteFAQ.php', true);
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