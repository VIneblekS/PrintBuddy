<?php 
    include 'generalFunctions/generalFunctions.php';
?>

<navbar class = "w-full h-12 bg-white shadow-md shadow-primaryColor/25 flex justify-center items-center fixed z-10 top-0">
	<div class = "w-full ml-6 lg:ml-12 mr-10 flex justify-between items-center">
		<div class = "flex justify-center items-center gap-3">
			<img src="images&videoes/logoLightTheme.png" alt="" class = "w-9">		
			<h1 class = "font-medium text-lg text-primaryColor font-sans">PRINTBUDDY</h1>
		</div>
		<div class = "hidden md:flex justify-center items-center gap-3.5">
			<a href = "home.php" class = "text-normal text-base text-primaryColor">Acasă</a>
			<div class = "h-4 w-px bg-primaryColor/30"></div>
			<a href = "availableCourses.php" class = "text-normal text-base text-primaryColor">Cursuri</a>
			<div class = "h-4 w-px bg-primaryColor/30"></div>
			<a href = "availableManuals.php" class = "text-normal text-base text-primaryColor">Manaule</a>
			<div class = "h-4 w-px bg-primaryColor/30"></div>
			<a href = "FAQ.php" class = "text-normal text-base text-primaryColor">FAQ</a>
		</div>
		<div class = "hidden md:flex justify-center items-center gap-8">
            <?php if(!checkIfConnected()):?>
			    <a href = "logIn.php" class = "text-normal text-base text-primaryColor">Conectează-te</a>
			    <a href = "signUp.php" class = "text-normal text-base text-primaryColor">Înregistrează-te</a>
            <?php else: ?>
                <img src="generalIcons/userIcon.png" alt="" class = "w-10 h-10" onclick = "changeSidebarState()">
            <?php endif ?>
		</div>
		<img src="generalIcons/burgerMenuIcon.png" alt="" class = "w-6.5 h-6.5 md:hidden" onclick = "changeSidebarState()">
	</div>
</navbar>

<script src="javascript/sidebar.js"></script>