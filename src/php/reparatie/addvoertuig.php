<?php
// Include config file
require_once "../../database/dbh.php";

$merk = mysqli_real_escape_string($conn, $_POST['merk']);
$model = mysqli_real_escape_string($conn, $_POST['model']);
$categorie = mysqli_real_escape_string($conn, $_POST['categorie']);
$bouwjaar = mysqli_real_escape_string($conn, $_POST['bouwjaar']);
$kenteken_nr = mysqli_real_escape_string($conn, $_POST['kenteken_nr']);
$chassis_nr = mysqli_real_escape_string($conn, $_POST['chassis_nr']);
$keuring_vervaldatum = mysqli_real_escape_string($conn, $_POST['keuring_vervaldatum']);
// $klantnaam = mysqli_real_escape_string($conn, $_POST['naam']);
// $klantvoornaam = mysqli_real_escape_string($conn, $_POST['voornaam']);

// $klant_id = query("SELECT klant_id FROM klant where naam == $klantnaam && voornaam == $klantvoornaam");


$sql = "INSERT INTO voertuig(
    merk, 
    model, 
    bouwjaar, 
    kenteken_nr, 
    chassis_nr, 
    categorie, 
    keuring_vervaldatum
) 
VALUES (
    '$merk', 
    '$model', 
    '$bouwjaar', 
    '$kenteken_nr',
    '$chassis_nr', 
    '$categorie', 
    '$keuring_vervaldatum'
)";

if ($conn->query($sql) === TRUE) {
    header("Location: ../dashboard/dashboard.php");
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
