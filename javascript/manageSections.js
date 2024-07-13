const newSectionButton = document.querySelector('#newSection');
const cancelButton = document.querySelector('#cancel');
const addSectionButton = document.querySelector('#addSection');
const newSectionTypeInput = document.querySelector('#newSectionTypeInput');

function discardSection(event) {
    event.target.parentNode.parentNode.remove();
}

newSectionButton.addEventListener('click', () => {
    let popUp = document.querySelector('#popUp');
    popUp.classList.toggle('hidden');
});

cancelButton.addEventListener('click', (event) => {
    event.preventDefault();

    let popUp = document.querySelector('#popUp');
    popUp.classList.toggle('hidden');
});


addSection.addEventListener('click', () => {
    fetch('coursesSections/'+newSectionTypeInput.value+'.php')
    .then(response => response.text())
    .then(section => {
        
        // Add the new section to the form
        const contentContainer = document.getElementById('error');
        contentContainer.insertAdjacentHTML('beforebegin', section);

        let popUp = document.querySelector('#popUp');
        popUp.classList.toggle('hidden');
    })    
});