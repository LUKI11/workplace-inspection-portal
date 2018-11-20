<?php
//the function to identity the role of user, go to manager page or Coordinator
//respectively.
session_start();
include ("UQname.php");

if ($userrole == "manager") {
 	header("Location: InspectionManager.php");
} else {
	header("Location: InspectionCoordinator.php");
}
?>