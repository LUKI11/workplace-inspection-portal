<?php
    include("connect.php");

    // SQL query
    $sql = "SELECT DATE(uploadTime) date, COUNT(*) clicks 
    FROM customer_form 
    WHERE (current_date - DATE(uploadTime)) <= 7
    GROUP BY DATE(uploadTime)
    ORDER BY DATE(uploadTime) ASC;";
    $result = $conn->query($sql);

    // Iterate through the results of sql (list of CAP)
    if ($result->num_rows > 0){
        
        // Create an array
        $values = array();
        
        // For each CAP, wrap it into table row <tr>
        while($row = $result->fetch_assoc()){
            $this_val = array('date'=>$row['date'],
                              'clicks'=>$row['clicks']);
            array_push($values, $this_val);
        }
        
        // return with JSON (array of 7 values)
        echo json_encode($values);
    }else{
        // echo "none" ;
    }
    include("disconn.php");
?>
