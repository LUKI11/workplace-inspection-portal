<?php
    // SQL query
    $sql = "SELECT distinct corrective_actions.id id, cap.inspection_id insp_id, cap.creator creator, corrective_actions.description des,
	corrective_actions.status, corrective_actions.assignee, corrective_actions.due_date due, priority prior 
    FROM corrective_actions, cap 
	WHERE corrective_actions.cap_id = cap.id
    ORDER BY prior ASC;";
    $result = $conn->query($sql);
	
    // Iterate through the results of sql (list of CAP)
    if ($result->num_rows > 0){
        
        // For each CAP, wrap it into table row <tr>
        while($row = $result->fetch_assoc()){

            echo "<tr>";
            echo "<td>{$row['des']}</td>";
            echo "<td>{$row['status']}</td>";
			
			$sql2 = "SELECT name from user WHERE id = '{$row['assignee']}';";
			$result2 = $conn->query($sql2);
            while($row2 = $result2->fetch_assoc()){
				echo "<td>{$row2['name']}</td>";
			}
			
			$sql3 = "SELECT name from user WHERE id = '{$row['creator']}';";
			$result3 = $conn->query($sql3);
			while($row3 = $result3->fetch_assoc()){
				echo "<td>{$row3['name']}</td>";
			}
            echo "<td>{$row['prior']}</td>";
            echo "<td>{$row['due']}</td>";
              echo "<td><a class='btn btn-primary btn-sm' href='report/CAPGenerate.php?insp_id=".$row['insp_id']."'>CAP</a></td>";
            echo "<td><button type='button'  class='btn btn-primary btn-sm edit' data-toggle='modal' data-target='#myModal' 
            value='{$row['id']}'>edit</button></td>";
            echo "</tr>";
        }    
    }else{
        // echo "none" ;
    }
?>