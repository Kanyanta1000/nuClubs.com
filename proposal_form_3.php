<?php
require_once('connections/nu_clubs_conn.php');
require_once('classes.php');

$proposal_form2 = new main_class;

//retrieving form variables
$student_id_txt1 = $_POST["student_id_txt1"];
$student_id_txt2 = $_POST["student_id_txt2"];
$student_id_txt3 = $_POST["student_id_txt3"];
$student_id_txt4 = $_POST["student_id_txt4"];
$student_id_txt5 = $_POST["student_id_txt5"];
$student_id_txt6 = $_POST["student_id_txt6"];
$student_id_txt7 = $_POST["student_id_txt7"];

//Getting the corresponding proposal ID
$proposal_id = $_POST['proposal_id'];

//storing completed proposal in database and redirecting
$table = "proposed_member";
$columns = "(proposal_id, student)";

$values = "('$proposal_id','$student_id_txt1')";
$proposal_form2->insert($table,$columns,$values); 

$values = "('$proposal_id','$student_id_txt2')";
$proposal_form2->insert($table,$columns,$values); 

$values = "('$proposal_id','$student_id_txt3')";
$proposal_form2->insert($table,$columns,$values); 

$values = "('$proposal_id','$student_id_txt4')";
$proposal_form2->insert($table,$columns,$values); 

$values = "('$proposal_id','$student_id_txt5')";
$proposal_form2->insert($table,$columns,$values); 

$values = "('$proposal_id','$student_id_txt6')";
$proposal_form2->insert($table,$columns,$values); 

$values = "('$proposal_id','$student_id_txt7')";
$proposal_form2->insert($table,$columns,$values); 


//Confirming insert success and redirecting
$entity = "proposal";
$location = "proposal_home.php";
$proposal_form2->insert_success($entity, $location);
?>