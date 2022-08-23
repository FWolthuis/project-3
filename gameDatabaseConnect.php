<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_3";

$con = mysqli_connect($servername, $username, $password, $dbname);

if(mysqli_connect_errno()) {
  die("failed to connect to database");
}

?>