<?php
session_start(); 

if(!isset($_POST['deleteEmail'])) {
header("Location:index.php");exit;
}

require_once 'db.php';

// sql to delete a record
$sql = "DELETE FROM newsletter WHERE id='{$_POST['id']}'";

if (mysqli_query($conn, $sql)) {
    $_SESSION['alert'] = "userDeleted";
    header("Location:index.php");
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

?>