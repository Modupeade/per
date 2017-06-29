 <?php
include_once("session.php");
include ("function.php");
define('DEBUG_MODE',1);
if (isset($_POST['submit']))
{
	extract($_POST);
	
	if(isset($awards)){
		if(count($awards) != count($years)){
			echo "awards ". count($awards);
			echo " years ". count($years);
			die("show error telling the user fill both and years");
			// show error telling the user fill both and years
		}else{
			for($i=0; $i < count($awards); $i++){
			$sql = "INSERT INTO `personnel_awards` (`id`, `user_id`, `title`, `year`) VALUES (NULL, '".$_SESSION['user_id']."', '".$awards[$i]."', '".$years[$i]."');";
			query($sql);
			}
		}
	}
	if(isset($military_qualifications)){
		for($j=0; $j < count($military_qualifications); $j++){
	$sql = "INSERT INTO `personnel_qualifications` (`id`, `user_id`, `title`, `type`) VALUES (NULL, '".$_SESSION['user_id']."', '".$military_qualifications[$j]."','m');";
		query($sql);
		}
	}
	
	if(isset($civil_qualifications)){
		for($k=0; $k < count($civil_qualifications); $k++){
	$sql = "INSERT INTO `personnel_qualifications` (`id`, `user_id`, `title`, `type`) VALUES (NULL, '".$_SESSION['user_id']."', '".$civil_qualifications[$k]."','c');";
		query($sql);
		}
	}
	if(isset($professional)){
		for($m=0; $m < count($professional); $m++){
	$sql = "INSERT INTO `professional_bodies` (`id`, `user_id`, `title`) VALUES (NULL, '".$_SESSION['user_id']."', '".$professional[$m]."');";
		query($sql);
		}
	}
	if(isset($medals)){
		for($n=0; $n < count($medals); $n++){
	$sql = "INSERT INTO `decoration_medals` (`id`, `user_id`, `title`) VALUES (NULL, '".$_SESSION['user_id']."', '".$medals[$n]."');";
		query($sql);
		}
	}
	
	if(isset($languages) && is_array($languages) && $languages[0] != ""){

		if(count($languages) != count($language_caps)){
			die("show error telling the user fill both and years");
			// show error telling the user fill both and years
		}else{
			for($i=0; $i < count($languages); $i++){
				$spoken = 0;
				$written = 0;
				switch($language_caps[$i]){
					case "s":
						$spoken = 1;
						break;
					case "w":
						$written = 1;
						break;
					case "sw":
						$spoken = 1;
						$written = 1;
						break;
				}
				$sql = "INSERT INTO `personnel_language` (`id`, `user_id`, `title`, `spoken`, `written`) VALUES (NULL, '".$_SESSION['user_id']."', '".$languages[$i]."','$spoken', '$written')";
				query($sql);
			}
		}
	}
	
	
	$ret=query_result( "SELECT * FROM next_kin  WHERE user_id='".$_SESSION['user_id']."' ");
	$row = mysqli_fetch_assoc($ret);
	if(empty($row)){
		$sql= "INSERT INTO `per`.`next_kin` (`id`, `user_id`, `nok1_name`, `nok1_address`, `nok1_relationship`, `nok1_telephone`,`nok2_name`, `nok2_address`, `nok2_relationship`, `nok2_telephone`) VALUES (NULL, '".$_SESSION['user_id']."', '$nok1_name','$nok1_address', '$nok1_relationship', '$nok1_telephone','$nok2_name','$nok2_address', '$nok2_relationship', '$nok2_telephone')";
		query($sql);
	}
	else{
		$sql = "UPDATE `per`.`next_kin` SET `nok1_name`='$nok1_name',`nok1_address`='$nok1_address',`nok1_relationship`='$nok1_relationship',`nok1_telephone`='$nok1_telephone', `nok2_name`='$nok2_name', `nok2_address`='$nok2_address',`nok2_relationship`='$nok2_relationship',`nok2_telephone`='$nok2_telephone' WHERE user_id='".$_SESSION['user_id']."' ";
		query($sql);		
	}	
	$sql= "UPDATE `per`.`personal_details` SET `surname`= '$surname', `rank`= '$rank', `number`= '$number', `sex`= '$sex',
	`commission`= '$commission', `corps`= '$corps', `rank_date`= '$rank_date', `dob`= '$dob', `pob`= '$pob', `state`= '$state', `mstatus`= '$mstatus', `children`= '$children', `male_children`= '$male_children', `female_children`= '$female_children' WHERE user_id='".$_SESSION['user_id']."' "; 	
	query($sql);
	include_once("staff-form.php");
	show_view("Update successful");

}else{
	redirect("staff-form.php");
}


?>