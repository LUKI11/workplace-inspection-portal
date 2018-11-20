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

        <!-- code for date picker -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
		<script type="text/javascript" src="//ajax.aspnetcdn.com/ajax/jquery.ui/1.8.10/jquery-ui.min.js"></script>
        <script src="//code.jquery.com/jquery-1.9.1.js"></script>
        <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <link rel="stylesheet" href="http://jqueryui.com/resources/demos/style.css">
        <script>
            $(function() {
                $( "#datepicker" ).datepicker();
            });
        </script>
    </head>
    <body>
        <div id="wrapper">
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
            <!-- Main content-->
            <div id="right-bot-container" class="container-fluid">
                 <span class="heading1">Corrective Action Plan</span>
               	<div class="buttons">
					<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
                </div>
                <div class="table-responsive">
                    <div style="height:1500px; overflow-y:scroll;overflow-x:hidden;">
						<table id="myTable"  class="table table-striped">
							<caption></caption>
							<thead>
								<tr>
									<th>Description</th>
									<th>Status</th>
									<th>Assignee</th>
									<th>Creator</th>
									<th>Priority</th>
									<th>Due date</th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php include('conn/showCAP.php')?>
							</tbody>
						</table>
                    </div>
					
                    <form class="modal fade" style="500px" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" action="conn/editCAP.php" method="post">
                        <div class="modal-dialog">
                            <div class="modal-content" style="width:110%">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        &times;
                                    </button>
                                    <H4 class="modal-title" id="myModalLabel"></H4>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-title" id="input">
                                        <input type="text" id="id_input" name="capID" class="form-control" readonly>
                                        <input type="text" name="description" class="form-control" rows="3" placeholder="description">
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
                                            <option value="To Do">To do</option>
                                            <option value="In Progress">In progress</option>
                                            <option value="Down">Down</option>
                                            <option value="Overdue">Overdue</option>
                                        </select>
                                    </div>
                                    <div class="btn-group">
                                        <p>Due date：<input type='date' class='form-control' id="datepicker" name="date" value=''></p>
                                    </div>
									<input type="hidden" value="<?php echo $fullname ?>" name="userid">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" value="Submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal -->
                    </form>
                </div>
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
            
            $('.table-responsive button').click(function() {
                if (jQuery.isNumeric($(this).val())){
                    // change only when its ID (excluding action submit)
                    $("#id_input").val($(this).val());
                    
                }else{
                    // nothing
                }
            });
			
			function myFunction() {
				var input, filter, table, tr, td, i;
				input = document.getElementById("myInput");
				filter = input.value.toUpperCase();
				table = document.getElementById("myTable");
				tr = table.getElementsByTagName("tr");
				for (i = 0; i < tr.length; i++) {
					td = tr[i].getElementsByTagName("td")[2];
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
