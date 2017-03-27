<?php
include "functions.php";
$title="Home";
get_header(); ?>

			<section class="body-content">
					<div id="body-container">
						<div class = "next-bar">
						<h2 style="padding:5px;">Sign in</h2>
						</div>
		
					<div class ="form-sect">
					
						<form action="login.php" method= "post">
							Username:<input type="text" name="username" value="">
						  </br></br>
							Password:&nbsp;<input type="password" name="password" value="">
						  <br><br>
						  <input type="submit" value="Sign in">
						</form>
					</div>
					
				
				
				
				
				
				
				
			
			
<?php get_footer(); ?>