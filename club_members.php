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

$club_members = new main_class;

$proposal_id = $_GET['proposal_id'];

$columns = "*";
$table = "club, proposal";
$condition = "proposal.proposal_id = club.proposal_id AND club.proposal_id = $proposal_id";

$query_result = $club_members->select($columns,$table,$condition);
$result = mysql_fetch_assoc($query_result);
$club_id = $result['club_id'];
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/main_template.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title><?php echo $result['club_name']; ?> Members</title>
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
    <div id="student_id_heading" style="width: 20%; float:left;"><h3>Student ID</h3></div>
    <div id="student_name_heading" style="width: 40%; float:left;"><h3>Name</h3></div>
    <div id="program_heading" style="width: 20%; float:left;"><h3>Program</h3></div>
    <div id="designation_heading" style="width: 20%; float:left;"><h3>Designation</h3></div>
    <?php
    $club_id = $result['club_id'];
    $columns = "*";
    $table = "subscription";
    $condition = "club = $club_id  AND approval_status = 1";
    
    $member_query_result = $club_members->select($columns,$table,$condition);
    echo "\n\n\n\n";
    while($member_result_set = mysql_fetch_assoc($member_query_result))
                {?>
                    <div align="justify" id="student_id" style="width: 20%; float:left;">
                        <?php
                            echo $student_id = $member_result_set['student_id'];
                        ?>
                    </div>
                    
                    <div id="student_name" style="width: 40%; float:left;">
                        <?php
                            $query = "SELECT * FROM student WHERE student_id = $student_id";
                            $student_name_resultset = mysql_query($query);
                            $student_name_result = mysql_fetch_assoc($student_name_resultset);
                            echo $student_name_result['name'];
                        ?>
                    </div>
                    
                    <div id="program" style="width: 20%; float:left;">
                        <?php						
                            echo $student_name_result['program'];
                        ?>
                    </div>
                    
                    <div id="designation" style="width: 20%; float:left;">
                        <?php						
                            echo $member_result_set['description'];
                        ?>
                    </div>
                    
    <?php		 }?>
    <div id="back" style="width: 20%; float:left; margin-left:40%; margin-top:30px;">
    	<a href="club_home.php?proposal_id= <?php echo $proposal_id ?>" title="Back to club's homepage">Back</a>
    </div>
</div>
<!-- InstanceEndEditable --></div>
	
    <div id="footer">
    	<div align="center"><a href="contact_us.html">contact us</a></div>
    </div>
    
</div>
<!-- InstanceBeginEditable name="nav_behaviour_close" --><!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>