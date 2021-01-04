<?php
    //Sign Up Page Functions
    function emptyInputSignUp($full_name, $userID, $email, $pwd, $confpwd) {
        $result;
        if (empty($full_name) || empty($userID) || empty($email) || empty($pwd) || empty($confpwd)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    function invalidFullName($full_name) {
        $result;
        if (!preg_match("/^([a-zA-Z][a-zA-Z ]*){2,30}$/", $full_name)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    function invalidUserID($userID) {
        $result;
        if (!preg_match("/^[0-9]*$/", $userID)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    function invalidEmail($email) {
        $result;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    function invalidPassword($pwd) {
        $result;
        if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/", $pwd)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    function pwdMatch($pwd, $confpwd) {
        $result;
        if ($pwd !== $confpwd) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    } 

    //Log In Page Functions
    function emptyInputLogIn($userID, $pwd) {
        $result;
        if (empty($userID) || empty($pwd)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
?>