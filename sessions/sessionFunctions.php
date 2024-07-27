<?php
    function setStartParams() {
        ini_set('session.cookie_secure', '1');       
        ini_set('session.cookie_httponly', '1');     
        ini_set('session.use_strict_mode', '1');     
        ini_set('session.use_only_cookies', '1'); 
        ini_set('session.cookie_samesite', 'Strict');
    }

    function startSession() {
        setStartParams();
        session_start();
    }
    
    function setSecureCookie($name, $value, $expire) {
        setcookie($name, $value, $expire, '/', $_SERVER['HTTP_HOST'], true, true);
    }

    function updateAccessToken($conn, $deviceId, $refreshFrequency) {
        session_regenerate_id(true);
        $currentId = session_id();
        //
        $sql = "UPDATE tokens SET token = ? WHERE deviceId = ?";
        $stmt = mysqli_prepare($conn['main'], $sql);
        mysqli_stmt_bind_param($stmt, 'ss', $currentId, $deviceId);
        mysqli_stmt_execute($stmt);
        //
        setSecureCookie('accessToken', $currentId, time()+$refreshFrequency);
        //
        $_SESSION['lastRegeneration'] = time();
    }

    function storeSessionData($conn) {
        $currentId = session_id();
        //
        $sql = "SELECT * FROM users INNER JOIN tokens ON (users.username = tokens.username AND tokens.token = ?)";
        $stmt = mysqli_prepare($conn['main'], $sql);
        mysqli_stmt_bind_param($stmt, 's', $currentId);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
		$resultData = mysqli_fetch_assoc($resultData);
        //
        $_SESSION['username'] = $resultData['username'];
        $_SESSION['firstName'] = $resultData['firstName'];
        $_SESSION['lastName'] = $resultData['lastName'];
        $_SESSION['email'] = $resultData['email'];
        $_SESSION['admin'] = $resultData['admin'];
    }

    function destroyData() { 
        session_unset();
        //
        setcookie(session_name(), false, time() - 10, '/');
        setcookie('accessToken', false, time() - 10, '/');    
        //
        if (session_status() === 2)
            session_destroy();
    }

?>