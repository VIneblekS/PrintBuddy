<?php
    include $_SERVER['DOCUMENT_ROOT'].'/databases/databases.php';  
    include 'coursesFunctions/addSectionFunctions.php';

    $sectionId = null;
    
    // Insert the section into the section table
    insertSection($conn, $sectionId);
    
    // Insert the constent of the section in the table
    switch($_POST['type']) {
        
        case 'subtitle':
            insertSubtitleContent($conn, $sectionId);
            break;

        case 'text':
            insertTextContent($conn, $sectionId);
            break;
        
        case 'image':
            insertImageContent($conn, $sectionId);
            break;

        case 'tripleImage':
            insertTripleImageContent($conn, $sectionId);
            break;

        case 'tripleImageDescription':
            insertTripleImageDescriptionContent($conn, $sectionId);
            break;

        case 'textImage':
            insertTextImageContent($conn, $sectionId);
            break;

        case 'video':
            insertVideoContent($conn, $sectionId);
            break;

        
    }
?>