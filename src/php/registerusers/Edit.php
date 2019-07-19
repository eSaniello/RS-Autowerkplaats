<?php
include "Signupdb.php";
$id = $gebruikersnaam = "";

if (isset($_GET['Telefoonnummer'])) {
    $id = $_GET['Telefoonnummer'];
    $update = true;
    $record = mysqli_query($conn, "SELECT FROM gebruiker Where Telefoonnummer= '" . $id . "'");


    while ($n = mysqli_fetch_array($record)) {
        echo '  
            
            <tr>
            <td> ' . $n['naam'] . '</td>
            <td> ' . $n['gebruikersnaam'] . '</td>
            <td> ' . $n['Telefoonnummer'] . '</td>
            </tr>      
            ';
    }
    if (isset($_POST["Update"])) {


        $$gebrukers = mysqli_real_escape_string($conn, $_POST['Nieuwkmstand']);
        $n = "UPDATE gebruiker SET Telefoonnummer='$gebruikersnaam' WHERE Telefoonnummer=$id";


        mysqli_query($conn, $n);
    }

    echo "<p>Telefoonnummer wijzigen:</p>";
    echo "<form method='POST' action='Edit.php'>";
    echo "<input  type='text' name='Telefoonnummer' class='textInout' value=' $gebruikersnaam'>";

    echo "<input  type='text' name='id' class='textInout' value=' $id ' hidden>";

    echo "<input  type='submit' name='Update' value='Update'>";
    echo "</form>";
}
