<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link type="text/css" rel="stylesheet" href="style.css">

    <title>Work Safety Portal</title>

    <!-- Bootstrap core CSS -->
    <link href="templateStyle/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="templateStyle/sidebar.css" rel="stylesheet">

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
        <div id="mainContent" class="container-fluid">
            <div>
                <div id="right-bot-container">
                    <span class="heading1">Creating Inspection</span>

                    <ul>
                        <li>
                            <form target="_self" action="inspectionTransition/saveForm4.php" method="post">
                                <!-- the actual generation of questions are outsourced to a php -->
                                <?php include('inspectionTransition/genQuestions4.php'); ?>

                                <input type="submit" value="Previous Page" name="btn_prev">
                                <input type="submit" value="Save and Exit" name="btn_save">
                                <input type="submit" value="Next Page" name="btn_next">
                            </form>
                        </li>
                    </ul>


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

        </script>

</body>

</html>
    
