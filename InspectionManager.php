<?php
	session_start();
    include('conn/connect.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Work Safety Portal</title>

    <!-- Bootstrap core CSS -->
    <link href="templateStyle/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="templateStyle/sidebar.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="style.css">
	
	  <!-- Bootstrap core JavaScript -->
    <script src="templateStyle/vendor/jquery/jquery.min.js"></script>
    <script src="templateStyle/vendor/popper/popper.min.js"></script>
    <script src="templateStyle/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="templateStyle/vendor/Jsorter/jquery.tablesorter.js"></script>
</head>
<body>
<div id="wrapper">


    <?php include('nav.inc')?>

    <!-- Right Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">

                <div class="row">
                    <div class="col-md-10" style="">
                        <a href="#menu-toggle" id="menu-toggle"><img src="templateStyle/images/menu.png" height="25">
                        </a><img src="images/inspection.png" height="40"></div>
                    <div class="col-md-2">
                        Welcome,&nbsp;
                        <span id="welcomeName" class="bolding"></span>
                        <img src="templateStyle/images/icon.jpeg" width="30px" height="30px">
                    </div>
                </div>
        </div>
    </div>

     <!-- Main content-->

           <!-- <a href="cap.html"> -->
 		<div id="right-bot-container" class="container-fluid">
			<br>
			<span class="heading1">Scheduled inspections</span><br>
			<div id="buttons">

                    <input type="button" class="btn-primary btn-lg" id="create" value="Create" onclick="javascrtpt:window.location.href='InspectionInfo.php'">

					<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

                </div>
            
            <table class="table tablesorter table-striped" id="mytable" >
                <caption></caption>
             
                <thead>
                    <tr> 
                        <th> Area</th>
                        <th> Time</th>
                        <th> Assigned to</th>
                        <th> Change details</th>
                        <th> Report</th>
                    </tr>
                </thead>
                
                <tbody id="manager">
                    <?php include('conn/showInspection.php')?>
                </tbody>
            </table>
            
            <!--
			<tr>
				<td>
					<a href="Create_Inspection.php">Advanced Engineering Building (49-209)</a>
				</td>
				<td>
					<a href="#home">9:00AM</a>
				</td>
				<td>
					<a href="#home">Tim Hobson</a>
				</td>
					<td>
					<a href="#home">Change</a>
				</td>
					<td>
					<a href="#home">Report</a>
				</td>
			</tr>
            -->
    </div>
    </div>
    <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

  
    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
		
		$(".b").click(function(e) {;
            $.post('editInspectionRedirect.php', {id: this.value}, function(data){
				document.location = 'InspectionInfo.php';
			}); 
        });
		
		$("#create").click(function(e) {
			<?php $_SESSION['inspectionId'] = 1;?>
			document.location = 'InspectionInfo.php';

        });
    </script>

</body>

</html>
<?php
    include('conn/disconn.php')
?>