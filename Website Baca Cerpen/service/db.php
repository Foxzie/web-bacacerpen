<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db = "login_dan_signup";
$conn = mysqli_connect($hostname, $username, $password, $db);
if (!$conn) {
    echo "Connection failed";
    die();
}
