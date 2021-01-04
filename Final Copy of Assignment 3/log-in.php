<?php
    if (isset($_POST["submit"])) {
        $userID = $_POST["userID"];
        $pwd = $_POST["password"];

        require_once "dbConnection.php";
        require_once "functions.php";

        if (emptyInputLogIn($userID, $pwd) !== false) {
            header("location: log-in-page.php?error=emptyInput");
            exit();
        }

        $count = 0;
        $result = mysqli_query($conn, "SELECT * FROM Users WHERE `user_id`='$_POST[userID]' && pwd='$_POST[password]';");
        $count = mysqli_num_rows($result);

        if ($count == 0) {
            header("location: log-in-page.php?error=wrongLogin");
            exit();
        } else {
            session_start();
            $_SESSION["log_in_user"] = $_POST["userID"];
            header("location: insert-data-page.php");
            exit();
        }

    } else {
        header("location: log-in-page.php");
        exit();
    }
?>