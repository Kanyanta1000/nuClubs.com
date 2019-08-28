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
<title>News</title>
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
<div id="click" style="margin-left: 20%;"><h5>Click a headline title to view its article</h5></div>
<div id="suggestion_row" style="width:60%; float: left; margin-left: 20%; margin-right: 20%; padding-bottom: 100px;">
    <div id="suggestion_id_heading" style="width: 8%; float:left;"><h3>#</h3></div>
    <div id="suggestion_title_heading" style="width: 50%; float:left;"><h3>Headlines</h3></div>
    <div id="added_by_heading" style="width: 22%; float:left;"><h3>Added by</h3></div>
    <div id="date_heading" style="width: 20%; float:left;"><h3>Date added</h3></div>
    
    <?php
    require_once('connections/nu_clubs_conn.php');
    require_once('classes.php');
    
    $box = new main_class;
    
    $columns = "*";
    $table = "news";
    $condition = "1 ORDER BY news_id";
    
    
    $query_result = $box->select($columns,$table,$condition);
    
    if(mysql_num_rows($query_result) == 0) echo "There are no news items to display";
    else while($result = mysql_fetch_assoc($query_result))
    {?>
        <div align="justify" id="news_id" style="width: 8%; float:left;">
            <?php echo $result['news_id'];?>
        </div>
        
        <div id="event_title" style="width: 50%; float:left;">
            <?php
                    
                echo "<a href=view_event.php?event_id=";
                echo $result['news_id'].">";
                echo $result['event_title']."</a>";
            ?>
        </div>
        
        <div id="added_by" style="width: 22%; float:left;">
            <?php 
                $query = "SELECT name FROM staff WHERE staff_id = ".$result['staff_id'].";";
                $select_student_result = mysql_query($query);
                $student_name_result = mysql_fetch_assoc($select_student_result);
                echo $student_name_result['name'];
            ?>
        </div>
        <div id="creation_date" style="width: 20%; float:left;">
            <?PHP echo $result['date_created']; ?>
        </div>
    <?php } ?>
    <a href="event_form.php" style=" margin-top:40px; float:left;">Add a news item</a>
</div><!-- InstanceEndEditable --></div>
	
    <div id="footer">
    	<div align="center"><a href="contact_us.html">contact us</a></div>
    </div>
    
</div>
<!-- InstanceBeginEditable name="nav_behaviour_close" --><!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>
