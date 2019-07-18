<?php
// Include config file
require_once "../../database/dbh.php";

$naam = mysqli_real_escape_string($conn, $_POST['naam']);
$voornaam = mysqli_real_escape_string($conn, $_POST['voornaam']);
$adres = mysqli_real_escape_string($conn, $_POST['adres']);
$mobiel = mysqli_real_escape_string($conn, $_POST['mobiel']);

$sql = "INSERT INTO klant(naam, voornaam, mobiel, adres) VALUES ('$naam', '$voornaam', '$mobiel', '$adres')";

if ($conn->query($sql) === TRUE) {
    header("Location: ../index.php");
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("location: ../dashboard/dashboard.php?addklant=success");
