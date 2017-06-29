<?php
session_start();
if(!isset($_SESSION['user_id'])){
	die('Unauthorized Access');
	// TODO redirect to login page
}
?>