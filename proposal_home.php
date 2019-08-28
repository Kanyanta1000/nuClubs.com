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
<title>Proposals</title>
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
<!-- InstanceBeginEditable name="nav_behaviour" --><body onLoad="MM_effectShake('proposals')"><!-- InstanceEndEditable -->



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
<div style="margin-left: 20%;"><h5>Click on a club's name to view its proposal or on its status to see the corresponding comments</h5></div>
<div id="proposal_row" style="width:60%; float: left; margin-left: 20%; margin-right: 20%; padding-bottom: 100px;">
<div id="proposal_id_heading" style="width: 20%; float:left;"><h3>Proposal ID</h3></div>
<div id="proposal_name_heading" style="width: 40%; float:left;"><h3>Club Name</h3></div>
<div id="proposal_status_heading" style="width: 20%; float:left; margin-right: 20%;"><h3>Status</h3></div>
        
        <?php
			require_once('connections/nu_clubs_conn.php');
			require_once('classes.php');
			
			$home = new main_class;
			
			$columns = "proposal_id, club_name, approval_status";
			$table = "proposal";
			$condition = "1 ORDER BY proposal_id";
			
			
			$query_result = $home->select($columns,$table,$condition);
			
			if(mysql_num_rows($query_result) == 0) echo "There are no proposals to display";

			else while($result = mysql_fetch_assoc($query_result))
			{?>
		    	<div align="justify" id="proposal_id" style="width: 20%; float:left;"><?php echo $result['proposal_id'];?></div>
		    	
                <div id="proposal_name" style="width: 40%; float:left;">
					<?php
						
						echo "<a href=view_proposal_dean.php?proposal_id=";
						echo $result['proposal_id'].">";
						echo $result['club_name']."</a>";
					?>
      			</div><!--END PROPOSAL NAME DIV-->
				
                <div id="proposal_status" style="width: 20%; float:left;">
					<?php						
						if ($result['approval_status'] == 1) echo "<div style=\"color:#090;\">accepted</div>";
						else if ($result['approval_status'] == 0) echo "<div style=\"color:#F00;\">rejected</div>";
						else echo "<div style=\"color:#F90;\">pending</div>";
					?>
                </div><!--END PROPOSAL STATUS DIV-->
                <div align="justify" id="proposal_comment" style="width: 20%; float:left;">
					<?php						
						echo "<a href=view_comment.php?proposal_id=";
						echo $result['proposal_id'].">";
						echo "view comment</a>";
					?>
                </div>
	  <?php } ?>
      
    </div>
    <hr />

      <div align="center" id="create_a_club" style="width:100%; float:left;"><a href="proposal_form_1.php">create a club</a></div>
<!-- InstanceEndEditable --></div>
	
    <div id="footer">
    	<div align="center"><a href="contact_us.html">contact us</a></div>
    </div>
    
</div>
<!-- InstanceBeginEditable name="nav_behaviour_close" --></body><!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
