<?php 
    function insertSection($conn, &$sectionId) {
        $courseId = $_POST['courseId'];
        $sectionType = $_POST['type'];
        $sectionOrder = $_POST['sectionOrder'];
        //
        $sql = "INSERT INTO course_sections (courseId, sectionType, sectionOrder) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn['main'], $sql);
        mysqli_stmt_bind_param($stmt, 'isi', $courseId, $sectionType, $sectionOrder);
        mysqli_stmt_execute($stmt);
        //
        $sectionId = mysqli_insert_id($conn['main']); 
    }

    function insertSubtitleContent($conn, $sectionId) {
        $textContent = filter_var($_POST['subtitle'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $contentType = 'subtitle';
        //
        $sql = "INSERT INTO section_content (sectionId, contentType, content) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn['main'], $sql);
        mysqli_stmt_bind_param($stmt, 'iss', $sectionId, $contentType, $textContent);
        mysqli_stmt_execute($stmt);
    }

    function insertTextContent($conn, $sectionId) {
        $textContent = filter_var($_POST['text'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $contentType = 'text';
        //
        $sql = "INSERT INTO section_content (sectionId, contentType, content) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn['main'], $sql);
        mysqli_stmt_bind_param($stmt, 'iss', $sectionId, $contentType, $textContent);
        mysqli_stmt_execute($stmt);
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
        $sql = "INSERT INTO section_content (sectionId, contentType, content) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn['main'], $sql);
        mysqli_stmt_bind_param($stmt, 'iss', $sectionId, $contentType, $imageContent);
        mysqli_stmt_execute($stmt);
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
            $sql = "INSERT INTO section_content (sectionId, contentType, content) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($conn['main'], $sql);
            mysqli_stmt_bind_param($stmt, 'iss', $sectionId, $contentType, $imageContent);
            mysqli_stmt_execute($stmt);
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
            $textContent = filter_var($_POST['description'.$i], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $contentType = 'text';
            //
            $sql = "INSERT INTO section_content (sectionId, contentType, content) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($conn['main'], $sql);
            mysqli_stmt_bind_param($stmt, 'iss', $sectionId, $contentType, $textContent);
            mysqli_stmt_execute($stmt);
            //
            $contentType = 'image';
            $sql = "INSERT INTO section_content (sectionId, contentType, content) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($conn['main'], $sql);
            mysqli_stmt_bind_param($stmt, 'iss', $sectionId, $contentType, $imageContent);
            mysqli_stmt_execute($stmt);
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
        $textContent = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $contentType = 'text';
        //
        $sql = "INSERT INTO section_content (sectionId, contentType, content) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn['main'], $sql);
        mysqli_stmt_bind_param($stmt, 'iss', $sectionId, $contentType, $textContent);
        mysqli_stmt_execute($stmt);
        //
        $contentType = 'image';
        $sql = "INSERT INTO section_content (sectionId, contentType, content) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn['main'], $sql);
        mysqli_stmt_bind_param($stmt, 'iss', $sectionId, $contentType, $imageContent);
        mysqli_stmt_execute($stmt);      
    }

    function insertVideoContent($conn, $sectionId) {
        $video = filter_var($_POST['video'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if(strpos($video, 'youtu.be/') !== FALSE)
            $video = str_replace('youtu.be', 'youtube.com/embed', $video);
        else
            $video = str_replace('watch?v=', 'embed/', $video);

        $textContent = $video;
        $contentType = 'video';
        //
        $sql = "INSERT INTO section_content (sectionId, contentType, content) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn['main'], $sql);
        mysqli_stmt_bind_param($stmt, 'iss', $sectionId, $contentType, $textContent);
        mysqli_stmt_execute($stmt);
    }

?>