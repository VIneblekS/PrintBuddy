<section>
	<div class="w300px"></div>
	<div class="white-bg left-menu w300px h100per flex-center">
		<div class="w80per flex-column gap-60px">
			<div class="flex-space-between align-center">
				<div class="flex-left align-center gap-20px">
					<div class="circle-35px profile-pic">
						<img class="circle-35px" src="images/generalElements/noUserPic.png">
					</div>
					<h2 class="size15px normal"><?php echo $_SESSION['username']; ?></h2>
				</div>
				<div class="sidebar-close close pointer">
					<img src="images/generalElements/cross.png">
				</div>
			</div>
				<div class="flex-column gap-24px">
					<div class="flex-left gap-5px align-center pointer profile">
						<div class="sidebar-icon">
							<img src="images/sidebar/profile.png">
						</div>
						<h2 class="size15px normal">Profilul meu</h2>
					</div>
					<div class="flat-line blue-90T-bg"></div>
					<div class="flex-left gap-5px align-center pointer search-history">
						<div class="sidebar-icon">
							<img src="images/sidebar/searchHistory.png">
						</div>
						<h2 class="size15px normal">Istoricul căutarilor</h2>
					</div>
					<div class="flat-line blue-90T-bg"></div>
					<div class="flex-left gap-5px align-center pointer saved">
						<div class="sidebar-icon">
							<img src="images/sidebar/saved.png">
						</div>
						<h2 class="size15px normal">Salvate</h2>
					</div>
					<div class="flat-line blue-90T-bg"></div>
					<div class="flex-left gap-5px align-center pointer language">
						<div class="sidebar-icon">
							<img src="images/sidebar/language.png">
						</div>
						<h2 class="size15px normal">Schimbă limba</h2>
					</div>
					<div class="flat-line blue-90T-bg"></div>
					<div class="flex-left gap-5px align-center pointer settings">
						<div class="sidebar-icon">
							<img src="images/sidebar/settings.png">
						</div>
						<h2 class="size15px normal">Setări</h2>
					</div>
					<?php if($_SESSION['admin'] != 0): ?>
					<div class="flat-line blue-90T-bg"></div>
						<div class="flex-left gap-5px align-center pointer admin">
							<div class="sidebar-icon">
								<img src="images/sidebar/admin.png">
							</div>
							<h2 class="size15px normal">Panou administrator</h2>
						</div>
					<?php endif ?>
				</div>
				<div class="flex-column gap-24px menu-bottom">
					<div class="flex-left gap-5px align-center pointer disconnect">
						<div class="sidebar-icon">
							<img src="images/sidebar/disconnect.png">
						</div>
						<h2 class="size15px normal">Deconectează-te</h2>
					</div>
					<div class="flat-line blue-90T-bg"></div>
					<div class="flex-left gap-5px align-center pointer help">
						<div class="sidebar-icon">
							<img src="images/sidebar/help.png">
						</div>
						<h2 class="size15px normal">Ajutor</h2>
					</div>
				</div>
		</div>
	</div>
</section>