<?php
date_default_timezone_set('America/Belem');

	if (isset($_POST['submit'])) {
		include 'db.php';

		//VOOR TABEL VOERTUIG
		$merk = mysqli_real_escape_string($link, $_POST["merk"]);
		$model = mysqli_real_escape_string($link, $_POST["model"]);
		$kentekennummer = mysqli_real_escape_string($link, $_POST["kentekennummer"]);

		$insert_voertuig = mysqli_query($link, "INSERT INTO voertuig (merk, model, kenteken_nr) VALUES ('$merk', '$model', '$kentekennummer');");

		//VOOR TABEL WEGSLEEP
		$afstand = mysqli_real_escape_string($link, $_POST["afstand"]);
		$date = date('y-m-d H:i:s');
		$status = "binnen";
		$gebruikersid = "1";

		$voertuig_fetch = mysqli_query($link, "SELECT * FROM voertuig WHERE kenteken_nr = '$kentekennummer'");
		$voertuig_result = mysqli_fetch_array($voertuig_fetch);
		$voertuigid = $voertuig_result['voertuig_id'];

		$insert_wegsleep = mysqli_query($link, "INSERT INTO wegsleep (voertuig_id, gebruikers_id, wegsleep_datum, voertuig_status, afstand_km) VALUES ('$voertuigid', '$gebruikersid', '$date', '$status', '$afstand');");

		header('Location: ../index.php');

	}
?>