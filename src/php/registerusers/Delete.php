<?php
include('Signupdb.php');

$gebruikersnaam = $_GET['gebruikes_id'];


mysqli_query($conn, "DELETE FROM gebruiker WHERE gebruikes_id='" . $gebruikersnaam . "'");
mysqli_close($conn);

exit();


/*$gebruikersnaam=$_GET['gebruikersnaam'];
$query = "DELETE FROM gebruiker WHERE gebruikersnaam ='$gebruikersnaam'"; 
$result = mysqli_query($conn,$query);*/
