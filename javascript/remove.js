const deleteButton = document.querySelector('.delete-button');
const cancel = document.querySelector('.cancel-button');
const popUpBackground = document.querySelector('.pop-up-background');
const body = document.querySelector('.body');
const header = document.querySelector('.header');
const addManualButton = document.querySelector('.add-manual');

var manualRemoveButtons = document.querySelectorAll('.rmv-manual');
var manualDeleteIds = document.querySelectorAll('.manual-delete-id');
var manualList = document.querySelectorAll('.printer-card');

if (addManualButton != null)
	addManualButton.addEventListener('click', () => {
		window.location.href = "submitManual.php";
	});

cancel.addEventListener('click', () => {
	popUpBackground.classList.toggle('no-display');
	body.classList.toggle('pop-up-active');
	header.classList.toggle('pop-up-active');
});



manualRemoveButtons.forEach((manualRemoveButton, index) => {
	manualRemoveButton.addEventListener('click', () => {
		deleteButton.id = index;
		popUpBackground.classList.toggle('no-display');
		body.classList.toggle('pop-up-active');
		header.classList.toggle('pop-up-active');
	});
});

if (manualList != null)
	deleteButton.addEventListener('click', deleteManual);

function deleteManual(event) {
	if (manualList.length != 0) {
		event.preventDefault();
	
		var manualId = manualDeleteIds[deleteButton.id].value;
		const params = `delete=${manualId}`;

		var xhr = new XMLHttpRequest();

		xhr.open('POST', 'manualSystemProcess/deleteManual.php', true);
		xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

		xhr.onload = function() {
			if (this.status == 200) {
				var fillers = document.querySelectorAll('.filler');
				var firstSmallFiller = document.querySelector('.small-filler')
			
				if(fillers.length == 3)
					fillers.forEach(filler => {
						filler.remove();
					});
				else {
					var fillerHTML = '<div class="empty-printer-card white-bg h100per filler"></div>';
					firstSmallFiller.insertAdjacentHTML('beforebegin', fillerHTML);
				}

				manualList[deleteButton.id].remove();
				popUpBackground.classList.toggle('no-display');
				body.classList.toggle('pop-up-active');
				header.classList.toggle('pop-up-active');

				remainingManualList = document.querySelectorAll('.printer-card');

				if(remainingManualList.length == 0)
					window.location.reload();
			}
		}

		xhr.send(params);
	}
}


const addFAQButton = document.querySelector('.add-faq');

var faqRemoveButtons = document.querySelectorAll('.rmv-faq');
var faqDeleteIds = document.querySelectorAll('.faq-delete-id');
var faqList = document.querySelectorAll('.faq');

if (addFAQButton  != null)
	addFAQButton.addEventListener('click', () => {
		window.location.href = "submitFAQ.php";
	});


faqRemoveButtons.forEach((faqRemoveButton, index) => {
	faqRemoveButton.addEventListener('click', () => {
		deleteButton.id = index;
		popUpBackground.classList.toggle('no-display');
		body.classList.toggle('pop-up-active');
		header.classList.toggle('pop-up-active');
	});
});

if (faqList != null)
	deleteButton.addEventListener('click', deleteFAQ);

function deleteFAQ(event) {
	if (faqList.length != 0) {
		event.preventDefault();

		if (faqDeleteIds != null)
			var faqId = faqDeleteIds[deleteButton.id].value;
		const params = `delete=${faqId}`;

		var xhr = new XMLHttpRequest();

		xhr.open('POST', 'faqSystemProcess/deleteFAQ.php', true);
		xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

		xhr.onload = function() {
			if (this.status == 200) {

				faqList[deleteButton.id].remove();
				popUpBackground.classList.toggle('no-display');
				body.classList.toggle('pop-up-active');
				header.classList.toggle('pop-up-active');

				remainingFAQList = document.querySelectorAll('.faq');

				if(remainingFAQList.length == 0)
					window.location.reload();
			}
		}

		xhr.send(params);
	}
}



