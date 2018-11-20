<?php
    // Establish connectin
	include('connect.php');

    // Retrieve post data from form -> variables
    $desc =  $_POST['description'];
    $assignee = $_POST['assignee'];
    $prior = $_POST['prior'];
    $mark = $_POST['mark'];
	$inspDate = $_POST['inspDate'];
	$id =  $_POST['inspection_id'];

	$sql = "select * from cap where cap.inspection_id = {$id}";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$capId = $row['id'];

    $sql = "INSERT INTO corrective_actions(description, assignee, status, priority, due_date, cap_id) VALUES ('{$desc}','{$assignee}','{$mark}','{$prior}' ,'{$inspDate}','{$capId}');";

    if (mysqli_query($conn, $sql)){

        // If sql has no proble, commit it and continue

    }else{
		echo "failed";
        // If sql commit failed, debug
        //echo "failed";
    }
include('conn/disconn.php');

?>
<meta http-equiv="refresh" content="0;URL=../cap.php" />