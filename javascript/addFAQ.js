const addFAQForm = document.querySelector('#addFAQForm');
const submitButton = document.querySelector('#submit');
const formError = document.querySelector('#error');

submitButton.addEventListener('click', addFAQ);

function redirect() {
    window.location.href = 'faq.php';
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

function addFAQ() {
    if(validateForm(addFAQForm)) {
    
        // Append the needed data to the form one
        let formData = new FormData(addFAQForm);
        formData.append('addFAQ', true);
    
        var xhr = new XMLHttpRequest();

        xhr.open('POST', 'faqSystemProcess/addFAQ', true);
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