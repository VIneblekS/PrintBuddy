const submitButton = document.querySelector('#submit');
const titleInput = document.querySelector('#titleInput');
const descriptionInput = document.querySelector('#descriptionInput');
const previewImageInput = document.querySelector('#previewImageInput');
const formError = document.querySelector('#error');
var courseId = null;

submitButton.addEventListener('click', storeTheData);

function redirect() {
    window.location.href = 'index.php';
}

function validateForms(forms) {
    for (const form of forms) {
        const inputs = form.querySelectorAll('input, textarea');
        for (const input of inputs) {
            if (input.type === 'file') {
                if (input.files.length === 0) return false;
            } else if (input.value.trim() === '') return false;
        }
    }
    return true;
}

function sendData(courseId, forms) {
    let promises = [];

    forms.forEach(function(form, index) {
        if (form.id != 'courseSectionForm') {
            let formData = new FormData(form);
            formData.append('courseId', courseId);
            formData.append('sectionOrder', index + 1);
            formData.append('type', form.id);

            let promise = new Promise((resolve, reject) => {
                
                var xhr = new XMLHttpRequest();
                
                xhr.open('POST', 'courseSystemProcess/addSection.php', true);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

                xhr.onload = function() {
                    if (xhr.status == 200) {
                        resolve();
                    }
                };

                xhr.send(formData);
            });

            promises.push(promise);
        }
    });

    return Promise.all(promises);
}

function createNewCourse() {
    return new Promise((resolve, reject) => {
        let formData = new FormData();
        formData.append('courseTitle', titleInput.value);
        formData.append('courseDescription', descriptionInput.value);
        formData.append('previewImage', previewImageInput.files[0]);

        var xhr = new XMLHttpRequest();
       
        xhr.open('POST', 'courseSystemProcess/addCourse.php', true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

        xhr.onload = function() {
            if (xhr.status == 200) {

                courseId = JSON.parse(this.responseText);
                resolve(courseId);
            }
        };

        xhr.send(formData);
    });
}

function storeTheData() {
    var forms = document.querySelectorAll('form');

    if (validateForms(forms) && titleInput.value.trim() !== '' && descriptionInput.value.trim() !== '') {
        createNewCourse().then((courseId) => {
            return sendData(courseId, forms);
        }).then(() => {
            redirect();
        });
    } else {
        formError.classList.remove('hidden');
    }
}