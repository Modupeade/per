 <?php
session_start();
$db = new mysqli("localhost", "root", "", "per");
if($db->connect_errno > 0 ){
	die("Unable to connect to database".$db->connect_error);
}
if(!isset($_SESSION['user_id'])){
	die('Unauthorized Access');
}else{
	$db = new mysqli('localhost', 'root', '', 'per');

	if($db->connect_errno > 0){
		die('Unable to connect to database [' . $db->connect_error . ']');
	} 
	
}

	

if (isset($_POST['submit']))
{
    $surname   = $_POST['surname'];
    $rank  = $_POST['rank'];
    $number = $_POST['number'];
    $sex    = $_POST['sex'];
    $commission = $_POST['commission'];
    $corps    = $_POST['corps'];
	$rank_date = $_POST['rank_date'];
    $dob      = $_POST['dob'];
    $pob     = $_POST['pob'];
    $state     = $_POST['state'];
	$awards = array_key_exists( 'awards',$_POST)?$_POST['awards']:null;
	$years = array_key_exists('years',$_POST)?$_POST['years']:null;
	$military_qualifications = array_key_exists('military_qualifications',$_POST)?$_POST['military_qualifications']:null;
	$civil_qualifications = array_key_exists('civil_qualifications',$_POST)?$_POST['civil_qualifications']:null;

	if(!is_null($awards)){
		if(count($awards) != count($years)){
			print_r($awards);
			print_r($years);
			echo "awards ". count($awards);
			echo " years ". count($years);
			die("show error telling the user fill both and years");
			// show error telling the user fill both and years
		}else{
			for($i=0; $i < count($awards); $i++){
			$sql = "INSERT INTO `personnel_awards` (`id`, `user_id`, `title`, `year`) VALUES (NULL, '".$_SESSION['user_id']."', '".$awards[$i]."', '".$years[$i]."');";
			$db->query($sql);
			}
		}
	}
	if(!is_null($military_qualifications)){
		for($j=0; $j < count($military_qualifications); $j++){
	$sql = "INSERT INTO `personnel_qualifications` (`id`, `user_id`, `title`, `type`) VALUES (NULL, '".$_SESSION['user_id']."', '".$military_qualifications[$j]."','m');";
		$db->query($sql);
		}
	}
	
	if(!is_null($civil_qualifications)){
		for($j=0; $j < count($civil_qualifications); $j++){
	$sql = "INSERT INTO `personnel_qualifications` (`id`, `user_id`, `title`, `type`) VALUES (NULL, '".$_SESSION['user_id']."', '".$civil_qualifications[$j]."','c');";
		$db->query($sql);
		}
	}

	$sql = "UPDATE `per`.`personal_details` SET `surname`='$surname',`rank`='$rank',`number`='$number',`sex`='$sex', `commission`='$commission', `corps`='$corps',`rank_date`='$rank_date',`dob`='$dob',`pob`='$pob',`state`='$state' WHERE user_id='".$_SESSION['user_id']."' ";
if ($db->query($sql) === TRUE) {
        echo "Record updated successfully";
} else {
        echo "Error updating record: " . $db->error;
}

}
$ret=$db->query( "SELECT * FROM personal_details  WHERE user_id='".$_SESSION['user_id']."' ") or die("Could not execute query: " .$db->error);
$user = mysqli_fetch_assoc($ret);
$ret=$db->query( "SELECT * FROM personnel_awards  WHERE user_id='".$_SESSION['user_id']."' ") or die("Could not execute query: " .$db->error);
$awards = mysqli_fetch_all($ret, MYSQLI_ASSOC);	
$ret=$db->query( "SELECT * FROM personnel_qualifications  WHERE user_id='".$_SESSION['user_id']."' AND type='m' ") or die("Could not execute query: " .$db->error);
$military = mysqli_fetch_all($ret, MYSQLI_ASSOC);	
$ret=$db->query( "SELECT * FROM personnel_qualifications  WHERE user_id='".$_SESSION['user_id']."' AND type='c' ") or die("Could not execute query: " .$db->error);
$military = mysqli_fetch_all($ret, MYSQLI_ASSOC);		

?>