function imagePreview(element) {

    // Retrieve the input element
    let imageInput = element.childNodes[1];
    let uploadContainer = element.childNodes[3];
    let preview = element.childNodes[3].childNodes[3];
    let uploadText = element.childNodes[3].childNodes[1];     

    // Wait for a picture
    imageInput.addEventListener('input', () => {
        
        // Rerieve the image
        const image = imageInput.files[0];
        if (image) {

            // New reader object
            const reader = new FileReader();

            reader.onload = function() {

                // Update the elements
                preview.src = this.result;
                uploadText.classList.add('hidden');
                preview.classList.remove('hidden');
                uploadContainer.classList.remove('border');
            };

            reader.readAsDataURL(image);
        }
    });
};

function videoPreview(element) {
    
    // Retrieve the input element
    let videoInput = element;
    let preview = element.parentNode.childNodes[1].childNodes[3];
    let uploadText = element.parentNode.childNodes[1].childNodes[1];     
    let uploadContainer = element.parentNode.childNodes[1];

    // Wait for a picture
    videoInput.addEventListener('input', function() {
        
        // Update the elements
        var videoEmbedLink = videoInput.value;
        
        if(videoEmbedLink.search('youtu.be/') != -1)
            videoEmbedLink = videoEmbedLink.replace('youtu.be', 'youtube.com/embed');
        else
            videoEmbedLink = videoEmbedLink.replace('watch?v=', 'embed/');
        
        preview.src = videoEmbedLink;
        uploadText.classList.add('hidden');
        preview.classList.remove('hidden');
        uploadContainer.classList.remove('border');

    });
};

function documentPreview(element) {

    // Retrieve the input element
    let documentInput = element.childNodes[1];
    let uploadContainer = element.childNodes[3];
    let preview = element.childNodes[3].childNodes[3];
    let uploadText = element.childNodes[3].childNodes[1];     

    // Wait for a picture
    documentInput.addEventListener('input', () => {
        
        // Rerieve the document
        const document = documentInput.files[0];
        if (document) {

            // New reader object
            const reader = new FileReader();

            reader.onload = function() {

                // Update the elements
                preview.src = this.result;
                uploadText.classList.add('hidden');
                preview.classList.remove('hidden');
                uploadContainer.classList.remove('border');
            };

            reader.readAsDataURL(document);
        }
    });
};