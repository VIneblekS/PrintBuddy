<?php
    function redirectToIndex() {
        header("Location: ../index.php");
        exit;
    }

    function checkIfConnected() {
        if(isset($_COOKIE['refreshToken']))
            return 1;
        return 0;
    }

    function check_errors($errors) {
        foreach($errors as $error)
            if (!empty($error))
                return 0;
        return 1;
    }

    function sendErrors($errors) {
        $errorCnt = 0;
        foreach ($errors as $error)
            if (!empty($error))
                $errorCnt++;
        //
        $data = ['errorCnt' => $errorCnt, 'errors' => $errors];
        echo json_encode($data);
    }

?>