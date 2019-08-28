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

<?php 
require_once('connections/nu_clubs_conn.php');
require_once('classes.php');

$view_students = new main_class;

$columns = "*";
$table = "student";
$condition = "1 ORDER BY name";

$query_result = $view_students->select($columns,$table,$condition);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/main_template.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>View student</title>
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

<div id="club_members_wrapper" style="width: 60%; margin-left:20%; float:left;">
    <div id="student_id_heading" style="width: 15%; float:left;"><h3>Student ID</h3></div>
    <div id="student_name_heading" style="width: 35%; float:left;"><h3>Name</h3></div>
    <div id="program_heading" style="width: 10%; float:left; margin-right:5%;"><h3>Program</h3></div>
    <div id="sex_heading" style="width: 10%; float:left; margin-right:25%;"><h3>Sex</h3></div>
    <?php
    echo "\n\n\n\n";
    while($result = mysql_fetch_assoc($query_result))
                {?>
                    <div align="justify" id="staff_id" style="width: 15%; float:left;">
                        <?php
                            echo $result['student_id'];
                        ?>
                    </div>
                    
                    <div id="staff_name" style="width: 35%; float:left;">
                        <?php
                            echo $result['name'];
                        ?>
                    </div>
                    
                    <div id="sex" style="width: 15%; float:left;">
                        <?php						
                            echo $result['program'];
                        ?>
                    </div>
                    
                    <div id="designation" style="width: 10%; float:left;">
                        <?php						
                            echo $result['sex'];
                        ?>
                    </div>
                    
                    <div id="delete" style="width: 20%; float:left;">
                    <?php
						
						echo "<a href=delete_student.php?student_id=";
						echo $result['student_id']." title = 'Delete student'>";
						echo "Delete"."</a>";
					?>
                    </div>
                    
    <?php		 }?>
</div>
<!-- InstanceEndEditable --></div>
	
    <div id="footer">
    	<div align="center"><a href="contact_us.html">contact us</a></div>
    </div>
    
</div>
<!-- InstanceBeginEditable name="nav_behaviour_close" --><!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>