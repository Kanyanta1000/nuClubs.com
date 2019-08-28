<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/main_template.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Proposal form page 1</title>
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
<form id="form1" name="form1" method="post" action="proposal_form_1_exec.php" enctype="multipart/form-data" style="width:60%; margin-left:20%;">
	<h3>CLUB DETAILS</h3>
	<p>
    	<label>Club Name
        	<input type="text" name="club_name" id="club_name" />
        </label>

        <label>Club Head's Staff ID
        	<input type="text" name="club_head" id="club_head" />
        </label>
    </p>
    <p>
        <label>Brief Description
        	<textarea name="club_description" id="club_description" cols="45" rows="5">Type your description here...</textarea>
        </label>
    </p>

    <h3>Other Club Details</h3>
    <p>How do you expect to fund the club's activities?</p>
      Source of Financing
        <select name="funding" id="funding">
          <option>Student Council funds</option>
          <option>Club Member Contributions</option>
          <option>SC Funding/Member Contributions</option>

        </select>
    <p>&nbsp;</p>
    <p>What items are required by this club? (Please include quantities)</p>
    <p>
      <label>
        <textarea name="other_items" id="other_items" cols="45" rows="5"></textarea>
      </label>
    </p>

    <p align="right">
		<input type="submit" name="submit_form1_btn" id="submit_form1_btn" value="Next &gt;&gt;" />
    </p>
</form>
<!-- InstanceEndEditable --></div>
	
    <div id="footer">
    	<div align="center"><a href="contact_us.html">contact us</a></div>
    </div>
    
</div>
<!-- InstanceBeginEditable name="nav_behaviour_close" --><!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
