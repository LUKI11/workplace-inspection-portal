 <?php
	session_start();
	include('connect.php');
	header('Content-Type: application/json');
	$date = $_REQUEST['date'];
	$dateArray = explode("/", $date);
	$day= date("l", mktime(0, 0, 0, $dateArray[2], $dateArray[0], $dateArray[1]));
	$date = $dateArray[2] . '-' . $dateArray[0] . '-' . $dateArray[1];
	$startTime = $_REQUEST['startTime'];
	$finishTime = $_REQUEST['finishTime'];
	
	$sql = "Select count(distinct user.id) from user, schedule where role = 'coordinator'
		and user.id = schedule.user_id and '". $startTime ."' >= schedule.start_time and '". $finishTime ."' <= schedule.finish_time and schedule.work_day = '". $day ."';";
		
	/*	$sql = "Select count(distinct user.id) from user, schedule, inspection_assignees, inspection where role = 'coordinator'
		and user.id = schedule.user_id and '". $startTime ."' >= schedule.start_time and '". $finishTime ."' <= schedule.finish_time and schedule.work_day = '". $day ."' 
		and user.id = inspection_assignees.user_id and inspection.date ='". $date ."'  and inspection.id = inspection_assignees.inspection_id and inspection.start
		between '".$startTime ."' and '". $finishTime ."' and inspection.finish between '". $startTime ."' and '". $finishTime ."';";*/
		
	$count = 0;
	$array = array();
	$id = array();
	$name = array();
	$rejectId = array();
	$count = mysqli_query($conn,$sql);
	$row = mysqli_fetch_all($count);
	$count = (int)$row[0][0];
	$sql = "Select distinct user.id, user.name from user, schedule where role = 'coordinator'
	and user.id = schedule.user_id and '". $startTime ."' >= schedule.start_time and  '". $finishTime ."' <= schedule.finish_time and schedule.work_day = '". $day ."';";
		
	if (mysqli_query($conn, $sql)){ 
        $result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_all($result);
		
		$sql = "Select distinct user.id, user.name from user, schedule, inspection_assignees, inspection where role = 'coordinator'
		and user.id = schedule.user_id and '". $startTime ."' >= schedule.start_time and  '". $finishTime ."' <= schedule.finish_time and schedule.work_day = '". $day ."'
		and user.id = inspection_assignees.user_id and inspection.date ='". $date ."'  and inspection.id = inspection_assignees.inspection_id and inspection.start between 
		'". $startTime ."' and '". $finishTime ."' and inspection.finish between '". $startTime ."' and '". $finishTime ."';";
		$result2 = mysqli_query($conn,$sql);
		$row2 = mysqli_fetch_all($result2);
		
		for($i = 0; $i < $count; $i++){
			$id[$i] = $row[$i][0];
			$name[$i] = $row[$i][1];
		}
		for($j = 0; $j < count($row2); $j++){
			if (in_array($row2[$j][0], $id)){
				unset($id[$j]);
				unset($name[$j]);
				$id = array_values($id);
				$name = array_values($name);
			}
		}
    }else{
        echo "there is an error generating inspectors.";
    }
	
	$array[0] = $id;
	$array[1] = $name;

	echo json_encode($array);

	include('disconn.php');
?>