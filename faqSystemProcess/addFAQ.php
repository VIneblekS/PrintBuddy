<?php
    include $_SERVER['DOCUMENT_ROOT'].'/databases/databases.php';  
 
    // Check for form submit
    if(isset($_POST['addFAQ'])) {

        session_start();
        //
        $question = filter_var($_POST['question'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $answer = filter_var($_POST['answer'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $author = $_SESSION['username'];
        //
        $sql = "INSERT INTO faqs (question, answer, author) VALUES ('$question', '$answer', '$author')";
        mysqli_query($conn['main'], $sql);
    }
?>