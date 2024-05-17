var manualList = document.querySelectorAll('.printer-card');

manualList.forEach((manual, index) => {
	manual.addEventListener('click', () => {
		let clickedOn = event.target;
		if (!clickedOn.classList.contains('rmv-manual') && !(clickedOn.classList.contains('empty-save') || clickedOn.classList.contains('filled-save')))
			window.location.href = "manuals/" + manual.id + ".php";
	});
});
