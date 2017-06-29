<?php
include_once("session.php");
include ("function.php");
	$db = new mysqli('localhost', 'root', '', 'per');

	if($db->connect_errno > 0){
		die('Unable to connect to database [' . $db->connect_error . ']');
	}

//dbg($_POST);	
if (isset($_POST['update'])){
	extract($_POST);
		
		$ret=$db->query( "SELECT * FROM unit_deployment  ORDER BY date_tos DESC  limit 3 ");
		$row =mysqli_fetch_all($ret, MYSQLI_ASSOC);
		
				$sql= "
					INSERT INTO `per`. `unit_deployment` (`id`, `user_id`,`unit`, `date_tos`, `appt`, `period`, `remark`) 
					VALUES 
					(NULL, '".$_SESSION['user_id']."', '$unit1', '$date_tos1', '$appt1', '$period1','$remark1')";
					query($sql);
					
		for($n=0; $n < count($deploy); $n++){
				$sql= "SELECT  `unit`, `appt`, `period`, `remark` FROM unit_deployment  WHERE user_id='".$_SESSION['user_id']."' ORDER BY date_tos DESC  limit 3 ";
				$sql= "
					INSERT INTO `per`. `unit_deployment` ( `user_id`,`unit`,  `appt`, `period`, `remark`) 
					VALUES 
					( '".$_SESSION['user_id']."', '".$unit1[$n]."', '".$appt1[$n]."',  '".$period1[$n]."','".$remark1[$n]."')";
					query($sql);
		}
		//}
		
		if(isset($occasion)){
			$ret=query_result( "SELECT * FROM occasion_report  WHERE user_id='".$_SESSION['user_id']."' ");
			$row = mysqli_fetch_assoc($ret);
	
			if(empty($row)){
				$sql= "INSERT INTO `per`. `occasion_report` ( `id`,`user_id`,`report`) 
						VALUES 
						(NULL, '".$_SESSION['user_id']."', '$occasion')";
						query($sql);						
			}
			else{
				$sql= "UPDATE `per`.`occasion_report` SET  `user_id`= '".$_SESSION['user_id']."', `report`= '$occasion' WHERE user_id='".$_SESSION['user_id']."' ";
				query($sql);
			}
		}
		
	
		
	 
	  $ret=$db->query( "SELECT * FROM occasion_report  WHERE user_id='".$_SESSION['user_id']."' ") or die("Could not execute query: ".$db->error);
	  $occasion =mysqli_fetch_assoc($ret); 

	}

?>