<?php
session_start();

if (isset($_POST['klant_id'])) {
    $id = $_POST['klant_id'];

    $_SESSION['klant_id'] = $id;
    // Do whatever you want with the $YourName;
}
