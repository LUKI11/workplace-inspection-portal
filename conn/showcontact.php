<?php
$sql = "SELECT  Faculty F,
                   Name N,
                   Phone P,
                   Email E
             FROM `contact`";
    
    // problem
    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        // for each row, output 
        while($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td>{$row['F']}</td>";
            echo "<td>{$row['N']}</td>";
            echo "<td style='word-wrap:break-word;'>{$row['P']}</td>";
            echo "<td style='word-wrap:break-word;'>{$row['E']}</td>";
            echo "<td><a href='conn/delete.php?idd=$row[N]']>Delete</a></td>";
            echo "</tr>";
        }    
    }else{
        // echo "none" ;
    }
?>

