<?php
// Include config file
require_once "../incl/config.php";

            $merk = mysqli_real_escape_string($link, $_POST['merk']);
            $model = mysqli_real_escape_string($link, $_POST['model']);
            $categorie = mysqli_real_escape_string($link, $_POST['categorie']);
            $bouwjaar = mysqli_real_escape_string($link, $_POST['bouwjaar']);
            $kentekennummer = mysqli_real_escape_string($link, $_POST['kentekennummer']);
            $chassisnummer = mysqli_real_escape_string($link, $_POST['chassisnummer']);
            $keuring_vervaldatum = mysqli_real_escape_string($link, $_POST['keuring_vervaldatum']);
            
            
                $sql = "INSERT INTO voertuig(merk, model, bouwjaar, kenteken_nr, chassis_nr, categorie, keuring_vervaldatum)
            VALUES ('$merk', '$model', '$bouwjaar', '$kenteken_nr','$chassis_nr', '$categorie', $keuring_vervaldatum)";

            if ($link->query($sql) === TRUE) {
                header("Location: ../index.php");
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $link->error;
            }

            $link->close();

?>