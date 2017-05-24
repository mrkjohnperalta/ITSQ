<?php
include('config.php');

$type = $_POST['type'];

if($type == 'fetch')
{
	$events      = array();
	$query       = mysqli_query($con, "SELECT activity_proposals.*, organizations.* FROM activity_proposals JOIN organizations ON activity_proposals.sent_by = organizations.org_id WHERE edo_status = '3'");
	while($fetch = mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
	$e = array();
    $e['id']     = $fetch['prop_id'];
    $e['title']  = $fetch['proposal_title'];
    $e['start']  = $fetch['startdate'];
    $e['end']    = $fetch['enddate'];
    $e['org']    = $fetch['organization_name'];

    // $allday = ($fetch['allDay'] == "true") ? true : false;
    // $e['allDay'] = $allday;

    array_push($events, $e);
	}
	echo json_encode($events);
}


?>