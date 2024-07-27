<?php
    function check_userExists($conn, $credentials) {
        $inputUsername = $credentials['username'];
        $sql = "SELECT * FROM users WHERE username = ?";
        //
        $stmt = mysqli_prepare($conn['main'], $sql);
        mysqli_stmt_bind_param($stmt, 's', $inputUsername);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        $resultData = mysqli_fetch_assoc($resultData);
        //
        if($resultData) return 1;
        return 0;
    }

    function check_username($conn, &$credentials, &$errors) {
        if(empty($_POST['username']) || trim($_POST['username']) == '')
            $errors['usernameErr'] = 'Acest câmp este obligatoriu.';
        else {
            $credentials['username'] = trim($_POST['username']);
            $credentials['username'] = filter_var($credentials['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            //
            if(!preg_match("/^[a-zA-Z0-9_.]+$/", $credentials['username']))
                $errors['usernameErr'] = 'Sunt permise doar litere, cifre, puncte și _.';
            elseif (check_userExists($conn, $credentials))
                $errors['usernameErr'] = 'Acest nume de utilizator este deja folosit.';
            elseif (strlen($credentials['username']) > 20)
                $errors['usernameErr'] = 'Număr maxim de caradctere depășit.';
        }    
    }

    function check_emailExists($conn, $credentials) {
        $inputEmail = $credentials['email'];
        $sql = "SELECT * FROM users WHERE email = ?";
        //
        $stmt = mysqli_prepare($conn['main'], $sql);
        mysqli_stmt_bind_param($stmt, 's', $inputEmail);
        mysqli_stmt_execute($stmt);
        $resultData = mysqli_stmt_get_result($stmt);
        $resultData = mysqli_fetch_assoc($resultData);
        //
        if($resultData) return 1;
        return 0;
    }

    function check_email($conn, &$credentials, &$errors) {
        if(empty($_POST['email']) || trim($_POST['email']) == '')
            $errors['emailErr'] = 'Acest câmp este obligatoriu.';
        else {
            $credentials['email'] = trim($_POST['email']);
            $credentials['email'] = filter_var($credentials['email'], FILTER_SANITIZE_EMAIL);
            list($user, $domain) = (strpos($credentials['email'], '@')) ? explode('@', $credentials['email']) : null;
            //
            if(empty($domain) || !checkdnsrr($domain) || !preg_match("/^[a-zA-Z0-9_.-]+$/", $user))
                $errors['emailErr'] = 'Acest email este invalid.';
            elseif (check_emailExists($conn, $credentials))
                $errors['emailErr'] = 'Acest email este deja folosit.';
        }    
    }

    function check_firstName(&$credentials, &$errors) {
        if(empty($_POST['firstName']) || trim($_POST['firstName']) == '')
            $errors['firstNameErr'] = 'Acest câmp este obligatoriu.';
        else {
            $credentials['firstName'] = trim($_POST['firstName']);
            $credentials['firstName'] = filter_var($credentials['firstName'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            //
            if (strlen($credentials['firstName']) > 30)
                $errors['firstNameErr'] = 'Număr maxim de caractere depășit.';
            elseif(!preg_match("/^[a-zA-Z ]+$/", $credentials['firstName']))
                $errors['firstNameErr'] = 'Sunt permise doar litere și spații.';
        }    
    }

    function check_lastName(&$credentials, &$errors) {
        if(empty($_POST['lastName']) || trim($_POST['lastName']) == '')
            $errors['lastNameErr'] = 'Acest câmp este obligatoriu.';
        else {
            $credentials['lastName'] = trim($_POST['lastName']);
            $credentials['lastName'] = filter_var($credentials['lastName'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            //
            if (strlen($credentials['lastName']) > 30)
                $errors['lastNameErr'] = 'Număr maxim de caractere depășit.';
            elseif(!preg_match("/^[a-zA-Z ]+$/", $credentials['lastName']))
                $errors['lastNameErr'] = 'Sunt permise doar litere și spații.';
        }    
    }

    function check_password(&$credentials, &$errors) {
        if(empty($_POST['password']) || trim($_POST['password']) == '')
            $errors['passwordErr'] = 'Acest câmp este obligatoriu.';
        else {
            $credentials['password'] = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            //
            if(strlen($credentials['password']) < 8)
                $errors['passwordErr'] = 'Parola trebuie să conțină minim 8 caractere.';
            elseif(preg_match("/^[a-zA-z0-9]+$/", $credentials['password']))
                $errors['passwordErr'] = 'Parola trebuie să conțină cel puțin un caracter special.';
            elseif(strpos($credentials['password'], ' ') != FALSE)
                $errors['passwordErr'] = 'Spațiile nu sunt permise în parolă.';    
        }
        //
        if(empty($_POST['passwordConfirm']) || trim($_POST['passwordConfirm']) == '')
            $errors['passwordConfirmErr'] = 'Acest câmp este obligatoriu.';
        else
            $credentials['passwordConfirm'] = filter_var($_POST['passwordConfirm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        //
        if(empty($errors['passwordErr']) && empty($errors['passwordConfirmErr']))
            if($credentials['password'] != $credentials['passwordConfirm'])
                $errors['passwordErr'] = $errors['passwordConfirmErr'] = 'Parolele nu se potrivesc.';
            else
                $credentials['password'] = password_hash($credentials['password'], PASSWORD_DEFAULT);
    }

    function check_newPassword($conn, $username, &$credentials, &$errors) {
        if(empty($_POST['password']) || trim($_POST['password']) == '')
            $errors['passwordErr'] = 'Acest câmp este obligatoriu.';
        else {
            $credentials['password'] = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            //
            if(strlen($credentials['password']) < 8)
                $errors['passwordErr'] = 'Parola trebuie să conțină minim 8 caractere.';
            elseif(preg_match("/^[a-zA-z0-9]+$/", $credentials['password']))
                $errors['passwordErr'] = 'Parola trebuie să conțină cel puțin un caracter special.';
            elseif(strpos($credentials['password'], ' ') != FALSE)
                $errors['passwordErr'] = 'Spațiile nu sunt permise în parolă.';    
        }
        //
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn['main'], $sql);
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        $userInfo = mysqli_stmt_get_result($stmt);
        $userInfo = mysqli_fetch_assoc($userInfo);
        //
        if(empty($errors['passwordErr']))
            if (!password_verify($credentials['password'], $userInfo['password']))
                $credentials['password'] = password_hash($credentials['password'], PASSWORD_DEFAULT);
            else
                $errors['passwordErr'] = 'Paeola nouă nu poate fi identică cu cea actuală.';
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
        mysqli_stmt_bind_param($stmt, 'ss', $username, $deviceId);
        mysqli_stmt_execute($stmt);   
    }

    function setSecureCookie($name, $value, $expire) {
        setcookie($name, $value, $expire, '/', $_SERVER['HTTP_HOST'], true, true);
    }

    function signUp($conn, $credentials) {
        $username = $credentials['username'];
        $firstName = $credentials['firstName'];
        $lastName = $credentials['lastName'];
        $email = $credentials['email'];
        $password = $credentials['password'];
        generateDeviceId($conn, $credentials);
        //
        $sql = "INSERT INTO users (username, firstName, lastName, email, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn['main'], $sql);
        mysqli_stmt_bind_param($stmt, 'sssss', $username, $firstName, $lastName, $email, $password);
        mysqli_stmt_execute($stmt);
        //
        updateTokens($conn, $credentials['deviceId'], $username);
        //
        setSecureCookie('refreshToken', true, null);
        //
        $data = ['errorCnt' => 0, 'deviceId' => $credentials['deviceId']];
        echo json_encode($data);
    }
?>