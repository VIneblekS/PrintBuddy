<section>
		<div class="sidebar white-bg w250px h100per flex-column gap-3per">
			<div class="flex-space-between align-center">
				<div class="sidebar-username flex-left align-center gap-20px">
					<div class="circle-35px profile-pic">
						<img class="circle-35px" src="images/generalElements/noUserPic.png">
					</div>
					<h2 class="size15px normal"><?php echo $_SESSION['username']; ?></h2>
				</div>
				<div class="sidebar-close left-right-7per close pointer">
					<img src="images/generalElements/cross.png">
				</div>
			</div>
			<div class="flat-line w95per blue-90T-bg"></div>
			<div class="flex-column gap-20px">
				<div class="flex-left gap-5px align-center pointer profile">
					<div class="sidebar-icon">
						<img src="images/sidebar/profile.png">
					</div>
					<h2 class="size15px normal">Profilul meu</h2>
				</div>
				<div class="flex-left gap-5px align-center pointer search-history">
					<div class="sidebar-icon">
						<img src="images/sidebar/searchHistory.png">
					</div>
					<h2 class="size15px normal">Istoricul căutarilor</h2>
				</div>
				<div class="flex-left gap-5px align-center pointer saved">
					<div class="sidebar-icon">
						<img src="images/sidebar/saved.png">
					</div>
					<h2 class="size15px normal">Salvate</h2>
				</div>
				<div class="flex-left gap-5px align-center pointer language">
					<div class="sidebar-icon">
						<img src="images/sidebar/language.png">
					</div>
					<h2 class="size15px normal">Schimbă limba</h2>
				</div>
				<div class="flex-left gap-5px align-center pointer settings">
					<div class="sidebar-icon">
						<img src="images/sidebar/settings.png">
					</div>
					<h2 class="size15px normal">Setări</h2>
				</div>
				<?php if($_SESSION['admin'] != 0): ?>
					<div class="flex-left gap-5px align-center pointer admin">
						<div class="sidebar-icon">
							<img src="images/sidebar/admin.png">
						</div>
						<h2 class="size15px normal">Panou administrator</h2>
					</div>
				<?php endif ?>
				<div class="flex-left gap-5px align-center pointer disconnect">
					<div class="sidebar-icon">
						<img src="images/sidebar/disconnect.png">
					</div>
					<h2 class="size15px normal">Deconectează-te</h2>
				</div>
			</div>
			<div class="flat-line w95per blue-90T-bg"></div>
			<div class="flex-left gap-5px align-center pointer help">
					<div class="sidebar-icon">
						<img src="images/sidebar/help.png">
					</div>
					<h2 class="size15px normal">Ajutor</h2>
			</div>
		</div>
	</section>