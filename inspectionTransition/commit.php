<?php
// Save...
// List of list of answers

$qNumbers = array(9,4,1,4,6,4,5,6,6,6,4,8,3,4,9,7,7,5);
$sec = 1;
$sql = "SELECT distinct report.id id FROM report, report_questions WHERE report.inspection_id = {$_SESSION['formID']} ".
		"AND report.id = report_questions.report_id;";

		$result = mysqli_query($conn, $sql);
		$row =$result->fetch_assoc();
        $reportId = $row['id'];

foreach($qNumbers as $s){   
    // all selections and notes
    foreach(range(1,$s) as $q) {

        // check if the question is posted
        if (isset($_POST["{$sec}:{$q}:s"])) {
            // -------------------------------------
            // Update selection
            // -------------------------------------
            $q_selection = $_POST["{$sec}:{$q}:s"];
            if ($q_selection == 'x') {
                // form is empty, skip sql

            } else {
                // update inspection_questions column with key in the row (inspection_selections)
                $sql = "UPDATE report_questions SET selection = '{$q_selection}' WHERE {$reportId} = report_questions.report_id ".
				"AND report_questions.section = {$sec} AND report_questions.Qnum = {$q};";

                mysqli_query($conn, $sql);
            }


            // -------------------------------------
            // Update note
            // -------------------------------------
            $q_note = $_POST["{$sec}:{$q}:n"];
            if ($q_note == '') {
                // form is empty, skip sql
            } else {
                // get this question key

				//$sql = "insert correctiveAction SET note = '{$q_note}' WHERE {$reportId} = report_questions.report_id ".
				//"AND report_questions.section = {$sec} AND report_questions.Qnum = {$q};";
				
                $sql = "UPDATE report_questions SET note = '{$q_note}' WHERE {$reportId} = report_questions.report_id ".
				"AND report_questions.section = {$sec} AND report_questions.Qnum = {$q};";
				
            }
			 mysqli_query($conn, $sql);

            // -------------------------------------
            // Update images
            // -------------------------------------

            $image = $_POST["{$sec}:{$q}:pic"];

            $img = "{$secNum}:{$qNum}:pic";

            if(isset($_FILES['$img'])){
                $errors= array();
                $file_name = $_FILES['$img']['name'];
                $file_size = $_FILES['$img']['size'];
                $file_tmp = $_FILES['img']['tmp_name'];
                $file_type = $_FILES['img']['type'];
                $file_ext=strtolower(end(explode('.',$_FILES['img']['name'])));

                $expensions= array("jpeg","jpg","png");

                if(in_array($file_ext,$expensions)=== false){
                    $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                }

                if($file_size > 2097152) {
                    $errors[]='File size must be below 2 MB';
                }

                if(empty($errors)==true) {
                    move_uploaded_file($file_tmp,__DIR__.'/../../uploads/'.$file_name);
                    echo "Success";
                }else{
                    print_r($errors);
                }
            }
			
			
            if($image== ''){
                // form is empty, skip sql

            }else{
	
                // get this question key
				
                // create tuple in inspection_selections (use inspection_question_id as key)
				$sql = "SELECT distinct report_questions.id qid FROM report, report_questions WHERE report.inspection_id = {$_SESSION['formID']} ".
		"AND report.id = report_questions.report_id AND report_questions.section = $s AND report_questions.qNum = $q;";
				$result2 = mysqli_query($conn, $sql);
				$row2 =$result2->fetch_assoc();
				
                $sql = "insert into attachments (question_id, type, url) values (".$row2['qid'].", 'image', '$image')";
				//echo '<script type="text/javascript">alert("'.$sql.'");</script>';
                mysqli_query($conn, $sql);
            }
            // end this question
        }  
    }
    // end section
    $sec++;
}
?>