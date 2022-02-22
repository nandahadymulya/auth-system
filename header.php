<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login System</title>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>

                        <?php

                        // if (isset($_SESSION['userId']) && $_SESSION['role'] == 'Developer') {
                        //     echo '
                        //         <li class="nav-item">
                        //             <a class="nav-link" href="#">Developer</a>
                        //         </li>
                        //     ';
                        // } elseif (isset($_SESSION['userId']) && $_SESSION['role'] == 'Admin') {
                        //     echo '
                        //         <li class="nav-item">
                        //             <a class="nav-link" href="#">Admin</a>
                        //         </li>';
                        // } else {
                        //     echo '
                        //         <li class="nav-item">
                        //             <a class="nav-link" href="signup.php">Signup</a>
                        //         </li>
                        //         <li class="nav-item">
                        //             <a class="nav-link" href="login.php">Login</a>
                        //         </li>
                        //     ';
                        // }
                        // 
                        // 

                        if (isset($_SESSION['role']) === 'Developer') {
                            echo '
                                <li class="nav-item">
                                    <a class="nav-link" href="includes/inc-logout.php">Developer</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="includes/inc-logout.php">Logout</a>
                                </li>
                            ';
                        } else if (isset($_SESSION['role']) == 'admin') {
                            echo '
                                <li class="nav-item">
                                    <a class="nav-link" href="includes/inc-logout.php">Admin</a>
                                </li>
                            ';
                        } else {
                        }


                        if (isset($_SESSION['userId'])) {
                            echo '
                                <li class="nav-item">
                                    <a class="nav-link" href="includes/inc-logout.php">Logout</a>
                                </li>
                            ';
                        } else {
                            echo '
                                <li class="nav-item">
                                    <a class="nav-link" href="signup.php">Signup</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="login.php">Login</a>
                                </li>
                            ';
                        }

                        ?>

                    </ul>
                </div>
            </div>
        </nav>
    </header>