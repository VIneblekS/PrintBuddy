<?php
    include '../databases/databases.php';

    session_start();

    $printerName = filter_var($_POST['printerName'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = $_SESSION['username'];
    //
    $selectSql = "SELECT * FROM saves WHERE printerName = ? AND username = ?";
    $insertSql = "INSERT INTO saves (printerName, username) VALUES (?, ?)";
    $deleteSql = "DELETE FROM saves WHERE printerName = ? AND username = ?";
    $checkEmptySql = "SELECT * FROM saves WHERE username = ?";

    $stmt = mysqli_prepare($conn['main'], $selectSql);
    mysqli_stmt_bind_param($stmt, 'ss', $printerName, $username);
    mysqli_stmt_execute($stmt);
    $find = mysqli_stmt_get_result($stmt);
    $find = mysqli_fetch_assoc($find);

    if(!$find){

        $stmt = mysqli_prepare($conn['main'], $insertSql);
        mysqli_stmt_bind_param($stmt, 'ss', $printerName, $username);
        mysqli_stmt_execute($stmt);
    } else {
        
        $stmt = mysqli_prepare($conn['main'], $deleteSql);
        mysqli_stmt_bind_param($stmt, 'ss', $printerName, $username);
        mysqli_stmt_execute($stmt);
    }

    $stmt = mysqli_prepare($conn['main'], $checkEmptySql);
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $checkEmpty = mysqli_stmt_get_result($stmt);
    $checkEmpty = mysqli_fetch_all($checkEmpty, MYSQLI_ASSOC);

    if(!$checkEmpty)
        echo json_encode(null);

?>