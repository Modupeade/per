<?php
$db = new mysqli('localhost', 'root', '', 'per');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}
if (empty($_POST['username']) || empty($_POST['password'])) {
		die('Username or Password is invalid');
}
else{
(isset($_POST['username']) and isset($_POST['password']) ); 
		include('index.php'); //code is given below (used for database connection)
		$username=$_POST['username'];
		$password=$_POST['password'];
		//to prevent injection
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);

 
		$ret=$db->query( "SELECT * FROM user WHERE username='$username' AND password='$password' ") or die("Could not execute query: " .$db->error);
		$row = mysqli_fetch_assoc($ret);
		if((empty($row)==false)) {
	        session_start();
	        $_SESSION['username']=$username;
			$_SESSION['user_id']=$row['user_id'];
			header('location: staff-form.php');
	        $res=$db->query( "SELECT user.*, p.* 
				FROM `user`
				LEFT JOIN personal_details p
				ON (user.user_id = p.user_id)
				WHERE user.user_id=1")or die("Could not execute query: " .$db->error);
		}
		else {
			die('Username or Password is invalid');

		}
				

}
mysqli_close($db);

?>
