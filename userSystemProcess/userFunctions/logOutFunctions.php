<?php
    function logOut() {
        setcookie('refreshToken', false, time()-10, '/');
    }
?>