<?php

require_once('connections/nu_clubs_conn.php');
require_once('classes.php');
			
$add_staff = new main_class;

//retrieving form variables
$staff_id = $_POST["staff_id"];
$name = $_POST["name"];
$title = $_POST["title"];
$date_of_birth = $_POST["date_of_birth"];
$sex = $_POST["sex"];

//storing new staff member in database
$table = "staff";
$columns = "(staff_id, name, title, date_of_birth, sex)";
$values = "('$staff_id','$name', '$title', '$date_of_birth', '$sex')";
$add_staff->insert($table,$columns,$values);


//Confirming insert query success and redirecting

$condition = "staff_id = $staff_id";
$columns = "staff_id";

$query_result = $add_staff->select($columns,$table,$condition);

$entity = $name;

if(mysql_num_rows($query_result) == 0)
{
	$location = "add_staff.html";
	$add_staff->insert_fail($entity, $location);
}

else
{
	$location = "admin.php";
	$add_staff->insert_success($entity, $location);
}

?>