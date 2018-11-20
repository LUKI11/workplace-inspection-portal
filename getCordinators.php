<?php
// output users
$sql = "
SELECT user_id, user_name
FROM user
WHERE user_role = 'Coordinator'
ORDER BY user_name ASC;
";
$output = "";
$results = mysqli_query($conn, $sql);
while($user = mysqli_fetch_assoc($results)){
    // transform into name
    $output.="<option value='{$user['user_id']}'>{$user['user_name']}</option>";
    
}

// Output all users
echo $output;  
?>

