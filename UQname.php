<?php
  $runatUQ = true;                          // Set false if not run on your UQ zone

  if ($runatUQ) {
    require_once "uq/auth.php";             // Include UQ routines that handle UQ single-signon authentication
    auth_require();                         // User must authenticate once per session to continue running script
// Populate associative array containing UQ user details:
//  "user" — the user's UQ username (eg uqxxx or s4xxxxxx)
//  "email" — the user's primary email address
//  "name" — the preferred name for addressing the user, eg "John Smith"
//  "groups" — a list of AD and LDAP groups the user is a member of
    $UQ = auth_get_payload();
    $fullname = $UQ['name'];
    $uqemail = $UQ['email'];
    $groups = $UQ['groups'];
    $userid = $UQ['user'];
  };

// Create connection
$servername = "localhost";
$username = "operation";
$password = "operation";
$dbname = "workplace_inspectionDBschedulingEdition";
// Check connection
// Create connection

$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
};
  $query = "SELECT * FROM user WHERE id='$userid'";
   
  $return_row = mysqli_query($con, $query);
  $re = $return_row->fetch_assoc();
 
  if($re == null){

    $userInsertation = "INSERT INTO user(id, name, email) 
                        VALUES('$userid','$fullname', '$uqemail')";
      
    if(mysqli_query($con, $userInsertation)){

      echo"User registered successfully.";
    }
    else{
        echo"User registered fail.";
      };
  };

$sql = "SELECT * FROM user WHERE id='$userid'";
$userrole;
$result = mysqli_query($con,$sql);
while ($r = $result->fetch_assoc()){
   $userrole = $r['role'];
   
}
$_SESSION["user"] = $userid;
  
?>

