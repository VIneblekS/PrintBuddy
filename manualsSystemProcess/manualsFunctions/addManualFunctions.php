<?php
    function addManual($conn) {
        
        session_start();
        //
        $name = $_POST['name'];
        $description = $_POST['description'];
        $author = $_SESSION['username'];
        $video = $_POST['video'];

        if(strpos($video, 'youtu.be/') !== FALSE)
            $video = str_replace('youtu.be', 'youtube.com/embed', $video);
        else
            $video = str_replace('watch?v=', 'embed/', $video);
        
        //
        $_FILES['image']['name'] = str_replace(' ', '_', $name).'Image';
        $imageName = $_FILES['image']['name'];
        $imgTmpName = $_FILES['image']['tmp_name'];
        
        move_uploaded_file($imgTmpName, $_SERVER['DOCUMENT_ROOT'].'/manuals/uploads/'.$imageName);
        //
        $_FILES['document']['name'] = str_replace(' ', '_', $name).'Manual';
        $documentName = $_FILES['document']['name'];
        $documentTmpName = $_FILES['document']['tmp_name'];
        
        move_uploaded_file($documentTmpName, $_SERVER['DOCUMENT_ROOT'].'/manuals/uploads/'.$documentName);
        //
        $sql = "INSERT INTO manuals (name, description, image, video, document, author) VALUES ('$name', '$description', '$imageName', '$video', '$documentName', '$author')";
        mysqli_query($conn['main'], $sql);
        $manualId = mysqli_insert_id($conn['main']); 
        //
        $temeplate = '../manuals/temeplate.txt';

        $temeplateText = file_get_contents($temeplate);

	    $temeplateText = str_replace("MANUAL ID", $manualId, $temeplateText);
	
	    $newManual = '../manuals/'.strtolower(str_replace(' ', '_', $name)).'.php';

	    copy($temeplate, $newManual);

	    file_put_contents($newManual, $temeplateText);
    }
?>