<?php
require "../../database/dbh.php";

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RS Autowerkplaats</title>

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
</head>

<body style="background: #e5e5e5">
    <!-- MODALS -->

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
                        <select name="klant" id="klant" class="klant_id" required>
                            <?php
                            $sql = "SELECT * FROM klant ORDER BY naam ASC";
                            $result = mysqli_query($conn, $sql);
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
                        <li id="klant_session" class="blue darken-4 waves-effect waves-light btn modal-trigger" href="#voertuig_kiezen_modal" type="submit">Volgende</li>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="nieuwe_klant_modal" class="modal" style="height: 600px; width: 1000px;">
        <div class="modal-content">
            <!-- Nieuwe Klant -->
            <form id="nieuwe_klant_form" method="POST" action="../reparatie/addklant.php">
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
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<option value=" . $row['voertuig_id'] . ">" . $row['merk'] . " " . $row['model'] . "	| Bouwjaar: " . $row['bouwjaar'] . " | Kenteken nummer: " . $row['kenteken_nr'] . "</option>";
                                }
                                ?>
                            </select>

                            <label>Voertuig</label>
                        </div>
                    </div>

                    <div class="row">
                        <h6 class="input-field col s6">
                            <?php
                            // $klant = mysqli_fetch_array($_POST['klant']);
                            // $klant = $_POST['klant'];
                            // $klant = mysqli_real_escape_string($conn, $klant);
                            // echo $klant;
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
            <form id="voertuigen_registratie_form" method="POST" action="../reparatie/addvoertuig.php">
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


    <!-- KEURING MODAL -->
    <div id="modal_keuring" class="modal" style="height: 600px; width: 1000px;">
        <div class="modal-content">
            <h3>Keuring Verlengen</h3>
            <br><br>
            <div class="row">
                <form class="col s12" action="../keuring/keuring.php" method="post">
                    <div class="row">
                        <div class="input-field col s6">
                            <select name="voertuig" required>
                                <?php
                                $date = date('y-m-d');
                                $sql = "SELECT * FROM voertuig WHERE keuring_vervaldatum <= '$date' ORDER BY kenteken_nr ASC";
                                $result = mysqli_query($conn, $sql);

                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<option value=" . $row['voertuig_id'] . ">" . $row['merk'] . " " . $row['model'] . "	| " . $row['kenteken_nr'] . "    | " . $row['categorie'] . "</option>";
                                }
                                ?>
                            </select>
                            <label>Voertuig</label>
                        </div>
                        <div class="input-field col s6">
                            <input name="nieuw-keuring" type="text" class="datepicker" required>
                            <label for="nieuw-keuring">Nieuw keuring vervaldatum</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <!-- <button class="blue darken-4 waves-effect waves-light btn modal-trigger" href="#voertuig_kiezen_modal">Voertuig registreren</button> -->
                            <button class="blue darken-4 waves-effect waves-light btn" name="submit">Opslaan</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                <table class="tarief">
                    <thead>
                        <th> </th>
                        <th>P1</th>
                        <th>P2</th>
                        <th>P3</th>
                        <th>P4</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tarief</td>
                            <td>SRD 50</td>
                            <td>SRD 100</td>
                            <td>SRD 150</td>
                            <td>SRD 200</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- WEGSLEPEN MODAL -->
    <div id="modal_wegsleep" class="modal" style="height: 600px; width: 1000px;">
        <div class="modal-content">
            <h3>Wegslepen</h3>
            <br><br>
            <div class="row">
                <form class="col s12" action="../wegslepen/wegslepen.php" method="post">
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="text" name="merk" required>
                            <label for="merk">Merk</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="text" name="model" required>
                            <label for="model">Model</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <label for="kentekennummer">Kentekennummer</label>
                            <input type="text" name="kentekennummer">
                        </div>
                        <div class="input-field col s6">
                            <input type="number" name="afstand" required>
                            <label for="afstand">Afstand (Km)</label>

                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <button class="blue darken-4 waves-effect waves-light btn" name="submit">Opslaan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- END MODALS -->




    <div class="row">
        <nav class="z-depth-0 header">
            <div class="nav-wrapper">
                <img class="brand-logo logo" src='../../media/logo.png'>
                <ul id="nav-mobile" class="right">
                    <li><span class="company_name flow-text">RS AUTOWERKPLAATS</span></li>
                    <li><a href="../login/reset.php" class="btn waves-effect yellow darken-2" style="border-radius: 30%"><i class="material-icons">edit</i></a></li>
                    <li><a href="../registerusers/Signup.php" class="btn waves-effect yellow darken-2" style="border-radius: 30%"><i class="material-icons">settings</i></a></li>
                    <li><a href='../../../index.php' class="btn waves-effect yellow darken-2" style="border-radius: 30%"><i class="material-icons">person_pin</i></a></li>
                </ul>
            </div>
        </nav>


        <div class="col s12">
            <div class="container white _container">

                <div class="tab_container">
                    <div class="button_container">
                        <!-- reparatie_tab -->
                        <button class="reparatie_tab" onclick="ShowPanel(0, '#2a1fa2')">
                            <h3 class="tab_text_reparatie flow-text">Reparatie</h3>
                            <div>
                                <svg viewBox="-5 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M39.535 33.082L23.8779 17.4249C25.4264 13.4676 24.5661 8.82207 21.2971 5.553C17.856 2.11188 12.6943 1.42365 8.56492 3.31627L15.9633 10.7147L10.8017 15.8764L3.23118 8.47795C1.16651 12.6073 2.02679 17.769 5.46791 21.2101C8.73698 24.4792 13.3825 25.3395 17.3398 23.791L32.9969 39.4481C33.6851 40.1363 34.7175 40.1363 35.4057 39.4481L39.363 35.4908C40.2233 34.8025 40.2233 33.5982 39.535 33.082Z" fill="white" />
                                </svg>
                            </div>
                        </button>

                        <!-- wegsleep_tab -->
                        <button class="wegsleep_tab" onclick="ShowPanel(1, '#2a1fa2')">
                            <h3 class="tab_text_wegsleep flow-text">Wegsleep</h3>
                            <div>
                                <svg viewBox="-5 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0)">
                                        <path d="M34.625 4.625H26.7875C26 2.45 23.9375 0.875 21.5 0.875C19.0625 0.875 17 2.45 16.2125 4.625H8.375C6.3125 4.625 4.625 6.3125 4.625 8.375V34.625C4.625 36.6875 6.3125 38.375 8.375 38.375H34.625C36.6875 38.375 38.375 36.6875 38.375 34.625V8.375C38.375 6.3125 36.6875 4.625 34.625 4.625ZM21.5 4.625C22.5312 4.625 23.375 5.46875 23.375 6.5C23.375 7.53125 22.5312 8.375 21.5 8.375C20.4688 8.375 19.625 7.53125 19.625 6.5C19.625 5.46875 20.4688 4.625 21.5 4.625ZM25.25 30.875H12.125V27.125H25.25V30.875ZM30.875 23.375H12.125V19.625H30.875V23.375ZM30.875 15.875H12.125V12.125H30.875V15.875Z" fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0">
                                            <rect width="41.2935" height="41.2935" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                        </button>

                        <!-- keuring_tab -->
                        <button class="keuring_tab" onclick="ShowPanel(2, '#2a1fa2')">
                            <h3 class="tab_text_keuring flow-text">Keuring</h3>
                            <div>
                                <svg viewBox="-3 5 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0)">
                                        <path d="M37.1412 11.5256C36.7429 10.3504 35.6274 9.51382 34.3128 9.51382H12.4026C11.088 9.51382 9.99247 10.3504 9.57418 11.5256L5.43115 23.4567V39.3914C5.43115 40.4869 6.32748 41.3833 7.42299 41.3833H9.41483C10.5103 41.3833 11.4067 40.4869 11.4067 39.3914V37.3996H35.3087V39.3914C35.3087 40.4869 36.2051 41.3833 37.3006 41.3833H39.2924C40.3879 41.3833 41.2843 40.4869 41.2843 39.3914V23.4567L37.1412 11.5256ZM12.4026 31.4241C10.7494 31.4241 9.41483 30.0895 9.41483 28.4363C9.41483 26.7831 10.7494 25.4485 12.4026 25.4485C14.0558 25.4485 15.3904 26.7831 15.3904 28.4363C15.3904 30.0895 14.0558 31.4241 12.4026 31.4241ZM34.3128 31.4241C32.6596 31.4241 31.3251 30.0895 31.3251 28.4363C31.3251 26.7831 32.6596 25.4485 34.3128 25.4485C35.9661 25.4485 37.3006 26.7831 37.3006 28.4363C37.3006 30.0895 35.9661 31.4241 34.3128 31.4241ZM9.41483 21.4649L12.4026 12.5016H34.3128L37.3006 21.4649H9.41483Z" fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0">
                                            <rect width="47" height="47" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                        </button>
                    </div>

                    <!-- Reparatie tab content -->
                    <div class="tab_panel">
                        <nav>
                            <div class="nav-wrapper blue-grey lighten-3">
                                <div class="input-field">
                                    <input id="searchRep" type="search" onkeyup="searchFunctionRep()" placeholder="Zoeken..." required>
                                    <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                    <i class="material-icons">close</i>
                                </div>
                            </div>
                        </nav>

                        <div class="row"></div>

                        <script type="text/javascript">
                            function searchFunctionRep() {
                                // Declare variables 
                                var input, filter, table, tr, td, i, txtValue;
                                //ID VAN JE SEARCHBAR
                                input = document.getElementById("searchRep");
                                filter = input.value.toUpperCase();
                                //ID VAN JE REPARATIE TABEL
                                table = document.getElementById("reparatieTabel");
                                tr = table.getElementsByTagName("tr");

                                // Loop through all table rows, and hide those who don't match the search query
                                for (i = 0; i < tr.length; i++) {
                                    //merk
                                    td = tr[i].getElementsByTagName("td")[0];
                                    //model
                                    td2 = tr[i].getElementsByTagName("td")[1];
                                    //bouwjaar
                                    td3 = tr[i].getElementsByTagName("td")[2];
                                    //kentekennr
                                    td4 = tr[i].getElementsByTagName("td")[3];
                                    if (td) {
                                        txtValue = td.textContent || td.innerText;
                                        txtValue2 = td2.textContent || td2.innerText;
                                        txtValue3 = td3.textContent || td3.innerText;
                                        txtValue4 = td4.textContent || td4.innerText;
                                        if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1 || txtValue3.toUpperCase().indexOf(filter) > -1 || txtValue4.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].style.display = "";
                                        } else {
                                            tr[i].style.display = "none";
                                        }
                                    }
                                }
                            }
                        </script>

                        <!-- TABELLEN -->
                        <div class="row">
                            <div class="col s12">
                                <div class="card white">
                                    <div class="card-content">
                                        <span class="card-title">Reparaties</span>
                                        <table class="tarief" id="reparatieTabel">
                                            <thead>
                                                <th>Naam</th>
                                                <th>mobiel</th>
                                                <th>Model</th>
                                                <th>Bouwjaar</th>
                                                <th>Kenteken nr.</th>
                                                <th>Datum</th>
                                                <th>Omschrijving</th>
                                                <th>Prijs</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $reparatieQuery = mysqli_query($conn, "SELECT klant.naam, klant.mobiel, voertuig.model, voertuig.bouwjaar, 
                                                        voertuig.kenteken_nr, reparatie.datum, reparatie.omschrijving, reparatie.prijs from ((reparatie INNER JOIN klant ON 
                                                        reparatie.klant_id = klant.klant_id) INNER JOIN voertuig ON reparatie.voertuig_id = voertuig.voertuig_id)");

                                                while ($row = mysqli_fetch_array($reparatieQuery)) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row['naam'] . "</td>";
                                                    echo "<td>" . $row['mobiel'] . "</td>";
                                                    echo "<td>" . $row['model'] . "</td>";
                                                    echo "<td>" . $row['bouwjaar'] . "</td>";
                                                    echo "<td>" . $row['kenteken_nr'] . "</td>";
                                                    echo "<td>" . date("d-m-Y", strtotime($row['datum'])) . "</td>";
                                                    echo "<td>" . $row['omschrijving'] . "</td>";
                                                    echo "<td>" . "SRD " . $row['prijs'] . "</td>";
                                                    echo "</tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END TABELLEN -->

                        <!-- CHART -->
                        <div class="col s12">
                            <div class="card white" style="position: relative; height:65vh; width: 59vw">
                                <div class="card-content">
                                    <span class="card-title">Reparaties per dag</span>
                                    <div class="chart-container" style="position: relative; height:20vh; width:55vw">
                                        <canvas id="myChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            var ctx = document.getElementById('myChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: ['Maandag', 'Dinsdag', 'Woensdag', 'Donderdag', 'Vrijdag', 'Zaterdag'],
                                    datasets: [{
                                        label: '# Reparaties per dag',
                                        data: [1, 3, 2, 1, 2, 1],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(255, 206, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(255, 159, 64, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 159, 64, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    }
                                }
                            });
                        </script>
                        <!-- END CHART -->
                    </div>

                    <!-- Wegsleep tab content -->
                    <div class="tab_panel">
                        <nav>
                            <div class="nav-wrapper blue-grey lighten-3">
                                <form>
                                    <div class="input-field">
                                        <input id="searchWeg" type="search" onkeyup="searchFunctionWeg()" placeholder="Zoeken..." required>
                                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                        <i class="material-icons">close</i>
                                    </div>
                                </form>
                            </div>
                        </nav>

                        <div class="row"></div>

                        <script type="text/javascript">
                            function searchFunctionWeg() {
                                // Declare variables 
                                var input, filter, table, tr, td, i, txtValue;
                                //ID VAN JE SEARCHBAR
                                input = document.getElementById("searchWeg");
                                filter = input.value.toUpperCase();
                                //ID VAN JE REPARATIE TABEL
                                table = document.getElementById("wegsleepTabel");
                                tr = table.getElementsByTagName("tr");

                                // Loop through all table rows, and hide those who don't match the search query
                                for (i = 0; i < tr.length; i++) {
                                    //merk
                                    td = tr[i].getElementsByTagName("td")[0];
                                    //model
                                    td2 = tr[i].getElementsByTagName("td")[1];
                                    //bouwjaar
                                    td3 = tr[i].getElementsByTagName("td")[2];
                                    //kentekennr
                                    td4 = tr[i].getElementsByTagName("td")[3];
                                    if (td) {
                                        txtValue = td.textContent || td.innerText;
                                        txtValue2 = td2.textContent || td2.innerText;
                                        txtValue3 = td3.textContent || td3.innerText;
                                        txtValue4 = td4.textContent || td4.innerText;
                                        if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1 || txtValue3.toUpperCase().indexOf(filter) > -1 || txtValue4.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].style.display = "";
                                        } else {
                                            tr[i].style.display = "none";
                                        }
                                    }
                                }
                            }
                        </script>

                        <!-- TABBELLEN -->
                        <div class="row">
                            <div class="col s12">
                                <div class="card white">
                                    <div class="card-content">
                                        <span class="card-title">Weggesleepte auto's</span>
                                        <table class="wegsleepTabel" id="wegsleepTabel">
                                            <thead>
                                                <th>Merk</th>
                                                <th>Model</th>
                                                <th>Kenteken nr.</th>
                                                <th>Wegsleep Datum</th>
                                                <th>Bewerken</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $wegsleepQuery = mysqli_query($conn, "SELECT * from wegsleep INNER JOIN voertuig ON wegsleep.voertuig_id = voertuig.voertuig_id ORDER BY model ASC");

                                                while ($row = mysqli_fetch_array($wegsleepQuery)) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row['merk'] . "</td>";
                                                    echo "<td>" . $row['model'] . "</td>";
                                                    echo "<td>" . $row['kenteken_nr'] . "</td>";
                                                    // echo "<td>" . $row['wegsleep_id'] . "</td>";

                                                    $wsdate = $row['wegsleep_datum'];

                                                    echo "<td>" . date("d-m-Y", strtotime($wsdate)) . "</td>";
                                                    echo "<td>";
                                                    //check the link
                                                    echo "<a href='../wegslepen/wegsleep_edit.php?id=" . $row['wegsleep_id'] . "' title='Edit' data-toggle='tooltip'><i class='small material-icons' style='color: #6a1b9a;'>edit</i></a>";
                                                    echo "</td>";
                                                    echo "</tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- END TABELLEN -->

                        <!-- CHART -->
                        <div class="col s12">
                            <div class="card white" style="position: relative; height:65vh; width: 59vw">
                                <div class="card-content">
                                    <span class="card-title">Wegsleep</span>
                                    <div class="chart-container" style="position: relative; height:20vh; width:55vw">
                                        <canvas id="myChart2"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            var ctx = document.getElementById('myChart2').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'doughnut',
                                data: {
                                    datasets: [{
                                        data: [4, 1],
                                        borderColor: ['rgba(220,20,60,1)', 'rgba(65, 105, 225, 1)'],
                                        backgroundColor: ['rgba(220,20,60,1)', 'rgba(65, 105, 225, 1)'],
                                    }],

                                    // These labels appear in the legend and in the tooltips when hovering different arcs
                                    labels: [
                                        'Binnen',
                                        'Buiten',
                                    ]
                                },
                                options: {
                                    title: {
                                        display: true,
                                        text: "Wegsleep autos overzicht"
                                    }
                                }
                            });
                        </script>
                        <!-- END CHART -->
                    </div>

                    <!-- Keuring Tab content -->
                    <div class="tab_panel">
                        <nav>
                            <div class="nav-wrapper blue-grey lighten-3">
                                <form>
                                    <div class="input-field">
                                        <input id="searchKeur" type="search" required onkeyup="searchFunctionKeur()" placeholder="Zoeken...">
                                        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                        <i class="material-icons">close</i>
                                    </div>
                                </form>
                            </div>
                        </nav>

                        <div class="row"></div>

                        <script type="text/javascript">
                            function searchFunctionKeur() {
                                // Declare variables 
                                var input, filter, table, tr, td, i, txtValue;
                                //ID VAN JE SEARCHBAR
                                input = document.getElementById("searchKeur");
                                filter = input.value.toUpperCase();
                                //ID VAN JE REPARATIE TABEL
                                table = document.getElementById("keuringTabel");
                                tr = table.getElementsByTagName("tr");

                                // Loop through all table rows, and hide those who don't match the search query
                                for (i = 0; i < tr.length; i++) {
                                    //merk
                                    td = tr[i].getElementsByTagName("td")[0];
                                    //model
                                    td2 = tr[i].getElementsByTagName("td")[1];
                                    //bouwjaar
                                    td3 = tr[i].getElementsByTagName("td")[2];
                                    //kentekennr
                                    td4 = tr[i].getElementsByTagName("td")[3];
                                    if (td) {
                                        txtValue = td.textContent || td.innerText;
                                        txtValue2 = td2.textContent || td2.innerText;
                                        txtValue3 = td3.textContent || td3.innerText;
                                        txtValue4 = td4.textContent || td4.innerText;
                                        if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1 || txtValue3.toUpperCase().indexOf(filter) > -1 || txtValue4.toUpperCase().indexOf(filter) > -1) {
                                            tr[i].style.display = "";
                                        } else {
                                            tr[i].style.display = "none";
                                        }
                                    }
                                }
                            }
                        </script>

                        <!-- TABELLEN -->
                        <div class="row">
                            <div class="col s12">
                                <div class="card white">
                                    <div class="card-content">
                                        <span class="card-title">Keuringen</span>
                                        <table class="tarief" id="keuringTabel">
                                            <thead>
                                                <th>Naam</th>
                                                <th>mobiel</th>
                                                <th>Model</th>
                                                <th>Bouwjaar</th>
                                                <th>Kenteken nr.</th>
                                                <th>Nieuw vervaldatum</th>
                                                <th>Prijs</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $keuring_query = mysqli_query($conn, "SELECT klant.naam, klant.mobiel, voertuig.model, voertuig.bouwjaar, 
                                                        voertuig.kenteken_nr, keuring.nieuw_vervaldatum, keuring.prijs from ((keuring INNER JOIN klant ON 
                                                        keuring.klant_id = klant.klant_id) INNER JOIN voertuig ON keuring.voertuig_id = voertuig.voertuig_id)");

                                                while ($row = mysqli_fetch_array($keuring_query)) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row['naam'] . "</td>";
                                                    echo "<td>" . $row['mobiel'] . "</td>";
                                                    echo "<td>" . $row['model'] . "</td>";
                                                    echo "<td>" . $row['bouwjaar'] . "</td>";
                                                    echo "<td>" . $row['kenteken_nr'] . "</td>";
                                                    echo "<td>" . date("d-m-Y", strtotime($row['nieuw_vervaldatum'])) . "</td>";
                                                    echo "<td>" . "SRD " . $row['prijs'] . "</td>";
                                                    echo "</tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END TABELLEN -->

                        <!-- CHART -->
                        <div class="col s12">
                            <div class="card white" style="position: relative; height:65vh; width: 59vw">
                                <div class="card-content">
                                    <span class="card-title">Keuring</span>
                                    <div class="chart-container" style="position: relative; height:20vh; width:55vw">
                                        <canvas id="myChart3"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            var ctx = document.getElementById('myChart3').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'doughnut',
                                data: {
                                    datasets: [{
                                        data: [1, 3],
                                        borderColor: ['rgba(220,20,60,1)', 'rgba(65, 105, 225, 1)'],
                                        backgroundColor: ['rgba(220,20,60,1)', 'rgba(65, 105, 225, 1)'],
                                    }],

                                    // These labels appear in the legend and in the tooltips when hovering different arcs
                                    labels: [
                                        'Vervallen',
                                        'Geldig',
                                    ]
                                },
                                options: {
                                    title: {
                                        display: true,
                                        text: "Vervallen keuringen"
                                    }
                                }
                            });
                        </script>
                        <!-- END CHART -->

                    </div>

                </div>
            </div>

            <div class="fixed-action-btn">
                <a class="btn-floating btn-large red">
                    <i class="large material-icons">add</i>
                </a>
                <ul>
                    <li><a class="btn-floating red darken-1 modal-trigger tooltipped" href="#modal_wegsleep" data-position="left" data-tooltip="Wegsleep">
                            <i class="material-icons">
                                <img src="../../media/tow-truck.png" style="height: 18px; width: 26px;">
                            </i>
                        </a>
                    </li>
                    <li><a class="btn-floating blue darken-4 modal-trigger tooltipped" href="#modal_keuring" data-position="left" data-tooltip="Keuring"><i class="material-icons">directions_car</i></a></li>
                    <li><a class="btn-floating yellow darken-1 modal-trigger tooltipped" href="#klant_kiezen_modal" data-position="left" data-tooltip="Reparatie"><i class="material-icons">build</i></a></li>
                </ul>
            </div>

        </div>
    </div>
    </div>

    <script src="../../js/tabs.js"></script>

    <script>
        M.AutoInit();

        //reparatie tab hover
        $(function() {
            $('.reparatie_tab').hover(function() {
                $('.tab_text_reparatie').css('color', 'white');
            }, function() {
                if ($('.reparatie_tab').css('backgroundColor') == "rgb(42, 31, 162)") {
                    $('.tab_text_reparatie').css('color', 'white');
                } else {
                    $('.tab_text_reparatie').css('color', '#676767');
                }
            });
        });

        //wegsleep tab hover
        $(function() {
            $('.wegsleep_tab').hover(function() {
                $('.tab_text_wegsleep').css('color', 'white');
            }, function() {
                if ($('.wegsleep_tab').css('backgroundColor') == "rgb(42, 31, 162)") {
                    $('.tab_text_wegsleep').css('color', 'white');
                } else {
                    $('.tab_text_wegsleep').css('color', '#676767');
                }
            });
        });

        //keuring tab hover
        $(function() {
            $('.keuring_tab').hover(function() {
                $('.tab_text_keuring').css('color', 'white');
            }, function() {
                if ($('.keuring_tab').css('backgroundColor') == "rgb(42, 31, 162)") {
                    $('.tab_text_keuring').css('color', 'white');
                } else {
                    $('.tab_text_keuring').css('color', '#676767');
                }
            });
        });


        $(document).ready(function() {
            $(document).on('click', '#klant_session', function() {
                alert('est123');
                //e.preventDefault();
                //var data = $(this).serialize();

                let id = $(".klant_id :selected").val();
                $.ajax({
                    type: 'POST',
                    url: '../reparatie/klant_session.php',
                    data: ({
                        klant_id: id
                    }),
                    cache: false,
                    success: function(data) {

                        // $('#results').html(data);
                    }
                })
                return false;
            });
        });
    </script>
</body>

</html>