<?php
    include $_SERVER['DOCUMENT_ROOT'].'/databases/databases.php';
    include 'userFunctions/signUpFunctions.php';
    include 'userFunctions/logOutFunctions.php';
    include $_SERVER['DOCUMENT_ROOT'].'/generalFunctions/generalFunctions.php';

    session_start();
    $username = $_SESSION['username'];
    $passwordConfirm = $_POST['passwordConfirm'];
    //
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn['main'], $sql);
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $userInfo = mysqli_stmt_get_result($stmt);
    $userInfo = mysqli_fetch_assoc($userInfo);

    if (password_verify($passwordConfirm, $userInfo['password'])) {

        $sql = "DELETE FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn['main'], $sql);
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);

        $sql = "DELETE FROM saves WHERE username = ?";
        $stmt = mysqli_prepare($conn['main'], $sql);
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        //
        logOut();
        //
        $data = ['errorCnt' => 0];
        echo json_encode($data);

    } else {
        $errors['passwordConfirmErr'] = 'Parola este incorectă.';
        sendErrors($errors);
    }
?>