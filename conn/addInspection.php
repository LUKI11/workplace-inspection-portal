<?php
	session_start();
    include('connect.php');
	$user = $_SESSION["user"];
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
	
	
	if ($_SESSION['inspectionId'] =="1") {
		$inspectionId = mysqli_insert_id($conn);

		for ($i=0; $i < count($s); $i++){
			if($s[$i] != null && $s[$i] != 'undefined') {
				$sql = "INSERT INTO inspection_assignees (user_id, inspection_id) VALUES ('{$s[$i]}','{$inspectionId}');";
				
				if (mysqli_query($conn, $sql)){
					$sql = "INSERT INTO report(creator, inspection_id, status) VALUES ('{$s[$i]}','{$inspectionId}', 0);";
					mysqli_query($conn, $sql);
					//echo "form submitted, now redirect u back to the eath";
					echo "<meta http-equiv='refresh' content='0;URL=../InspectionManager.php' />";
				}else{}
				$sql = "INSERT INTO cap (inspection_id, creator) VALUES ('{$inspectionId}', '{$user}');";
				mysqli_query($conn, $sql);
			}
		}
	} else {
		$inspectionId = $_SESSION['inspectionId'];
		$sql = "delete from inspection_assignees where inspection_id ='".$inspectionId."';";
		mysqli_query($conn, $sql);
		
		$sql = "delete from report where inspection_id ='".$inspectionId."';";
		mysqli_query($conn, $sql);
		
		for ($i=0; $i < count($s); $i++){
			if($s[$i] != null && $s[$i] != 'undefined') {
				$sql = "INSERT INTO report(creator, inspection_id, status) VALUES ('{$s[$i]}','{$inspectionId}', 0);";
				mysqli_query($conn, $sql);
				
				$sql = "INSERT INTO inspection_assignees (user_id, inspection_id) VALUES ('{$s[$i]}','{$inspectionId}');";
				if (mysqli_query($conn, $sql)){
					//echo "form submitted, now redirect u back to the eath";
					echo "<meta http-equiv='refresh' content='0;URL=../InspectionManager.php' />";
				}else{
					$sql = "delete from report where inspection_id ='".$inspectionId."';";
					echo "<meta http-equiv='refresh' content='0;URL=../InspectionManager.php' />";
				}

				$sql = "update inspection set title='".$title."', location='".$site."', workplace='".$unit."',creator='".$firstname." ".$lastname."', " .
				"start='".$start."', finish='".$finish."'where id='".$inspectionId."';";
				
				mysqli_query($conn, $sql);
				
			}
		}
	}
    include('disconn.php');
	
?>