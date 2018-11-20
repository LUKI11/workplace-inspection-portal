<?php
    require_once "uq/auth.php";
    auth_require()
?>

<!DOCTYPE html>
<html>

<head>
    <!-- Site made with Mobirise Website Builder v4.3.0, https://mobirise.com -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v4.3.0, mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/images/wip-282x128.jpg" type="image/x-icon">
    <meta name="description" content="">
    <title>admin</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700&subset=latin,cyrillic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans:400,700&subset=latin,vietnamese,latin-ext">
    <link rel="stylesheet" href="assets/tether/tether.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/puritym/css/style.css">
    <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">



</head>

<body>
    <nav class="navbar navbar-light mbr-navbar navbar-fixed-top" id="ext_menu-h" data-rv-view="30" style="background-color: rgb(255, 255, 255);">
        <div class="container">
            <button class="navbar-toggler pull-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2">
            <div class="hamburger-icon"></div>
        </button>

            <div class="clearfix"></div>
            <div class="collapse navbar-toggleable-sm" id="exCollapsingNavbar2">
                <span class="navbar-logo"><a href="index.html"><img src="assets/images/wip-282x128.jpg" alt="Mobirise"></a></span>
                <span><a class="navbar-brand" href="index.html">Workplace Inspection Portal</a></span>

                <ul class="nav navbar-nav pull-xs-right">
                    <li class="nav-item"><a class="btn btn-secondary-outline" href="page2.php">Admin</a></li>
                </ul>

                <ul class="nav navbar-nav pull-xs-right">
                    <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#bottom">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="page1.html">Contact us</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Line chart -->
    <section class="mbr-section mbr-section-nopadding mbr-after-navbar" id="msg-box5-r" data-rv-view="45" style="background-color: rgb(255, 255, 255); padding-top: 0rem; padding-bottom: 0rem;">

        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-9 mbr-table-cell-lg image-size" style="width: 50%;">
                    <div class="mbr-figure">
                        <div id="chart_div"></div>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-3 mbr-inner-padding text-xs-center mbr-table-cell-lg">
                    <h3 class="mbr-section-title display-4">Clickstream Data</h3>

                    <div class="lead">
                        <p>This section provides the submit count (none empty dates) for the previous 7 days. The trend could be observed better by filtering empty date.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Pie chart -->
    <section class="mbr-section mbr-section-nopadding" id="msg-box4-q" data-rv-view="42" style="background-color: rgb(255, 255, 255); padding-top: 0rem; padding-bottom: 0rem;">

        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-lg-3 mbr-inner-padding text-xs-center mbr-table-cell-lg">
                    <h3 class="mbr-section-title display-4">Popular Age Groups</h3>

                    <div class="lead">
                        <p>Here are the distributions grouped by age.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-9 mbr-table-cell-lg image-size" style="width: 60%;">
                    <div id="piechart" style="width: 700px; height: 500px;"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- customer info -->
    <section class="mbr-section mbr-section-nopadding mbr-after-navbar" id="msg-box5-r" data-rv-view="45" style="background-color: rgb(255, 255, 255); padding-top: 0rem; padding-bottom: 0rem;">

        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-9 mbr-table-cell-lg image-size" style="width: 50%;">
                    <div class="mbr-figure">
                        <table class="table table-striped " id="infoTable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Age</th>
                                    <th>Occupation</th>
                                    <th>Comment</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-3 mbr-inner-padding text-xs-center mbr-table-cell-lg">
                    <h3 class="mbr-section-title display-4">Potential Customer Information</h3>

                    <div class="lead">
                        <p>Here are the list of potential customers you might want to contact.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="mbr-section mbr-section-small mbr-footer " id="contacts1-i " data-rv-view="32 " style="background-color: rgb(55, 56, 62); padding-top: 4.5rem; padding-bottom: 4.5rem; ">

        <div class="container ">
            <div class="row ">
                <div class="col-xs-12 col-md-3">
                    <div>
                        <a href="index.html"><img src="assets/images/wip-265x146.jpg"></a>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3 ">
                    <p><strong>Address</strong><br>The University of Queensland,<br>Brisbane, QLD</p>
                </div>
                <div class="col-xs-12 col-md-3 ">
                    <p><strong>Contacts</strong><br> Email: peng.luo@uqconnect.net<br> Phone: +1 (0) 000 0000 001<br> Fax: +1 (0) 135792468</p>
                </div>
                <div class="col-xs-12 col-md-3 "><strong>Links</strong>
                    <ul>
                        <li><a href="page1.html ">Contact us</a></li>
                        <li><a href="page2.php ">Admin logn in</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <script src="assets/web/assets/jquery/jquery.min.js "></script>
    <script src="assets/tether/tether.min.js "></script>
    <script src="assets/bootstrap/js/bootstrap.min.js "></script>
    <script src="assets/smooth-scroll/SmoothScroll.js "></script>
    <script src="assets/puritym/js/script.js "></script>


</body>

</html>

<!-- Info and charts api -->
<script type="text/javascript " src="https://www.gstatic.com/charts/loader.js "></script>
<script type="text/javascript " src="infoAndCharts.js "></script>
