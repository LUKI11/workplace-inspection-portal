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

</head>

<body>

    <div id="wrapper">

	<?php include('nav.inc')?>

                <!-- Main content-->
                <div id="mainContent" class="container-fluid">
                    <div>
                        <!-- <a href="cap.html"> -->
                        <p>
                            Job Role
                            <select>
                            <option value="safetycoordinator">Safety Coordinator</option>
                            <option value="manager">Manager</option>
                        </select>
                        </p>
                        <p>
                            Work Hours (army time) 800-1200 1300-1800
                        </p>
                        <p>
                            Work Days
                            <button class="btn_focus" type="button">S</input>
                        <button class="btn_focus" type="button">M</button>
                            <button class="btn_focus" type="button">T</button>
                            <button class="btn_focus" type="button">W</button>
                            <button class="btn_focus" type="button">T</button>
                            <button class="btn_focus" type="button">F</button>
                            <button class="btn_focus" type="button">S</button>
                        </p>
                        <br>
                        <div class="Create_button2">
                            Apply
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <!-- </a> -->
                    </div>


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

    </script>

</body>

</html>
