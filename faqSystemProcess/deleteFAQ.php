<?php
    include $_SERVER['DOCUMENT_ROOT'].'/databases/databases.php';  

    // Check for form submit
    if(isset($_POST['deleteFAQ'])) {

        $faqId = $_POST['faqId'];
        echo "ok";
        //
        $sql = "DELETE FROM faqs WHERE id = '$faqId'";
        mysqli_query($conn['main'], $sql);
    }
?>