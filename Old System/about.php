<?php
	include $_SERVER['DOCUMENT_ROOT'].'/session/session.php';
	include 'includes/stylesIncludes.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tips&Prints</title>
</head>
<body>

	<?php include 'includes/navbar.php' ?>
	<?php include 'includes/sidebar.php' ?>
	

	<section class="flex-column align-center gap-15px top-bottom-5per m-top-65px w100per">
		<div>
			<h1 class="blue size30px">Povestea noastră</h1>
		</div>
		<div class="flex-center w65per align-center">
			<div class="flex-1">
				<p class="size18px">Tips&Prints a luat naștere datorită pasiunii pentru proiectarea și imprimarea 3D. După o sesiune de brainstorming am ajuns la concluzia că majoritatea site-urilor nu oferă destulă informație legată de imprimante și cum să le folosești, așa că ne-a venit ideea de a crea o comunitate unită și bine informată în acest domeniu, astfel încât indiferent de experiență, fiecare utilizator să poată avea acces la manuale de utilizare și ghiduri detaliate. Scopul nostru este să ajutăm membrii comunității să își realizeze obiectivele și să se bucure de infinitele posibilități oferite de o imprimanta 3D. </p>
			</div>
			<div class="flex-center flex-1">
				<div class="img8">
					<img src="images/about/heroElement.png">
				</div>
			</div>
		</div>
	</section>

	<section class="flex-center grey-bg top-bottom-4per">
		<div class="flex-column gap-60px w45per">
			<div class="flex-center">
				<h1 class="blue size30px">Facilități</h1>
			</div>
			<div class="flex-column gap-40px">
				<div>
					<p class="size18px">Site-ul nostru oferă o gamă variată de facilități concepute pentru a îmbunătăți experiența pasionaților de imprimante 3D și pentru a le oferi suportul necesar: </p>
				</div>
				<div class="flex-column gap-20px">
					<p class="size18px">1. Manuale de utilizare bine structurate: Oferim ghiduri detaliate și ușor de urmărit pentru utilizarea și întreținerea imprimantelor 3D, adaptate la diferite mărci și modele.</p>
					<p class="size18px">2. Asistență personalizată: Asistența AI este mereu disponibilă să ofere suport tehnic și consultanță personalizată, pentru a ajuta utilizatorii să rezolve orice provocări întâmpinate.</p>
					<p class="size18px">3. Comunitate activă: Am creat un spațiu interactiv pentru utilizatori, unde aceștia pot împărtăși idei, sfaturi și experiențe. Comunitatea noastră facilitează colaborarea și învățarea continuă.</p>
					<p class="size18px">4. Secțiune FAQ: Punem la dispoziție pagina unde oferim răspunsuri la cele mai frecvente întrebări.</p>
				</div>
			</div>
		</div>
	</section>

	<section class="flex-center top-4per w100per">
		<div class="w65per">
			<img src="images/about/aboutShowcaseElements.png">
		</div>
	</section>


	<section class="flex-column gap-60px align-center top-bottom-5per">
		<div>
			<h1 class="blue size30px">Ce ne propunem?</h1>
		</div>
		<div class="w70per blue-40T-bg h600px flex-center align-center r30px">
			<div class="w70per">
				<p class="size18px text-center">Ne propunem să devenim principalul punct de referință pentru pasionații de imprimante 3D, oferind o gamă diversificată de resurse și servicii care să răspundă nevoilor fiecărui utilizator. Scopul nostru este să le oferim entuizaștilor suportul necesar pentru a explora și a experimenta în mod creativ cu tehnologia 3D. Punem la dispoziție manuale de utilizare bine structurate și asistență AI. De asemenea, oferim recomandări privind întreținerea imprimantelor și soluționarea problemelor tehnice. Printr-o comunitate activă, încurajăm schimbul de idei și colaborarea între utilizatori, promovând astfel o atmosferă de învățare și dezvoltare continuă. Ne dorim să inspirăm utilizatorii să transforme ideile lor îndrăznețe în realitate, contribuind astfel la evoluția tehnologiei.</p>
			</div>
		</div>
	</section>

	<?php include 'includes/footer.php' ?>

</body>

	<?php include 'includes/utility.php' ?>

</html>