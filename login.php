<?php

// Inialize session
session_start();

require_once('connections/nu_clubs_conn.php');
require_once('classes.php');

$login = new main_class;
$user_id = $_POST['username'];
$pword = $_POST['password'];

// Retrieve username and password from database according to user's input
$columns = "*";
$table = "student";
$condition = "student_id = '$user_id' AND password = '$pword'";


$login_result = $login->select($columns,$table,$condition);
		
// Check username and password match
if (mysql_num_rows($login_result) == 1)
{
	$_SESSION['username'] = $_POST['username'];
	$location = "home.php";
	$login->jump_to($location);
}
else
{
	$login_result2 = mysql_query("SELECT * FROM staff WHERE (staff_id = '" . mysql_real_escape_string($_POST['username']) . "') and (password = '" . mysql_real_escape_string(md5($_POST['password'])) . "')");
	
	if (mysql_num_rows($login_result2) == 1)
	{
		$_SESSION['username'] = $_POST['username'];
		header('Location: home.php');
	}
	else
	{
		$error = "Invalid login credentials";
		$location = "index.php";
		$login->general_error($error, $location);
	}
}

?>