<?PHP

class main_class
{
	function select($columns,$table,$condition)
	{
		$query = "SELECT ".$columns." FROM ".$table." WHERE ".$condition;	
		//echo $query;
		$result = mysql_query($query);
	
	return $result;
	}
	
	function insert($table, $columns, $values)
	{
		$query = "INSERT INTO ".$table." ".$columns." VALUES ".$values;
		//echo $query;
		mysql_query($query);
	
	return false;
	}
	
	function delete($table,$condition)
	{
		$query = "DELETE FROM ".$table." WHERE ".$condition;
		//echo $query;
		mysql_query($query);

	return false;
	}
	
	function update($table, $column, $new_value, $condition)
	{
		$query = "UPDATE ".$table." SET ".$column." = ".$new_value." WHERE ".$condition;
		//echo $query;
		mysql_query($query);

	return false;
	}
	
	function update_success($location)
	{		   		
		?>
			<script type="text/javascript">
            
            alert("Update successful");
            window.location = "<?php echo $location?>";
            </script>
		<?php
	}
	
	function insert_success($entity, $location)
	{		   		
		?>
			<script type="text/javascript">
            
            alert("<?php echo $entity?> successfully added.");
            window.location = "<?php echo $location?>";
            </script>
		<?php
	}
	
	function insert_fail($entity, $location)
	{		   		
		?>
			<script type="text/javascript">
            
            alert("<?php echo $entity?> could not be added");
            window.location = "<?php echo $location?>";
            </script>
		<?php
	}
	
	function delete_success($entity, $location)
	{		   		
		?>
			<script type="text/javascript">
            
            alert("<?php echo $entity?> deleted.");
            window.location = "<?php echo $location?>";
            </script>
		<?php
	}
	
	
	function general_error($error, $location)
	{		   		
		?>
			<script type="text/javascript">
            
            alert("<?php echo $error?>");
            window.location = "<?php echo $location?>";
            </script>
		<?php
	}
	
	function login_error()
	{		   		
		?>
			<script type="text/javascript">
            
            alert("You must be logged in to see this page");
            window.location = "index.php";
            </script>
		<?php
	}
	
	function jump_to($location)
	{		   		
		?>
			<script type="text/javascript">
            	window.location = "<?php echo $location?>";
            </script>
		<?php
	}
	
	
	function upload()
	{	
		$doc=$_SERVER['DOCUMENT_ROOT']."/nuClubs.com/images/".$_FILES["pic"]["name"];
		$temp = $_FILES['pic']['tmp_name'];
		
		if (file_exists($_SERVER['DOCUMENT_ROOT']."/images/".$_FILES["pic"]["name"]))
			 {
				unlink($doc);
			 }
		move_uploaded_file($temp, $doc);
		
	return false;
	}
	
	
}










/*
class main_class
{
	function login()
	{
		//check for logged user
		if ($_SESSION['pass']=="")
		{
			$msg = "You need to login to access this page.";
			header('location:login.php?error='.$msg);
		}
	return false;
	}

	function delete()
	{ 
		//only run when delete is clicked
		$delete = $_POST['pass'];
		$deleteq = "DELETE FROM registration WHERE Password = '$delete'";
		mysql_query($deleteq);

	return false;
	}
	
	
	function edit()
	{
		$edit = $_POST['fname'];
		$pw = $_POST['pass'];
		$update = "UPDATE tablename SET  column_name ='$edit' WHERE conditional = '$value' ";
		mysql_query($update);
        //header('location:accounts.php');
	}


	function insert()
	{
		$Title = $_POST["Title"];
		$FirstName = $_POST["FirstName"];
		$my_password = md5(intval(mt_rand(0,56)));
		$picName = $_FILES["pic"]["name"];
		$query = "INSERT INTO registration (Title, FName, Password, picName) VALUES('$Title','$FirstName','$my_password', '$picName')";
		mysql_query($query);
		$_SESSION['my_session']=$my_password;
	
	return false;
	}
	
	function upload()
	{	
		$doc=$_SERVER['DOCUMENT_ROOT']."/unicef/images/".$_FILES["pic"]["name"];
		$temp = $_FILES['pic']['tmp_name'];
		
		if (file_exists($_SERVER['DOCUMENT_ROOT']."/images/".$_FILES["pic"]["name"]))
			 {
				unlink($doc);
			 }
		move_uploaded_file($temp, $doc);
		
	return false;
	}
	
	function source()
	{

		$src = $_SERVER['HTTP_REFERER'];
		if ($src== null)
			{
				//echo "you used a url";
				$msg = "You need to login to access this page.";
				header('location:login.php?error='.$msg);	
			}
			
		if ($src!= null)
			{
				$msg = "";
				header('location:login.php?error='.$msg);
			}

	}


}

*/
?>