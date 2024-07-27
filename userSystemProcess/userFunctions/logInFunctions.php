<?php
    function check_password(&$credentials, &$errors) {
        if(empty($_POST['password']) || trim($_POST['password']) == '')
            $errors['passwordErr'] = 'Acest câmp este obligatoriu.';
        else
            $credentials['password'] = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    function check_usernameExists($conn, $username) {
		$sql = "SELECT * FROM users WHERE username = ?";
		$stmt = mysqli_prepare($conn['main'], $sql);
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
		$resultData = mysqli_fetch_assoc($resultData);
		//
        if ($resultData) return $resultData;
		return 0;
	}

	function check_emailExists($conn, $email) {
		$sql = "SELECT * FROM users WHERE email = ?";
		$stmt = mysqli_prepare($conn['main'], $sql);
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
		$resultData = mysqli_fetch_assoc($resultData);
        //
		if ($resultData) return $resultData;
		return 0;
	}

    function check_user($conn, &$credentials, &$errors) {
        if(empty($_POST['user']) || trim($_POST['user']) == '')
            $errors['userErr'] = 'Acest câmp este obligatoriu.';
        else {
            $credentials['user'] = trim($_POST['user']);
            $credentials['user'] = filter_var($credentials['user'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            //
            $user = $credentials['user'];
            if (!check_usernameExists($conn, $user) && !check_emailExists($conn, $user))
                $errors['userErr'] = 'Utilizator sau email invalid.';
        }    
    }

    function check_credentials($conn, &$credentials, &$errors) {
	    $username = check_usernameExists($conn, $credentials['user']);
        $email = check_emailExists($conn, $credentials['user']);
        //
        if (!$username && !$email)
            return 0; 
        //
        $user = ($username) ? $username : $email;
        $credentials['username'] = $user['username'];
        $hashedPassword = $user['password'];
		//
        if (!password_verify($credentials['password'], $hashedPassword))
            $errors['passwordErr'] = 'Date de conectare incorecte.';
	}

    function checkDeviceIdExists($conn, $id) {
        $sql = "SELECT * FROM tokens WHERE deviceId = ?";
        $stmt = mysqli_prepare($conn['main'], $sql);
        mysqli_stmt_bind_param($stmt, 's', $id);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
		$resultData = mysqli_fetch_assoc($resultData);
        //
        if($resultData) return 1;
        return 0;
    }

    function generateDeviceId($conn, &$credentials) {
        if ($credentials['deviceId'] == NULL) {
            do {
                $credentials['deviceId'] = bin2hex(random_bytes(64)).uniqid();
            } while(checkDeviceIdExists($conn, $credentials['deviceId']));
        }
    }

    function updateTokens($conn, $deviceId, $username) {
        if(checkDeviceIdExists($conn, $deviceId))
            $sql = "UPDATE tokens SET username = ? WHERE deviceId = ?";
        else
            $sql = "INSERT INTO tokens (username, deviceId) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn['main'], $sql);
        mysqli_stmt_bind_param($stmt, 'ss', $username, $id);
        mysqli_stmt_execute($stmt);   
    }

    function setSecureCookie($name, $value, $expire) {
        setcookie($name, $value, $expire, '/', $_SERVER['HTTP_HOST'], true, true);
    }

    function logIn($conn, $credentials) {
        generateDeviceId($conn, $credentials);
        //
        updateTokens($conn, $credentials['deviceId'], $credentials['username']);
        //
        setSecureCookie('refreshToken', true, $credentials['duration']);
        //
        $data = ['errorCnt' => 0, 'deviceId' => $credentials['deviceId']];
        echo json_encode($data);
    }

?>