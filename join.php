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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/main_template.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Join a club</title>
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
<!-- InstanceBeginEditable name="nav_behaviour" --><body onLoad="MM_effectShake('join')">
<!-- InstanceEndEditable -->



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

<?php
require_once('connections/nu_clubs_conn.php');
require_once('classes.php');

$join = new main_class;

$columns = "*";
$table = "proposal";
$condition = "approval_status = '1'";

$query_result = $join->select($columns,$table,$condition);

?>
   
<form id="form1" name="form1" method="post" action="join_1.php" style=" margin-left:20%;">
<div id="student_row" style="width:60%; margin-left:20%; float:left;">
	<div id="student_label" style="width:15%; float:left;">Student ID:</div>
    <div id="student_data" style="width:60%; float:left;">
    	<input name="student" type="text" id="student" />
    </div>
</div>

<div id="club_row" style="width:60%; margin-left:20%; float:left">
    <br />
	<div id="club_label" style="width:15%; float:left;">Club:</div>   
    <span style="width:60%; float:left;">
    <select name="club_name2" id="club_name2">
      <?php
		  if(mysql_num_rows($query_result) == 0)
					echo "<option>There are currently no clubs registered</option>";
          else while($result = mysql_fetch_assoc($query_result))
		  {
			  $club_name = $result['club_name'];
			  echo "<option>$club_name</option>";
		  }
		  ?>
    </select>
    </span>
     <br />
     <br />
        <input type="submit" name="submit_btn" id="submit_btn" value="Submit" style="margin-left:15%;" />
     <br />
</div>
</form>


<!-- InstanceEndEditable --></div>
	
    <div id="footer">
    	<div align="center"><a href="contact_us.html">contact us</a></div>
    </div>
    
</div>
<!-- InstanceBeginEditable name="nav_behaviour_close" --></body><!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
