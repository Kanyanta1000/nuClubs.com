<?php

require_once('connections/nu_clubs_conn.php');
require_once('classes.php');

$proposal_response = new main_class;

$proposal_id = $_GET["proposal_id"];
$new_value = $response = $_POST["proposal_response2"];
$comment = $_POST["comment_area"];
$approval_date = $_POST['approval_date'];
$table = "proposal";
$column = "approval_status";

$condition = "proposal_id = $proposal_id";


echo $proposal_response->update($table, $column, $new_value, $condition);

//Updating the comment
$new_value = "\"$comment\"";
$column = "comment";
$proposal_response->update($table, $column, $new_value, $condition);

if ($response == 1)//Creating a new club with members if proposal approved
{
	$table = "club";
	$columns = "(proposal_id, creation_date)";
	$values = "('$proposal_id', '$approval_date')";
	$proposal_response->insert($table, $columns, $values);
	
	$columns = "*";
	$table = "proposal";
	$condition = "proposal_id = $proposal_id";
	$proposal_resultset = $proposal_response->select($columns,$table,$condition);
	$proposal_result = mysql_fetch_assoc($proposal_resultset);
	
	$table = "club";
	$club_resultset = $proposal_response->select($columns,$table,$condition);
	$club_result = mysql_fetch_assoc($club_resultset);
	$club_id = $club_result['club_id'];
	
	$approval_status = 1;
	$table = "proposed_member";
	$proposed_member_resultset = $proposal_response->select($columns,$table,$condition);
	
	while($proposed_member_result = mysql_fetch_assoc($proposed_member_resultset))
	{
		
		$student_id = $proposed_member_result['student'];
		
		
		$table = "subscription";
		$columns = "(club, student_id, approval_status)";
		$values = "('$club_id', '$student_id', '$approval_status')";
		$proposal_response->insert($table, $columns, $values);
		
	}
}
$location = "proposal_home.php";
$proposal_response->update_success($location);

?>