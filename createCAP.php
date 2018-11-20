<?php
    include('UQname.php');
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

    <body style="margin:10pt">

        <form action="conn/addCAP.php" method="post">
            <h2>Create Corrective Action</h2>
            <div class="modal-title" id="input">
                <input type="text" class="form-control" rows="3" name="description" placeholder="description">
            </div>
            <div class="btn-group">
                <select class="btn btn-default" name="assignee">
                    <?php include('conn/getCordinators.php');?>
                </select>
            </div>

            <div class="btn-group">
                <select class="btn btn-default" name="prior">
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                        </select>
            </div>
            <div class="btn-group">
                <select class="btn btn-default" name="mark">
                            <option value="toDo">To do</option>
                            <option value="inProgress">In progress</option>
                            <option value="down">Down</option>
                            <option value="XDo">Overdue</option>
                        </select>
            </div>

            <p>Due date：
                <input type='date' class='form-control' id='myDate' name='inspDate' value=''>
            </p>

            <div class="footer">
                <input type="submit" class="btn btn-primary btn-lg" value="Submit">
            </div>

            <!-- Hidden variables -->
            <input type="hidden" name="inspection_id" value="<?php echo $_GET['inspection_id']; ?>" />
            <input type="hidden" name="question_id" value="<?php echo $_GET['question_id']; ?>" />
            <input type="hidden" name="sec_id" value="<?php echo $_GET['sec_id']; ?>" />
            <input type="hidden" name="creator" value="<?php echo $fullname ?>" />

        </form>


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
