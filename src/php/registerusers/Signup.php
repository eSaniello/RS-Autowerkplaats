<?php

include("../../database/dbh.php");

session_start();
if (isset($_POST["submit"])) {

  $naam = mysqli_real_escape_string($conn, $_POST['naam']);
  $voornaam = mysqli_real_escape_string($conn, $_POST['voornaam']);
  $gebruikersnaam = mysqli_real_escape_string($conn, $_POST['gb']);
  $wachtwoord = mysqli_real_escape_string($conn, $_POST['psw']);
  $rol = mysqli_real_escape_string($conn, $_POST['rol']);


  $sql = "INSERT INTO gebruiker
    (naam,
    voornaam,
    gebruikersnaam,
    wachtwoord,
    rol)

    VALUES (
  '$naam',
  '$voornaam',
  '$gebruikersnaam',
  '$wachtwoord',
  '$rol'
)";




  $checkdublicate_username = "SELECT gebruikersnaam FROM gebruiker WHERE gebruikersnaam = '$gebruikersnaam'";
  $resultaat = mysqli_query($conn, $checkdublicate_username);
  $count = mysqli_num_rows($resultaat);


  if ($count > 0) {
    echo ("<h1> De gebruikersnaam bestaat er al!! Gebruik een andere <h1>");
  } else {
    mysqli_query($conn, $sql);
    header("Location: Signup.php");
  }
}



?>

<html>

<head>
  <link rel="stylesheet" type="text/css" media="screen" href="Signup.css" />

</head>

<body>


  <center>
    <title>Gebruiker Registreren</title>
  </center>
  <form action="Signup.php" method="post">
    <div class="container">
      <center>
        <h1>Registreren</h1>
      </center>
      <center>
        <p>Vul dit formulier in om een account aan te maken.</p>
      </center>
      <!--<H4>VUL DIT FORMULIER IN OM EEN ACCOUNT AAN TE MAKEN.</H4>-->

      <div align="center">
        <center><label for="naam"><b>Naam</b></label></center>
        <input type="text" placeholder="Voer uw familienaam in" name="naam" required>

        <center><label for="voornaam"><b>Voornaam</b></label></center>
        <input type="text" placeholder="Voer uw Voornaam in" name="voornaam" required>

        <center><label for="gb"><b>Gebruikersnaam</b></label></center>
        <input type="text" placeholder="Voer uw Gebruikernaam in" name="gb" required>

        <center><label for="Wachtwoord"><b>Wachtwoord</b></label></center>
        <input type="password" placeholder="Voer uw wachtwoord in" name="psw" required>

        <div>
          <center><label for="rol"><b>Rol</b></label></center>
          <br>

          <select name="rol" type="text" placeholder="Voer uw rol in">
            <option value="ADMIN">Administratie</option>
            <option value="MONTEUR">Monteur</option>
          </select>

        </div>


        <hr>

        <!-- <a id="display" href=DisplayUsers.php><input type=button value='Klanten Overzicht'></a> -->
        <center> <button type="submit" name="submit" class="registerbtn">Registreren</button></center>
      </div>



      <!-- <div class="container signin">
        <p>Klik op inloggen als u al een account heeft <a href="#">Inloggen</a>.</p>
      </div> -->
  </form>

</body>

</html>