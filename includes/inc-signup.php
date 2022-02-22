<?php

if (isset($_POST['submit'])) {

    $username   = $_POST['username'];
    $email      = $_POST['email'];
    $password   = $_POST['password'];
    $password2  = $_POST['password2'];
    $role       = $_POST['role'];


    require_once 'inc-dbh.php';
    require_once 'inc-functions.php';


    if (emptyInputSignup($username, $email, $password, $password2, $role) !== false) {

        header("Location: ../signup.php?error=emptyinput");
        exit();
    }

    if (invalidUsername($username) !== false) {

        header("Location: ../signup.php?error=invalidusername");
        exit();
    }

    if (invalidEmail($email) !== false) {

        header("Location: ../signup.php?error=invalidemail");
        exit();
    }

    if (passwordMatch($password, $password2) !== false) {

        header("Location: ../signup.php?error=passwordcheck");
        exit();
    }

    if (userExists($conn, $username, $email) !== false) {

        header("Location: ../signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $username, $email, $password, $role);

    header("Location: login.php");
} else {

    header("Location: ../signup.php");
    exit();
}
