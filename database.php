<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rs_autowerkplaats";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
