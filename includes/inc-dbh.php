<?php

$serverName = 'localhost';
$DBusername = 'root';
$DBpassword = 'root';
$DBname     = 'loginsystem';

$conn = mysqli_connect($serverName, $DBusername, $DBpassword, $DBname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
