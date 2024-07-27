<?php
    include $_SERVER['DOCUMENT_ROOT'].'/databases/databases.php';
    include 'userFunctions/signUpFunctions.php';
    include $_SERVER['DOCUMENT_ROOT'].'/generalFunctions/generalFunctions.php';

    session_start();
    $username = $_SESSION['username'];
    //
    $credentials = ["firstName" => ''];
    $errors = ["firstNameErr" => ''];
    //
    check_firstName($credentials, $errors);
    
    if (check_errors($errors)) {

        $newFirstName = $credentials['firstName'];
        $sql = "UPDATE users SET firstName = ? WHERE username = ?";
        $stmt = mysqli_prepare($conn['main'], $sql);
        mysqli_stmt_bind_param($stmt, 'ss', $newFirstName, $username);
        mysqli_stmt_execute($stmt);
        //
        setcookie('accessToken', false, time() - 10, '/');    
        //
        $data = ['errorCnt' => 0];
        echo json_encode($data);

    } else
        sendErrors($errors);
?>