<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname= "localhost";
$database = "nu_clubs";
$username = "root";
$password = "";
$nu_clubs_conn = mysql_pconnect($hostname, $username, $password) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_select_db($database, $nu_clubs_conn);


echo $query = "SELECT "."* "."FROM "."student";
$result = mysql_query($query);

?>