<?php
include('conn/connect.php');
session_start();
$_SESSION['formID'] = $_POST['form_id'];
$id = $_SESSION['formID'];
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
        <br>
        <span class="heading1">Select the section</span><br>

        <table class="table table-striped">
            <caption></caption>
            <thead>
            <tr>
                <th> section</th>
                <th> selection</th>
            </tr>
            </thead>
            <form action="reportCreat.php" method="post">
                <div class="checkbox">
                <tbody>
                <tr>
                    <td>Section 1. Management</td>
                    <td> <label><input type="checkbox" name="checkbox[]" value="1"></label></td>
                </tr>

                <tr>
                    <td>Section 2. Training</td>
                    <td> <label><input type="checkbox" name="checkbox[]" value="2"></label></td>
                </tr>

                <tr>
                    <td>Section 3. Work Environment</td>
                    <td> <label><input type="checkbox" name="checkbox[]" value="3"></label></td>
                </tr>
                <tr>
                    <td>Section 4. Ergonomics</td>
                    <td> <label><input type="checkbox" name="checkbox[]" value="4"></label></td>
                </tr>
                <tr>
                    <td>Section 5. Amenities</td>
                    <td> <label><input type="checkbox" name="checkbox[]" value="5"></label></td>
                </tr>
                <tr>
                    <td>Section 6. Personal protective equipment (PPE)</td>
                    <td> <label><input type="checkbox" name="checkbox[]" value="6"></label></td>
                </tr>
                <tr>
                    <td>Section 7. Housekeeping & waste management</td>
                    <td> <label><input type="checkbox" name="checkbox[]" value="7"></label></td>
                </tr>
                <tr>
                    <td>Section 8. Floors & aisles</td>
                    <td> <label><input type="checkbox" name="checkbox[]" value="8"></label></td>
                </tr>
                <tr>
                    <td>Section 9. Special work procedures</td>
                    <td> <label><input type="checkbox" name="checkbox[]" value="9"></label></td>
                </tr>
                <tr>
                    <td>Section 10. Mechanical & heat hazards</td>
                    <td> <label><input type="checkbox" name="checkbox[]" value="10"></label></td>
                </tr>
                <tr>
                    <td>Section 11. Electrical equipment</td>
                    <td> <label><input type="checkbox" name="checkbox[]" value="11"></label></td>
                </tr>
                <tr>
                    <td>Section 12. Chemicals (general)</td>
                    <td> <label><input type="checkbox" name="checkbox[]" value="12"></label></td>
                </tr>
                <tr>
                    <td>Section 13. Flammable liquids</td>
                    <td> <label><input type="checkbox" name="checkbox[]" value="13"></label></td>
                </tr>
                <tr>
                    <td>Section 14. Compressed & fuel gases</td>
                    <td> <label><input type="checkbox" name="checkbox[]" value="14"></label></td>
                </tr>
                <tr>
                    <td>Section 15. Biological hazards (general)</td>
                    <td> <label><input type="checkbox" name="checkbox[]" value="15"></label></td>
                </tr>
                <tr>
                    <td>Section 16. Emergency equipment</td>
                    <td> <label><input type="checkbox" name="checkbox[]" value="16"></label></td>
                </tr>
                <tr>
                    <td>Section 17. Egress & evacuation</td>
                    <td> <label><input type="checkbox" name="checkbox[]" value="17"></label></td>
                </tr>
                <tr>
                    <td>Section 18. Fire protection</td>
                    <td> <label><input type="checkbox" name="checkbox[]" value="18"></label></td>
                </tr>
                </tbody>
                </div>
                <button type="submit" class='btn btn-primary'>submit</button>
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

</script>

</body>

</html>


<?php
include('conn/disconn.php');

?>
