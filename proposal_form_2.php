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
<title>New Proposal</title>
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
    
<form id="proposal_form2" name="proposal_form2" method="post" action="proposal_form_3.php" enctype="multipart/form-data" style="width: 60%; padding-left:20%; margin-left: 10%;">
            <h5>Please enter the 7 required club members' student ID's</h5>
            <h3>MEMBERSHIP</h3>
          <p>Student
                <label>ID
                  <input type="text" name="student_id_txt1" id="student_id_txt1" />
            </label>
      </p>
          <p>Student
            <label>ID
              <input type="text" name="student_id_txt2" id="student_id_txt2" />
            </label>
          </p>
          <p>Student
            <label>ID
              <input type="text" name="student_id_txt3" id="student_id_txt3" />
            </label>
          </p>
          <p>Student
            <label>ID
              <input type="text" name="student_id_txt4" id="student_id_txt4" />
            </label>
          </p>
          <p>Student
            <label>ID
              <input type="text" name="student_id_txt5" id="student_id_txt5" />
            </label>
          </p>
          <p>Student
            <label>ID
              <input type="text" name="student_id_txt6" id="student_id_txt6" />
            </label>
          </p>
          <p>Student
            <label>ID
              <input type="text" name="student_id_txt7" id="student_id_txt7" />
            </label>
          </p>
              <p align="center">
                <input type="submit" name="submit_form1_btn" id="submit_form1_btn" value="Finish" />
                <br />

<input type="hidden" name="proposal_id" value="<?php echo $_GET['proposal_id']; ?>" />

</form>
<!--END WRAPPER --> 
<!-- InstanceEndEditable --></div>
	
    <div id="footer">
    	<div align="center"><a href="contact_us.html">contact us</a></div>
    </div>
    
</div>
<!-- InstanceBeginEditable name="nav_behaviour_close" --><!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
