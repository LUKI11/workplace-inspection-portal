<?php
    include("connect.php");

    // SQL query
    $sql = "SELECT name, gender, age, occupation, comment, uploadTime, customer_email 
    FROM customer_form
    Order by uploadTime DESC
    ;";
    $result = $conn->query($sql);

    // Iterate through the results of sql (list of CAP)
    if ($result->num_rows > 0){
        
        // Create an array
        $values = array();
        
        // For each CAP, wrap it into table row <tr>
        while($row = $result->fetch_assoc()){
            $this_val = array('name'=>$row['name'],
                              'gender'=>$row['gender'],
                              'age'=>$row['age'],
                              'cmt'=>$row['comment'],
                              'occ'=>$row['occupation'],
                              'time'=>$row['uploadTime'],
                             'email'=>$row['customer_email']);
            array_push($values, $this_val);
            
        }
        
        // return with JSON
        echo json_encode($values);
    }else{
        // echo "none" ;
    }
    include("disconn.php");
?>
