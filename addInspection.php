<?php
    include('connect.php');
    $title =  $_POST['title'];
    $site = $_POST['site'];    
    $unit = $_POST['unit'];
    $firstname = $_POST['firstname'];
    $lastname =  $_POST['lastname'];
    $date = $_POST['date'];
	$dateArray = explode("/",$date);
	
	$date = $dateArray[2] . '-' . $dateArray[0] . '-' . $dateArray[1];
	$start = $_POST['start'];
	$finish = $_POST['finish'];
	$selected = $_POST['selectedArr'];
	$s = explode(" ", $selected);

    $sql = "INSERT INTO inspection (title, location, workplace, creator, date, start, finish) 
	VALUES ('{$title}','{$site}','{$unit}','{$firstname} {$lastname}','{$date}','{$start}','{$finish}');";

	
	
    if (mysqli_query($conn, $sql)){
        //echo "form submitted, now redirect u back to the eath";
       
    }else{
        echo "The form is not filled correctly, please check the input values again.";
    }
	if ($_SESSION['inspectionId'] =="") {
		$inspectionId = mysqli_insert_id($conn);
		
		for ($i=0; $i < count($s); $i++){
			if($s[$i] != null && $s[$i] != 'undefined') {
				$sql = "INSERT INTO inspection_assignees (user_id, inspection_id) VALUES ('{$s[$i]}','{$inspectionId}');";
	
				if (mysqli_query($conn, $sql)){
					//echo "form submitted, now redirect u back to the eath";
					echo "<meta http-equiv='refresh' content='0;URL=../InspectionManager.php' />";
				}else{
					echo "oi";
				}
			}
		}
	} else {
		$inspectionId = $_SESSION['inspectionId'];
			for ($i=0; $i < count($s); $i++){
				if($s[$i] != null && $s[$i] != 'undefined') {
					$sql = "delete from inspection_assignees where inspection_id ='".$inspection_id."';";
					mysqli_query($conn, $sql);
					$sql = "INSERT INTO inspection_assignees (user_id, inspection_id) VALUES ('{$s[$i]}','{$inspectionId}');";
					if (mysqli_query($conn, $sql)){
						//echo "form submitted, now redirect u back to the eath";
						echo "<meta http-equiv='refresh' content='0;URL=../InspectionManager.php' />";
					}else{
						echo "oi";
					}
				}
		}
	}
    include('disconn.php');
	
?>