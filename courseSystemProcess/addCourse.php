<?php
    include $_SERVER['DOCUMENT_ROOT'].'/databases/databases.php';
   
    session_start();
    //
    $title = $_POST['courseTitle'];
    $description = $_POST['courseDescription'];
    $author = $_SESSION['username'];
    //
    $_FILES['previewImage']['name'] = 'previewImage_'.str_replace(' ', '_', $title);
    $imageName = $_FILES['previewImage']['name'];
    $imgTmpName = $_FILES['previewImage']['tmp_name'];
    
    move_uploaded_file($imgTmpName, $_SERVER['DOCUMENT_ROOT'].'/courses/uploads/'.$imageName);
    //
    $sql = "INSERT INTO courses (title, description, image, author) VALUES ('$title', '$description', '$imageName', '$author')";
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

