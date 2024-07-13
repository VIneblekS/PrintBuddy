<?php
	include 'databases/databases.php';
	include 'generalFunctions/generalFunctions.php';

	$sql = "SELECT * FROM courses";
	$courses = mysqli_query($conn['main'], $sql);
	$courses = mysqli_fetch_all($courses, MYSQLI_ASSOC);

	$admin = 0;

	if(isset($_COOKIE['refreshToken']) && !isset($_COOKIE['accessToken']))
		echo '<script src = "sessions/session.js"></script>';

	session_start();

	if(checkIfConnected())
		$admin = $_SESSION['admin'];

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://cdn.tailwindcss.com"></script>
		<script src="javascript/tailwindAddOns.js"></script>
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="css/customClases.css">
		<title>Printbuddy</title>
	</head>

	<?php include 'includes/navbar.php' ?>
	<?php include 'includes/sidebar.php' ?>

	<body class = "mt-12 pt-12 md:pt-16 flex flex-col items-center">
		<div class = "flex flex-col items-center gap-8 md:gap-16 w-82 sm:w-2/3 md:w-full">	
			<h1 class = "font-bold text-2xl sm:text-2.5xl md:text-4xl text-primaryColor">Cursuri disponibile</h1>
			<div class = "relative grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-16 w-80.5 sm:w-108.5 md:w-177 lg:w-273.5">
				<?php foreach($courses as $course): ?>
					<div id="<?php echo $course['id']?>">
						<div id = "<?php echo "courses/".strtolower(str_replace(' ', '_', $course['title']))?>" class = "relative w-80.5 h-80.5 sm:w-108.5 sm:h-108.5 md:w-80.5 md:h-80.5 p-6 border border-primaryColor rounded-xl shadow-md shadow-black/15">						
							<img src="<?php echo "courses/uploads/".$course['image']?>" alt="" class = "w-68 h-68 sm:w-96 sm:h-96 md:w-68 md:h-68" onclick="showCourse(this.parentElement)">
							<p class = "text-base absolute -bottom-3 left-1/2 -translate-x-1/2 bg-white px-4 whitespace-nowrap" onclick="showCourse(this.parentElement)"><?php echo $course['title'] ?></p>
							<?php if($admin): ?>
								<img id="<?php echo $course['id']?>" src="generalIcons/discardIcon.png" alt="" class = "hidden md:block w-3 h-3 absolute right-4 top-4" onclick="togglePopUp(this.id)">
							<?php endif ?>
						</div>
					</div>
				<?php endforeach ?>
				<?php if($admin): ?>
					<div class = "flex justify-center items-center">
						<a href = "addCourse.php" class = "flex justify-center items-center w-52 h-52 rounded-xl border border-primaryColor text-6xl text-primaryColor">
							+
						</a>
					</div>
				<?php endif ?>		
			</div>
		</div>
		<div id = "popUp" class = "fixed top-0 left-0 w-full h-full backdrop-blur-sm bg-primaryColor bg-opacity-10 flex justify-center items-center hidden">
			<div class = "w-82 sm:w-105 sm:h-44 h-40 md:w-135 shadow-xl shadow-black/15 absolute bg-white flex justify-center items-center rounded-2xl">
				<div class = "flex flex-col items-center gap-3 md:gap-6 w-72 sm:w-96 md:w-120">	
					<h1 class = "text-sm md:text-base lg:text-lg">Ești sigur că dorești să ștergi acest curs definitiv?</h1>
					<div class = "flex gap-4">
						<button id="deleteButton" class = "w-28 h-8 md:w-30 md:h-9 items-center flex justify-center text-xs md:text-sm text-white bg-red-700 rounded-lg font-normal shadow-md shadow-black/20" onclick = "deleteCourse(this)">Șterge</button>
						<button class = "w-28 h-8 md:w-30 md:h-9 items-center flex justify-center text-xs md:text-sm text-red-700 border border-red-700 rounded-lg font-normal shadow-md shadow-black/20" onclick="togglePopUp(this.id)">Anulează</button>
					</div>
				</div>
			</div>
		</div>
    </body>
	
	<?php include 'includes/footer.php' ?>
</html>

<script src="javascript/delete.js"></script>
<script src ="javascript/show.js"></script>
<script src="https://cdn.botpress.cloud/webchat/v2/inject.js"></script>
<script src="https://mediafiles.botpress.cloud/48385c87-3c59-40fe-b72c-ff429e635db2/webchat/v2/config.js"></script>

