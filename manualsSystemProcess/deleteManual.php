<?php
    include $_SERVER['DOCUMENT_ROOT'].'/databases/databases.php';  
 
    // Check for form submit
    if(isset($_POST['deleteManual'])) {

        $manualId = $_POST['manualId'];
        //
        $sql = "SELECT * FROM manuals WHERE id = ?";
        $stmt = mysqli_prepare($conn['main'], $sql);
        mysqli_stmt_bind_param($stmt, 'i', $manualId);
        mysqli_stmt_execute($stmt);
        $manual = mysqli_stmt_get_result($stmt);
        $manual = mysqli_fetch_assoc($manual);

        unlink($_SERVER['DOCUMENT_ROOT'].'/manuals/uploads/'.str_replace(' ', '_', $manual['name']).'Image');
        unlink($_SERVER['DOCUMENT_ROOT'].'/manuals/uploads/'.str_replace(' ', '_', $manual['name']).'Manual');
        unlink($_SERVER['DOCUMENT_ROOT'].'/manuals/'.strtolower(str_replace(' ', '_', $manual['name'])).'.php');
        //
        $sql = "DELETE FROM manuals WHERE id = ?";
        $stmt = mysqli_prepare($conn['main'], $sql);
        mysqli_stmt_bind_param($stmt, 'i', $manualId);
        mysqli_stmt_execute($stmt);
    }
?>