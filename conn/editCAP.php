<?php
    // Establish connection
    include('connect.php');
    $id = $_POST['capID'];
	$user = $_SESSION['user'];
    $desc =  $_POST['description'];
    $assignee = $_POST['assignee'];


    $prior = $_POST['prior'];
    $mark = $_POST['mark'];
	$date = $_POST['date'];
	$date = explode("/", $date);
    $sql = "UPDATE corrective_actions 
	SET description = '{$desc}', assignee = '{$assignee}', status = '{$mark}', priority = '{$prior}', due_date = '{$date[2]}-{$date[0]}-{$date[1]}'
	WHERE id = {$id};";

    if (mysqli_query($conn, $sql)){
        // If sql has no proble, commit it and continue
        
    }else{
        // If sql commit failed, debug
        //echo "failed";
    }

    include('disconn.php');
?>
<meta http-equiv="refresh" content="0;URL=../cap.php" />