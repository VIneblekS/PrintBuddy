<?php
    include $_SERVER['DOCUMENT_ROOT'].'/databases/databases.php';  
    include 'manualsFunctions/addManualFunctions.php';
 
    // Check for form submit
    if(isset($_POST['addManual'])) {

        // Add the manual to the database
        addManual($conn);
    }
?>