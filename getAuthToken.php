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
      $db = mysqli_select_db($conn,"workplace_inspectionDB");
      $username = $_POST['username'];
      $password = $_POST['password'];
      $fullname = $UQ['name'];
      $uqemail = $UQ['email'];

      $query = "SELECT * FROM token WHERE uq_email='$uqemail'";
      $return_row = mysqli_num_rows(mysqli_query($query));

      if($return_row==1) {
        echo '{"error":"Insertion Failed!", "error_description":"You have already linked an API account!","insertion":"fail"}';
      } else {
        $url = 'https://api.safetyculture.io/auth';
        $post = [
          'username' => $username,
          'password' => $password,
          'grant_type' => "password",
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        $response = curl_exec($ch);

        $jsonArray = json_decode($response,true);
        $access_token = $jsonArray["access_token"];
        $token_type = $jsonArray["token_type"];
        $error = $jsonArray["error"];
        $error_description = $jsonArray["error_description"];

        if(empty($error)) {
            $tokenInsertation = "INSERT INTO token VALUES('$fullname', '$uqemail', '$access_token', '$token_type', CURDATE())";
          if(mysqli_query($conn, $tokenInsertation)) {
            echo '{"insertion":"success"}';
          } else {
            echo '{"error":"Insertion Failed!", "error_description":"Database insertion is not successful", "insertion":"fail"}';
          }
        } else  {
          $arr = array('error' => $error, 'error_description' => $error_description, 'insertion' => "fail");
          echo json_encode($arr);
        }
      }


?>
