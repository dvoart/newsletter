<?php

$servername = "localhost";
$username = "dvo";
$password = "4Z0vs7ffXPV2cL";
$dbname = "dvoproject";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>