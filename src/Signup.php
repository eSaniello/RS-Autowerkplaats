<?php

include ("Signupdb.php");

session_start();
if(isset($_POST["submit"])){ 


$naam= mysqli_real_escape_string($conn,$_POST['naam']);
$voornaam = mysqli_real_escape_string($conn,$_POST['voornaam']);
$gebruikersnaam = mysqli_real_escape_string($conn,$_POST['gb']);
$wachtwoord = mysqli_real_escape_string($conn,$_POST['psw']);
$rol = mysqli_real_escape_string($conn,$_POST['rol']);



$sql= "INSERT INTO gebruiker
(
naam,
voornaam,
gebruikersnaam,
wachtwoord,
rol)
 
  VALUES (
 '$naam',
 '$voornaam',
 '$gebruikersnaam',
 '$wachtwoord',
 '$rol')";



$checkdublicate_username = "SELECT gebruikersnaam FROM gebruiker WHERE gebruikersnaam = '$gebruikersnaam'";
  $resultaat = mysqli_query($conn,$checkdublicate_username);
$count = mysqli_num_rows ($resultaat);

if($count > 0){
 

  function myFunction() {
    alert("<h1> De gebruikersnaam bestaat er al!! Gebruik een andere<h1>");
  }


  return false;

}



if ($gebruikersnaam == '' || empty($gebruikersnaam)){

  function myFunction() {
    alert( "<h1>Vuld de gebruikersnaam in!!<h1>");
  }

   return false;

   
  
 

}
   $checkdublicate_username = "SELECT wachtwoord FROM gebruiker WHERE wachtwoord = '$wachtwoord'";
  $resultaat = mysqli_query($conn,$checkdublicate_username);
$count = mysqli_num_rows ($resultaat);

if($count > 0){
  
  
  }

  return false;

}

mysqli_query($conn, $sql);  




?>

<html>
    <body>

            <link rel="stylesheet" type="text/css" media="screen" href="Signup.css" />

       <center> <title>Gebruiker Registreren</title></center>
<form action="Signup.php" method="post">
  <div class="container">
   <center> <h1>Registreren</h1></center>
    <center><p>Vul dit formulier in om een account aan te maken.</p></center>
    <!--<H4>VUL DIT FORMULIER IN OM EEN ACCOUNT AAN TE MAKEN.</H4>-->
  
    <div align="center">
   <center><label for="naam"><b>Naam</b></label></center>
    <input type="text" placeholder="Voer uw familienaam in" name="naam" required>

    <center><label for="voornaam"><b>Voornaam</b></label></center>
    <input type="text" placeholder="Voer uw Gebruikernaam in" name="voornaam" required>

    <center><label for="gb"><b>Gebruikersnaam</b></label></center>
    <input type="text" placeholder="Voer uw Gebruikernaam in" name="gb" required>

    <center><label for="Wachtwoord"><b>Wachtwoord</b></label></center>
    <input type="password" placeholder= "Voer uw wachtwoord in" name="psw" required>

     <div>
    <center><label for="rol"><b>Rol</b></label></center>
    <br>
    
    <select name="rol"  type="text" placeholder= "Voer uw rol">
    <option value="Admin">Administratie</option>
    <option value="Monteur">Monteur</option>
 </select> 

 
  
</div>


<hr>
   <!--- <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
    <hr>-->

    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <button onclick="myFunction()" type="submit" name="submit" class="registerbtn">Registreren</button>
  </div>

  <div class="container signin">
    <p>Klik op inloggen als u al een account heeft <a href="#">Inloggen</a>.</p>
  </div>
</form> 


</html>
</body>