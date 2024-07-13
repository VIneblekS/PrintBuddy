<div class = "w-80 sm:w-105 md:w-120 lg:w-135 flex flex-col gap-6 justify-center items-center py-8 shadow-lg rounded-xl border border-primaryColor">
	<div class = "w-280px sm:w-88 md:w-105 lg:w-120 flex justify-between items-center">	
		<h1 class = "text-base text-primaryColor font-bold">Imagine</h1>
		<img src="generalIcons/discardIcon.png" alt="" class = "w-3 h-3" onclick = 'discardSection(event)'>
	</div>
	<form id = "image" enctype="multipart/form-data">
		<label onclick = "imagePreview(this)">
			<input type="file" name="image" class="hidden" accept="image/*">
        	<div class = "w-280px h-158px sm:h-50 sm:w-88 md:w-105 md:h-60 lg:w-120 lg:h-67 flex justify-center items-center border border-dashed border-placeholderGray">
				<p class = "text-xs text-placeholderGray">Încarcă o imagine!</p>
				<img src="" alt="" class = "w-280px h-158px sm:h-50 sm:w-88 md:w-105 md:h-60 lg:w-120 lg:h-67 hidden">
			</div>
		</label>
	</form>
</div>