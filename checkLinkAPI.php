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
  }
      $conn = mysqli_connect("localhost", "root", "");
    if (!$conn)
            { die('Could not connect database'); }

     $db = mysqli_select_db($conn,"workplace_inspectionDB");
      $uqemail = $UQ['email'];

      $query = "SELECT COUNT(*) FROM token WHERE uq_email = '$uqemail'";

      $date_query = "SELECT last_api_access FROM token WHERE uq_email = '$uqemail'";

      $return_row = mysqli_num_rows(mysqli_query($query));

      $date_return = mysqli_query($date_query); //Returned last token access date
      $row = mysqli_fetch_array($date_return);
      $result_date_return = $row['last_api_access'];

      $current_date = date("Y-m-d");
      $datetime1 = date_create($result_date_return); //Convert to date object
      $datetime2 = date_create($current_date); //Convert to date object
      $interval = date_diff($datetime1, $datetime2); //Check diff in date
      $date_diff = $interval->format('%a'); //Format date object to integer in days

      if($return_row == 1) {
        if ($date_diff >= 30) {
          echo "expired_token";
        } else {
          echo "no_account";
        }
      }
?>
