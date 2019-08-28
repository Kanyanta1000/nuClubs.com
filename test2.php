

<?php

require_once('connections/nu_clubs_conn.php');
require_once('classes.php');

$test2 = new main_class;

$img = $_FILES["pic"]["name"];

$table = "club";
$columns = "(logo)";
$values = "('$img')";
$test2->insert($table, $columns, $values);

$test2->upload();


?>