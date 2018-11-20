<!DOCTYPE html>
<html>
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
<div id ="main">
    <?php include('nav.inc')?>

    <div id="page-content-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-10" style="">
                    <a href="#menu-toggle" id="menu-toggle"><img src="templateStyle/images/menu.png" height="25">
                    </a><img src="images/cap.png" height="40"></div>
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


		</div>
		<div id="right-bot-container">
      		 <a href="related_report.html"><div class = "Create_button1" >
                     <h2>Related Report</h2>
			</div></a>
	  		<div id = "cap_sample">
				<object data="Recover- Corrective action plan- 2016.pdf" type="application/pdf" width="1150px" height="500px">
      				  alt : <a href="test.Recover- Corrective action plan- 2016">test.pdf</a>
   				 </object>
	  		</div>
		</div>
	</div>

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

</body>
</html>
