<?php
    $user = $_SESSION["user"];
	$sql = "SELECT inspection.*, report.status FROM inspection, 
	report where inspection.id=report.inspection_id and report.status != 2 and report.creator='".$user."';";
			echo '<script type="text/javascript">alert($sql);</script>';
    // SQL query
    $result = $con->query($sql);

    // Iterate through all the inspection forms in db
    if ($result->num_rows > 0){
        // for each inspection form found...
        while($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>{$row['title']}</td>";
            echo "<td>{$row['location']}</td>";
            
            $date_dis = date_format(date_create($row['time']), 'd/m/Y');
            echo "<td>{$date_dis}</td>";        
            
            
            // different type of buttons
            if($row['status'] == 0){
                echo "<td><button type='submit' class='btn btn-warning'
                name='formID' value='{$row['id']}'>Start</button></td>";
                
            }elseif($row['status'] == 1){
                echo "<td><button type='submit' class='btn btn-primary'
                name='formID' value='{$row['id']}'>Continue</button></td>";
                
            }elseif($row['status'] == 2){
                echo "<td><a class='btn btn-success' href='report/reportGenerate.php?formID={$row['id']}'>Done</a></td>";
            }
            echo "</tr>";
        }    
    }else{
        // debug
        echo "You do not have any inspection yet :)";
    }
?>

