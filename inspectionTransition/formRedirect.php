<?php
session_start();
// This page is a controler
// It determines whether:
//      1. new form? form_status == 0 
//      2. form in prgress? form_status == 1
//      3. done form? form_status == 2
// Thus, its only purpose is to redirect page when button is pressed in coordinator's view

include('connect.php');

// Check the status of an inspection


// *****************
$_SESSION['formID'] = $_POST['formID'];
$id = $_POST['formID'];

$user = $_SESSION['user'];

$sql = "SELECT id, status FROM report WHERE inspection_id ={$id} and creator='{$user}';";


$result=mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$status = $row["status"];

$reportId = $row["id"];

// Check status of the inspection
if ($status > 0) {
    // It is already been inspected 
    
    if ($status == 1){
        // Case 1. In progress
        echo $status;
        
        // Redirect to inspection_form1.php
        echo '<meta http-equiv="refresh" content="0;URL=../inspection_form1.php" />';
        
        
    }elseif ($status == 2) {
        // Case 2. Done (read only form)
        echo $status;
        
        // Redirect to inspection_form_view.php
        echo '<meta http-equiv="refresh" content="0;URL=../inspection_form_view.php" />';
    }
    
}else{
    // Nothing has been done before
    // Case 3. New form, create set of dummy questons
    $qNumbers = array(9,4,1,4,6,4,5,6,6,6,4,8,3,4,9,7,7,5);
    $section = 1;
    foreach($qNumbers as $secQan){
        // iterate through the questions # for that section
        for($q = 1; $q <= $secQan; $q++){
			
            $sql = "INSERT INTO report_questions (report_id, section, Qnum) VALUES ('{$reportId}','{$section}','{$q}');";
			
			mysqli_query($conn, $sql);
        }
        $section++;
    }
    
    // Status changed, this inspection is in progress..
    $sql = 'UPDATE report SET status = 1 WHERE inspection_id = '.$id.' and creator="'.$user.'";';
    mysqli_query($conn, $sql);
    
    // Redirect to:
    // insp 1.php
    echo '<meta http-equiv="refresh" content="0;URL=../inspection_form1.php" />';
    
}

include('disconn.php');
?>