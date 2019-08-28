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

  /* make sure the person is logged in. 
  if(!isset($_SESSION['student_id']))
    exit;*/
  
  /* make sure something was actually posted. */
  if(sizeof($_POST)){
    $expiretime = date("YmdHis",time() - 30);

    /* delete expired messages. */
    mysql_query("DELETE FROM jenChat_Messages 
                 WHERE Posted <= '" . $expiretime . "'"); 
    /* delete inactive participants. */
    mysql_query("DELETE FROM jenChat_Users 
                 WHERE LastUpdate <= '" . $expiretime. "'"); 
    /* post the message. */
    mysql_query("INSERT INTO chat_messages (UserID,Posted,Message)
                 VALUES(
                  " . $_SESSION['student_id'] . ",
                  '" . date("YmdHis", time()) . "',
                  '" . mysql_real_escape_string(strip_tags($_POST['message'])) . "'
                 )");
  
    header("Location: post.php");
    exit;
  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" xml:lang="en-US">
  <head>
    <script type="text/javascript"><!--
      if(parent.resetForm)
        parent.resetForm();
      //-->
    </script>
  </head>
</html>