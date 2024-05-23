var deleteSaves = document.querySelectorAll('.delete-save');
var saves = document.querySelectorAll('.manual-save');

deleteSaves.forEach((deleteSave, index) => {
	deleteSave.index = index;
	deleteSave.addEventListener('click', deleteFromSaves);
});

function deleteFromSaves(event) {
	var eventIndex = event.currentTarget.index;

	event.preventDefault();

	var xhr = new XMLHttpRequest();

	var unsave = deleteSaves[eventIndex].id;

	const params = `unsave=${unsave}`; 

	xhr.open('POST', 'saveSystemProcess/unsave.php', true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	xhr.onload = function() {
		if (this.status == 200) {
			var errors = JSON.parse(this.responseText);

			if (errors == 0) {
				window.location.href = 'login.php';
			} else if(errors == null) {
				saves[eventIndex].remove();

				var currSaves = document.querySelectorAll('.manual-save');
				if (currSaves.length == 0)
					window.location.reload();
			}
		}
	}

	xhr.send(params);
}