<?php
    include $_SERVER['DOCUMENT_ROOT'].'/generalFunctions/generalFunctions.php';
    include 'userFunctions/signUpFunctions.php';
	include $_SERVER['DOCUMENT_ROOT'].'/databases/databases.php'; 

    // Input data & output errors
    $credentials = ['username' => '', 'firstName' => '', 'lastName' => '', 'email' => '', 'password' => '', 'passwordConfirm' => '', 'deviceId' => json_decode($_POST['deviceId'])];
    $errors = ['usernameErr' => '', 'firstNameErr' => '', 'lastNameErr' => '', 'emailErr' => '', 'passwordErr' => '', 'passwordConfirmErr' => ''];

    // Check for form submit
    if(isset($_POST['signUp'])) {

        // Validate form fields
        check_username($conn, $credentials, $errors);
        check_email($conn, $credentials, $errors);
        check_firstName($credentials, $errors);
        check_lastName($credentials, $errors);
        check_password($credentials, $errors);

        // Check for errors
        if (check_errors($errors)) {

            // Add the user to the database
            signUp($conn, $credentials);
        } else

            // Send the errors through AJAX back to the form
            sendErrors($errors);
    }
?>