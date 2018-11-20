<?php
// Start the session
session_start();
$_SESSION["user"] = "$userid";
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
    <link type="text/css" rel="stylesheet" href="styleSetting.css">
    <script src="javascript.js"></script>


	    <!-- Bootstrap core JavaScript -->
    <script src="templateStyle/vendor/jquery/jquery.min.js"></script>
    <script src="templateStyle/vendor/popper/popper.min.js"></script>
    <script src="templateStyle/vendor/bootstrap/js/bootstrap.min.js"></script>

</head>

<body>
<div id="wrapper">
    <?php include('nav.inc')?>
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10" style="">
                    <a href="#menu-toggle" id="menu-toggle"><img src="templateStyle/images/menu.png" height="25"></a>
					<h1>setting</h1>
				</div>
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
    <div id="mainContent" class="container-fluid">
        <div>
        <!-- <a href="cap.html"> -->
        <p>
        Job Role
        <select id="job">
			<option name="Coordinator" value="coordinator">Safety Coordinator</option>
			<option  name = "Manager" value="manager">Safety Manager</option>
		</select>
        </p>
        <p> Work Hours (army time) </p>
		<div class="time">
			<input id="startWork" type="text"> -</input> 
			<input id="finishWork" type="text"> </input>
		</div>
		<p>Break time (army time) </p>
		<div class="time">
			<input id="startBreak" type="text"> -</input>
			<input id="finishBreak" type="text"> </input>
		</div>
        <p>
			Work Days
            <button class="btn_focus" type="button" id="Sunday" value="false">S</button>
            <button class="btn_focus" type="button" id="Monday" value="false">M</button>
            <button class="btn_focus" type="button" id="Tuesday" value="false">T</button>
            <button class="btn_focus" type="button" id="Wednesday" value="false">W</button>
            <button class="btn_focus" type="button" id="Thursday" value="false">T</button>
            <button class="btn_focus" type="button" id="Friday" value="false">F</button>
            <button class="btn_focus" type="button" id="Saturday" value="false">S</button>
        </p>
        <div class="C2">
            <button name="apply" value="apply">Apply</button>
        </div>
		<label id="error" ></label>
        <br>
        <br>
        <!-- </a> -->
        </div>
    </div>         
</div>
    <!-- /#wrapper -->

    <!-- Menu Toggle Script -->
    <script>
	var count = 0;
	var job = '';
	var startWork = '';
	var finishWork = '';
	var startBreak = '';
	var finishBreak = '';
			
	var worksOn = [];
	
	function init() {
		$.post('conn/getSettings.php', {job: "oi"}, function(data) {
			
			var t1 = data[1][0][1];
			var t2 = data[1][0][2];
			var t3 = data[1][0][3];
			var t4 = data[1][0][4];
			
			$("#job").val(data[0][0]);
			$("#startWork").val(t1);
			$("#finishWork").val(t2);
			$("#startBreak").val(t3);
			$("#finishBreak").val(t4);
			
			for(var i = 0; i < data[1].length ; i++){
				
				if (data[1][i][0] == "Monday"){
					$("#Monday").toggleClass('click');
					$("#Monday").val('true');
				}
				else if (data[1][i][0] == "Tuesday"){
					$("#Tuesday").toggleClass('click');
					$("#Tuesday").val('true');
				}
				else if (data[1][i][0] == "Wednesday"){
					$("#Wednesday").toggleClass('click');
					$("#Wednesday").val('true');
				}
				else if (data[1][i][0] == "Thursday"){
					$("#Thursday").toggleClass('click');
					$("#Thursday").val('true');
				}
				else if (data[1][i][0] == "Friday"){
					$("#Friday").toggleClass('click');
					$("#Friday").val('true');
				}
				else if (data[1][i][0] == "Saturday"){
					$("#Saturday").toggleClass('click');
					$("#Saturday").val('true');
				}
				else if (data[1][i][0] == "Sunday"){
					$("#Sunday").toggleClass('click');
					$("#Sunday").val('true');
				}
			}
		});
	}
	init();
	$('.btn_focus').click(function(e){
		$(this).toggleClass('click');
			if (this.value == "false"){
				$(this).val('true');
			} else {
				$(this).val('false');
			}
		});
		

	$('.C2').click(function(){
		job = $("#job").val();
		startWork = $("#startWork").val();
		finishWork = $("#finishWork").val();
		startBreak = $("#startBreak").val();
		finishBreak = $("#finishBreak").val();
			
		if ($("#Sunday").val()== "true") {
			worksOn[count] = "Sunday";
			count++;
		}
		if ($("#Monday").val()== "true") {
			worksOn[count] = "Monday";
			count++;
		}
		if ($("#Tuesday").val()== "true") {
			worksOn[count] = "Tuesday";
			count++;
		}
		if ($("#Wednesday").val()== "true") {
			worksOn[count] = "Wednesday";
			count++;
		}
		if ($("#Thursday").val()== "true") {
			worksOn[count] = "Thursday";
			count++;
		}
		if ($("#Friday").val()== "true") {
			worksOn[count] = "Friday";
			count++;
		}
		if ($("#Saturday").val()== "true") {
			worksOn[count] = "Saturday";
			count++;
		}
		count = 0;
		if (validate() == true){
			$.post('conn/applySettings.php', {job: job, startWork: startWork, finishWork: finishWork,
				startBreak: startBreak, finishBreak: finishBreak, worksOn: worksOn}, function(data) {
				});
			}
		});

        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
		
		function validate(){
			
			if (!isNaN(startWork) || !isNaN(finishWork) || !isNaN(startBreak) || !isNaN(finishBreak)){
				
				if (parseInt(finishWork) > 2399) {
					$("#error").text("Military time cannot exceed 2399");
					return false;
				}
				
				if (parseInt(startWork) < 0) {
					$("#error").text("Military time cannot be less than 0");
					return false;
				}
				
				if (startWork.length != 4 || finishWork.length != 4 || startBreak.length != 4 || finishBreak.length != 4) {
					$("#error").text("every field must contain 4 digits");
					return false;;
				}
				
				if (startWork < finishWork && startWork < startBreak && startBreak < finishBreak && finishBreak < finishWork) {
					$("#error").text("");
					return true;
				} else {
					$("#error").text("Invalid hours, please make sure the break time is within the work hours");
					return false;
				}
			}
			$("#error").text("One of the hourly inputs in not a number");
			return false;
		}
		
		
    </script>
</body>
</html>
