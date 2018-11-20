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
      <meta charset="utf-8">
  <link rel="stylesheet" href="//apps.bdimg.com/libs/jqueryui/1.10.4/css/jquery-ui.min.css">
  <script src="//apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="//apps.bdimg.com/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="jqueryui/style.css">
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
                            <span id="welcomeName" class="bolding"></span>
                            <img src="templateStyle/images/icon.jpeg" width="30px" height="30px">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main content-->
            <div id="right-bot-container" class="container-fluid">
                <form action="conn/addcontact.php" method="post">
                <h2>New contact</h2>
                    <div class="modal-title" id="input">
                        <input type="text" class="form-control" rows="3" name="Faculty" placeholder="Faculty">
                    </div>
                     <div class="modal-title" id="input">
                        <input type="text" class="form-control" rows="3" name="Name" placeholder="Name">
                    </div>
                     <div class="modal-title" id="input">
                        <input type="text" class="form-control" rows="3" name="Phone" placeholder="Phone">
                    </div>
                     <div class="modal-title" id="input">
                        <input type="text" class="form-control" rows="3" name="Email" placeholder="Email">
                    </div>
                    <div class="footer">
                        <input type="submit" class="btn btn-primary btn-lg" value="Submit">
                    </div>
                </form>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
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
<?php
    include('conn/disconn.php')
?>
