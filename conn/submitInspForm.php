<?php 
session_start();
// establish connection and session
include('connect.php');

// session variables
$_SESSION['formID'];
$user = $_SESSION['user'];
echo "Please wait while form is processing...";

// List of list of answers
$qNumbers = array(9,4,1,4,6,4,5,6,6,6,4,8,3,4,9,7,7,5);
$sec = 1;
foreach($qNumbers as $s){   
    // all selections and notes
    foreach(range(1,$s) as $q){
        // -------------------------------------
        // Update selection
        // -------------------------------------
        $q_selection = $_POST["{$sec}:{$q}:s"];
        if($q_selection == 'x'){
            // form is empty, skip sql
            
        }else{
            // update inspection_questions column with key in the row (inspection_selections)
            $sql = "UPDATE report_questions 
            SET selection = '{$q_selection}'
            WHERE report.inspection_id = {$_SESSION['formID']}
				and report.id = report_questions.report_id
                AND report_questions.section = {$sec}
                AND report_questions.Qnum = {$q}
				AND report.creator = {$user};";
            mysqli_query($conn, $sql);   
            
            // debug
            // echo $q_selection;
        }
        
        // -------------------------------------
        // Update note
        // -------------------------------------
        $q_note = $_POST["{$sec}:{$q}:n"];
        if($q_note == ''){
            // form is empty, skip sql
            
        }else{
            
            // get this question key
            $sql = "SELECT report_questions.id FROM report, report_questions
            WHERE report.inspection_id = {$_SESSION['formID']}
				AND report.id = report_questions.report_id
                AND section = {$sec}
                AND Qnum = {$q}
				AND user = {$user};";
            
            $result = mysqli_query($conn, $sql);
            while($row = $result->fetch_assoc()){
                $key = $row['id'];
            }

            // create tuple in inspection_selections (use inspection_question_id as key)
            $sql = "INSERT INTO attachments (inspection_note_id, inspection_note) VALUES ({$key},'{$q_note}');";
            mysqli_query($conn, $sql);
        }
        
        // end this question
    }

    // end section
    $sec++;
}

// debug status
echo "<p>Form ID: {$_SESSION['formID']}, {$status}</p>";
include('disconn.php');
?>

<meta http-equiv="refresh" content="0;URL=../InspectionCoordinator.php" />