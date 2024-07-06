const instagram = document.querySelector('.instagram');
const facebook = document.querySelector('.facebook');
const twitter = document.querySelector('.twitter');

instagram.addEventListener('click', () => {
	window.open('https://www.instagram.com/stefan_dore_/', '_blank');
})

facebook.addEventListener('click', () => {
	window.open('https://www.facebook.com/stefan.dore.7/?locale=ro_RO', '_blank');
})

twitter.addEventListener('click', () => {
	window.open('https://twitter.com/s_stefan_', '_blank');
})