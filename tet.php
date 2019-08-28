
<?PHP

require_once('connections/nu_clubs_conn.php');
require_once('classes.php');
/*
$obj = new main_class;

$img = $_FILES["pic"]["name"];

$table = "club";
$columns = "(logo)";
$values = "('$img')";
$obj->insert($table, $columns, $values);

$obj->upload();*/


$query = "SELECT * FROM club";
$name = mysql_query($query);
$result = mysql_fetch_assoc($name);
 
		while($result = mysql_fetch_assoc($name)){
		 ?>
         <div id="description" style=" color:#0000;">
		  <?php echo $result['description'] ;?>
         </div>
		 

   
    
       <div id="images" style="margin:0% 1% 0% 9%; width:20%;">
			<img name="imageField" src="<?php echo "images/".$result['logo'] ;?>" height="200" width="150"/>
        </div>
       <?php } ?>
       
