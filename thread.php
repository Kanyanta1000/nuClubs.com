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

  $currtime = date("YmdHis",time());

  /* maintains this user's state as active. */
  mysql_query("UPDATE student SET last_chat_update = '" . $currtime . "'
                WHERE UserID = " . $_SESSION['student_id']);

  /* grab any messages posted since the last time we checked.*/
  $sql = "SELECT message,student_id
          FROM chat_messages
          INNER JOIN " . "student
            ON chat_messages.student_id = student.student_id 
          WHERE Posted >= '" . $_SESSION['chat_prevtime'] . "' 
            AND Posted < '" . $currtime . "'
          ORDER BY Posted";
  $res = mysql_query($sql);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?
    if(mysql_num_rows($res)){
      echo '<div id="contents">';
      while($row = mysql_fetch_array($res)){
        echo '<div><strong>' .
              htmlspecialchars($row['student_id']) . ': </strong>' .
              htmlspecialchars($row['message']) . '</div>';
      }
      echo '</div>';
    }
    $_SESSION['chat_prevtime'] = $currtime;
  ?>

<script type="text/javascript"><!--
  if(parent.insertMessages && document.getElementById("contents"))
    parent.insertMessages(document.getElementById("contents").innerHTML);
  
  setTimeout("getMessages()",1000); //poll server again in one second

  function getMessages(){
    document.location.reload();
  }
  //-->
</script>

</body>
</html>