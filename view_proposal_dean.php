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
<title>View Proposal</title>
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
 <?php   
    $approval_date = date("Ymd");
    
    $Y = substr($approval_date,0,4)."-";
    $M = substr($approval_date,4,2)."-";
    $D = substr($approval_date,6,2);
    
    $approval_date = $Y.$M.$D;
?>
<?php
require_once('connections/nu_clubs_conn.php');
require_once('classes.php');

$proposal_id = $_GET["proposal_id"];
$view_proposal = new main_class;
$columns = "*";
$table = "proposal";
$condition = "proposal_id = $proposal_id";

					
					
$query_result = $view_proposal->select($columns,$table,$condition);
$result = mysql_fetch_assoc($query_result);
?>

<div id="completed_proposal_container">
	<div id="proposal_details">
        <div id="Proposal_id_row" style="width:100%; float:left;">
        	<div id="Proposal_id_label" style="width:20%;">Proposal ID:</div>
        	<div id="proposal_id_data"><?php echo $proposal_id; ?></div>            
        </div>
        
        <div id="club_name_row" style="width:100%; float:left;">
        	<div id="club_name_label">Club Name:</div>
        	<div id="club_name_data"><?php echo $result['club_name']; ?></div>
        </div>
        
        <div id="club_head_row" style="width:100%; float:left;">
        	<div id="club_head_label">Club Head:</div>
            <div id="club_head_data">
				<?php 
					$query = "SELECT name FROM staff WHERE staff_id = ".$result['club_head'].";";
					$select_staff_result = mysql_query($query);
					$staff_name_result = mysql_fetch_assoc($select_staff_result);
					echo $staff_name_result['name'];
				?>
            </div>
        </div>
        
        <div id="club_desc_row" style="width:100%; float:left;">
        	<div id="club_desc_label">Description:</div>
            <div id="club_desc_data"><?php echo $result['club_description']; ?></div>
        </div>
        
        <div id="club_memb_row" style="width:100%; float:left;">
        	<div id="club_memb_label">Members:</div>
            <div id="club_memb_data">
				<?php
					$table = "proposed_member";
					$proposed_member_resultset = $view_proposal->select($columns,$table,$condition);
					while($proposed_member_result = mysql_fetch_assoc($proposed_member_resultset))
					{
						echo $student = $proposed_member_result['student'];
						$query = "SELECT name FROM student WHERE student_id =".$student.";";
						$student_name_result = mysql_query($query);
						$query_result2 = mysql_fetch_assoc($student_name_result);
						echo ": ".$query_result2['name'];
						?><p></p><?php
					}
                ?>
            </div>
        </div>
        
        <div id="financing_row" style="width:100%; float:left;">     
        	<div id="financing_label">Sources of Financing:</div>
        	<div id="financing_data"><?php echo $result['funding']; ?></div>
        </div>
        
        <div id="other_req_row" style="width:100%; float:left;">
        	<div id="other_req_label">Requirements:</div>
			<div id="other_req_data"><?php echo $result['other_items']; ?></div>
        </div>
        
	</div><!-- END LEFT PANE-->
    
    
    <div id="response_section">
    	<form id="proposal_response" name="proposal_response" method="post" action="proposal_response.php?proposal_id=<?php echo $proposal_id ?>" enctype="multipart/form-data">
          <p>Comments
            <textarea name="comment_area" id="comment_area" cols="45" rows="5"></textarea>
          </p>
          <p>
            Change Proposal Status
            <select name="proposal_response2" id="proposal_response2">
              <option value="2">Pending</option>
              <option value="0">Rejected</option>
              <option value="1">Approved</option>
            </select>
          </p>
          <p>
            <input type="submit" name="proposal_response_btn" id="proposal_response_btn" value="Go" style="margin-left:20%;" />
          </p>
          <input type="hidden" name="approval_date" value="<?php echo $approval_date; ?>" />
    	</form>
    </div>
</div><!-- END CONTAINER-->

<!-- InstanceEndEditable --></div>
	
    <div id="footer">
    	<div align="center"><a href="contact_us.html">contact us</a></div>
    </div>
    
</div>
<!-- InstanceBeginEditable name="nav_behaviour_close" --><!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
