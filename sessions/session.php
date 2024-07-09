<?php
    include 'sessionFunctions.php';
    include $_SERVER['DOCUMENT_ROOT'].'/generalFunctions/generalFunctions.php';
    include $_SERVER['DOCUMENT_ROOT'].'/databases/databases.php';

    date_default_timezone_set("Europe/Bucharest");
    
    $refreshFrequency = 5*60;
   
    if (isset($_POST['deviceId']))
        $deviceId = json_decode($_POST['deviceId']);
    
        // Check if the user should be connected 
    if(checkIfConnected()) {   
        
        // Start the actual session
        startSession();
        
        // Check if the user has an access token or if it needs a refresh for security reasons
        if(!isset($_COOKIE['accessToken']) || time()-$_SESSION['lastRegeneration'] > $refreshFrequency)
            if (isset($deviceId))
            
                // Update the access token and session id
                updateAccessToken($conn, $deviceId, $refreshFrequency);

        // Store the session data
        storeSessionData($conn);
    } else

        // Destroy the remaining data 
        destroyData();

?>

