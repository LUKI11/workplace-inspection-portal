<?php
session_start();
include('connect.php');
header('Content-Type: application/json');

$array = array();
$details = array();
$user = $_SESSION["user"];

$sql = "Select role from user where id = '". $user."';";

if (mysqli_query($conn, $sql)){
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_all($result);
	$array[0] = $row[0];
}else{
	echo "problem.";
}

$sql = "Select work_day, start_time, finish_time, start_break, 
	finish_break from schedule where user_id = '". $user."';";
	
if (mysqli_query($conn, $sql)){
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_all($result);
	for ($i=0; $i< count($row); $i++){
		$details[$i] = $row[$i];
	}

	}else{
	echo "problem.";
}

$array[1] = $details;


echo json_encode($array);


include('disconn.php');



?>