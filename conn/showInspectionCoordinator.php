<?php
	$user = $_SESSION["user"];
	$sql = "SELECT inspection.*, report.status FROM inspection, 
	report where inspection.id=report.inspection_id and report.creator='".$user."';";

    $result = $conn->query($sql);
	$count = mysqli_num_rows($result);
    if ($result->num_rows > 0){
        // for each row, output 
        while($row = $result->fetch_assoc()){	
			$t = $row['date'] . " | ". $row['start'] . "-" . $row['finish'] ;
			echo "<tr>";
			echo "<td>{$row['location']}</td><td>";
			$sql = "select distinct user.name from user, inspection_assignees, inspection where user.id = inspection_assignees.user_id 
				AND inspection_assignees.inspection_id ='". $row['id']. "';";
		    $result2 = $conn->query($sql);
			while($row2 = $result2->fetch_assoc()){
				echo "{$row2['name']}; ";
			}
			echo "</td><td>{$t}</td>";
 // different type of buttons
            if($row['status'] == 0){
                echo "<td><button type='submit' class='btn btn-warning'
                name='formID' value='{$row['id']}'>Start</button></td>";
                
            }elseif($row['status'] == 1){
                echo "<td><button type='submit' class='btn btn-primary'
                name='formID' value='{$row['id']}'>Continue</button></td>";
                
            }elseif($row['status'] == 2){
                echo "<td><a href='report/reportGenerate.php?formID={$row['id']}'><button type='button' class='btn btn-success' 
                name='formID' value='{$row['id']}'>Done</button></a></td>";
            }
				echo "</tr>";
        }    
    }else{
        // echo "none" ;
    }
?>

