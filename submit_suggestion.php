<?php
require_once('connections/nu_clubs_conn.php');
require_once('classes.php');

$submit_suggestion = new main_class;


$current_date = date("Ymd");

$Y = substr($current_date,0,4)."-";
$M = substr($current_date,4,2)."-";
$D = substr($current_date,6,2);

$current_date = $Y.$M.$D;

$suggestion_title = $_POST["suggestion_title"];
$suggestion_details = $_POST["suggestion_details"];
$student_id= $_POST["student_id"];
$date_added = $current_date;
$img = $_FILES["newspic"]["name"];


$table = "suggestion";
$columns = "(suggestion_title, suggestion_details, student_id, date_created)";
$values = "('$suggestion_title', '$suggestion_details', '$student_id', '$date_added')";
$submit_suggestion->insert($table, $columns, $values);

?>