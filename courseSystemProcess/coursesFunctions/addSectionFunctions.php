<?php 
    function insertSection($conn, &$sectionId) {
        $courseId = $_POST['courseId'];
        $sectionType = $_POST['type'];
        $sectionOrder = $_POST['sectionOrder'];
        //
        $sql = "INSERT INTO course_sections (courseId, sectionType, sectionOrder) VALUES ('$courseId', '$sectionType', '$sectionOrder')";
        mysqli_query($conn['main'], $sql);
        //
        $sectionId = mysqli_insert_id($conn['main']); 
    }

    function insertSubtitleContent($conn, $sectionId) {
        $textContent = $_POST['subtitle'];
        $contentType = 'subtitle';
        //
        $sql = "INSERT INTO section_content (sectionId, contentType, content) VALUES ('$sectionId', '$contentType', '$textContent')";
        mysqli_query($conn['main'], $sql);
    }

    function insertTextContent($conn, $sectionId) {
        $textContent = $_POST['text'];
        $contentType = 'text';
        //
        $sql = "INSERT INTO section_content (sectionId, contentType, content) VALUES ('$sectionId', '$contentType', '$textContent')";
        mysqli_query($conn['main'], $sql);
    }

    function insertImageContent($conn, $sectionId) {
        $_FILES['image']['name'] = 'imageSection'.$sectionId;
        $imageName = $_FILES['image']['name'];
        $imgTmpName = $_FILES['image']['tmp_name'];
        //
        move_uploaded_file($imgTmpName, $_SERVER['DOCUMENT_ROOT'].'/courses/uploads/'.$imageName);
        //
        $imageContent = $imageName;
        $contentType = 'image';
        //
        $sql = "INSERT INTO section_content (sectionId, contentType, content) VALUES ('$sectionId', '$contentType', '$imageContent')";
        mysqli_query($conn['main'], $sql);
    }

    function insertTripleImageContent($conn, $sectionId) {
        for ($i=1; $i<=3; $i++) {
            $_FILES['image'.$i]['name'] = 'image'.$i.'Section'.$sectionId;
            $imageName = $_FILES['image'.$i]['name'];
            $imgTmpName = $_FILES['image'.$i]['tmp_name'];
            //
            move_uploaded_file($imgTmpName, $_SERVER['DOCUMENT_ROOT'].'/courses/uploads/'.$imageName);
            //
            $imageContent = $imageName;
            $contentType = 'image';
            //
            $sql = "INSERT INTO section_content (sectionId, contentType, content) VALUES ('$sectionId', '$contentType', '$imageContent')";
            mysqli_query($conn['main'], $sql);
        }
    }

    function insertTripleImageDescriptionContent($conn, $sectionId) {
        for ($i=1; $i<=3; $i++) {
            $_FILES['image'.$i]['name'] = 'image'.$i.'Section'.$sectionId;
            $imageName = $_FILES['image'.$i]['name'];
            $imgTmpName = $_FILES['image'.$i]['tmp_name'];
            //
            move_uploaded_file($imgTmpName, $_SERVER['DOCUMENT_ROOT'].'/courses/uploads/'.$imageName);
            //
            $imageContent = $imageName;
            $textContent = $_POST['description'.$i];
            $contentType = 'text';
            //
            $sql = "INSERT INTO section_content (sectionId, contentType, content) VALUES ('$sectionId', '$contentType', '$textContent')";
            mysqli_query($conn['main'], $sql);
            //
            $contentType = 'image';
            $sql = "INSERT INTO section_content (sectionId, contentType, content) VALUES ('$sectionId', '$contentType', '$imageContent')";
            mysqli_query($conn['main'], $sql);
        }
    }

    function insertTextImageContent($conn, $sectionId) {
        $_FILES['image']['name'] = 'imageSection'.$sectionId;
        $imageName = $_FILES['image']['name'];
        $imgTmpName = $_FILES['image']['tmp_name'];
        //
        move_uploaded_file($imgTmpName, $_SERVER['DOCUMENT_ROOT'].'/courses/uploads/'.$imageName);
        //
        $imageContent = $imageName;
        $textContent = $_POST['description'];
        $contentType = 'text';
        //
        $sql = "INSERT INTO section_content (sectionId, contentType, content) VALUES ('$sectionId', '$contentType', '$textContent')";
        mysqli_query($conn['main'], $sql);
        //
        $contentType = 'image';
        $sql = "INSERT INTO section_content (sectionId, contentType, content) VALUES ('$sectionId', '$contentType', '$imageContent')";
        mysqli_query($conn['main'], $sql);            
    }

    function insertVideoContent($conn, $sectionId) {
        $video = $_POST['video'];

        if(strpos($video, 'youtu.be/') !== FALSE)
            $video = str_replace('youtu.be', 'youtube.com/embed', $video);
        else
            $video = str_replace('watch?v=', 'embed/', $video);

        $textContent = $video;
        $contentType = 'video';
        //
        $sql = "INSERT INTO section_content (sectionId, contentType, content) VALUES ('$sectionId', '$contentType', '$textContent')";
        mysqli_query($conn['main'], $sql);
    }

?>