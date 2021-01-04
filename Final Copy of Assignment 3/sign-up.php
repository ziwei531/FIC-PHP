<?php
    if (isset($_POST["submit"])) {
        $full_name = $_POST["name"];
        $userID = $_POST["userID"];
        $email = $_POST["email"];
        $pwd = $_POST["password"];
        $confpwd = $_POST["confpassword"];

        require_once "dbConnection.php";
        require_once "functions.php";

        if (emptyInputSignUp($full_name, $userID, $email, $pwd, $confpwd) !== false) {
            header("location: sign-up-page.php?error=emptyInput");
            exit();
        }

        if (invalidFullName($full_name) !== false) {
            header("location: sign-up-page.php?error=invalidName");
            exit();
        }

        if (invalidUserID($userID) !== false) {
            header("location: sign-up-page.php?error=invalidUserID");
            exit();
        }

        if (invalidEmail($email) !== false) {
            header("location: sign-up-page.php?error=invalidEmail");
            exit();
        }

        if (invalidPassword($pwd) !== false) {
            header("location: sign-up-page.php?error=invalidPassword");
            exit();
        }

        if (pwdMatch($pwd, $confpwd) !== false) {
            header("location: sign-up-page.php?error=confirmPasswordAndPasswordDontMatch");
            exit();
        }

        mysqli_query($conn, "INSERT INTO Users(full_name, `user_id`, email, pwd) VALUES ('$_POST[name]', '$_POST[userID]', '$_POST[email]', '$_POST[password]');");
        header("location: sign-up-page.php?error=none");
        exit();

    } else {
        header("location: sign-up-page.php");
        exit();
    }
?>