<?php
session_start(); 

if(!isset($_SESSION['username']))
		{
			?>
			<script type="text/javascript">
            
            alert("You must be logged in to see this page");
            window.location = "index.php";
            </script>
			<?php
		}

require_once('connections/nu_clubs_conn.php');
require_once('classes.php');

$view_event = new main_class;

$event_id = $_GET['event_id'];

$columns = "*";
$table = "news";
$condition = "news_id = $event_id ORDER BY news_id";

$query_result = $view_event->select($columns,$table,$condition);
$result = mysql_fetch_assoc($query_result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/main_template.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Home</title>
<!-- InstanceEndEditable -->
<link href="css/nuClubs.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="favicon.ico" />


<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<script src="SpryAssets/SpryEffects.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
function MM_effectShake(targetElement)
{
	Spry.Effect.DoShake(targetElement);
}
function MM_effectSquish(targetElement)
{
	Spry.Effect.DoSquish(targetElement);
}
//-->
</script>
</head>

<body>
<!-- InstanceBeginEditable name="nav_behaviour" --><!-- InstanceEndEditable -->



<div id="container">
<div id="msg_box">
	<span id="msg">
    </span>
</div>
	
<div id="header">
<img src="images/logo_reflected.png" width="124" height="155" alt="NU Clubs" style=" margin-left:8%; margin-right:2%; float:left;"/>
<img src="images/full_header.png" width="800" height="135" alt="NU clubs" style="float:left; margin-top:20px;" />

</div>
    
    <div id="nav_bar">
    	<div id="home" align="center">
			<a href="home.php" title="home">home </a>
        </div>

        <div id="notice_board" align="center">
        	<a href="chat.php" title="NU buzz">NU buzz</a>
      	</div>
        
        <div id="join" align="center">
        	<a href="join.php" title="Join a club">join a club</a>
 		</div>
        
        <div id="proposals" align="center">
        	<a href="proposal_home.php" title="View club proposals">proposals</a>
   	  	</div>
        
        <div id="admin" align="center" title="Administrative tasks">
        	<a href="admin.php">admin</a>
        </div>
        
        <div id="help" align="center">
       	<a href="user_manual/manual.html">help</a></div>
    </div>
    
    <div id="content"><!-- InstanceBeginEditable name="Content" -->
<div id="event_title_heading" style="width: 100%; float:left; margin-top:5px; margin-left:30%;"><h3><?PHP echo $result['event_title']; ?></h3></div>
<div id="added_by" style="width: 70%; float:left; margin-left:30%;">
<?PHP
	$query = "SELECT name FROM staff WHERE staff_id = ".$result['staff_id'].";";
	$select_staff_result = mysql_query($query);
	$staff_name_result = mysql_fetch_assoc($select_staff_result);
	echo " added by ".$staff_name_result['name'];
?></div>
<div id="date_added" style="width: 40%; float:left;; margin-left:30%; margin-right:30%;"><h5><?php echo $result['date_created']; ?></h5></div>
<div id="suggestion_details" style="width: 40%; float:left;; margin-left:30%; margin-right:25%; background: #CCE5AD; border: 2px solid #56B96B; color: #4a4a4a; height: 300px; padding-top:10px; padding-left:5%; margin-bottom:20px;">

<?php
	echo $result['event_details'];
?>
</div>
<div align="center">
  <p><a href="home.php">back</a></p>
</div>
<!-- InstanceEndEditable --></div>
	
    <div id="footer">
    	<div align="center"><a href="contact_us.html">contact us</a></div>
    </div>
    
</div>
<!-- InstanceBeginEditable name="nav_behaviour_close" --><!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>