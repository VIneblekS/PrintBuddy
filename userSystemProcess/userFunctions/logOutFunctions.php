<?php
    function logOut() {
        session_unset();
        //
        setcookie(session_name(), false, time() - 10, '/', $_SERVER['HTTP_HOST']);
        setcookie('refreshToken', false, time()-10, '/', $_SERVER['HTTP_HOST']);
        setcookie('accessToken', false, time() - 10, '/', $_SERVER['HTTP_HOST']);    
        //
        if (session_status() === 2)
            session_destroy();
    }
?>