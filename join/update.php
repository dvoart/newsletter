<?php
session_start(); 

if(!isset($_POST['updateEmail'])) {
header("Location:index.php");exit;
}

require_once 'db.php';

// sql to update a record

$sql = "UPDATE newsletter SET userEmail='{$_POST['userEmail']}' WHERE id='{$_POST['id']}'";

if (mysqli_query($conn, $sql)) {
    $_SESSION['alert'] = "userUpdated";
    header("Location:index.php");
    } else {
  echo "Error updating record: " . mysqli_error($conn);
    }

?>