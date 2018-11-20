<?php
    // Establish connectin
    include('connect.php');

    // Retrieve post data from form -> variables
    $email =  $_POST['email'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $price = $_POST['price'];
    $occ = $_POST['occupation'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO customer_form (customer_email, name, gender, age, occupation, comment) VALUES ('{$email}','{$name}','{$gender}','{$age}','{$occ}','{$comment}');";

    if (mysqli_query($conn, $sql)){
        // If sql has no proble, commit it and continue
       echo "<meta http-equiv='refresh' content='0;URL=../index.html' />";
  
        
    }else{
        // If sql commit failed, debug
        echo "Form submition failed :( Please try again.";
    }

    include('disconn.php');
?>
