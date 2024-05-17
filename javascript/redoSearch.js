const searches = document.querySelectorAll('.previous-search-button');
const searchesText = document.querySelectorAll('.previous-search');
const searchInput = document.querySelector('.userSearch');
const searchSubmit = document.querySelector('.search');


searches.forEach((search, index) => {
	search.addEventListener('click', () => {
		searchInput.setAttribute('value', searchesText[index].innerHTML);
		searchSubmit.click();
	});
});