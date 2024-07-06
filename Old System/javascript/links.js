const profile = document.querySelector('.profile');
const searchHistory = document.querySelector('.search-history');
const saved = document.querySelector('.saved');
const language = document.querySelector('.language');
const settings = document.querySelector('.settings');
const dissconect = document.querySelector('.disconnect');
const help = document.querySelector('.help');
const admin = document.querySelector('.admin');

if (admin != null)
	admin.addEventListener('click', () => {
		window.location.href = "adminPanel.php";
	})

profile.addEventListener('click', () => {
	window.location.href = "profile.php";
})

searchHistory.addEventListener('click', () => {
	window.location.href = "searchHistory.php";
})

saved.addEventListener('click', () => {
	window.location.href = "saved.php";
})

language.addEventListener('click', () => {
	window.location.href = "unfinished.php";
})

settings.addEventListener('click', () => {
	window.location.href = "settings.php";
})

dissconect.addEventListener('click', () => {
	window.location.href = "userSystemProcess/logOut.php";
})

help.addEventListener('click', () => {
	window.location.href = "unfinished.php";
})