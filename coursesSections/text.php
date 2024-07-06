<div class = "w-80 sm:w-105 md:w-120 lg:w-135 flex flex-col gap-6 justify-center items-center py-8 shadow-lg rounded-xl border border-primaryColor">
	<div class = "w-72 sm:w-88 md:w-105 lg:w-120 flex justify-between items-center">	
		<h1 class = "text-base text-primaryColor font-bold">Text</h1>
		<img src="generalIcons/discardIcon.png" alt="" class = "w-3 h-3"  onclick = 'discardSection(event)'>
	</div>
	<form id = "text" class = "flex flex-col gap-10">
		<div class = "flex items-center relative h-32 md:h-44 w-72 sm:w-88 md:w-105 lg:w-120 shadow-lg rounded-xl border border-placeholderGray">
			<textarea type="text" name="text" class = "resize-none h-24 md:h-32 w-70 sm:w-86 md:w-105 lg:w-120 text-sm pl-8 pr-4 outline-none"></textarea>
			<h1 class = "absolute text-xs bg-white px-2.5 -top-2 left-3">Content</h1>
		</div>
	</form>
</div>