<?php
    include 'generalFunctions/generalFunctions.php';

    if(isset($_COOKIE['refreshToken']) && !isset($_COOKIE['accessToken']))
		echo '<script src = "sessions/session.js"></script>';

    if(!checkIfConnected())
        redirectToIndex();

    session_start();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://cdn.tailwindcss.com"></script>
		<script src="javascript/tailwindAddOns.js"></script>
		<link rel="stylesheet" href="css/customClases.css">
		<title>Printbuddy</title>
	</head>
	
	<?php include 'includes/navbar.php' ?>
	<?php include 'includes/sidebar.php' ?>

	<body class = "mt-12 pt-12 md:pt-18 pb-14 flex flex-col items-center">
		<div class = "flex flex-col items-center gap-7 md:gap-8 w-82 sm:w-2/3 md:w-full">	
		    <div class = "flex flex-col gap-5 justify-center items-center">	
                <h1 class = "font-bold text-2xl sm:text-2.5xl md:text-4xl text-primaryColor">Profilul meu</h1>
                <div class = "flex items-center gap-2.5">
                    <img src="generalIcons/userIcon.png" alt="" class = "w-20 h-20 md:w-32 md:h-32">
                    <div class = "flex flex-col gap-0.5">
                        <p class = "text-sm pl-2"><?php echo $_SESSION['lastName'].' '.$_SESSION['firstName']?></p>
                        <div class = "px-10 w-44 h-px bg-primaryColor"></div>	
                        <p class = "text-sm pl-2"><?php echo $_SESSION['username']?></p>
                    </div>
                </div>
            </div>
            <div class = "flex flex-col gap-4">
                <form id = "lastNameForm">
                    <div class = "relative flex flex-col gap-1">
                        <div class = "relative">
                            <input type="text" name = "lastName" value = "<?php echo $_SESSION['lastName'] ?>" placeholder = "<?php echo $_SESSION['lastName'] ?>" disabled class = "h-14 sm:w-96 md:w-105 lg:w-120 w-72 text-sm shadow-lg rounded-xl pl-8 outline-none border border-primaryColor">
                            <img src="generalIcons/editIcon.png" alt="" class = "cursor-pointer h-6 w-6 absolute right-4 top-1/2 -translate-y-1/2" onclick = "toggleEdit(this.parentElement)">
                            <div class = "flex gap-4 justify-center items-center hidden absolute right-4 top-1/2 -translate-y-1/2">
                                <label>
                                    <input type="submit" class = "hidden">
                                    <img src="generalIcons/confirmIcon.png" alt="" class = "cursor-pointer h-6 w-6">
                                </label>
                                <img src="generalIcons/cancelIcon.png" alt="" class = "cursor-pointer h-4 w-4" onclick = "toggleEdit(this.parentElement.parentElement)">
                            </div>
                        </div>
                        <p id="lastNameErr" class = "h-4 text-sm text-red-600"></p>
                        <h1 class = "absolute text-xs bg-white px-2.5 -top-2 left-3">Nume</h1>
                    </div>
                </form>
                <form id = "firstNameForm">
                    <div class = "relative flex flex-col gap-1">
                        <div class = "relative">
                            <input type="text" name = "firstName" value = "<?php echo $_SESSION['firstName'] ?>" placeholder = "<?php echo $_SESSION['firstName'] ?>" disabled class = "h-14 sm:w-96 md:w-105 lg:w-120 w-72 text-sm shadow-lg rounded-xl pl-8 outline-none border border-primaryColor">
                            <img src="generalIcons/editIcon.png" alt="" class = "cursor-pointer h-6 w-6 absolute right-4 top-1/2 -translate-y-1/2" onclick = "toggleEdit(this.parentElement)">
                            <div class = "flex gap-4 justify-center items-center hidden absolute right-4 top-1/2 -translate-y-1/2">
                                <label>
                                    <input type="submit" class = "hidden">
                                    <img src="generalIcons/confirmIcon.png" alt="" class = "cursor-pointer h-6 w-6">
                                </label>
                                <img src="generalIcons/cancelIcon.png" alt="" class = "cursor-pointer h-4 w-4" onclick = "toggleEdit(this.parentElement.parentElement)">
                            </div>
                        </div>
                        <p id="firstNameErr" class = "h-4 text-sm text-red-600"></p>
                        <h1 class = "absolute text-xs bg-white px-2.5 -top-2 left-3">Prenume</h1>
                    </div>
                </form>
                <form id = "emailForm">
                    <div class = "relative flex flex-col gap-1">
                        <div class = "relative">
                            <input type="text" name = "email" value = "<?php echo $_SESSION['email'] ?>" placeholder = "<?php echo $_SESSION['email'] ?>" disabled class = "h-14 sm:w-96 md:w-105 lg:w-120 w-72 text-sm shadow-lg rounded-xl pl-8 outline-none border border-primaryColor">
                            <img src="generalIcons/editIcon.png" alt="" class = "cursor-pointer h-6 w-6 absolute right-4 top-1/2 -translate-y-1/2" onclick = "toggleEdit(this.parentElement)">
                            <div class = "flex gap-4 justify-center items-center hidden absolute right-4 top-1/2 -translate-y-1/2">
                                <label>
                                    <input type="submit" class = "hidden">
                                    <img src="generalIcons/confirmIcon.png" alt="" class = "cursor-pointer h-6 w-6">
                                </label>
                                <img src="generalIcons/cancelIcon.png" alt="" class = "cursor-pointer h-4 w-4" onclick = "toggleEdit(this.parentElement.parentElement)">
                            </div>
                        </div>
                        <p id="emailErr" class = "h-4 text-sm text-red-600"></p>
                        <h1 class = "absolute text-xs bg-white px-2.5 -top-2 left-3">Email</h1>
                    </div>
                </form>
                <form id="passwordForm">
                    <div class = "relative flex flex-col gap-1">
                        <div class = "relative">
                            <input type="text" name = "password" value = "*********" placeholder = "*********" disabled class = "h-14 sm:w-96 md:w-105 lg:w-120 w-72 text-sm shadow-lg rounded-xl pl-8 outline-none border border-primaryColor">
                            <img src="generalIcons/editIcon.png" alt="" class = "cursor-pointer h-6 w-6 absolute right-4 top-1/2 -translate-y-1/2" onclick = "toggleEdit(this.parentElement)">
                            <div class = "flex gap-4 justify-center items-center hidden absolute right-4 top-1/2 -translate-y-1/2">
                                <label>
                                    <input type="submit" class = "hidden">
                                    <img src="generalIcons/confirmIcon.png" alt="" class = "cursor-pointer h-6 w-6">
                                </label>
                                <img src="generalIcons/cancelIcon.png" alt="" class = "cursor-pointer h-4 w-4" onclick = "toggleEdit(this.parentElement.parentElement)">
                            </div>
                        </div>
                        <p id="passwordErr" class = "h-4 text-sm text-red-600"></p>
                        <h1 class = "absolute text-xs bg-white px-2.5 -top-2 left-3">Parolă</h1>
                    </div>
                </form>
            </div>
            <div class = "flex flex-col gap-5">
                <h1 class = "font-bold text-2xl sm:text-2.5xl md:text-4xl text-red-600">Șterge contul</h1>
                <form id="deleteAccountForm" class = "flex flex-col gap-4">
                    <div class = "relative flex flex-col gap-1">
                        <input type="password" name = "passwordConfirm" class = "h-14 sm:w-96 md:w-105 lg:w-120 w-72 text-sm shadow-lg rounded-xl pl-8 outline-none border border-red-600">
                        <p id="passwordConfirmErr" class = "h-4 text-sm text-red-600"></p>
                        <h1 class = "absolute text-xs bg-white px-2.5 -top-2 left-3">Parola actuală</h1>
                    </div>
                    <input type="submit" value="Șterge contul" class = "w-28 h-8 md:w-30 md:h-9 items-center flex justify-center text-xs md:text-sm text-white bg-red-600 rounded-lg font-normal shadow-md shadow-black/20">
                </form>
            </div>
		</div>
    </body>

</html>

<script src="javascript/editProfile.js"></script>
