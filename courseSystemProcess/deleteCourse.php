<?php
     include $_SERVER['DOCUMENT_ROOT'].'/databases/databases.php';  

    // Check for form submit
    if(isset($_POST['deleteCourse'])) {

        $courseId = $_POST['courseId'];
        //
        $sql = "SELECT * FROM courses WHERE id = ?";
        $stmt = mysqli_prepare($conn['main'], $sql);
        mysqli_stmt_bind_param($stmt, 'i', $courseId);
        mysqli_stmt_execute($stmt);
        $course = mysqli_stmt_get_result($stmt);
        $course = mysqli_fetch_assoc($course);

        unlink($_SERVER['DOCUMENT_ROOT'].'/courses/uploads/'.$course['image']);
        unlink($_SERVER['DOCUMENT_ROOT'].'/courses/'.strtolower(str_replace(' ', '_', $course['title'])).'.php');
        //
        $sql = "DELETE FROM courses WHERE id = ?";
        $stmt = mysqli_prepare($conn['main'], $sql);
        mysqli_stmt_bind_param($stmt, 'i', $courseId);
        mysqli_stmt_execute($stmt);
        //
        $sql = "SELECT * FROM course_sections WHERE courseId = ?";
        $stmt = mysqli_prepare($conn['main'], $sql);
        mysqli_stmt_bind_param($stmt, 'i', $courseId);
        mysqli_stmt_execute($stmt);
        $sections = mysqli_stmt_get_result($stmt);
        $sections = mysqli_fetch_all($sections, MYSQLI_ASSOC);

        foreach($sections as $section) {
            
            $sectionId = $section['id'];
            
            $sql = "SELECT * FROM section_content WHERE sectionId = ?";
            $stmt = mysqli_prepare($conn['main'], $sql);
            mysqli_stmt_bind_param($stmt, 'i', $sectionId);
            mysqli_stmt_execute($stmt);
            $contents = mysqli_stmt_get_result($stmt);
            $contents = mysqli_fetch_all($contents, MYSQLI_ASSOC);
            
            foreach($contents as $content) {

                if($content['contentType'] == 'image')
                    unlink($_SERVER['DOCUMENT_ROOT'].'/courses/uploads/'.$content['content']);
            }
            
            $sql = "DELETE FROM section_content WHERE sectionId = ?";
            $stmt = mysqli_prepare($conn['main'], $sql);
            mysqli_stmt_bind_param($stmt, 'i', $sectionId);
            mysqli_stmt_execute($stmt);
        
        }
        
        $sql = "DELETE FROM course_sections WHERE courseId = ?";
        $stmt = mysqli_prepare($conn['main'], $sql);
        mysqli_stmt_bind_param($stmt, 'i', $courseId);
        mysqli_stmt_execute($stmt);
    }
?>