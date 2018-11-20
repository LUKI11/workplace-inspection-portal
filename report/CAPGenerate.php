<?php
session_start();
ob_start();

include('../conn/connect.php');
$inspID = $_GET['insp_id'];

function fetch_data($conn, $inspID, $req_sec, $req_set, $corActions){

    // Questions are divided into arrays, so system can generate
// questions from these lists
    $S1 = array(
        "Management",
        "Is the OH&S Policy for the University prominently displayed on alocal noticeboard?",
        "Is there a designated Safety Coordinator?",
        "Is the work group represented on an OH&S Committee?",
        "Are there written safe operating procedures or risk assessments?",
        "Is the area aware of specific safety guidelines & procedures?",
        "Are key safety rules displayed in work areas?",
        "Are checks made on qualifications & training of operators?",
        "Are incidents and accidents reported and recorded on the UQ online Injury, Illness, 
    and Incident Reporting System?",
        "Is there an effective system for reporting & correcting hazards?");

    $S2 = array(
        "Training",
        "Are all workers required to complete the UQ online 'General Workplace Safety Induction'?",
        "Are all workers required to complete Annual Fire Safety Training?",
        "Are all new workers required to participate in a local site induction, and complete the UQ 
    'New Worker OH&S Induction Checklist'?",
        "Is training provided specific to the individual workplace?");

    $S3 = array(
        "Work Environment",
        "Do the general ventilation provisions appear sufficient?"
    );

    $S4 = array(
        "Ergonomics",
        "Is layout of work area suitable for tasks?",
        "Are appropriate manual handling controls in place?",
        "Are excessively repetitive tasks avoided?",
        "Is appropriate mechanical handling equipment provided?"
    );

    $S5 = array(
        "Amenities",
        "Are separate & clean meal-rooms provided?",
        "Is drinking water readily available?",
        "Are washing facilities adequate?",
        "Are toilets sufficient?",
        "If required, are lockers or hangers provided for work-clothes?",
        "Are staff amenities kept clean?"
    );

    $S6 = array(
        "Personal protective equipment (PPE)",
        "Has the need for personal protective equipment been assessed?",
        "If PPE is required, has it been provided? ",
        "Is training provided on the use of PPE?",
        "Is PPE maintained and stored correctly?"
    );

    $S7 = array(
        "Housekeeping & waste management",
        "Are sufficient storage, racks and bins provided?",
        "Is there a system for the safe disposal of general waste?",
        "Is there a system for the safe disposal of chemical waste?",
        "Is training provided on waste disposal procedures?",
        "Are fume cupboards kept uncluttered? "
    );

    $S8 = array(
        "Floors & aisles",
        "Is the flooring structurally sound?",
        "Is the floor surface even? ",
        "Is the floor clear of waste, oil & water?",
        "Is the area free of tripping hazards?",
        "Are aisles of sufficient width?",
        "Are aisles marked? e.g. workshops, walkways? "
    );

    $S9 = array(
        "Special work procedures",
        "Is there a permit & induction procedure for outside contractors?",
        "Is specific OH&S advice provided to cleaners & maintenance personnel entering biological 
    or chemical laboratories?",
        "Are special procedures in place for hot work? ",
        "Are special procedures in place for confined spaces?",
        "Are special procedures in place for working at heights?",
        "Are there procedures for out-of-hours work or working alone?"
    );

    $S10 = array(
        "Mechanical & heat hazards",
        "Is machine guarding adequate?",
        "Are there adequate guard rails on ramps & walkways?",
        "Do ladders and steps appear adequate?",
        "Is pressure equipment installed?",
        "Are pressure relief valves, gauges and other safety systems regularly tested?",
        "Is electrical work carried out in accordance with the Electrical Safety Management Plan (ESMP)?"
    );

    $S11 = array(
        "Electrical equipment",
        "Do multi-outlet boards have residual current devices?",
        "Do multi-outlet boards have individual switches?",
        "Are trailing leads eliminated?",
        "Has electrical equipment been safety tested in accordance with legislative and UQ requirements?"
    );

    $S12 = array(
        "Chemicals (general)",
        "Is there a register of hazardous chemicals?",
        "Are Safety Data Sheets (SDS) available for all chemicals? e.g. via Chemwatch",
        "Are containers and their labels complete & in good condition?",
        "Have decanted substances been labelled in accordance with legislative and UQ requirements?",
        "Is the use of chemicals subject to risk assessment?",
        "Is general storage for chemicals sufficient, including security?",
        "Is there segregation of incompatible classes of chemicals?",
        "Is there a procedure for dealing with chemical spills?"
    );

    $S13 = array(
        "Flammable liquids",
        "Are quantities of flammable liquids kept to within the storage limit?",
        "Are flammable liquids cabinets provided? Are they correctly used?",
        "Is flammable liquid use & storage well away from heat & ignition sources?"
    );

    $S14 = array(
        "Compressed & fuel gases",
        "Is the number of cylinders inside rooms kept to a storage limit?",
        "Are incompatible gases segregated?",
        "Are cylinders securely restrained?",
        "Are gas systems periodically pressure & leak tested?"
    );

    $S15 = array(
        "Biological hazards (general)",
        "If your laboratory requires physical containment e.g. PC2, are permits and certifications current?",
        "Has the need for vaccinations been assessed? ",
        "If vaccinations are required, are they provided prior to the commencement of activities?",
        "Are staff aware of access issues for non-laboratory staff?",
        "Is there a current IBC or OGTR number for Genetic Manipulation work?",
        "Are Biological Safety Cabinets tested annually?",
        "Have staff been trained in transport requirements for infectious, diagnostic or genetically modified material?",
        "Is there an autoclave register of maintenance and faults?",
        "Are AQIS permits current?"
    );

    $S16 = array(
        "Emergency equipment",
        "Are emergency procedures available?",
        "Are emergency contact telephone numbers displayed?",
        "Is a safety shower and appropriate eye-wash unit provided?",
        "Are people provided with regular training in the use of safety equipment?",
        "Is all safety equipment periodically tested?",
        "Is a first aid kit available and regularly checked?",
        "Are there trained first aid officers?"
    );

    $S17 = array(
        "Egress & evacuation",
        "Are evacuation procedures displayed?",
        "Are emergency floor plans displayed?",
        "Are emergency wardens appointed?",
        "Is fire & emergency training provided?",
        "Are regular emergency practices conducted?",
        "Are emergency exits kept clear?",
        "Is there emergency lighting?"
    );

    $S18 = array(
        "Fire protection",
        "Are fire extinguishers provided?",
        "Is there a fire detection system?",
        "Is the fire alarm audible in all rooms?",
        "Is the push-button alarm accessible?",
        "Is there clear access for the Fire Service?"
    );

// questions list in order
    $Questions = array($S1,$S2,$S3,$S4,$S5,$S6,$S7,$S8,$S9,$S10,$S11,$S12,$S13,$S14,$S15,$S16,$S17,$S18);
    
    $sections = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18);
    $output ="<div id='right-bot-container'>
        <table id='myTable' class='table table-striped'>
        <thead >
        <tr>
            
            <th> Proposed Corrective Action </th>
            <th> Priority</th>
            <th> Person
                Responsible for
                follow-up</th>
            <th> Nominated
                Completion
                Date</th>
            <th> Status</th>
        </tr>
        </thead>
        <form action= method='post'>
            <tbody>";

    
        
        // this section is needed        
        $sql = "SELECT * FROM  cap WHERE cap.inspection_id = {$inspID};";
		$results = mysqli_query($conn, $sql);
		$capId = mysqli_fetch_assoc($results);
		$capId = $capId["id"];

        // this section is needed        
        $sql = "SELECT corrective_actions.* FROM corrective_actions WHERE corrective_actions.cap_id = {$capId};";
		
		$results = mysqli_query($conn, $sql);
		while($ca = mysqli_fetch_assoc($results)){
			$sql2 = "SELECT name FROM user WHERE id = '".$ca['assignee']."';";
			$results2 = mysqli_query($conn, $sql2);
			$u = mysqli_fetch_assoc($results2);
			
            $output.="
				<td>{$ca['description']}</td>
                <td>{$ca['priority']}</td>
                <td>{$u['name']}</td>
                <td>{$ca['due_date']}</td>
                <td>{$ca['status']}</td>
                </tr>
                ";
		}
		 $output .= '</tbody></form></table></div>';
		echo  $output;
        }
?>
    <!DOCTYPE html>
    <html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Work Safety Portal</title>

        <!-- Bootstrap core CSS -->
        <link href="../templateStyle/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="../templateStyle/sidebar.css" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../style.css">

        <!-- Bootstrap core JavaScript -->
        <script src="../templateStyle/vendor/jquery/jquery.min.js"></script>
        <script src="../templateStyle/vendor/popper/popper.min.js"></script>
        <script src="../templateStyle/vendor/bootstrap/js/bootstrap.min.js"></script>

    </head>

    <body>

        <?php 
        if ($_GET){
            // Retrieve Corrective actions
            $sql = "SELECT corrective_actions.id, 
						corrective_actions.description des,
                        corrective_actions.priority prio,
                        corrective_actions.assignee ass,
                        corrective_actions.due_date due,
                        corrective_actions.status sts
                    FROM corrective_actions, cap
                    WHERE cap.inspection_id = {$inspID} AND cap.id = corrective_actions.cap_id; ";

					$reportSql = "SELECT distinct section sec, Qnum qid
                    FROM report, report_questions
                    WHERE report.inspection_id = {$inspID} AND report.id = report_questions.report_id AND report_questions.note != 'null'; ";
					
                       

           // $req_sec = array();
           // $req_set = array();
            $corActions = array();

            // parse sql:
            $results = mysqli_query($conn, $sql);
            while($r = mysqli_fetch_assoc($results)){
                //array_push($req_sec, $r['sec']);
               // array_push($req_set, array($r['sec'], $r['qid']));

                // translate to user name
                $sqla = "
                SELECT name
                FROM user
                WHERE id = '{$r['ass']}';
                ";
                $b = mysqli_query($conn, $sqla);
                while($c = mysqli_fetch_assoc($b)){
                    $uname = $c['name'];
                }


                // Create dictionary for querying corrective actions
                $key = "{$r['sec']}.{$r['qid']}";
                $content = array('pri'=>$r['prio'],
                               'due'=>$r['due'],
                                'ass'=>$uname,
                               'sts'=>$r['sts']);

                $corActions[$key] = $content;
            }

            // Echo all the contents 
            
            // Header
            
            
            $sql = "SELECT * FROM inspection 
            WHERE id = {$inspID};";
            $results = mysqli_query($conn, $sql);
            while($e = mysqli_fetch_assoc($results)){
                $loc = $e['location'];
                $inDate = $e['date'];
            }
            
            $header = "
            <table id='myTable' class='table table-striped'>
                <tbody>
                    <tr>
                        <td><b>Org Unit / Location:</b></td>
                        <td>{$loc}</td>
                        <td><b>Audit / Inspection Date:</b></td>
                        <td>{$inDate}</td>
                    </tr>

                    <tr>
                        <td><b>Head of Section:</b></td>
                        <td>{}</td>
                        <td><b>Safety Advisor (WHSC):</b></td>
                        <td>{}</td>
                    </tr>

                    <tr>
                        <td><b>Facility Manager:</b></td>
                        <td>{}</td>
                        <td><b>Safety Rep (HSR):</b></td>
                        <td>{}</td>
                    </tr>
                </tbody>
            </table>
            ";
            
            echo $header;
            
            // Notes
            echo "<h4>Notes</h4>
                    <ul>
                        <li>Refer to PPL 2.30.01 Occupational Health and Safety Risk Management to determine risk rating/priority.</li>
                        <li>Corrective Action Plan should be submitted to the relevant Faculty/Institute/Division OHS Committee, and remain on agenda until all matters are resolved.</li>
                    </ul>";
            
            // CAP content
            fetch_data($conn, $inspID, $req_sec, $req_set, $corActions); 




        }else{
            echo "No form input";
        }
        
        ?>
    </body>

    </html>

    <?php
include('disconn.php');
?>
