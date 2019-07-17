<!DOCTYPE html>
<?php
require_once "incl/config.php";
session_start();
?>
<html>

<head>
    <title>Autowerkplaats</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Anton|Merriweather|Open+Sans+Condensed:300|Roboto+Condensed" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="lib/materialize/css/materialize.css" media="screen,projection" />
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Import javascript file -->
    <script type="text/javascript" src="lib/materialize/js/materialize.min.js"></script>
    <script type="text/javascript" src="main.js"></script>
</head>

<body>
    <!-- REPARATIE MODAL -->
    <!-- zet alle inhoud van die verschillende steps van je registratie modal in divs met ids -->
    <div id="klant_kiezen_modal" class="modal" style="height: 600px; width: 1000px;">
        <div class="modal-content">
            <!-- Klant kiezen -->
            <form class="col s12" action="" method="post" id="klant_kiezen_form">
                <h3>Reparatie</h3>
                <br>
                <h5>Klant Kiezen</h5>
                <div class="row">
                    <div class="input-field col s6">
                        <select name="klant" id="klant" required>
                            <?php
                            $sql = "SELECT * FROM klant ORDER BY naam ASC";
                            $result = mysqli_query($link, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<option value=" . $row['klant_id'] . ">" . $row['naam'] . " " . $row['voornaam'] . "	| " . $row['mobiel'] . "    | " . $row['adres'] . "</option>";
                            }
                            ?>
                        </select>


                        <label>Klant</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <button class="blue darken-4 waves-effect waves-light btn modal-trigger" href="#nieuwe_klant_modal">Nieuwe
                            Klant</button>
                        <li class="blue darken-4 waves-effect waves-light btn modal-trigger" href="#voertuig_kiezen_modal" type="submit">Volgende</li>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="nieuwe_klant_modal" class="modal" style="height: 600px; width: 1000px;">
        <div class="modal-content">
            <!-- Nieuwe Klant -->
            <form id="nieuwe_klant_form" method="POST" action="add_registratie/addklant.php">
                <div class="row">
                    <h5>Klant Registreren</h5>
                    <div class="row">
                        <div class="input-field col s5">
                            <input id="naam" name="naam" type="text" class="validate" required />
                            <label for="naam">Naam</label>
                        </div>
                        <div class="input-field col s5 offset-s1">
                            <input id="voornaam" name="voornaam" type="text" class="validate" required />
                            <label for="voornaam">Voornaam</label>
                        </div>
                    </div>
                    <div class="row">

                        <div class="input-field col s5">
                            <input id="adres" name="adres" type="text" class="validate" required />
                            <label for="adres">Adres</label>
                        </div>
                        <div class="input-field col s5 offset-s1">
                            <input id="mobiel" name="mobiel" type="number" class="validate" />
                            <label for="mobiel">Mobiel</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s6">
                            <button class="blue darken-4 waves-effect waves-light btn" type="submit">Opslaan</button>
                            <a href="#!" class="modal-action modal-close waves-effect waves-red btn red lighten-1">Close</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="voertuig_kiezen_modal" class="modal" style="height: 600px; width: 1000px;">
        <div class="modal-content">
            <!-- voertuig kiezen -->
            <form class="col s12" action="" method="post" id="voertuig_kiezen_form">
                <h3>Reparatie</h3>
                <br>
                <h5>Voertuig Kiezen</h5>
                <div class="row">
                    <div class="row">
                        <div class="input-field col s6">
                            <select name="voertuig" required>
                                <option value disabled selected>kies een voertuig</option>
                                <?php


                                $sql = "SELECT * FROM voertuig ORDER BY merk ASC";
                                $result = mysqli_query($link, $sql);

                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<option value=" . $row['klant_id'] . ">" . $row['naam'] . " " . $row['voornaam'] . "	| " . $row['mobiel'] . "    | " . $row['adres'] . "</option>";
                                }
                                ?>
                            </select>

                            <label>Voertuig</label>
                        </div>
                    </div>

                    <div class="row">
                        <h6 class="input-field col s6">
                            <?php
                            $klant = mysqli_fetch_array($_POST['klant']);
                            // $klant = $_POST['klant'];
                            // $klant= mysqli_real_escape_string($link, $klant);
                            echo $klant;
                            ?>
                        </h6>

                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <button class="blue darken-4 waves-effect waves-light btn modal-trigger modal-close" href="#klant_kiezen_modal">Terug</button>

                        <button class="blue darken-4 waves-effect waves-light btn modal-trigger" href="#nieuw_voertuig_modal">Nieuw
                            Voertuig</button>

                        <li class="blue darken-4 waves-effect waves-light btn modal-trigger" href="#reparatie_beschrijving_modal" type="submit">Volgende
                        </li>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="nieuw_voertuig_modal" class="modal" style="height: 600px; width: 1000px;">
        <div class="modal-content">
            <!-- Nieuw Voertuig -->
            <form id="voertuigen_registratie_form" method="POST" action="add_registratie/addvoertuig.php">
                <div class="row">
                    <h5>Voertuig Registreren</h5>
                    <div class="row">
                        <div class="input-field col s5">
                            <input id="merk" name="merk" type="text" class="validate" required />
                            <label for="merk">Merk</label>
                        </div>
                        <div class="input-field col s5 offset-s1">
                            <input id="model" name="model" type="text" class="validate" required />
                            <label for="model">Model</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s5">
                            <input id="categorie" name="categorie" type="text" class="validate" />
                            <label for="categorie">Categorie</label>
                        </div>
                        <div class="input-field col s5 offset-s1">
                            <input id="bouwjaar" name="bouwjaar" type="text" class="validate" required />
                            <label for="bouwjaar">Bouwjaar</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s5">
                            <input id="kenteken_nr" name="kenteken_nr" type="text" class="validate" />
                            <label for="kenteken_nr">Kentekennummer</label>
                        </div>
                        <div class="input-field col s5 offset-s1">
                            <input id="chassis_nr" name="chassis_nr" type="text" class="validate" />
                            <label for="chassis_nr">Chassisnummer</label>
                        </div>

                    </div>

                    <div class="row">
                        <div class="input-field col s5">
                            <input id="keuring_vervaldatum" name="keuring_vervaldatum" type="text" class="datepicker validate" />
                            <label for="keuring_vervaldatum">Keuring Vervaldatum</label>
                        </div>
                        <!-- 
                        <div class="input-field col s6">
                            <input name="nieuw-keuring" type="text" class="datepicker" required>
                            <label for="nieuw-keuring">Nieuw keuring vervaldatum</label>
                        </div> -->

                    </div>


                    <div class="row">
                        <div class="input-field col s6">
                            <button class="blue darken-4 waves-effect waves-light btn" type="submit">Opslaan</button>
                            <button class="blue darken-4 waves-effect waves-light btn" type="submit" onclick="open_voertuig_kiezen_form()">Doorgaan
                                met reparatie</button>

                            <a href="#!" class="modal-action modal-close waves-effect waves-red btn red lighten-1">Afsluiten</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div id="reparatie_beschrijving_modal" class="modal" style="height: 600px; width: 1000px;">
        <div class="modal-content">
            <!-- Reparatie registreren -->
            <form class="col s12" action="" method="post" id="reparatie_beschrijving_form">
                <h3>Reparatie</h3>
                <br>
                <h5>Reparatie Registreren</h5>
                <div class="row">

                    <div class="input-field col s5">
                        <p>Klantid</p>
                        <input id="klantid" name="klantid" type="text" class="validate" readonly />

                    </div>

                    <div class="input-field col s5 offset-s1">
                        <p>Kentekennummer</p>
                        <input id="kentekennummer" name="kentekennummer" type="text" class="validate" readonly />

                    </div>

                </div>
                <div class="row">

                    <div class="input-field col s10">

                        <input id="omschrijving" name="omschrijving" type="text" class="validate" required />
                        <label for="omschrijving">Omschrijving</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s5">

                        <input id="prijs" name="prijs" type="number" class="validate" required />
                        <label for="prijs">Prijs</label>
                    </div>

                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <button class="blue darken-4 waves-effect waves-light btn modal-trigger modal-close" href="#voertuig_kiezen_modal">Terug</button>
                        <li class="blue darken-4 waves-effect waves-light btn modal-trigger" href="#!" type="submit">
                            Opslaan
                        </li>
                    </div>
                </div>
            </form>
        </div>
    </div>






    <!-- wrench moet naar reparatie modal -->
    <!-- FLOATING BUTTON -->
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large yellow darken-2">
            <i class="large material-icons">add</i>
        </a>
        <ul>
            <li><a class="btn-floating red darken-1 modal-trigger" href="#modal_wegsleep"><i class="material-icons"><i class="material-icons"><img src="img/tow-truck.png" style="height: 18px; width: 26px;"></i></a></li>
            <li><a class="btn-floating blue darken-4 modal-trigger" href="#modal2"><i class="material-icons"><img src="img/car-icon.png" style="height: 24px; width: 24px;"></i></a></li>
            <li><a class="btn-floating yellow darken-2 modal-trigger" href="#klant_kiezen_modal"><i class="material-icons"><img src="img/wrench.png" style="height: 24px; width: 24px;"></i></a>
            </li>
        </ul>
    </div>

    <!-- KEURING MODAL -->
    <div id="modal2" class="modal" style="height: 500px;">
        <div class="modal-content">
            <h3>Keuring Verlengen</h3>
            <br><br>
            <div class="row">
                <form class="col s12" action="" method="post">
                    <div class="row">
                        <div class="input-field col s6">
                            <select name="klanten" required>
                                <?php
                                include '../incl/db.php';
                                $sql = "SELECT * FROM voertuigen ORDER BY plaatnummer ASC";
                                $result = mysqli_query($link, $sql);

                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<option value=" . $row['voertuig_id'] . ">" . $row['merk'] . " " . $row['model'] . "	| " . $row['plaatnummer'] . "</option>";
                                }
                                ?>
                            </select>
                            <label>Voertuig</label>
                        </div>
                        <div class="input-field col s6">
                            <label>Nieuw keuring vervaldatum</label>
                            <input name="nieuw-keuring" type="text" class="datepicker" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <label>Totaal Bedrag</label>
                            <input type="number" name="bedrag" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <button class="blue darken-4 waves-effect waves-light btn modal-trigger" href="#modal1">Voertuig registreren</button>
                            <button class="blue darken-4 waves-effect waves-light btn" type="submit">Opslaan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script type="text/javascript">
        M.AutoInit();

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.fixed-action-btn');
            var instances = M.FloatingActionButton.init(elems, {
                direction: 'top',
                hoverEnabled: false
            });
        });
    </script>
</body>

</html>