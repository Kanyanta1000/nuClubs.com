<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname= "localhost";
$database = "nu_clubs";
$username = "root";
$password = "";
$nu_clubs_conn = mysql_connect($hostname, $username, $password) or die("Unable to connect to Database..."); 
mysql_select_db($database, $nu_clubs_conn);
?>