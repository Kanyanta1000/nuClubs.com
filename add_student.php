<?php

require_once('connections/nu_clubs_conn.php');
require_once('classes.php');
			
$add_student = new main_class;

//retrieving form variables
$student_id = $_POST["student_id"];
$name = $_POST["name"];
$program = $_POST["program"];
$date_of_birth = $_POST["date_of_birth"];
$sex = $_POST["sex"];

//storing new student in database
$table = "student";
$columns = "(student_id, name, program, date_of_birth, sex)";
$values = "('$student_id','$name', '$program', '$date_of_birth', '$sex')";

$add_student->insert($table,$columns,$values);

//Confirming insert query success and redirecting

$condition = "student_id = $student_id";
$columns = "student_id";

$query_result = $add_student->select($columns,$table,$condition);

$entity = $name;

if(mysql_num_rows($query_result) == 0)
{
	$location = "add_student.html";
	$add_student->insert_fail($entity, $location);
}

else
{
	$location = "admin.php";
	$add_student->insert_success($entity, $location);
}
?>