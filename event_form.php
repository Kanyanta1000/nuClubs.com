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
<form id="form1" name="form1" method="post" action="submit_news.php" style="width:60%; margin-left:30%;">

	<div id="staff_id_label" align="left" style="width:100%; float:left; margin-top:20px;">
        <h3>Staff ID:</h3>
    </div>
    <div id="staff_id" style="width:100%; float:left; margin-top:5px;">
         <input name="staff_id" type="text" id="staff_id"  size="20" maxlength="6" />
    </div>
    
  <div id="image_label" style="width:100%; float:left;">
         <h3>Upload image or icon:</h3>
    </div>
    <div id="image" style="width:100%; float:left;">
        <input type="file" name="newspic" />
    </div>
 
    <div id="event_label" align="left" style="width:100%; float:left; margin-top:20px;">
        <h3>Event Title:</h3>
    </div>
    <div id="event" style="width:100%; float:left; margin-top:5px;">
         <input name="event_title" type="text" id="event_title"  size="64" maxlength="64" />
    </div>
    
    <div id="event_details_label" style="width:100%; float:left; margin-top:20px;">
         <h3>Event Details:</h3>
    </div>
    <div id="event_details" style="width:100%; float:left; margin-top:5px;">
         <textarea cols="61" rows="10" name="event_details" id="event_details"></textarea>
  	</div>
    
    <div style="width:100%; float:left; margin-top:20px;">
		<input type="submit" name="upload" id="upload" value="Add event" style="float:left;"/>
    </div>

</form>
<!-- InstanceEndEditable --></div>
	
    <div id="footer">
    	<div align="center"><a href="contact_us.html">contact us</a></div>
    </div>
    
</div>
<!-- InstanceBeginEditable name="nav_behaviour_close" --><!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>