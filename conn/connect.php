<?php
    // Create connection
    $servername = "localhost";
    $username = "operation";
    $password = "operation";
    $dbname = "workplace_inspectionDBschedulingEdition";    
    // Check connection
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
?>