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

    // Wait for an input
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
    // Retrieve the necessary elements
    let documentInput = element.childNodes[1];
    let uploadContainer = element.childNodes[3];
    let preview = element.childNodes[3].childNodes[3];
    let uploadText = element.childNodes[3].childNodes[1];

    // Wait for a document input change
    documentInput.addEventListener('change', () => {
        const file = documentInput.files[0];

        if (file) {
            // Check if the selected file is a PDF
            if (file.type === 'application/pdf') {
                const reader = new FileReader();

                reader.onload = function(event) {
                    const typedArray = new Uint8Array(event.target.result);
                    displayPDF(typedArray);
                };

                reader.readAsArrayBuffer(file);
            } else {
                alert('Please select a PDF file.');
            }
        }
    });

    function displayPDF(arrayBuffer) {
        // Create a blob object from the array buffer
        const blob = new Blob([arrayBuffer], { type: 'application/pdf' });

        // Create a URL for the blob
        const url = URL.createObjectURL(blob);

        // Set iframe src to the blob URL
        preview.src = url;

        // Hide upload text and show preview
        uploadText.classList.add('hidden');
        preview.classList.remove('hidden');
        uploadContainer.classList.remove('border');

        // Clean up the blob URL when done
        URL.revokeObjectURL(url);
    }
}