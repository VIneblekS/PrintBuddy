var imageInputs = document.querySelectorAll('.imageInput');

//console.log(imageInputs);

imageInputs.forEach((imageInput, index) => {
    imageInput.addEventListener('input', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                var preview = document.querySelectorAll('#preview');
                //console.log(index);
                preview[index].src = e.target.result;
                preview[index].classList.toggle('hidden');
                document.getElementById('uploadText').classList.toggle('hidden');
                document.getElementById('uploadContainer').classList.toggle('border');
            };
            reader.readAsDataURL(file);
        }
    });
});

