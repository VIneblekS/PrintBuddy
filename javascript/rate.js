const rated = document.querySelectorAll('#r');
const unrated = document.querySelectorAll('#e');
const rateButton = document.querySelector('.rate-button');

unrated.forEach((unrate, index) => {
	unrate.index = index;
	unrate.addEventListener('click', rate);
});

rated.forEach((currRate, index) => {
	currRate.index = index;
	currRate.addEventListener('click', rate);
});

function rate(event) {
	event.preventDefault();

	eventIndex = event.currentTarget.index;	

	var manualId = rateButton.value;
	const params = `rate=${manualId}&rating=${eventIndex+1}`;
		
	var xhr = new XMLHttpRequest();

	xhr.open('POST', '../ratingSystemProcess/rating.php', true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	xhr.onload = function() {
		if (this.status == 200) {
			for (var i = 0; i <= eventIndex; i++) {
				rated[i].classList.remove('no-display');
				unrated[i].classList.add('no-display');
			}
	
			for (var i = eventIndex+1; i < unrated.length; i++) {
				rated[i].classList.add('no-display');
				unrated[i].classList.remove('no-display');
			}
		}
	}

	xhr.send(params);
}

