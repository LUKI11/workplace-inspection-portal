<?php 
// establish session
session_start();

// session variables
$_SESSION['formID'] = $_POST['formID'];
echo "<h1>Form ID: {$_SESSION['formID']}, now you know it.</h1>";

?>