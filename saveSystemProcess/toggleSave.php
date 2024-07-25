<?php
    include '../databases/databases.php';

    session_start();

    $printerName = filter_var($_POST['printerName'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = $_SESSION['username'];
    //
    $selectSql = "SELECT * FROM saves WHERE printerName = '$printerName' AND username = '$username'";
    $insertSql = "INSERT INTO saves (printerName, username) VALUES ('$printerName', '$username')";
    $deleteSql = "DELETE FROM saves WHERE printerName = '$printerName' AND username = '$username'";
    $checkEmptySql = "SELECT * FROM saves WHERE username ='$username'";

    $find = mysqli_query($conn['main'], $selectSql);
    $find = mysqli_fetch_assoc($find);

    if(!$find)
        mysqli_query($conn['main'], $insertSql);
    else    
        mysqli_query($conn['main'], $deleteSql);

    $checkEmpty = mysqli_query($conn['main'], $checkEmptySql);
    $checkEmpty = mysqli_fetch_all($checkEmpty, MYSQLI_ASSOC);

    if(!$checkEmpty)
        echo json_encode(null);

?>