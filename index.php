<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="sweetalert/sweetalert.min.js"></script>
<script type="text/javascript" src="sweetalert/swal-forms.js"></script>
<link type="text/css" rel="stylesheet" href="sweetalert/sweetalert.css">
<link type="text/css" rel="stylesheet" href="sweetalert/swal-forms.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700&subset=latin,cyrillic">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans:400,700&subset=latin,vietnamese,latin-ext">


<script type="text/javascript">

    //Sample Google Interactive Graphs

    // ----------------- pie chart field --------------------
    // start drawing chart
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);
    google.charts.setOnLoadCallback(drawcapChart);


    function drawChart() {
        var jsonData = $.ajax({
            url: "getselection.php",
            dataType: "json",
            async: false
        });

        // parsing
        jsonData = jQuery.parseJSON(jsonData.responseText);
        var values_ = new Array(['selection', 'count']);
        var c = 0;

        // iterate through all json row
        while (c < Object.keys(jsonData).length) {
            values_.push([
                jsonData[c].selection,
                parseInt(jsonData[c].count)
            ]);
            c++;
        };

        console.log(values_);

        var gdata = google.visualization.arrayToDataTable(values_);
        var options = {
            title: 'Performance analysis'
        };
	
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));

        chart.draw(gdata, options);

    }


    function drawcapChart() {
        var capjsonData = $.ajax({
            url: "getcapprogress.php",
            dataType: "json",
            async: false
        });

        // parsing
        capjsonData = jQuery.parseJSON(capjsonData.responseText);
        var capvalues_ = new Array(['status', 'count']);
        var c = 0;

        // iterate through all json row
        while (c < Object.keys(capjsonData).length) {
            capvalues_.push([
                capjsonData[c].status,
                parseInt(capjsonData[c].count)
            ]);
            c++;
        };

        console.log(capvalues_);

        var gdata = google.visualization.arrayToDataTable(capvalues_);
        var options = {
            title: 'Status analysis'
        };

        var capchart = new google.visualization.PieChart(document.getElementById('cap_div'));

        capchart.draw(gdata, options);
    }

</script>

<title>Work Safety Portal</title>

<!-- Bootstrap core CSS -->
<link href="templateStyle/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="templateStyle/sidebar.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">
        <div id="main">
            <?php include('nav.inc')?>
            <!-- Right Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <nav>
                        <div class="row">
                            <div class="col-md-10" style="">
                                <a href="#menu-toggle" id="menu-toggle"><img src="templateStyle/images/menu.png" height="25">
                                </a><img src="images/dashboard.png" height="40"></div>
                            <div class="col-md-2">
                                Welcome,&nbsp;
                                <span id="welcomeName" class="bolding"><b>
                                 <?php
                             echo "{$fullname}";
                                     ?>
                                </b>
                            </span>
                                <img src="templateStyle/images/icon.jpeg" width="30px" height="30px">
                            </div>
                        </div>
                    </nav>
                    <!-- Main content-->
                    <div id="mainContent" class="container-fluid">
                        <div id="right-bot-container">
                            <h2>My Schedules </h2>
                            <table id="myTable" class="table table-striped" style="table-layout: fixed;">
                                <th>Title</th>
                                <th>Location</th>
                                <th>Date</th>
                                <th>Action</th>
                            </table>
                            <div style="height:200px; overflow-y:scroll;">
                                <form action="inspectionTransition/formRedirect.php" method="post">
                                <table id="myTable" class="table table-striped" style="table-layout: fixed;">
                                    
								<?php include('indexpage/notification.php'); ?>
                                </table>
                                </form>
                            </div>

                            <h3>Overall Inspection Progress </h3>
                            <div id="chart_div"></div>
                            <h3>Overall Corrective Action Performance </h3>
                            <div id="cap_div"></div>
                        </div>

                    </div>
                </div>
                <!-- /#page-content-wrapper -->

            </div>
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
            <!-- /#wrapper -->


</body>

</html>


<?php include('conn/disconn.php')?>