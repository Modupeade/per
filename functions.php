<?php

function get_header(){
	include "header.php";
}

function get_footer(){
	include "footer.php";
}

function set_title( $title_string){
	global $title;
	$title = $title_string;
}
?>