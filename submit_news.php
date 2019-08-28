<?php
require_once('connections/nu_clubs_conn.php');
require_once('classes.php');

$submit_news = new main_class;


$current_date = date("Ymd");

$Y = substr($current_date,0,4)."-";
$M = substr($current_date,4,2)."-";
$D = substr($current_date,6,2);

$current_date = $Y.$M.$D;

$event_title = $_POST["event_title"];
$event_details = $_POST["event_details"];
$staff_id = $_POST["staff_id"];
$date_added = $current_date;
$img = $_FILES["newspic"]["name"];


$table = "news";
$columns = "(event_title, event_details, staff_id, date_created, news_image)";
$values = "('$event_title', '$event_details', '$staff_id', '$date_added', '$img')";
$submit_news->insert($table, $columns, $values);

$submit_news->upload();


?>