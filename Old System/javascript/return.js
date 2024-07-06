const returnManuals = document.querySelector('.return-manuals');
const returnFAQ = document.querySelector('.return-faq');
const returnPrevious = document.querySelector('.return-arrow');
const close = document.querySelector('.close');

if (returnFAQ != null)
	returnFAQ.addEventListener('click', () => {
		window.location.href = "../FAQ.php";
	});

if (returnManuals != null)
	returnManuals.addEventListener('click', () => {
		if (document.referrer.split('/')[2]!=location.hostname)
			window.location.href = '../manuals.php';
		else
			window.location = document.referrer;
	});

if (returnPrevious != null)
	returnPrevious.addEventListener('click', () => {
		if (document.referrer.split('/')[2]!=location.hostname)
			window.location.href = 'index.php';
		else
			window.location = document.referrer;
	});

if (close != null)
	close.addEventListener('click', () => {
		window.location.href = 'index.php';
	});