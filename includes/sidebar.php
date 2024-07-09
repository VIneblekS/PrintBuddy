
<aside id = "sidebar" class = "w-80 h-full bg-white fixed z-20 top-0 -right-82 flex justify-center box-border shadow-left shadow-primaryColor/50 duration-300">
	<div>
        <div class = "w-64 h-14 flex justify-between items-center">
            <?php if(checkIfConnected()):?>
                <a class = "flex items-center gap-3.5 text-primaryColor">
                    <img src="generalIcons/userIcon.png" alt="" class = "h-9 w-9">
                    <p>
						<?php 
							if(isset($_COOKIE['refreshToken']) && !isset($_COOKIE['accessToken']))
								echo '<script src = "sessions/session.js"></script>';

							if (session_status() !== 2)
								session_start();
							echo $_SESSION['username'];
						?>
					</p>
                </a>
            <?php else: ?>       
                <a href="logIn.php" class = "h-14 w-64 flex items-center gap-3.5 text-primaryColor">
			        <img src="generalIcons/signInIcon.png" alt="" class = "h-9 w-9">
			        <p>Conectează-te</p>
		        </a>
            <?php endif ?>
            <img src="generalIcons/closeIcon.png" alt="" class = "h-3 w-3 cursor-pointer" onclick = "changeSidebarState()">
        </div>
		<div class = "h-px w-64 bg-primaryColor/40"></div>
		<div class = "md:hidden">
			<a href="index.php" class = "pl-2 h-14 w-64 flex items-center gap-5 text-primaryColor">
				<img src="generalIcons/homeIcon.png" alt="" class = "h-6 w-6">
				<p>Acasă</p>
			</a>
			<div class = "h-px w-64 bg-primaryColor/40"></div>
			<a href="courses.php" class = "h-14 w-64 flex items-center gap-3.5 text-primaryColor">
				<img src="generalIcons/coursesIcon.png" alt="" class = "h-9 w-9">
				<p>Cursuri</p>
			</a>
			<div class = "h-px w-64 bg-primaryColor/40"></div>
			<a href="availableManuals.php" class = "h-14 w-64 flex items-center gap-3.5 text-primaryColor">
				<img src="generalIcons/manualsIcon.png" alt="" class = "h-9 w-9">
				<p>Manuale</p>
			</a>
			<div class = "h-px w-64 bg-primaryColor/40"></div>
			<a href="faq.php" class = "h-14 w-64 flex items-center gap-3.5 text-primaryColor">
				<img src="generalIcons/faqIcon.png" alt="" class = "h-9 w-9">
				<p>FAQ</p>
			</a>
			<div class = "h-px w-64 bg-primaryColor/40"></div>
		</div>
		<a href = "https://discord.gg/uMADwGmThs" target = "_blank" class = "h-14 w-64 flex items-center gap-3.5 text-primaryColor">
			<img src="generalIcons/communityIcon.png" alt="" class = "h-9 w-9">
			<p>Comunitate</p>
		</a>
        <?php if(checkIfConnected()):?>
            <div class = "h-px w-64 bg-primaryColor/40"></div>
            <a href="profile.php" class = "h-14 w-64 flex items-center gap-3.5 text-primaryColor">
                <img src="generalIcons/profileIcon.png" alt="" class = "h-9 w-9">
                <p>Profil</p>
            </a>
            <div class = "h-px w-64 bg-primaryColor/40"></div>
            <a href="saved.php" class = "h-14 w-64 pl-1 flex items-center gap-4 text-primaryColor">
                <img src="generalIcons/savedIcon.png" alt="" class = "h-7 w-7">
                <p>Salvate</p>
            </a>
            <div class = "h-px w-64 bg-primaryColor/40"></div>
            <a class = "cursor-pointer h-14 w-64 flex items-center gap-3.5 text-primaryColor" onclick = "logOut()">
                <img src="generalIcons/logOutIcon.png" alt="" class = "h-9 w-9">
                <p>Deconectează-te</p>
            </a>	
        <?php endif ?>
	</div>
</aside>

<script src="javascript/logOut.js"></script>
<script src="javascript/sidebar.js"></script>