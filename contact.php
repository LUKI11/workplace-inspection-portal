<?php 
session_start(); 
include('conn/connect.php');
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
                        </a><img src="images/contact.png" height="40"></div>
                    <div class="col-md-2">
                        Welcome,&nbsp;
                        <span id="welcomeName" class="bolding">
							<?php echo "{$fullname}";?>
						</span>
                        <img src="templateStyle/images/icon.jpeg" width="30px" height="30px">
                    </div>
                </div>
            </div>
        </div>
        <!-- Main content-->
       
        <div id="right-bot-container" class="container-fluid">
            <span class="heading1">Contact Details</span>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
			<a href="createcontact.php" class="btn btn-primary btn-lg" role="button">ADD CONTACT</a>
        </div>

		<form action="conn/delete.php" method="request">
            <table id="myTable" class="table table-striped" style="table-layout: fixed;">
            <thead>
                <tr>
                    <th class="topic">Faculty</th>
                    <th class="topic">Name</th>
                    <th class="topic">Phone</th>
                    <th class='topic'>Email</th>
                    <th class='topic'>Delete</th>               
                </tr>
                </thead>
				<tbody>     
                    <?php include('conn/showcontact.php')?>       
                </tbody>
            </table>
        </div>

    <!-- /#page-content-wrapper -->

    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="templateStyle/vendor/jquery/jquery.min.js"></script>
    <script src="templateStyle/vendor/popper/popper.min.js"></script>
    <script src="templateStyle/vendor/bootstrap/js/bootstrap.min.js"></script>
     <script type="text/javascript" src="templateStyle/vendor/Jsorter/jquery.tablesorter.js"></script>

    <!-- Menu Toggle Script -->
        <script>
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });

        </script>

    </body>

    </html>
<?php
    include('conn/disconn.php')
?>
