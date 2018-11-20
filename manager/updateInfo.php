<?php
include('connect.php');
$form_id = $_POST['form_id'];
$title =  $_POST['title'];
$site = $_POST['site'];    
$unit = $_POST['unit'];
$firstname = $_POST['firstname'];
$lastname =  $_POST['lastname'];
$inspDate = $_POST['inspDate'];
$coFirstname = $_POST['coFirstname'];
$coLastname = $_POST['coLastname'];
$phone =  $_POST['phone'];
$date = $_POST['date'];
$score = $_POST['score'];  

// sql update
$sql = "UPDATE inspection_list
        SET inspection_title = '{$title}',
            inspection_location = '{$site}',
            inspection_workplace = '{$unit}',
            inspection_assignee = '{$coFirstname} {$coLastname}',
            inspection_inspected_time = '{$inspDate}', 
            inspection_score = {$score}
        WHERE inspection_id = {$form_id};";

echo "Updating data into database...";
$boo = mysqli_query($conn, $sql);

if ($boo){
    // success
    echo "<meta http-equiv='refresh' content='0;URL=../InspectionManager.php' />";
}else{
    echo 'Failed, please check your input again.';
};


// redirect back to InspectionManager.php
include('disconn.php');
?>
