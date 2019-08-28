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
		
require_once('classes.php');
  
  $chat = new main_class;
  /*else if(date("YmdHis",time() - 5) > $_SESSION['chat_prevtime']){
    header("Location: ./login.php?logout=true");
    exit;
  }*/
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/main_template.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Chat room</title>
<!-- InstanceEndEditable -->
<link href="css/nuClubs.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="favicon.ico" />


<!-- InstanceBeginEditable name="head" -->




<script type="text/javascript"><!--
  var cDocument;
  var cWindow;

  window.onload = chat_init;

  function chat_init(){
    var chatContents = document.getElementById("chatContents");

    //set up a reference to the window object of the IFRAME
    if(window.frames && window.frames["chatContents"]) //IE5, Konq, Safari
      cWindow = window.frames["chatContents"];
    else if(chatContents.contentWindow) //IE5.5+, Moz 1.0+, Opera
      cWindow = chatContents.contentWindow;
    else //Moz < 0.9 (Netscape 6.0)
      cWindow = chatContents;

    //set up a reference to the document object of the IFRAME
    if(cWindow.document) //Moz 0.9+, Konq, Safari, IE, Opera
      cDocument = cWindow.document;
    else //Moz < 0.9 (Netscape 6.0)
      cDocument = cWindow.contentDocument;
  }
  function insertMessages(content){
    //place the new messages in a div
    var newDiv = cDocument.createElement("DIV");
    newDiv.innerHTML = content;

    //append the messages to the contents
    cDocument.getElementById("contents").appendChild(newDiv);

    //scroll the chatContents area to the bottom
    cWindow.scrollTo(0,cDocument.getElementById("contents").offsetHeight);
  }
  function resetForm(){
    document.getElementById("message").value = "";
    document.getElementById("message").focus();
  }//-->
</script>


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
<div id="chat_wrapper" style="width:60%; margin-left:30%;">
<h1>NU Buzz</h1>

    <a href="login.php?logout=true">Logout</a><br />

    <iframe id="chatContents" name="chatContents" src="chat_contents.html" style="background: #CCE5AD; border: 2px solid #56B96B; color: #4a4a4a;"></iframe>

    <form target="post" method="post" action="post.php">
      <input type="text" name="message" id="message" style="width: 250px;" />
      <input type="submit" value="Send" class="submit" />
    </form>

    <iframe id="post" name="post" src="post.php"
      style="width: 0px; height: 0px; border: 0px;"></iframe>
    <iframe id="thread" name="thread" src="thread.php"
      style="width: 0px; height: 0px; border: 0px;"></iframe>
</div>
<!-- InstanceEndEditable --></div>
	
    <div id="footer">
    	<div align="center"><a href="contact_us.html">contact us</a></div>
    </div>
    
</div>
<!-- InstanceBeginEditable name="nav_behaviour_close" --><!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>