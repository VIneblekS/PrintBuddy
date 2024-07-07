<?php
    include '../databases/databases.php';

    session_start();

    $printerName = $_POST['printerName'];
    $username = $_SESSION['username'];
    //
    $selectSql = "SELECT * FROM saves WHERE printerName = '$printerName' AND username = '$username'";
    $insertSql = "INSERT INTO saves (printerName, username) VALUES ('$printerName', '$username')";
    $deleteSql = "DELETE FROM saves WHERE printerName = '$printerName' AND username = '$username'";

    if(!mysqli_fetch_assoc(mysqli_query($conn['main'], $selectSql)))
        mysqli_query($conn['main'], $insertSql);
    else    
        mysqli_query($conn['main'], $deleteSql);

?>