const sidebarOpen = document.querySelector('.sidebar-open');
const sidebarClose = document.querySelector('.sidebar-close');

const sidebar = document.querySelector('.sidebar');

sidebarOpen.addEventListener('click', () => {
	sidebar.classList.toggle('active');
})

sidebarClose.addEventListener('click', () => {
	sidebar.classList.toggle('active');
})
