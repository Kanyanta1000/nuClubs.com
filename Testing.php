<html>
    <head>
        <style>
        #msg_box
        {
            background: #cce5ad;
            border-bottom: 2px solid #56b96b;
            color: #4a4a4a;
            width: 100%;
            height: 30px;
            position: absolute;
            top:0
            left:0
            cursor:pointer;
        }
        </style>
    </head>
    
    
    <body>
    <div id="msg_box">
        <span id="msg">
        </span>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    </body>
    
    <script type="text/javascript" src="scripts/jquery.js"></script>
    <script type="text/javascript">
        $document.ready(function(){
                                         $(".msg_box").hide();
                                     }
							);
     </script>
    
	<?php
        echo "Hello world!";
    ?>
</html>