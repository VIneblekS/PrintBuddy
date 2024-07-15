<?php
    include $_SERVER['DOCUMENT_ROOT'].'/databases/databases.php';
    include 'userFunctions/signUpFunctions.php';
    include 'userFunctions/logOutFunctions.php';
    include $_SERVER['DOCUMENT_ROOT'].'/generalFunctions/generalFunctions.php';

    session_start();
    $username = $_SESSION['username'];
    $passwordConfirm = $_POST['passwordConfirm'];
    //
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $userInfo = mysqli_query($conn['main'], $sql);
    $userInfo = mysqli_fetch_assoc($userInfo);

    if (password_verify($passwordConfirm, $userInfo['password'])) {

        $sql = "DELETE FROM users WHERE username = '$username'";
        mysqli_query($conn['main'], $sql);
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