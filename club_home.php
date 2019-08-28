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

$club_home = new main_class;

$proposal_id = $_GET['proposal_id'];

$columns = "*";
$table = "club, proposal";
$condition = "proposal.proposal_id = club.proposal_id AND club.proposal_id = $proposal_id";

$query_result = $club_home->select($columns,$table,$condition);
$result = mysql_fetch_assoc($query_result);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/main_template.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title><?php echo $result['club_name']; ?></title>
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
<div id="club_details">
    <div id="club_id_row" style="width:100%; float:left;">
       	<div id="club_id_label" style="width:20%;">Club ID:</div>
       	<div id="club_id_data"><?php echo $result['club_id']; ?></div>            
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
        

    <div id="financing_row" style="width:100%; float:left;">     
        	<div id="financing_label">Sources of Financing:</div>
        	<div id="financing_data"><?php echo $result['funding']; ?></div>
    </div>
        
    <div id="other_req_row" style="width:100%; float:left;">
        	<div id="other_req_label">Requirements:</div>
			<div id="other_req_data"><?php echo $result['other_items']; ?></div>
    </div>

    <div id="club_memb_row" style="width:100%; float:left; margin-bottom:15px; float:left;">
        	<a href="club_members.php?proposal_id=<?php echo $proposal_id; ?>">Click here to see club members</a>
    </div>
    
    <div id="club_memb_row" style="width:100%; float:left; margin-bottom:15px; float:left;"">
        	<a href="membership_subscriptions.php?proposal_id=<?php echo $proposal_id; ?>">Click here to see pending subscriptions</a>
    </div>
    
    <div id="upcoming_events" style="width:100%; float:left; margin-bottom:15px; float:left;"">
        	<a href="upcoming_events.php?proposal_id=<?php echo $proposal_id; ?>">Click here to see upcoming events</a>
    </div>
    
    <div id="suggestion_box" style="width:100%; float:left; margin-bottom:15px; float:left;"">
        	<a href="suggestion_box.php?proposal_id=<?php echo $proposal_id; ?>">Suggestion Box</a>
    </div>
</div><!-- END CLUB DETAILS-->
<!-- InstanceEndEditable --></div>
	
    <div id="footer">
    	<div align="center"><a href="contact_us.html">contact us</a></div>
    </div>
    
</div>
<!-- InstanceBeginEditable name="nav_behaviour_close" --><!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>