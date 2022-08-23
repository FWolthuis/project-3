<?php

include "gameDatabaseConnect.php";

$ID = NULL;
$email = $_POST["regEmail"];
$wachtwoord = sha1 ($_POST["regWachtwoord"]);
$username = $_POST["regUsername"];

$sql = "INSERT INTO user (email, wachtwoord, username) VALUES ('" . $email . "', '" . $wachtwoord . "', '" . $username . "')";

//$mysqli->query($sql);

header('location: index.php');
?>