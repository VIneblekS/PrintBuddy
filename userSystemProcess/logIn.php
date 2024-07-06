<?php
    include $_SERVER['DOCUMENT_ROOT'].'/generalFunctions/generalFunctions.php';
    include 'userFunctions/logInFunctions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/databases/databases.php'; 

    // Input data & output errors
    $credentials = ['user' => '', 'username' => '', 'password' => '', 'duration' => '', 'deviceId' => json_decode($_POST['deviceId'])];
    $errors = ['userErr' => '', 'passwordErr' => ''];

    // Check for form submit
    if(isset($_POST['logIn'])) {

        // Validate form fields
        check_user($credentials, $errors);
        check_password($credentials, $errors);
        check_credentials($conn, $credentials, $errors);
        
        // Set the log in duration
        $WEEK = 60 * 60 * 24 * 7;
        $credentials['duration'] = !empty($_POST['keepConnection']) ? time() + $WEEK : null;

        // Check for errors
        if (check_errors($errors)) {

            // Log the user in
            logIn($conn, $credentials);
        } else

            // Send the errors through AJAX back to the form
            sendErrors($errors);
    }
?>