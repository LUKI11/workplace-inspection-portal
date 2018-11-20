<?php
session_start();
include ("UQname.php");
	$job = $_REQUEST['job'];
	$_SESSION["job"] = $job;

$roleupdate = "UPDATE user SET role = '$job' WHERE id = '$userid'";
mysqli_query($conn, $roleupdate);
?>