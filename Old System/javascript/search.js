const search = document.querySelector('.search-button');
const searchFormSubmit = document.querySelector('.search-form-submit');

if (search != null)
	search.addEventListener('click', () => {
		searchFormSubmit.click();
	});