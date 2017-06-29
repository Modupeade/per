<?php function dbg($var){
	echo "DEBUG: ";
	echo "<pre>";
	var_dump($var);
	echo "</pre>";
	die();
}

function redirect($url){
	header('Location: '.$url);
}

function query($sql){
	global $db;
	include("database.php");
	include_once("staff-form.php");
	
	if($db->query($sql) === true){		

	}else{		
		if(DEBUG_MODE){
			die("DEBUG: <br>"."<pre>".$db->error."<br>".$sql."</pre>");
		}else{
			show_view("Update failed");
		}	
		die();
	}
}

function query_result($sql){
	include_once("database.php");
	$result = $db->query($sql) ;
	if(!$db->error){		
		return $result;
	}else{
		if(DEBUG_MODE){
			die("DEBUG: <br>"."<pre>".$db->error."<br>".$sql."</pre>");
		}
		echo "Database error";
		die();		
	}
}
?>