<?php
// Include config file
require_once "../../database/dbh.php";

$naam = mysqli_real_escape_string($link, $_POST['naam']);
$voornaam = mysqli_real_escape_string($link, $_POST['voornaam']);
$adres = mysqli_real_escape_string($link, $_POST['adres']);
$mobiel = mysqli_real_escape_string($link, $_POST['mobiel']);

$sql = "INSERT INTO klant(naam, voornaam, mobiel, adres) VALUES ('$naam', '$voornaam', '$mobiel', '$adres')";

if ($link->query($sql) === TRUE) {
    header("Location: ../index.php");
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}

$link->close();
