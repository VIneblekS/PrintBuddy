<?php
    include $_SERVER['DOCUMENT_ROOT'].'/databases/databases.php';
   
    session_start();
    //
    $title = $_POST['courseTitle'];
    $description = $_POST['courseDescription'];
    $author = $_SESSION['username'];
    //
    $sql = "INSERT INTO courses (title, description, author) VALUES ('$title', '$description', '$author')";
    mysqli_query($conn['main'], $sql);
    $courseId = mysqli_insert_id($conn['main']); 
    //
    $temeplate = '../courses/temeplate.txt';

    $temeplateText = file_get_contents($temeplate);

	$temeplateText = str_replace("COURSE ID", $courseId, $temeplateText);
	
	$newCourse = '../courses/'.strtolower(str_replace(' ', '_', $title)).'.php';

	copy($temeplate, $newCourse);

	file_put_contents($newCourse, $temeplateText);
    //
    echo json_encode($courseId);
?>

