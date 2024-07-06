const faqRequests = document.querySelectorAll('.faq-req');
const faqDenyButtons = document.querySelectorAll('.deny-faq-button');
const faqAcceptButtons = document.querySelectorAll('.accept-faq-button');
const faqDenyIds = document.querySelectorAll('.faq-deny-id');
const faqAcceptIds = document.querySelectorAll('.faq-accept-id');

faqDenyButtons.forEach((faqDenyButton, index) => {
	faqDenyButton.index = index;
	faqDenyButton.addEventListener('click', denyFaq);
});

faqAcceptButtons.forEach((faqAcceptButton, index) => {
	faqAcceptButton.index = index;
	faqAcceptButton.addEventListener('click', acceptFaq);
});

function denyFaq(event) {
	event.preventDefault();

	var xhr = new XMLHttpRequest();

	var eventIndex = event.currentTarget.index;
	var faqId = faqDenyIds[eventIndex].value;

	const params = `deny=${faqId}`;

	xhr.open('POST', 'faqSystemProcess/denyFAQ.php', true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	xhr.onload = function() {
		if (this.status == 200) {
			faqRequests[eventIndex].remove();

			var currFAQRequests = document.querySelectorAll('.faq-req');
			if (currFAQRequests.length == 0)
				window.location.reload();
		}
	}

	xhr.send(params);
}

function acceptFaq(event) {
	event.preventDefault();

	var xhr = new XMLHttpRequest();

	var eventIndex = event.currentTarget.index;
	var faqId = faqAcceptIds[eventIndex].value;

	const params = `approve=${faqId}`;

	xhr.open('POST', 'faqSystemProcess/approveFAQ.php', true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	xhr.onload = function() {
		if (this.status == 200) {
			faqRequests[eventIndex].remove();
			
			var currFAQRequests = document.querySelectorAll('.faq-req');
			if (currFAQRequests.length == 0)
				window.location.reload();
		}
	}

	xhr.send(params);
}

const manualRequests = document.querySelectorAll('.manual-req');
const manualDenyButtons = document.querySelectorAll('.deny-manual-button');
const manualAcceptButtons = document.querySelectorAll('.accept-manual-button');
const manualDenyIds = document.querySelectorAll('.manual-deny-id');
const manualAcceptIds = document.querySelectorAll('.manual-accept-id');

manualDenyButtons.forEach((manualDenyButton, index) => {
	manualDenyButton.index = index;
	manualDenyButton.addEventListener('click', denyManual);
});

manualAcceptButtons.forEach((manualAcceptButton, index) => {
	manualAcceptButton.index = index;
	manualAcceptButton.addEventListener('click', acceptManual);
});

function denyManual(event) {
	event.preventDefault();

	var xhr = new XMLHttpRequest();

	var eventIndex = event.currentTarget.index;
	var manualId = manualDenyIds[eventIndex].value;

	const params = `deny=${manualId}`;

	xhr.open('POST', 'manualSystemProcess/denyManual.php', true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	xhr.onload = function() {
		if (this.status == 200) {
			manualRequests[eventIndex].remove();
			
			var currManualRequests = document.querySelectorAll('.manual-req');
			if (currManualRequests.length == 0)
				window.location.reload();
		}
	}

	xhr.send(params);
}

function acceptManual(event) {
	event.preventDefault();

	var xhr = new XMLHttpRequest();

	var eventIndex = event.currentTarget.index;
	var manualId = manualAcceptIds[eventIndex].value;

	const params = `approve=${manualId}`;

	xhr.open('POST', 'manualSystemProcess/approveManual.php', true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	xhr.onload = function() {
		if (this.status == 200) {
			manualRequests[eventIndex].remove();

			var currManualRequests = document.querySelectorAll('.manual-req');
			if (currManualRequests.length == 0)
				window.location.reload();
		}
	}

	xhr.send(params);
}