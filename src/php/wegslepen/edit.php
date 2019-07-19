<?php
require "../../database/dbh.php";

$VOERTUIGID = $MODEL = $MERK = $KENTEKENNUMMER = $CHASSISNUMMER = $BOUWJAAR = $CATEGORIE = $KEURING =
    $WEGSLEEPDATUM = $KLANTID = $AFHAALDATUM = $PRIJS = $STATUS = $AFSTAND =
    $NAAM = $VOORNAAM = $MOBIEL = $ADRES = "";

if (isset($_POST["id"])) {

    $wegsleep_id = $_POST["wegsleep_id"];
    $voertuig_id = $_POST["voertuig_id"];
    //$klant_id = $_POST["klant_id"];

    //WEGSLEEP GEGEVENS
    $datum = date('y-m-d H:i:s');

    //WEGSLEEP OPSLAAN QUERY
    $wegsleepQuery = mysqli_query($conn, "UPDATE wegsleep SET afhaal_datum = '$datum' WHERE wegsleep_id = $wegsleep_id");

    //KLANT GEGEVENS NEMEN
    $naam = mysqli_real_escape_string($conn, $_POST["naam"]);
    $voornaam = mysqli_real_escape_string($conn, $_POST["voornaam"]);
    $adres = mysqli_real_escape_string($conn, $_POST["adres"]);
    $mobiel = mysqli_real_escape_string($conn, $_POST["mobiel"]);

    //KLANT OPSLAAN QUERY
    $klantQuery = mysqli_query($conn, "INSERT INTO klant (naam, voornaam, adres, mobiel) VALUES ('$naam', '$voornaam', '$adres', '$mobiel);");

    //VOERTUIG GEGEVENS NEMEN
    $kenteken_nr = mysqli_real_escape_string($conn, $_POST["kentekennummer"]);
    $chassis_nr = mysqli_real_escape_string($conn, $_POST["chassisnummer"]);
    $categorie = mysqli_real_escape_string($conn, $_POST["categorie"]);
    $bouwjaar = mysqli_real_escape_string($conn, $_POST["bouwjaar"]);
    $keuring = mysqli_real_escape_string($conn, $_POST["keuring"]);

    //$sql = "UPDATE voertuigen SET status='$status' WHERE voertuig_id = $id ";

    //mysqli_query($conn, $klantQuery);
    header("location: betalen.php");
} else {

    if (isset($_GET["id"])) {

        //$id =  trim($_GET["id"]);

        $sql = "SELECT * FROM wegsleep INNER JOIN voertuig ON wegsleep.voertuig_id = voertuig.voertuig_id WHERE wegsleep_id = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            // Set parameters
            $param_id = trim($_GET["id"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {
                    /* Fetch result row as an associative array. Since the result set contains only one row, we dont need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrieve individual field value
                    //voertuig gegevens
                    $VOERTUIGID = $row["voertuig_id"];
                    $MODEL = $row["model"];
                    $MERK = $row["merk"];
                    $KENTEKENNUMMER = $row["kenteken_nr"];
                    $CHASSISNUMMER = $row["chassis_nr"];
                    $BOUWJAAR = $row["bouwjaar"];
                    $CATEGORIE = $row["categorie"];
                    $KEURING = $row["keuring_vervaldatum"];

                    //wegsleep gegevens
                    $WEGSLEEPID = $row["wegsleep_id"];
                    $WEGSLEEPDATUM = $row["wegsleep_datum"];
                    $KLANTID = $row["klant_id"];
                    $AFHAALDATUM = $row["afhaal_datum"];
                    $PRIJS = $row["prijs"];
                    $STATUS = $row["voertuig_status"];
                    $AFSTAND = $row["afstand_km"];
                } else {
                    // URL doesnt contain valid id.
                    //header("location: error.php");
                    echo "URL doesn't exists.";
                    exit();
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($conn);
    } else {
        // URL doesnt contain id parameter. Redirect to error page
        //header("location: error.php");
        echo "URL doesnt contain id.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>RS Verhuurbedrijf</title>
    <link rel="stylesheet" href="../../css/dashboard.css">

    <!-- materialize -->
    <link rel="stylesheet" href="../../lib/materialize/css/materialize.css">
    <script src="../../lib/materialize/js/materialize.js"></script>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Hover.css -->
    <link rel="stylesheet" href="../../lib/hover/hover-min.css">

    <!-- Google icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wijzigen</title>
</head>

<body>
    <h3 style="font-family: 'Anton', sans-serif; text-align: center;">Wijzigen</h3>
    <br><br>
    <div class="row, container">
        <div class="row">
            <form class="col s12" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <h6>Voertuig Gegevens</h6>
                <div class="row">
                    <div class="input-field col s4">
                        <input type="text" name="merk" class="validate" value="<?php echo ($MERK) ?>" disabled>
                        <label for="merk">Merk</label>
                    </div>
                    <div class="input-field col s4">
                        <input type="text" name="model" class="validate" value="<?php echo ($MODEL) ?>" disabled>
                        <label for="model">Model</label>
                    </div>
                    <div class="input-field col s4">
                        <input type="text" name="kentekennummer" class="validate" value="<?php echo ($KENTEKENNUMMER) ?>" disabled>
                        <label for="kentekennummer">Kentekennummer</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s4">
                        <input type="text" name="chassisnummer" class="validate" value="<?php echo ($CHASSISNUMMER) ?>" required>
                        <label for="chassisnummer">Chassisnummer</label>
                    </div>
                    <div class="input-field col s2">
                        <input type="number" name="bouwjaar" class="validate" value="<?php echo ($BOUWJAAR) ?>" required>
                        <label for="bouwjaar">Bouwjaar</label>
                    </div>
                    <div class="input-field col s2">
                        <!-- <input type="text" name="categorie" class="validate" value="<?php echo ($CATEGORIE) ?>" required> -->
                        <select name="categorie" required>
                            <option value="P1">P1</option>
                            <option value="P2">P2</option>
                            <option value="P3" selected>P3</option>
                            <option value="P4">P4</option>
                        </select>
                        <label for="categorie">Categorie</label>
                    </div>
                    <div class="input-field col s4">
                        <input type="text" name="keuring" class="datepicker" value="<?php echo ($KEURING) ?>" required>
                        <label for="keuring">Keuring Vervaldatum</label>
                    </div>
                </div>

                <br>
                <h6>Klant Gegevens</h6>
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" name="naam" class="validate" value="<?php echo ($NAAM) ?>" required>
                        <label for="naam">Naam</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" name="voornaam" class="validate" value="<?php echo ($VOORNAAM) ?>" required>
                        <label for="voornaam">Voornaam</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s8">
                        <input type="text" name="adres" class="validate" value="<?php echo ($ADRES) ?>" required>
                        <label for="adres">Adres</label>
                    </div>
                    <div class="input-field col s4">
                        <input type="number" name="mobiel" class="validate" value="<?php echo ($MOBIEL) ?>" required>
                        <label for="mobiel">Mobiel nr.</label>
                    </div>
                </div>

                <br>
                <!-- <h6>Te Betalen</h6> -->
                <div class="row">
                    <div class="input-field col s4">
                        <input type="number" name="voertuig_id" class="validate" value="<?php echo ($VOERTUIGID) ?>" hidden>
                        <!-- <label for="afstand">Afstand (Km)</label> -->
                    </div>
                    <div class="input-field col s4">
                        <input type="number" name="wegsleep_id" class="validate" value="<?php echo ($WEGSLEEPID) ?>" hidden>
                        <!-- <label for="prijs">Prijs (SRD)</label> -->
                    </div>
                </div>

                <button class="btn waves-effect waves-light, purple darken-4" type="submit" name="action">Betalen</button>
                <a href="../dashboard/dashboard.php">
                    <button class="btn waves-effect waves-light, purple darken-4" type="button">Terug</button>
                </a>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        M.AutoInit();
    </script>
</body>

</html>