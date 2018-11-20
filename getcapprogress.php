<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 22/10/17
 * Time: 1:43 PM
 */
include ("UQname.php");

// SQL query
$sql = "SELECT status, COUNT(status) count
    FROM corrective_actions
    Group by status;";
$capresult = $con->query($sql);

// Iterate through the results of sql (list of CAP)
if ($capresult->num_rows > 0){

    // Create an array
    $capvalues = array();

    // For each CAP, wrap it into table row <tr>
    while($row = $capresult->fetch_assoc()){
        $this_val = array('status'=>$row['status'],
            'count'=>$row['count']);
        array_push($capvalues, $this_val);
    }

    // return with JSON
    echo json_encode($capvalues);
}else{
    // echo "none" ;
}
?>