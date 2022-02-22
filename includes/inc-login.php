<?php

if (isset($_POST['submit'])) {

    $username   = $_POST['username'];
    $password   = $_POST['password'];
    // $role       = $_POST['role'];

    require_once 'inc-dbh.php';
    require_once 'inc-functions.php';

    if (emptyInputLogin($username, $password) !== false) {

        header("Location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $password);
} else {
    header('Location: ../login.php');
    exit();
}
