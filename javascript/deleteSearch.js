const previousSearches = document.querySelectorAll('#previous-search');
const deleteButtons = document.querySelectorAll('#delete-button');
const data = document.querySelectorAll('#delete');

deleteButtons.forEach((deleteButton, index) => {
	deleteButton.index = index;
	deleteButton.addEventListener('click', deleteSearch);
});

function deleteSearch(event) {
	event.preventDefault();

	var xhr = new XMLHttpRequest();

	var eventIndex = event.currentTarget.index;
	var searchId = data[eventIndex].value;
	
	const params = `delete=${searchId}`;

	xhr.open('POST', 'searchSystemProcess/deleteManualSearch.php', true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	xhr.onload = function() {
		if (this.status == 200) {
			previousSearches[eventIndex].remove();

			var currPreviousSearches = document.querySelectorAll('#previous-search');
			if (currPreviousSearches.length == 0)
				window.location.reload();
		}
	}

	xhr.send(params);

}