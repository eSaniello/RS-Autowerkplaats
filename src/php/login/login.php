<?php
include("../../database/dbh.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   $gebruikers_naam = mysqli_real_escape_string($conn, $_POST['gebruikersnaam']);
   $wachtwoord = mysqli_real_escape_string($conn, $_POST['wachtwoord']);

   $sql = "SELECT gebruikers_id FROM gebruiker WHERE gebruikersnaam = '$gebruikers_naam' and wachtwoord = '$wachtwoord'";
   $result = mysqli_query($conn, $sql);
   $row = mysqli_fetch_array($result, MYSQLI_ASSOC);


   $count = mysqli_num_rows($result);

   if ($count == 1) {
      $_SESSION['gebruikers_id'] = $row['gebruikers_id'];

      header("location: ../dashboard/dashboard.php?login=success");
   } else {
      header("location: ../../../index.php?creds=invalid");
   }
}
