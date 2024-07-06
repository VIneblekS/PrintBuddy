<header class="flex-space-between white-bg navbar-shadow w100per header">
		<div class="navbar-wrapper flex-space-between align-center w100per">
			<div class="logo-name-wrapper">
				<img src="images/generalElements/logoName.png">
			</div>
			<nav id="navbar">
				<ul class="flex-center align-center">
					<li class="flex-center"><a class="black size18px" href="index.php">Acasă</a></li>
					<div class="separatory-line blue-90T-bg"></div>
					<li class="flex-center"><a class="black size18px" href="about.php">Despre noi</a></li>
					<div class="separatory-line blue-90T-bg"></div>
					<li class="flex-center"><a class="black size18px" href="manuals.php">Manuale</a></li>
					<div class="separatory-line blue-90T-bg"></div>
					<li class="flex-center"><a class="black size18px" href="FAQ.php">FAQ</a></li>
					<div class="separatory-line blue-90T-bg"></div>
					<li class="flex-center"><a class="black size18px" href="community.php">Comunitate</a></li>
				</ul>
			</nav>
			<?php if(!isset($_COOKIE['connection'])): ?>
				<div class="navbar-buttons-wrapper flex-space-between">			
					<a href="signUp.php" class="navbar-button blue size15px">Înregistrează-te</a>
					<a href="logIn.php" class="navbar-button navbar-button-border blue size15px">Autentifică-te</a>
				</div>
			<?php else: ?>
				<div class="circle-35px pointer profile-pic sidebar-open">
					<img class="circle-35px" src="images/generalElements/noUserPic.png">
				</div>
			<?php endif ?>
		</div>
	</header>