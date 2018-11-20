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

    echo $UQ['name'];


  };

?>
