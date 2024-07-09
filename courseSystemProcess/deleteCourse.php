<?php
     include $_SERVER['DOCUMENT_ROOT'].'/databases/databases.php';  

    // Check for form submit
    if(isset($_POST['deleteCourse'])) {

        $courseId = $_POST['courseId'];
        //
        $sql = "SELECT * FROM courses WHERE id = '$courseId'";
        $course = mysqli_query($conn['main'], $sql);
        $course = mysqli_fetch_assoc($course);

        unlink($_SERVER['DOCUMENT_ROOT'].'/courses/uploads/'.$course['image']);
        unlink($_SERVER['DOCUMENT_ROOT'].'/courses/'.strtolower(str_replace(' ', '_', $course['title'])).'.php');
        //
        $sql = "DELETE FROM courses WHERE id = '$courseId'";
        mysqli_query($conn['main'], $sql);
        //
        $sql = "SELECT * FROM course_sections WHERE courseId = '$courseId'";
        $sections = mysqli_query($conn['main'], $sql);
        $sections = mysqli_fetch_all($sections, MYSQLI_ASSOC);

        foreach($sections as $section) {
            
            $sectionId = $section['id'];
            
            $sql = "SELECT * FROM section_content WHERE sectionId = '$sectionId'";
            $contents = mysqli_query($conn['main'], $sql);
            $contents = mysqli_fetch_all($contents, MYSQLI_ASSOC);
            
            foreach($contents as $content) {

                if($content['contentType'] == 'image')
                    unlink($_SERVER['DOCUMENT_ROOT'].'/courses/uploads/'.$content['content']);
            }
            
            $sql = "DELETE FROM section_content WHERE sectionId = '$sectionId'";
            mysqli_query($conn['main'], $sql);
        
        }
        
        $sql = "DELETE FROM course_sections WHERE courseId = '$courseId'";
        mysqli_query($conn['main'], $sql);
    }
?>