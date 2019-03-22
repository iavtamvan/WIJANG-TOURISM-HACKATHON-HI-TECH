<?php
    session_start();
    
    setcookie("PHPSESSID", null, time()-60, "/");

    session_destroy();

    header("Location: index.php");
?>