<?php
	session_start();
	include('connect.php');
	header('Content-Type: application/json');
	$id = $_REQUEST['id'];
	$array = array();
	$ids = array();
	$name = array();

	$sql = "select * from inspection where id='". $id ."';";
	
	if (mysqli_query($conn, $sql)){ 
        $result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_all($result);
		$array = $row;	
		}else{
        echo "there is an error generating inspections.";
    }
	
	$sql = "select user.id, user.name from user, inspection_assignees where inspection_assignees.inspection_id = '" . $id. "' and inspection_assignees.user_id = user.id;";
	
	if (mysqli_query($conn, $sql)){ 
        $result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_all($result);
		for($i = 0; $i < COUNT($row) ; $i++){
			$ids[$i] = $row[$i][0];
			$name[$i] = $row[$i][1];
		}
		$array[1] = $ids;
		$array[2] = $name;	
		}else{
        echo "there is an error generating inspections.";
    }

	echo json_encode($array);

	include('disconn.php');
?>