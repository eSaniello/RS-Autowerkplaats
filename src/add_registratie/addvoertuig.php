<?php
// Include config file
require_once "../incl/config.php";

            $merk = mysqli_real_escape_string($link, $_POST['merk']);
            $model = mysqli_real_escape_string($link, $_POST['model']);
            $categorie = mysqli_real_escape_string($link, $_POST['categorie']);
            $kentekennummer = mysqli_real_escape_string($link, $_POST['kentekennummer']);
            $chassisnummer = mysqli_real_escape_string($link, $_POST['chassisnummer']);
            $bouwjaar = mysqli_real_escape_string($link, $_POST['bouwjaar']);
            
                $sql = "INSERT INTO tbl_voertuig(merk, model, categorie, kentekennummer, chassisnummer, bouwjaar)
            VALUES ('$merk', '$model', '$categorie', '$kentekennummer','$chassisnummer', '$bouwjaar')";

            if ($link->query($sql) === TRUE) {
                header("Location: ../index.php");
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $link->error;
            }

            $link->close();

?>