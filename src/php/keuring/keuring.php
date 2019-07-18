<?php
date_default_timezone_set('America/Belem');

if (isset($_POST['submit'])) {
	include '../../database/dbh.php';

	$voertuigid = mysqli_real_escape_string($conn, $_POST["voertuig"]);

	$origDate = mysqli_real_escape_string($conn, $_POST["nieuw-keuring"]);
	$keuring = date('y-m-d', strtotime($origDate));

	$date = date('y-m-d H:i:s');

	$gebruikerid = "2";

	$klant_fetch = mysqli_query($conn, "SELECT * FROM voertuig INNER JOIN tarief ON voertuig.categorie=tarief.categorie WHERE voertuig_id = '$voertuigid' ");
	$klant_result = mysqli_fetch_array($klant_fetch);
	$klantid = $klant_result['klant_id'];
	$tarief = $klant_result['keuring'];

	$sql = "INSERT INTO keuring (klant_id, voertuig_id, gebruikers_id, datum, nieuw_vervaldatum, prijs) VALUES ('$klantid', '$voertuigid', '$gebruikerid', '$date', '$keuring', '$tarief');";
	mysqli_query($conn, $sql);

	$update_keuring = mysqli_query($conn, "UPDATE voertuig SET keuring_vervaldatum='$keuring' WHERE voertuig_id='$voertuigid'");

	header("Location: ../dashboard/dashboard.php");
}
