<?php
session_start();
	$db = new mysqli('localhost', 'root', '', 'per');

	if($db->connect_errno > 0){
		die('Unable to connect to database [' . $db->connect_error . ']');
	}
	
if (isset($_POST['update']))
{	
$sql = "UPDATE `per`.`personnel_qualifications` SET  `user_id`= '".$_SESSION['user_id']."',`title`= '".$_POST['military']."',`type`='m' WHERE id= '".$_REQUEST['id']."' ";
		 if ($db->query($sql) === TRUE) {
		echo "Your update was successful!";
	}
}
$id = $_REQUEST['id'];
$ret=$db->query( "SELECT * FROM personnel_qualifications  WHERE id='".$id."' ") or die("Could not execute query: " .$db->error);
$military = mysqli_fetch_assoc($ret);


?>
<a style="padding-left: 10px;" href="staff-form.php">BACK</a><br><br>
<form action="edit-mili.php?id=<?=$id?>" method="POST">
		<input type="text" name="military" value="<?=$military['title']?>"/>
	<div>	
		<br/><input type="submit" name="update" value="update"/>		
	</div>
</form>

