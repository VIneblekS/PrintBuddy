<?php
    function check_password(&$credentials, &$errors) {
        if(empty($_POST['password']) || trim($_POST['password']) == '')
            $errors['passwordErr'] = 'Acest câmp este obligatoriu.';
        else
            $credentials['password'] = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    function check_usernameExists($conn, $username) {
		$sql = "SELECT * FROM users WHERE username = '$username'";
		$resultData = mysqli_query($conn['main'], $sql);
		$resultData = mysqli_fetch_assoc($resultData);
		//
        if ($resultData) return $resultData;
		return 0;
	}

	function check_emailExists($conn, $email) {
		$sql = "SELECT * FROM users WHERE email = '$email'";
		$resultData = mysqli_query($conn['main'], $sql);
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
        $sql = "SELECT * FROM tokens WHERE deviceId = '$id'";
        $resultData = mysqli_query($conn['main'], $sql);
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
        $sql = "SELECT * FROM tokens WHERE deviceId = '$deviceId'";
        $resultData = mysqli_query($conn['main'], $sql);
        $resultData = mysqli_fetch_assoc($resultData);
        //
        if($resultData)
            $sql = "UPDATE tokens SET username = '$username' WHERE deviceId = '$deviceId'";
        else
            $sql = "INSERT INTO tokens (deviceId, username) VALUES ('$deviceId', '$username')";
        mysqli_query($conn['main'], $sql);    
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