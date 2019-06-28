<?php
   include("database.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $gebrn = mysqli_real_escape_string($conn,$_POST['gebruikersnaam']);
      $wachtw= mysqli_real_escape_string($conn,$_POST['wachtwoord']); 
      
      $sql = "SELECT gebruikers_id FROM gebruiker WHERE gebruikersnaam = '$gebrn' and wachtwoord = '$wachtw'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("gebruikersnaam");
         $_SESSION['login'] = $gebrn;
         
         header("location: home.html");
      }else {
		header("location: index.php?Your Login Name or Password is invalid");
      }
   }
?>