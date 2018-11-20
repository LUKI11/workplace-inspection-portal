<?php
// output users

$sql = "SELECT distinct id, name FROM user WHERE role = 'coordinator' ORDER BY name ASC;";


$results = mysqli_query($con, $sql);


while($user = mysqli_fetch_assoc($results)){
    // transform into name
    $output.="<option value='{$user['id']}'>{$user['name']}</option>";
    
}

// Output all users
echo $output;  
?>

