<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 21/10/17
 * Time: 7:30 PM
 */
include ("UQname.php");

// SQL query
$sql = "SELECT selection, COUNT(selection) count
    FROM report_questions
    Group by selection;";

$results = $con->query($sql);
 
// Iterate through the results of sql (list of CAP)
if ($results->num_rows > 0){

    // Create an array
    $values = array();

    // For each CAP, wrap it into table row <tr>
    while($row = $results->fetch_assoc()){
        $this_val = array('selection'=>$row['selection'],
            'count'=>$row['count']);
        array_push($values, $this_val);
    }

    // return with JSON
    echo json_encode($values);
}else{
    // echo "none" ;
}

?>