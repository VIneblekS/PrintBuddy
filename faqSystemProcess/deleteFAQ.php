<?php
    include $_SERVER['DOCUMENT_ROOT'].'/databases/databases.php';  

    // Check for form submit
    if(isset($_POST['deleteFAQ'])) {

        $faqId = $_POST['faqId'];
        //
        $sql = "DELETE FROM faqs WHERE id = ?";
        $stmt = mysqli_prepare($conn['main'], $sql);
        mysqli_stmt_bind_param($stmt, 'i', $faqId);
        mysqli_stmt_execute($stmt);
    }
?>