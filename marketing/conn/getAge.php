<?php
    include("connect.php");

    // SQL query
    $sql = "SELECT age, COUNT(age) count
    FROM customer_form
    Group by age;";
    $result = $conn->query($sql);

    // Iterate through the results of sql (list of CAP)
    if ($result->num_rows > 0){
        
        // Create an array
        $values = array();
        
        // For each CAP, wrap it into table row <tr>
        while($row = $result->fetch_assoc()){
            $this_val = array('age'=>$row['age'],
                              'count'=>$row['count']);
            array_push($values, $this_val);
        }
        
        // return with JSON
        echo json_encode($values);
    }else{
        // echo "none" ;
    }
    include("disconn.php");
?>