<?php
    session_start();
    unset($_SESSION["log_in_user"]);
    session_destroy();

    header("location: log-in-page.php");
    exit;
?>