<?php
    include $_SERVER['DOCUMENT_ROOT'].'/databases/databases.php';
    include 'userFunctions/signUpFunctions.php';
    include $_SERVER['DOCUMENT_ROOT'].'/generalFunctions/generalFunctions.php';

    session_start();
    $username = $_SESSION['username'];
    //
    $credentials = ["password" => ''];
    $errors = ["password" => ''];
    //
    check_newPassword($conn, $username, $credentials, $errors);
    
    if (check_errors($errors)) {

        $newPassword = $credentials['password'];
        $sql = "UPDATE users SET password = ? WHERE username = ?";
        $stmt = mysqli_prepare($conn['main'], $sql);
        mysqli_stmt_bind_param($stmt, 'ss', $newPassword, $username);
        mysqli_stmt_execute($stmt);
        //
        setcookie('accessToken', false, time() - 10, '/');    
        //
        $data = ['errorCnt' => 0];
        echo json_encode($data);

    } else
        sendErrors($errors);
?>