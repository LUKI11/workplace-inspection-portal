      <?php
       include_once('connect.php');


    // sending query
   if (isset($_GET['idd'])){
   $idd = $_GET['idd'];
   
   $sql = ("DELETE FROM contact WHERE Name = '$idd'");
   if(mysqli_query($conn, $sql)){
   //echo "form submitted, now redirect u back to the eath";
   }else{
   //echo "failed";
   }
    
    
}

  
   
?>
   <meta http-equiv="refresh" content="0;URL=../contact.php" />
