<?php 
	$sql = "SELECT inspection.*, report.status, report.creator
	FROM inspection, report
	WHERE report.inspection_id = inspection.id;";
	$count = 0;
    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        // for each row, output 
        while($row = $result->fetch_assoc()){
			$sql = "select user.name from user where id ='". $row['creator']. "';";
		    $result2 = $conn->query($sql);
			echo "<tr>";
			echo "<td>{$row['location']}</td>";
			echo "<td>{$row['date']} | {$row['start']} - {$row['finish']}</td><td>";
			while($row2 = $result2->fetch_assoc()){
				echo "{$row2['name']}; ";
			}
			echo "<td><button id ='b". $count ."' type='button' class='b btn btn-primary btn-sm' data-toggle='modal' data-target='#myModal' value='{$row['id']}'>edit</button></td>";
			if($row['status'] == 0){
                echo "<td><button type='submit' class='btn btn-warning'
                name='formID' value='{$row['id']}'>Ongoing</button></td>";
                
            }elseif($row['status'] == 1){
                echo "<td><button type='submit' class='btn btn-primary'
                name='formID' value='{$row['id']}'>Ongoing</button></td>";
                
            }elseif($row['status'] == 2){
                echo "<td><a href='report/reportGenerate.php?formID={$row['id']}'><button type='button' class='btn btn-success' 
                name='formID' value='{$row['id']}'>Done</button></a></td>";
            }
			echo "</tr>";
			$count++;
        }
		
    }else{
       
    }
 

?>