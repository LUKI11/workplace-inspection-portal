<?php 
  $conn = mysqli_connect("localhost", "operation", "operation");
  $db = mysqli_select_db($conn,"workplace_inspectionDB");

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }


  require_once "uq/auth.php";             // Include UQ routines that handle UQ single-signon authentication
  auth_require();                         // User must authenticate once per session to continue running script
// Populate associative array containing UQ user details:
//  "user" — the user's UQ username (eg uqxxx or s4xxxxxx)
//  "email" — the user's primary email address
//  "name" — the preferred name for addressing the user, eg "John Smith"
//  "groups" — a list of AD and LDAP groups the user is a member of
  $UQ = auth_get_payload();
  $UQ = auth_get_payload();
  $fullname = $UQ['name'];
  $uqemail = $UQ['email'];


  $sql="INSERT INTO `user`(`user_id`, `user_name`) VALUES ('$uqemail','$fullname')";
      if(mysqli_query($conn, $sql)) {
          echo '{"insertion":"success"}';
      } else {
          echo '{"error":"Insertion Failed!", "error_description":"Database insertion is not successful", "insertion":"fail"}';
      }


   ?>