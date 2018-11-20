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
    </head>
    <body>
        <div id="wrapper">
            <?php include('nav.inc')?>
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-10" style="">
                            <a href="#menu-toggle" id="menu-toggle"><img src="templateStyle/images/menu.png" height="25">
                            </a><img src="images/inspection.png" height="40"></div>
                        <div class="col-md-2">
                            Welcome,&nbsp;
                            <span id="welcomeName" class="bolding"><?php echo "{$fullname}";?></span>
							
                            <img src="templateStyle/images/icon.jpeg" width="30px" height="30px">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main content-->
            <div id="right-bot-container" class="container-fluid">
                <br>
                <span class="heading1">Scheduled inspections (Coordinator View)</span><br>
				<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
				<table id="myTable"  class="table table-striped">
                    <caption></caption>
                    <thead>
                        <tr>
                            <th> Area</th>
							<th> Assignees</th>
                            <th> Time</th>
                            <th> Action</th>
                        </tr>
                    </thead>
                    <form action="inspectionTransition/formRedirect.php" method="post">
                        <tbody>
                            <?php include('conn/showInspectionCoordinator.php')?>
                        </tbody>
                    </form>
                </table>
            </div>
        </div>
        </div>
        <!-- /#page-content-wrapper -->

        </div>
        <!-- /#wrapper -->
        <!-- Bootstrap core JavaScript -->
        <script src="templateStyle/vendor/jquery/jquery.min.js"></script>
        <script src="templateStyle/vendor/popper/popper.min.js"></script>
        <script src="templateStyle/vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Menu Toggle Script -->
        <script>
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
			function myFunction() {
				var input, filter, table, tr, td, i;
				input = document.getElementById("myInput");
				filter = input.value.toUpperCase();
				table = document.getElementById("myTable");
				tr = table.getElementsByTagName("tr");
				for (i = 0; i < tr.length; i++) {
					td = tr[i].getElementsByTagName("td")[3];
					if (td) {
						if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
							tr[i].style.display = "";
						} else {
							tr[i].style.display = "none";
						}
					}       
				}
			}
		</script>	

    </body>
    </html>
    <?php
    include('conn/disconn.php')
?>
