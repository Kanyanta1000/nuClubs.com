<?php
require_once('connections/nu_clubs_conn.php');
require_once('classes.php');

$subscr_response = new main_class;

$user_id = $_GET['user_id'];
$club_id = $_GET['club_id'];

/*changing the approval status to rejected (0) in the DB*/
$table = "subscription";
$column = "approval_status";
$new_value = 1;
$condition = "student_id = $user_id AND club = $club_id";

$subscr_response->update($table, $column, $new_value, $condition);

$columns = "proposal_id";
$table = "club";
$condition = "club_id = $club_id";
$query_result = $subscr_response->select($columns, $table, $condition);
$result = mysql_fetch_assoc($query_result);
$proposal_id = $result['proposal_id'];

$location = "club_home.php?proposal_id= $proposal_id";
$subscr_response->update_success($location);


?>