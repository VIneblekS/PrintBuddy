<div class = "w-80 sm:w-105 md:w-120 lg:w-135 flex flex-col gap-6 justify-center items-center py-8 shadow-lg rounded-xl border border-primaryColor">
	<div class = "w-280px sm:w-88 md:w-105 lg:w-120 flex justify-between items-center">	
		<h1 class = "text-base text-primaryColor font-bold">Imagini cu descriere</h1>
		<img src="generalIcons/discardIcon.png" alt="" class = "w-3 h-3" onclick = 'discardSection(event)'>
	</div>
	<form id = "tripleImageDescription" class = "flex flex-col gap-10" enctype="multipart/form-data">
	<div class = "flex flex-col gap-5">
			<label onclick = "imagePreview(this)">
				<input type="file" name="image1" class="hidden">
				<div class = "w-280px h-158px sm:h-50 sm:w-88 md:w-105 md:h-60 lg:w-120 lg:h-67 flex justify-center items-center border border-dashed border-placeholderGray">
					<p class = "text-xs text-placeholderGray">Încarcă o imagine!</p>
					<img src="" alt="" class = "w-280px h-158px sm:h-50 sm:w-88 md:w-105 md:h-60 lg:w-120 lg:h-67 hidden">
				</div>
			</label>
			<div class = "h-32 w-72 sm:w-88 md:w-105 lg:w-120 md:h-44 flex items-center relative shadow-lg rounded-xl border border-placeholderGray">
				<textarea type="text" name = "description1" class = "resize-none h-24 md:h-32 w-70 sm:w-86 md:w-105 lg:w-120 text-sm pl-8 pr-4 outline-none"></textarea>
				<h1 class = "absolute text-xs bg-white px-2.5 -top-2 left-3">Descriere</h1>
			</div>
		</div>
		<div class = "flex flex-col gap-5">
			<label onclick = "imagePreview(this)">
				<input type="file" name="image2" class="hidden">
				<div class = "w-280px h-158px sm:h-50 sm:w-88 md:w-105 md:h-60 lg:w-120 lg:h-67 flex justify-center items-center border border-dashed border-placeholderGray">
					<p class = "text-xs text-placeholderGray">Încarcă o imagine!</p>
					<img src="" alt="" class = "w-280px h-158px sm:h-50 sm:w-88 md:w-105 md:h-60 lg:w-120 lg:h-67 hidden">
				</div>
			</label>
			<div class = "h-32 w-72 sm:w-88 md:w-105 lg:w-120 md:h-44 flex items-center relative shadow-lg rounded-xl border border-placeholderGray">
				<textarea type="text" name = "description2" class = "resize-none h-24 md:h-32 w-70 sm:w-86 md:w-105 lg:w-120 text-sm pl-8 pr-4 outline-none"></textarea>
				<h1 class = "absolute text-xs bg-white px-2.5 -top-2 left-3">Descriere</h1>
			</div>
		</div>
		<div class = "flex flex-col gap-5">
			<label onclick = "imagePreview(this)">
				<input type="file" name="image3" class="hidden">
				<div class = "w-280px h-158px sm:h-50 sm:w-88 md:w-105 md:h-60 lg:w-120 lg:h-67 flex justify-center items-center border border-dashed border-placeholderGray">
					<p class = "text-xs text-placeholderGray">Încarcă o imagine!</p>
					<img src="" alt="" class = "w-280px h-158px sm:h-50 sm:w-88 md:w-105 md:h-60 lg:w-120 lg:h-67 hidden">
				</div>
			</label>
			<div class = "h-32 w-72 sm:w-88 md:w-105 lg:w-120 md:h-44 flex items-center relative shadow-lg rounded-xl border border-placeholderGray">
				<textarea type="text" name = "description3" class = "resize-none h-24 md:h-32 w-70 sm:w-86 md:w-105 lg:w-120 text-sm pl-8 pr-4 outline-none"></textarea>
				<h1 class = "absolute text-xs bg-white px-2.5 -top-2 left-3">Descriere</h1>
			</div>
		</div>
	</form>
</div>