<?php
session_start();
include('connect.php');
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
$secNum = 1;

// Create wrapping for each question
// Then fetch sql answer to each question
$id = $_SESSION['formID'];

foreach($Questions as $sec){
    // Section query
    $sql = "SELECT report_questions.* FROM report_questions, report WHERE report.inspection_id  = ".$id.
	" AND report.id = report_questions.report_id AND section = ".$secNum.";";
    $results = mysqli_query($conn, $sql);    
    
    // section name
    echo "<h3>Section {$secNum}. {$sec[0]}</h3>"; 
    
    $qNum = 0;
    foreach($sec as $q){
        // Iterate through all the sections....
        if ($qNum <= 0){
            // Skip header (index == 0)
            
        }else{
            // Actual question:
            
            
            // Then create questions/answers
            // Varify fetched_data == section q_num
      

            // Select notes from note db fot this q
            $result = mysqli_fetch_assoc($results);
            $q_id = $result['id'];
            
            $sql_note = "SELECT * FROM report_questions, report WHERE report.inspection_id  = ".$id.
						" AND report.id = report_questions.report_id AND section = ".$secNum." and Qnum = ". $qNum.";";
            $note = mysqli_query($conn, $sql_note);
            $note = mysqli_fetch_object($note);
            
            if ($note == true){
                // Contains note
                $comment =  $note->note;
            }else{
                // Contains nothing
                $comment =  "No comment.";
            }
            
            // Html
            echo "<div class='questions'>";
            echo "<p><b>Question {$qNum}: {$q}</b></p>";
            echo "<p>Evaluation: {$result['inspection_selection']}</p>";      
            echo "<textarea readonly cols='60' rows='1' name='{$secNum}:{$qNum}:n' placeholder='Additional comment'>{$comment}</textarea>";
            echo "</div><br>";              
            
        }
        
        $qNum++; 
    }
    
    $secNum++;
}


include('disconn.php');
?>
