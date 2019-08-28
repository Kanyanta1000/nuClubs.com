<?php
require_once('connections/nu_clubs_conn.php');
require_once('classes.php');

$join_1 = new main_class;

$club_name = $_POST["club_name2"];
$student_id = $_POST["student"];

$columns = "*";
$table = "student, club, proposal";
$condition = "student_id = $student_id AND club_name = '$club_name' AND proposal.proposal_id = club.proposal_id";

$query_result = $join_1->select($columns,$table,$condition);

if(mysql_num_rows($query_result) == 0)
	die ("Invalid ID");
else 
{
	$result = mysql_fetch_assoc($query_result);
	$table = "subscription";
	$club_id = $result['club_id'];
	$columns = "(club, student_id)";
	$values = "('$club_id','$student_id')";
	$join_1->insert($table,$columns,$values);
	
	//Confirming insert success and redirecting
	$entity = "subscription";
	$location = "home.php";
	$join_1->insert_success($entity, $location);
}

?>