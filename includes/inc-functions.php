<?php

function emptyInputSignup($username, $email, $password, $password2, $role)
{
    $result;
    if (empty($username) || empty($email) || empty($password) || empty($password2) || empty($role)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


function invalidUsername($username)
{
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email)
{
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function passwordMatch($password, $password2)
{
    $result;
    if ($password !== $password2) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function userExists($conn, $username, $email)
{
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn, $username, $email, $password, $role)
{
    $sql = "INSERT INTO users (username, email, password, role) VALUES ( ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $hashedPassword, $role);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../login.php?error=none");
    exit();
}

function emptyInputLogin($username, $password)
{
    $result;
    if (empty($username) || empty($password)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($con, $username, $password)
{
    $userExists = userExists($con, $username, $username);

    if ($userExists === false) {
        header('Location: ../login.php?error=wronglogin');
    }

    $passwordHash = $userExists['password'];
    $checkPassword = password_verify($password, $passwordHash);

    if ($checkPassword === false) {
        header('Location: ../login.php?error=wrongpassword');
        exit();
    } else if ($checkPassword === true) {
        session_start();
        $_SESSION['userId'] = $userExists['userId'];
        $_SESSION['username'] = $userExists['username'];
        $_SESSION['role'] = $userExists['role'];
        header('Location: ../index.php');
        exit();
    }
}
