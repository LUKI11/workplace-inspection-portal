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
    <link type="text/css" rel="stylesheet" href="style.css">
	<link type="text/css" rel="stylesheet" href="infoStyle.css">
    <title>Work Safety Portal</title>

    <!-- Bootstrap core CSS -->
    <link href="templateStyle/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="templateStyle/sidebar.css" rel="stylesheet">
	
	    <!-- Bootstrap core JavaScript -->
    <script src="templateStyle/vendor/jquery/jquery.min.js"></script>
    <script src="templateStyle/vendor/popper/popper.min.js"></script>
    <script src="templateStyle/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
	var avaliable = [];
		var avaliable = [];
		var selected = new Array(avaliable.length);
		var avaliableId = new Array(avaliable.length);
		var selectedId = new Array(avaliable.length);
		var tempSelected;
		var tempSelectedId;
		var inspectionId;
		var aCount;
		var sCount;
		var count;
		var html = "";
		
	function validateForm(){
		
		if ($('#start').val() == "" ||  $('#finish').val() == "" || $('#Title').val() == "" || $('#Site').val() == "" 
			|| $('#Unit').val() == "" || $('#FirstName').val() == "" || $('#LastName').val() == ""){
				return false;
		}

		if (parseInt($('#finish').val()) < parseInt($('#start').val())){
				return false;
		}

		if (sCount == 0 && inspectionId == 1){
				return false;
		}
		return true;
	}
</script>
</head>

<body>
    <div id="wrapper">
    <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        <span style="color:white" id="roleType" class="bolding">
                            <?php
                            echo "$userrole"
                            ?>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="index.php"><img src="templateStyle/images/dashboard_icon.png" height="25"></a>
                </li>
                <li>
                    <a href="inspection.php"><img src="templateStyle/images/inspection_icon.png" height="25"></a>
                </li>
                <li>
                    <a href="report.php"><img src="templateStyle/images/report_icon.png" height="25"></a>
                </li>
                <li>
                    <a href="cap.php"><img src="templateStyle/images/cap_icon.png" height="25"></a>
                </li>
                <li>
                    <a href="contact.php"><img src="templateStyle/images/contact_icon.png" height="25"></a>
                </li>
                <li>
                    <a style="color:white" href="settingPage.php">Settings</a>
                </li>
                <li style="color:white" id="linkAPI"><a onclick="linkAPI()">Link iAuditor</li>
            </ul>
        </div>
                <div id="page-content-wrapper">
                    <div class="container-fluid">
                        <nav>
                            <div class="row">
                                <div class="col-md-10" style="">
                                    <a href="#menu-toggle" id="menu-toggle"><img src="templateStyle/images/menu.png" height="25">
                                    </a><img src="templateStyle/images/inspection.png" height="40"></div>
                                <div class="col-md-2">
                                    Welcome,&nbsp;
                                    <span id="welcomeName" class="bolding"></span>
                                    <img src="templateStyle/images/icon.jpeg" width="30px" height="30px">
                                </div>
                            </div>
                        </nav>
						</div>
						</div>

    <!-- Main content-->
    <div id="mainContent" class="container-fluid">
	<div>
     <div id="right-bot-container">
			<span class="heading1">Creating Inspection</span>
			<form action="conn/addInspection.php" onsubmit="return validateForm()" method="post">
			<ul>
			<li>
				 <h4>Audit Title: UQ OHS Workplace Assessment Inspection Checklist (v2.1, 3 July 2012)</h4>
				  <textarea cols="60" rows="2" name="title" id="Title" placeholder="Enter Title"></textarea>

				 <h4>Campus / Location / Site:</h4>
				 <textarea cols="60" rows="2" name="site" id="Site" placeholder="Enter Loaction"></textarea>


				 <h4>Organisational Unit / Workplace:</h4>
				 <textarea cols="60" rows="2" name="unit" id="Unit"  placeholder="Enter Workplace"></textarea>

				 <h4>Area / Facility Manager:</h4>
				 First name:
					<input type="text" name="firstname" id="FirstName" placeholder="Enter First Name"><br>
				 Last name:
  					<input type="text" name="lastname" id="LastName" placeholder="Enter Last Name"><br><br>
				
				Date: <input type="text" name="date" id="datepicker"></input>
				Start: <input type="text" name="start" id="start"></input>
				Finish: <input type="text" name="finish" id="finish"></input>
				<div id="inspectors">
					<div class="selectInspectors" id="selected">
						<table style="width:300px; padding: 0px; margin: 0px;" id="selectedTable">
							<tr><th>Selected</th></tr>
						</table>
					</div>
					<div class="selectInspectors" id="avaliable">
						<table style="width:300px; padding: 0px; margin: 0px;" id="avaliableTable">
						</table>
					</div>
				</div>
				<input type="hidden" name="selectedArr" id="sa" value="">
                <input type="submit" value="Submit" >
                <input type="reset">
			</li>
			</ul>
			</form>
		</div>
	</div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Menu Toggle Script -->
    <script>
	$(document).ready(function () {
		inspectionId = <?php echo $_SESSION['inspectionId'];?>;
		if (inspectionId != 1){
			$.post('conn/generateInspection.php', {id: inspectionId}, function(data){
				
				$("#Title").val(data[0][1]);
				$("#Site").val(data[0][2]);
				$("#Unit").val(data[0][3]);
				var name = data[0][4].split(" ");
				$("#FirstName").val(name[0]);
				$("#LastName").val(name[1]);
				var newDate = data[0][5].split("-");
				newDate = newDate[1] + "/" + newDate[2] + "/" + newDate[0];
				$("#datepicker").val(newDate);
				$("#start").val(data[0][6]);
				$("#finish").val(data[0][7]);
				$("#start").trigger('keyup');
				tempSelectedId = data[1];
				
				tempSelected = data[2];
				$("#start").trigger('keyup');
				init();
			});
		}
		$("#datepicker").datepicker({onSelect: function() {
			$("#start").trigger('keyup');
		}});

		$("#start, #finish").keyup(function(){
			if (inspectionId == 1 && $('#datepicker').val() != "" && $('#start').val() != "" && $('#finish').val() != ""  && parseInt($('#finish').val()) > parseInt($('#start').val())){		
					$.post('conn/generateInspectors.php', {date: $('#datepicker').val(), startTime: $('#start').val(), finishTime: $('#finish').val()}, function(data){
						avaliable = data[1];
						selected = new Array(avaliable.length);
						avaliableId = data[0];
						selectedId = new Array(avaliable.length);
						aCount = avaliable.length -1;
						sCount = 0;
						init();
					});
				} else if (inspectionId != 1) {
					$.post('conn/generateInspectors.php', {date: $('#datepicker').val(), startTime: $('#start').val(), finishTime: $('#finish').val()}, function(data){
						selected = tempSelected.slice();
						
						avaliable = data[1];
						avaliableId = data[0];
						selectedId = tempSelectedId.slice();
						var temp= new Array();
						var tempId = new Array();
						var c = 0;
						for (var i = 0; i < avaliableId.length; i++){
							if (!selectedId.includes(avaliableId[i])){
								temp[c] = avaliable[i];
								tempId[c] = avaliableId[i];
								c++;
							}
						}
						avaliable = temp.slice();
						avaliableId = tempId.slice();
						
						sCount = selected.length -1;
						aCount = avaliable.length;
						init();
					});
				}
			$("#avaliableTable").empty();
			$("#selectedTable").empty();
			$("<tr><th>Avaliable</th></tr>").appendTo($("#avaliableTable"));
			$("<tr><th>Selected</th></tr>").appendTo($("#selectedTable"));
		});

		$("#datepicker").click(function() {
			$(this).datepicker().datepicker("show");
		});

		function init(){
			$("#avaliableTable").empty();
			$("#selectedTable").empty();
			count= 0;
			html = "<tr><th>Avaliable</th></tr>";
			$(html).appendTo($("#avaliableTable"));
		
			for (var i = 0; i < avaliable.length; i++){
				if (avaliable[i] != null){
					add(avaliable[i], "avaliable");
				}
			}
			
			count= 0;
			html = "<tr><th>Selected</th></tr>";
			$(html).appendTo($("#selectedTable"));
			for (var i = 0; i < selected.length; i++){
				if (selected[i] != null){
					add(selected[i], "selected");
				}
			}
			var result = "";
			
			for(var i = 0; i < selected.length; i++) {
				result += selectedId[i] + " ";
			}

			$("#sa").val(result);
		}
		
		function add(name, table) {
			html = "<tr class='r' id="+ count +"><td>" + name + "</td></tr>";	
			count++;
			var table = $('#'+ table+ 'Table');
			$(html).appendTo(table);	
		}
		
		init();	
		
		$("#avaliableTable").on( "click", ".r", function() {
			if (inspectionId != 1) {
				sCount++;
				aCount--;
				selected[sCount] = $(this).text();
				selectedId[sCount] = avaliableId[$(this).attr('id')];
			
				avaliable[$(this).attr("id")] = avaliable[aCount];
				avaliableId[$(this).attr("id")] = avaliableId[aCount];
			
				avaliable[aCount] = null;
				avaliableId[aCount] = null;
			
			} else {
				selected[sCount] = $(this).text();
				selectedId[sCount] = avaliableId[$(this).attr('id')];
			
				avaliable[$(this).attr("id")] = avaliable[aCount];
				avaliableId[$(this).attr("id")] = avaliableId[aCount];
			
				avaliable[aCount] = null;
				avaliableId[aCount] = null;
				sCount++;
				aCount--;
			}
			init();
		});
		
		$("#selectedTable").on( "click", ".r", function() {
			if (inspectionId != 1) {
				avaliable[aCount] = $(this).text();
				avaliableId[aCount] = selectedId[$(this).attr('id')];
			
				selected[$(this).attr("id")] = selected[sCount];
				selectedId[$(this).attr("id")] = selectedId[sCount];
			
				selected[sCount] = null;
				selectedId[sCount] = null;
				
				sCount--;
				aCount++;	
			}  else {
				
				sCount--;
				aCount++;
				avaliable[aCount] = $(this).text();
				avaliableId[aCount] = selectedId[$(this).attr('id')];
			
				selected[$(this).attr("id")] = selected[sCount];
				selectedId[$(this).attr("id")] = selectedId[sCount];
			
				selected[sCount] = null;
				selectedId[sCount] = null;	
			}
			init();
		});
		
		$("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
	});
	
    </script>
</body>
</html>
