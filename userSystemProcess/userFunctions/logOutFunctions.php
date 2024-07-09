<?php
    function logOut() {
        session_unset();
        //
        setcookie(session_name(), false, time() - 10, '/');
        setcookie('refreshToken', false, time()-10, '/');
        setcookie('accessToken', false, time() - 10, '/');    
        //
        if (session_status() === 2)
            session_destroy();
    }
?>