<?php 
// establish connection and session
session_start();
include('connect.php');
echo "Please wait while data is processing...";

// Detecting different types of submit button
if (isset($_POST['btn_save'])) {
        // Save only, back to coordinator page
        // save script

        include('commit.php');
    
        // redirect to coordinator page
        echo '<meta http-equiv="refresh" content="0;URL=../InspectionCoordinator.php" />';
    
    }elseif(isset($_POST['btn_prev'])) {
        // Save then prev page
        // include save script
        include('commit.php');
        echo $_POST['btn_prev'];
        // auto jump to prev page
        echo '<meta http-equiv="refresh" content="0;URL=../inspection_form1.php" />';
        
        
    }elseif(isset($_POST['btn_next'])){
        // Save then next page
        // include save script
        include('commit.php');
        echo $_POST['btn_next'];
        // auto jump to next page
        echo '<meta http-equiv="refresh" content="0;URL=../inspection_form2.php" />';
        
    }
          
            
include('disconn.php');
?>

