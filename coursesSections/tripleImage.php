<div class = "w-80 sm:w-105 flex md:w-120 lg:w-135 flex-col gap-6 justify-center items-center py-8 shadow-lg rounded-xl border border-primaryColor">
	<div class = "w-280px sm:w-88 md:w-105 lg:w-120 flex justify-between items-center">	
		<h1 class = "text-base text-primaryColor font-bold">Imagini multiple</h1>
		<img src="generalIcons/discardIcon.png" alt="" class = "w-3 h-3"  onclick = 'discardSection(event)'>
	</div>
	<form id = "tripleImage" class = "flex flex-col gap-10" enctype="multipart/form-data">
		<div>
			<label onclick = "imagePreview(this)">
				<input type="file" name="image1" class="hidden">
				<div class = "w-280px h-158px sm:h-50 sm:w-88 md:w-105 md:h-60 lg:w-120 lg:h-67 flex justify-center items-center border border-dashed border-placeholderGray">
					<p class = "text-xs text-placeholderGray">Încarcă o imagine!</p>
					<img src="" alt="" class = "w-280px h-158px sm:h-50 sm:w-88 md:w-105 md:h-60 lg:w-120 lg:h-67 hidden">
				</div>
			</label>
		</div>
		<div>
			<label onclick = "imagePreview(this)">
				<input type="file" name="image2" class="hidden">
				<div class = "w-280px h-158px sm:h-50 sm:w-88 md:w-105 md:h-60 lg:w-120 lg:h-67 flex justify-center items-center border border-dashed border-placeholderGray">
					<p class = "text-xs text-placeholderGray">Încarcă o imagine!</p>
					<img src="" alt="" class = "w-280px h-158px sm:h-50 sm:w-88 md:w-105 md:h-60 lg:w-120 lg:h-67 hidden">
				</div>
			</label>	
		</div>
		<div>
			<label onclick = "imagePreview(this)">
				<input type="file" name="image3" class="hidden">
				<div class = "w-280px h-158px sm:h-50 sm:w-88 md:w-105 md:h-60 lg:w-120 lg:h-67 flex justify-center items-center border border-dashed border-placeholderGray">
					<p class = "text-xs text-placeholderGray">Încarcă o imagine!</p>
					<img src="" alt="" class = "w-280px h-158px sm:h-50 sm:w-88 md:w-105 md:h-60 lg:w-120 lg:h-67 hidden">
				</div>
			</label>
		</div>
	</form>
</div>