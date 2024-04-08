<?php
session_start(); 

if(!isset($_POST['joinnewsletter'])) {
header("Location:index.php");
}

require_once 'db.php';

$sql = "INSERT INTO newsletter (userEmail)
VALUES ('{$_POST['userEmail']}')";


if (mysqli_query($conn, $sql)) {
$_SESSION['alert'] = "userAdded";
header("Location:index.php");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}



?>