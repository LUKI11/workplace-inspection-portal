<?php
include('connect.php');
$form_id = $_POST['form_id'];

// Fetch data from inspection_list
$sql = "SELECT * FROM inspection_list WHERE inspection_id = {$form_id};";
$result = mysqli_query($conn, $sql);
$info = mysqli_fetch_assoc($result);

// Create html content
if(mysqli_num_rows($result) >= 1){
    $html_text = "
    <input type='hidden' name='form_id' value='{$form_id}'>
    <h4>Audit Title: UQ OHS Workplace Assessment Inspection Checklist</h4>
    <textarea class='form-control' name='title' placeholder='Enter Title'>{$info['inspection_title']}</textarea>

    <h4>Campus / Location / Site:</h4>
    <textarea class='form-control' name='site'  placeholder='Enter Loaction'>{$info['inspection_location']}</textarea>

    <h4>Organisational Unit / Workplace:</h4>
    <textarea class='form-control' name='unit'  placeholder='Enter Workplace'>{$info['inspection_workplace']}</textarea>

    <h4>Area / Facility Manager:</h4>
    First name:
    <input type='text' class='form-control' name='firstname'  placeholder='Enter First Name' value='{$info['inspection_creater']}'><br>
    Last name:
    <input type='text' class='form-control' name='lastname' placeholder='Enter Last Name' value='{$info['inspection_creater']}'><br><br>

    <h4>Date of Inspected:
    <input type='date' class='form-control' id='myDate' name='inspDate' value='{$info['inspection_inspected_time']}'><br>
    <br>

    <h4>Conducted by</h4>
    First name:
    <input type='text' class='form-control' name='coFirstname' placeholder='Enter First Name' value='{$info['inspection_assignee']}'><br>
    Last name:
    <input type='text' class='form-control' name='coLastname' placeholder='Enter Last Name' value='{$info['inspection_assignee']}'><br><br>
    Contact number:
    <input type='text' class='form-control' name='phone' placeholder='Enter number' value='n/a'><br><br>
    <h4>Completed on:</h4>
    <input type='date' id='myDate' class='form-control' name='date' value='2017-03-09'><br>

    <h4>Score </h4>
    <input type='text' class='form-control' name='score' placeholder='Enter Score' value='{$info['inspection_score']}'>
    <br><br><br>			 

    <input type='submit' value='Submit'>
    <input type='reset'>";

}else{
    $html_text = "<p>Form does not exist!<p>";
};    
    
// echo content to client
echo $html_text;

include('disconn.php');
?>
