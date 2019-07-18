<?php
date_default_timezone_set('America/Belem');

if (isset($_POST['submit'])) {
	include 'db.php';

	$voertuigid = mysqli_real_escape_string($link, $_POST["voertuig"]);

	$origDate = mysqli_real_escape_string($link, $_POST["nieuw-keuring"]);
	$keuring = date('y-m-d', strtotime($origDate));

	$date = date('y-m-d H:i:s');

	$gebruikerid = "2";

	$klant_fetch = mysqli_query($link, "SELECT * FROM voertuig INNER JOIN tarief ON voertuig.categorie=tarief.categorie WHERE voertuig_id = '$voertuigid' ");
	$klant_result = mysqli_fetch_array($klant_fetch);
	$klantid = $klant_result['klant_id'];
	$tarief = $klant_result['keuring'];

	$sql = "INSERT INTO keuring (klant_id, voertuig_id, gebruikers_id, datum, nieuw_vervaldatum, prijs) VALUES ('$klantid', '$voertuigid', '$gebruikerid', '$date', '$keuring', '$tarief');";
	mysqli_query($link, $sql);

	$update_keuring = mysqli_query($link, "UPDATE voertuig SET keuring_vervaldatum='$keuring' WHERE voertuig_id='$voertuigid'");

	header("Location: ../index.php");
}
?>