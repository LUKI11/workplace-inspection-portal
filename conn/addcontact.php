<?php
    include('connect.php');
    $Faculty =  $_POST['Faculty'];
    $Name = $_POST['Name'];
    $Phone = $_POST['Phone'];
    $Email = $_POST['Email'];

    $sql = "INSERT INTO contact (Faculty, Name, Phone, Email) VALUES ('{$Faculty}','{$Name}','{$Phone}','{$Email}' );";

    if (mysqli_query($conn, $sql)){
        //echo "form submitted, now redirect u back to the eath";
        
    }else{
        //echo "failed";
    }

    include('disconn.php');
?>
<meta http-equiv="refresh" content="0;URL=../contact.php" />