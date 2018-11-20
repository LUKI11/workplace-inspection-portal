<?php
    //the session to set the role of user
	session_start();
	include('connect.php');
	
	$job = $_REQUEST['job'];
	$_SESSION["job"] = $job;
	$user = $_SESSION["user"];
	
	$startWork = $_REQUEST['startWork'];
	$finishWork = $_REQUEST['finishWork'];
	$startBreak = $_REQUEST['startBreak'];
	$finishBreak = $_REQUEST['finishBreak'];
	$worksOn = $_REQUEST['worksOn'];

	
	$sql = "UPDATE user SET role= '". $job ."' WHERE id = '". $user . "';";
	mysqli_query($conn, $sql);
	
	$sql = "DELETE FROM schedule WHERE user_id = '". $user . "';";
	mysqli_query($conn, $sql);
	
	for ($i = 0; $i < count($worksOn); $i++){
		
		$sql = "INSERT INTO schedule (user_id, work_day, start_time, finish_time, start_break, finish_break) 
		VALUES ('{$user}','{$worksOn[$i]}','{$startWork}','{$finishWork }', '{$startBreak }','{$finishBreak }');";
		
		if (mysqli_query($conn, $sql)){

		}else{
			echo "problem.";
		}
	}
	 include('disconn.php');
	echo json_encode($user);

	
?>