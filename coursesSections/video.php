<div class = "w-80 sm:w-105 md:w-120 lg:w-135 flex flex-col gap-6 justify-center items-center py-8 shadow-lg rounded-xl border border-primaryColor">
	<div class = "w-280px sm:w-88 md:w-105 lg:w-120 flex justify-between items-center">	
		<h1 class = "text-base text-primaryColor font-bold">Videoclip</h1>
		<img src="generalIcons/discardIcon.png" alt="" class = "w-3 h-3"  onclick = 'discardSection(event)'>
	</div>
	<form id = "video" class = "flex flex-col gap-5 md:gap-6">
		<div class = "w-280px h-158px sm:h-50 sm:w-88 md:w-105 md:h-60 lg:w-120 lg:h-67 flex justify-center items-center border border-dashed border-placeholderGray">
				<p class = "text-xs text-placeholderGray">Niciun videoclip încărcat!</p>
				<iframe class = "w-280px h-158px sm:h-50 sm:w-88 hidden md:w-105 md:h-60 lg:w-120 lg:h-67" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
		</div>
		<input type="text" name="video" onclick = "videoPreview(this)" placeholder = "Linkul către video" class = "outline-none placeholder:text-xs text-xs placeholder:text-placeholderGray border-b border-placeholderGray pl-2">
	</form>
</div>