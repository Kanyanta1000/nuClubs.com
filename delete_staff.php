<?php
session_start();
require_once('connections/nu_clubs_conn.php');
require_once('classes.php');


$delete = new main_class;

$staff_id = $_GET['staff_id'];

$table = "staff";
$condition = "staff_id = $staff_id";
$columns = "name";
$query_result = $delete->select($columns,$table,$condition);
$result = mysql_fetch_assoc($query_result);
$delete->delete($table,$condition);

$entity= $result['name'];

$location = "view_staff.php";
$delete->delete_success($entity, $location)
?>