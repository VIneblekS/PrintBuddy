<?php
    include $_SERVER['DOCUMENT_ROOT'].'/databases/databases.php';
    include 'userFunctions/signUpFunctions.php';
    include $_SERVER['DOCUMENT_ROOT'].'/generalFunctions/generalFunctions.php';

    session_start();
    $username = $_SESSION['username'];
    //
    $credentials = ["email" => ''];
    $errors = ["emailErr" => ''];
    //
    check_email($conn, $credentials, $errors);
    
    if (check_errors($errors)) {

        $newEmail = $credentials['email'];
        $sql = "UPDATE users SET email = '$newEmail' WHERE username = '$username'";
        mysqli_query($conn['main'], $sql);
        //
        setcookie('accessToken', false, time() - 10, '/');    
        //
        $data = ['errorCnt' => 0];
        echo json_encode($data);

    } else
        sendErrors($errors);
?>