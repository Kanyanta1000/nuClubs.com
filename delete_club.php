<?php
session_start();
require_once('connections/nu_clubs_conn.php');
require_once('classes.php');


$delete = new main_class;

$proposal_id = $_GET['proposal_id'];

$table = "proposal";
$condition = "proposal_id = $proposal_id";
$columns = "club_name";
$query_result = $delete->select($columns,$table,$condition);
$result = mysql_fetch_assoc($query_result);
$delete->delete($table,$condition);
$table = "club";
$query_result = $delete->select($columns,$table,$condition);

$entity= $result['club_name'];

$location = "delete_club_form.php";
$delete->delete_success($entity, $location)
?>