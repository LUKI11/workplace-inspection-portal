<?php
session_start();
include('connect.php');

// Update flag to 2, coordinator can then never change the records
$user = $_SESSION['user'];
$id = $_SESSION['formID'];


$sql = "UPDATE report SET status = 2 where creator='{$user}' and report.inspection_id = '{$id}' ;";

mysqli_query($conn, $sql); 

// redirect to coordinator page
echo '<meta http-equiv="refresh" content="0;URL=../InspectionCoordinator.php" />';

include('disconn.php');
?>