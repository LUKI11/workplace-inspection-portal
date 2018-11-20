<?php 
// establish session
session_start();
include('connect.php');


// session variables
$_SESSION['formID'] = $_POST['formID'];


// check if there exist questions for this form
$check = "SELECT * FROM inspection_questions WHERE inspection_id = {$_SESSION['formID']}";
$checkRes = $conn->query($check);

if ($checkRes->num_rows > 0) {
    // continue...
    $status = "template exist, no need to create";
    
}else{
    // if no, create a template for this inspection form
    $qNumbers = array(9,4,1,4,6,4,5,6,6,6,4,8,3,4,9,7,7,5);
    $section = 1;
    foreach($qNumbers as $secQan){
        // iterate through the questions # for that section
        for($q = 1; $q <= $secQan; $q++){
            $sql = "INSERT INTO inspection_questions (inspection_id, inspection_section, inspection_Qnum) VALUES ('{$_SESSION['formID']}','{$section}','{$q}');";
            mysqli_query($conn, $sql);
        }
        $section++;
    }
    
    $status = "template created";
}

include('disconn.php');
?>