<?php
$sql = "SELECT inspection.id, 
                   inspection.title title,
                   inspection.location loc,
                   inspection.workplace wp,
                   inspection.creator creator,
                   report.creator assignee,
                   report.score score
            FROM inspection, report
			WHERE inspection.id = report.inspection_id AND report.status = 2;";

// SQL query
$result = $conn->query($sql);

// Iterate through the results of sql output
if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>{$row['loc']}</td>";
		$sql2 = "SELECT name from user where id = '{$row['assignee']}';";

		$result2 = $conn->query($sql2);
		while($row2 = $result2->fetch_assoc()){
			echo "<td>{$row2['name']}</td>";
		}
			
        echo "<td><button type='submit' class='btn btn-primary' name='form_id' value='{$row['id']}'>View</button></td>";
        echo "</tr>";
    }
}else{
    // echo "none" ;
}
?>