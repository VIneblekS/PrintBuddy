const addManualForm = document.querySelector('#addManualForm');
const submitButton = document.querySelector('#submit');
const formError = document.querySelector('#error');

submitButton.addEventListener('click', addManual);

function redirect() {
    window.location.href = 'availableManuals.php';
}

function validateForm(form) {
    const inputs = form.querySelectorAll('input, textarea');
    for (const input of inputs) {
        if (input.type === 'file') {
            if (input.files.length === 0) return false;
        } else if (input.value.trim() === '') return false;
    }
    return true;
}

function addManual() {
    if(validateForm(addManualForm)) {
    
        // Append the needed data to the form one
        var formData = new FormData(addManualForm);
        formData.append('addManual', true);
    
        var xhr = new XMLHttpRequest();

        xhr.open('POST', 'manualsSystemProcess/addManual', true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

        xhr.onload = function() {
            if (this.status == 200) {
                redirect();
            }
        }

        // Send the form data
        xhr.send(formData);

    } else {

        // Show the error
        formError.classList.remove('hidden');
    }
}